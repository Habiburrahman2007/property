<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Agent Login - Prime Property</title>
    
    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts & Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <style>
        body {
            background-color: #F5F5F5;
        }
        .luxury-shadow {
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.08);
        }
        .input-border-bottom {
            border-bottom: 1px solid rgba(0, 0, 0, 0.15);
            transition: border-color 0.2s ease;
        }
        .input-border-bottom:focus {
            border-bottom-color: #000000;
            outline: none;
            box-shadow: none;
            border-color: transparent;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-md bg-surface-container-low text-on-surface">
<main class="w-full max-w-md bg-surface-container-lowest rounded-lg luxury-shadow overflow-hidden border border-primary/5 p-xl">
    
    <!-- Back to Public Link -->
    <div class="mb-lg flex justify-start">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-xs text-on-surface-variant hover:text-primary transition-colors text-body-sm font-medium">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Back to Website
        </a>
    </div>

    <!-- Header / Logo -->
    <div class="flex flex-col items-center text-center mb-xl">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Prime Property Logo" class="h-14 w-auto object-contain mb-md">
        <h1 class="font-headline-md text-headline-md font-bold text-primary tracking-tight">Prime Property</h1>
        <p class="font-body-sm text-body-sm text-on-surface-variant mt-sm">Agent Portal Access</p>
    </div>

    <!-- Error Alerts -->
    @if(session('error'))
        <div class="mb-lg p-md bg-error-container text-on-error-container rounded border border-error/10 text-body-sm flex items-center gap-sm">
            <span class="material-symbols-outlined text-[20px]">error</span>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-lg p-md bg-secondary-container text-on-secondary-container rounded border border-secondary/10 text-body-sm flex items-center gap-sm">
            <span class="material-symbols-outlined text-[20px]">check_circle</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ url('/agent/login') }}" method="POST" onsubmit="handleSubmit(event)" class="space-y-lg">
        @csrf
        <!-- Email Input -->
        <div class="space-y-xs">
            <label class="block font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold" for="email">Email</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-2 top-1/2 -translate-y-1/2 text-outline-variant pb-1">mail</span>
                <input class="w-full bg-surface-container-low border-0 input-border-bottom pl-12 py-2 font-body-lg text-body-lg text-on-surface placeholder:text-outline-variant" id="email" name="email" placeholder="agent@primeproperty.com" required type="email" value="{{ old('email') }}"/>
            </div>
        </div>
        <!-- Password Input -->
        <div class="space-y-xs">
            <label class="block font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold" for="password">Password</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-2 top-1/2 -translate-y-1/2 text-outline-variant pb-1">lock</span>
                <input class="w-full bg-surface-container-low border-0 input-border-bottom pl-12 py-2 font-body-lg text-body-lg text-on-surface placeholder:text-outline-variant" id="password" name="password" placeholder="••••••••" required type="password"/>
            </div>
        </div>
        <!-- Action Button -->
        <div class="pt-sm">
            <button id="submit-btn" class="w-full bg-secondary text-on-secondary font-body-lg text-body-lg rounded py-3 px-md hover:bg-secondary/90 transition-all duration-200 flex items-center justify-center gap-2 font-semibold shadow-sm hover:shadow active:scale-95" type="submit">
                <span>Login to Portal</span>
                <span class="material-symbols-outlined text-[18px]" id="submit-icon">arrow_forward</span>
            </button>
        </div>
        <!-- Forgot Password (Subtle) -->
        <div class="text-center mt-md">
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors" href="#" onclick="alert('Please contact your administrator to reset credentials.')">Forgot credentials?</a>
        </div>
    </form>
</main>

<script>
    function handleSubmit(e) {
        const btn = document.getElementById('submit-btn');
        const icon = document.getElementById('submit-icon');
        btn.disabled = true;
        btn.classList.add('opacity-85', 'cursor-wait');
        btn.querySelector('span').textContent = 'Logging in...';
        icon.classList.add('animate-spin');
        icon.textContent = 'sync';
    }
</script>
</body>
</html>
