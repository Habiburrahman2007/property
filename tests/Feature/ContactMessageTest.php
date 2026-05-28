<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

beforeEach(function () {
    // Clear rate limiters before each test
    RateLimiter::clear('contact_submit:127.0.0.1');
});

test('public contact form validation fails for missing fields', function () {
    $response = $this->post('/contact', []);

    $response->assertRedirect();
    $response->assertSessionHasErrors(['nama', 'email', 'phone', 'pesan']);
});

test('public contact form validation fails for invalid email', function () {
    $response = $this->post('/contact', [
        'nama' => 'John Doe',
        'email' => 'invalid-email',
        'phone' => '08123456789',
        'pesan' => 'Halo ini pesan saya.',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasErrors(['email']);
});

test('public contact form validation fails for short phone number', function () {
    $response = $this->post('/contact', [
        'nama' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123', // less than 10 digits
        'pesan' => 'Halo ini pesan saya.',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasErrors(['phone']);
});

test('public contact form succeeds with valid details and stores in session', function () {
    $initialCount = count(Mail::getSymfonyTransport()->messages());

    $response = $this->post('/contact', [
        'nama' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'pesan' => 'Halo ini pesan saya yang cukup panjang.',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success_message', 'Pesan terkirim, tim kami akan menghubungi Anda.');

    // Assert that the message was stored in session
    $messages = session('prime_portal_messages');
    expect($messages)->not->toBeEmpty();
    expect($messages[0]['name'])->toBe('John Doe');
    expect($messages[0]['email'])->toBe('john@example.com');
    expect($messages[0]['phone'])->toBe('08123456789');
    expect($messages[0]['message'])->toBe('Halo ini pesan saya yang cukup panjang.');
    expect($messages[0]['is_read'])->toBeFalse();

    // Assert that raw mail was triggered
    $sentEmails = Mail::getSymfonyTransport()->messages();
    expect(count($sentEmails))->toBe($initialCount + 1);

    $sentEmail = $sentEmails[$initialCount];
    $originalMessage = $sentEmail->getOriginalMessage();
    $recipients = $originalMessage->getTo();
    expect($recipients[0]->getAddress())->toBe('admin@primeproperty.co.id');
    expect($originalMessage->getSubject())->toContain('Notifikasi Pesan Baru: John Doe');
});

test('public contact form enforces rate limiting (max 3 submissions per hour)', function () {
    $payload = [
        'nama' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'pesan' => 'Halo ini pesan saya.',
    ];

    // First 3 submissions should succeed
    for ($i = 0; $i < 3; $i++) {
        $response = $this->post('/contact', $payload);
        $response->assertSessionHas('success_message');
    }

    // 4th submission should fail due to rate limiting
    $response = $this->post('/contact', $payload);
    $response->assertSessionHasErrors(['rate_limit']);
});

test('admin messages listing shows messages page when authenticated', function () {
    $adminUser = [
        'id' => 1,
        'email' => 'admin@primeproperty.co.id',
        'role' => 'superadmin'
    ];

    // Without authentication, it redirects to login
    $response = $this->get('/admin/messages');
    $response->assertRedirect('/login');

    // With authentication, it renders messages
    $response = $this->withSession(['admin_user' => $adminUser])->get('/admin/messages');
    $response->assertStatus(200);
});

test('admin can toggle read status and delete message via session API endpoints', function () {
    $adminUser = [
        'id' => 1,
        'email' => 'admin@primeproperty.co.id',
        'role' => 'superadmin'
    ];

    $testMessages = [
        [
            'id' => 42,
            'name' => 'Eleanor Vance',
            'email' => 'e.vance@hillhouse.com',
            'phone' => '+62 812 3456 789',
            'date' => '27 Mei 2026, 09:15 WIB',
            'snippet' => 'Inquiry...',
            'message' => 'Saya tertarik...',
            'is_read' => false,
        ]
    ];

    // 1. Visit page with initialized session data
    $this->withSession([
        'admin_user' => $adminUser,
        'prime_portal_messages' => $testMessages
    ])->get('/admin/messages');

    $messagesBefore = session('prime_portal_messages');
    $targetId = $messagesBefore[0]['id'];
    $initialReadStatus = $messagesBefore[0]['is_read'];

    // 2. Toggle read status
    $response = $this->withSession(['admin_user' => $adminUser])
        ->post("/admin/messages/{$targetId}/toggle-read");
    
    $response->assertStatus(200);
    $response->assertJson(['success' => true]);

    $messagesAfter = session('prime_portal_messages');
    expect($messagesAfter[0]['is_read'])->toBe(!$initialReadStatus);

    // 3. Delete the message
    $response = $this->withSession(['admin_user' => $adminUser])
        ->delete("/admin/messages/{$targetId}");

    $response->assertStatus(200);
    $response->assertJson(['success' => true]);

    $messagesFinal = session('prime_portal_messages');
    expect(array_column($messagesFinal, 'id'))->not->toContain($targetId);
});

