<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Agent Login - Prime Property</title>
    
    <!-- Tailwind CSS with forms -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Custom Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "error": "#ba1a1a",
                        "outline": "#747878",
                        "on-tertiary-fixed": "#410005",
                        "secondary-fixed": "#ffdf9b",
                        "surface-container-highest": "#e2e2e2",
                        "on-background": "#1a1c1c",
                        "surface-bright": "#f9f9f9",
                        "primary-container": "#1c1b1b",
                        "surface-tint": "#5f5e5e",
                        "on-tertiary-fixed-variant": "#891b20",
                        "surface-container": "#eeeeee",
                        "on-surface": "#1a1c1c",
                        "primary-fixed": "#e5e2e1",
                        "outline-variant": "#c4c7c7",
                        "on-tertiary-container": "#dc5856",
                        "on-surface-variant": "#444748",
                        "background": "#f9f9f9",
                        "surface-container-low": "#f3f3f4",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#000000",
                        "on-primary": "#ffffff",
                        "inverse-on-surface": "#f0f1f1",
                        "inverse-primary": "#c8c6c5",
                        "surface-dim": "#dadada",
                        "surface-container-lowest": "#ffffff",
                        "surface-variant": "#e2e2e2",
                        "on-secondary-fixed": "#251a00",
                        "secondary": "#745b1b",
                        "error-container": "#ffdad6",
                        "surface-container-high": "#e8e8e8",
                        "on-error": "#ffffff",
                        "secondary-container": "#ffdc8e",
                        "on-secondary-fixed-variant": "#5a4302",
                        "tertiary-container": "#410005",
                        "secondary-fixed-dim": "#e4c278",
                        "on-secondary-container": "#795f1f",
                        "tertiary-fixed-dim": "#ffb3af",
                        "surface": "#f9f9f9",
                        "inverse-surface": "#2f3131",
                        "tertiary-fixed": "#ffdad7",
                        "primary": "#000000",
                        "on-primary-fixed": "#1c1b1b",
                        "primary-fixed-dim": "#c8c6c5",
                        "on-primary-container": "#858383",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#474746",
                        "on-error-container": "#93000a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "xs": "4px",
                        "xl": "32px",
                        "sm": "8px",
                        "gutter": "24px",
                        "container-margin": "64px",
                        "md": "16px",
                        "lg": "24px"
                    },
                    "fontFamily": {
                        "body-sm": ["Geist"],
                        "display-lg-mobile": ["Geist"],
                        "headline-md-mobile": ["Geist"],
                        "body-lg": ["Geist"],
                        "headline-md": ["Geist"],
                        "label-uppercase": ["Geist"],
                        "display-lg": ["Geist"],
                        "code-sm": ["Geist"],
                        "title-sm": ["Geist"]
                    },
                    "fontSize": {
                        "body-sm": ["14px", { "lineHeight": "1.5", "letterSpacing": "0", "fontWeight": "400" }],
                        "display-lg-mobile": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "headline-md-mobile": ["24px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "500" }],
                        "body-lg": ["16px", { "lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400" }],
                        "headline-md": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "500" }],
                        "label-uppercase": ["12px", { "lineHeight": "1.0", "letterSpacing": "0.1em", "fontWeight": "600" }],
                        "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "code-sm": ["13px", { "lineHeight": "1.2", "letterSpacing": "0", "fontWeight": "500" }],
                        "title-sm": ["20px", { "lineHeight": "1.4", "letterSpacing": "0", "fontWeight": "500" }]
                    }
                }
            }
        }
    </script>
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
