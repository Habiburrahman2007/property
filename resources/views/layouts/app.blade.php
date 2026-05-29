<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Prime Property - Luxury Real Estate')</title>
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    @if(request()->is('/'))
    <!-- Preload LCP Image -->
    <link rel="preload" as="image" href="{{ asset('assets/img/hero-luxury-villa.jpg') }}" fetchpriority="high">
    @endif

    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts & Material Symbols -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" media="print" onload="this.media='all'"/>
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    </noscript>

    <!-- Tailwind Config -->
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
              "on-error": "#ffffff",
              "surface-container-high": "#e8e8e8",
              "secondary": "#745b1b",
              "error-container": "#ffdad6",
              "on-secondary-fixed-variant": "#5a4302",
              "secondary-container": "#ffdc8e",
              "tertiary-fixed": "#ffdad7",
              "primary": "#000000",
              "surface": "#f9f9f9",
              "inverse-surface": "#2f3131",
              "tertiary-fixed-dim": "#ffb3af",
              "tertiary-container": "#410005",
              "secondary-fixed-dim": "#e4c278",
              "on-secondary-container": "#795f1f",
              "on-primary-fixed-variant": "#474746",
              "on-error-container": "#93000a",
              "on-secondary": "#ffffff",
              "primary-fixed-dim": "#c8c6c5",
              "on-primary-container": "#858383",
              "on-primary-fixed": "#1c1b1b",
              "secondary-fixed": "#ffdf9b",
              "surface-container-highest": "#e2e2e2",
              "on-tertiary-fixed": "#410005",
              "error": "#ba1a1a",
              "outline": "#747878",
              "surface-container": "#eeeeee",
              "on-surface": "#1a1c1c",
              "on-tertiary-fixed-variant": "#891b20",
              "surface-tint": "#5f5e5e",
              "on-background": "#1a1c1c",
              "primary-container": "#1c1b1b",
              "surface-bright": "#f9f9f9",
              "tertiary": "#000000",
              "on-primary": "#ffffff",
              "inverse-on-surface": "#f0f1f1",
              "on-tertiary": "#ffffff",
              "outline-variant": "#c4c7c7",
              "on-surface-variant": "#444748",
              "on-tertiary-container": "#dc5856",
              "primary-fixed": "#e5e2e1",
              "background": "#f9f9f9",
              "surface-container-low": "#f3f3f4",
              "on-secondary-fixed": "#251a00",
              "surface-container-lowest": "#ffffff",
              "surface-variant": "#e2e2e2",
              "surface-dim": "#dadada",
              "inverse-primary": "#c8c6c5"
            },
            "borderRadius": {
              "DEFAULT": "0.125rem",
              "lg": "0.25rem",
              "xl": "0.5rem",
              "full": "0.75rem"
            },
            "spacing": {
              "sm": "8px",
              "xl": "32px",
              "xs": "4px",
              "container-margin": "64px",
              "gutter": "24px",
              "lg": "24px",
              "md": "16px"
            },
            "fontFamily": {
              "display-lg-mobile": ["Inter"],
              "body-lg": ["Inter"],
              "headline-md-mobile": ["Inter"],
              "body-sm": ["Inter"],
              "headline-md": ["Inter"],
              "title-sm": ["Inter"],
              "label-uppercase": ["Inter"],
              "code-sm": ["Inter"],
              "display-lg": ["Inter"]
            },
            "fontSize": {
              "display-lg-mobile": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "600"}],
              "body-lg": ["16px", {"lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400"}],
              "headline-md-mobile": ["24px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "500"}],
              "body-sm": ["14px", {"lineHeight": "1.5", "letterSpacing": "0", "fontWeight": "400"}],
              "headline-md": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "500"}],
              "title-sm": ["20px", {"lineHeight": "1.4", "letterSpacing": "0", "fontWeight": "500"}],
              "label-uppercase": ["12px", {"lineHeight": "1.0", "letterSpacing": "0.1em", "fontWeight": "600"}],
              "code-sm": ["13px", {"lineHeight": "1.2", "letterSpacing": "0", "fontWeight": "500"}],
              "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "600"}]
            }
          }
        }
      }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        .luxury-input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #f9f9f9 inset !important;
        }

        /* Premium fadeInUp Page Entrance Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-entrance {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Staggered card entrance for bento grid listings */
        @keyframes fadeInUpStagger {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-card {
            opacity: 0;
            animation: fadeInUpStagger 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-card:nth-child(1) { animation-delay: 0.1s; }
        .animate-card:nth-child(2) { animation-delay: 0.2s; }
        .animate-card:nth-child(3) { animation-delay: 0.3s; }
        .animate-card:nth-child(4) { animation-delay: 0.4s; }
        .animate-card:nth-child(5) { animation-delay: 0.5s; }
        .animate-card:nth-child(6) { animation-delay: 0.6s; }

        /* Splash Intro Animations */
        @keyframes scaleUp {
            from { transform: scale(0.85); opacity: 0; filter: blur(4px); }
            to { transform: scale(1); opacity: 1; filter: blur(0); }
        }
        @keyframes slideUp {
            from { transform: translateY(24px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes lineExpand {
            from { width: 0; opacity: 0; }
            to { width: 48px; opacity: 1; }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 0.8; }
        }
        .animate-scale-up {
            animation: scaleUp 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-slide-up {
            animation: slideUp 1.4s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
            opacity: 0;
        }
        .animate-line-expand {
            animation: lineExpand 1.5s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards;
            opacity: 0;
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-out 1.2s forwards;
            opacity: 0;
        }

        /* Navbar dynamic styling */
        #public-navbar {
            transition: all 0.3s ease-in-out;
        }
        #public-navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-bottom-color: rgba(196, 199, 199, 0.4);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }
        #public-navbar.scrolled .nav-link {
            color: #444748 !important; /* text-on-surface-variant */
        }
        #public-navbar.scrolled .nav-link.active {
            color: #745b1b !important; /* text-secondary */
            border-bottom-color: #745b1b !important;
        }
        #public-navbar.scrolled .nav-brand {
            color: #745b1b !important; /* text-primary */
        }

        /* Top states on Homepage */
        .is-home #public-navbar:not(.scrolled) .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        .is-home #public-navbar:not(.scrolled) .nav-link.active {
            color: #ffdf9b !important; /* secondary-fixed gold */
            border-bottom-color: #ffdf9b !important;
        }
        .is-home #public-navbar:not(.scrolled) .nav-brand {
            color: rgba(255, 255, 255, 1) !important;
        }
        
        /* Non-home page solid white standard navbar override */
        body:not(.is-home) #public-navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-bottom-color: rgba(196, 199, 199, 0.4);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }
        body:not(.is-home) #public-navbar .nav-link {
            color: #444748 !important;
        }
        body:not(.is-home) #public-navbar .nav-link.active {
            color: #745b1b !important;
            border-bottom-color: #745b1b !important;
        }
        body:not(.is-home) #public-navbar .nav-brand {
            color: #745b1b !important;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col antialiased {{ request()->is('/') ? 'is-home' : '' }}">
    <!-- Intro Screen -->
    <div id="intro-screen" class="fixed inset-0 bg-[#1A1A1A] z-[9999] flex flex-col items-center justify-center transition-all duration-1000 ease-in-out">
        <div class="flex flex-col items-center text-center space-y-md p-lg">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Prime Property Logo" class="h-20 md:h-24 w-auto object-contain animate-scale-up mb-sm">
            <h1 class="text-2xl md:text-3xl font-bold text-white tracking-[0.25em] uppercase animate-slide-up">
                Prime Property
            </h1>
            <div class="w-12 h-[1px] bg-secondary animate-line-expand mt-md"></div>
            <p class="text-secondary text-[10px] tracking-[0.3em] uppercase opacity-80 mt-sm animate-fade-in">
                Luxury Real Estate
            </p>
        </div>
    </div>

    <!-- TopNavBar -->
    <nav id="public-navbar" class="fixed top-0 left-0 right-0 z-50 border-b border-transparent bg-transparent py-sm md:py-md">
        <div class="flex justify-between items-center w-full px-md md:px-container-margin py-xs max-w-7xl mx-auto">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-title-sm font-title-sm font-bold tracking-tighter nav-brand">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Prime Property Logo" class="h-8 md:h-10 w-auto object-contain">
                <span class="hidden sm:inline">Prime Property</span>
            </a>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden md:flex gap-gutter items-center">
                <a class="nav-link font-label-uppercase text-label-uppercase pb-1 border-b-2 border-transparent hover:text-secondary transition-all duration-200 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    Home
                </a>
                <a class="nav-link font-label-uppercase text-label-uppercase pb-1 border-b-2 border-transparent hover:text-secondary transition-all duration-200 {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                    About Us
                </a>
                <a class="nav-link font-label-uppercase text-label-uppercase pb-1 border-b-2 border-transparent hover:text-secondary transition-all duration-200 {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">
                    Contact Us
                </a>
            </div>

            <div class="hidden md:block">
                <a href="{{ url('/agent/login') }}" class="bg-primary text-on-primary font-label-uppercase text-label-uppercase px-md py-sm rounded transition-opacity hover:opacity-80">
                    Agent Login
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden">
                <button onclick="toggleMobileMenu()" class="text-primary hover:text-secondary transition-colors focus:outline-none flex items-center justify-center p-2" aria-label="Toggle Menu">
                    <svg id="mobile-menu-icon" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-outline-variant/30 bg-surface px-md py-lg flex flex-col gap-md transition-all duration-300">
            <a class="{{ request()->is('/') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} font-label-uppercase text-label-uppercase py-xs" href="{{ url('/') }}">
                Home
            </a>
            <a class="{{ request()->is('about') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} font-label-uppercase text-label-uppercase py-xs" href="{{ url('/about') }}">
                About Us
            </a>
            <a class="{{ request()->is('contact') ? 'text-secondary font-bold' : 'text-on-surface-variant' }} font-label-uppercase text-label-uppercase py-xs" href="{{ url('/contact') }}">
                Contact Us
            </a>
            <a href="{{ url('/agent/login') }}" class="bg-primary text-on-primary font-label-uppercase text-label-uppercase w-full py-sm rounded mt-md hover:opacity-80 transition-opacity text-center block">
                Agent Login
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow animate-entrance {{ request()->is('/') ? '' : 'pt-[73px] md:pt-[81px]' }}">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-surface-container-lowest dark:bg-inverse-surface border-t border-outline-variant dark:border-outline full-width mt-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter px-md md:px-container-margin py-xl max-w-7xl mx-auto">
            <div class="md:col-span-4 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 text-headline-md-mobile font-headline-md-mobile font-bold text-primary dark:text-inverse-primary mb-md">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Prime Property Logo" class="h-9 w-auto object-contain">
                        <span>Prime Property</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs mb-lg">
                        Elevating the standard of luxury real estate through precision, exclusivity, and unwavering dedication.
                    </p>
                </div>
                <div class="font-body-sm text-body-sm text-on-surface-variant mt-auto">
                    © 2026 Prime Property | V 1.0
                </div>
            </div>
            <div class="md:col-span-8 flex flex-wrap gap-xl md:justify-end mt-xl md:mt-0">
                <div class="flex flex-col gap-sm">
                    <p class="font-label-uppercase text-label-uppercase text-primary mb-xs">Navigation</p>
                    <a class="{{ request()->is('/') ? 'text-primary underline font-bold' : 'text-on-surface-variant' }} font-body-sm text-body-sm hover:text-secondary transition-colors duration-200" href="{{ url('/') }}">Home</a>
                    <a class="{{ request()->is('about') ? 'text-primary underline font-bold' : 'text-on-surface-variant' }} font-body-sm text-body-sm hover:text-secondary transition-colors duration-200" href="{{ url('/about') }}">About Us</a>
                    <a class="{{ request()->is('contact') ? 'text-primary underline font-bold' : 'text-on-surface-variant' }} font-body-sm text-body-sm hover:text-secondary transition-colors duration-200" href="{{ url('/contact') }}">Contact Us</a>
                </div>
                <div class="flex flex-col gap-sm md:ml-xl">
                    <p class="font-label-uppercase text-label-uppercase text-primary mb-xs">Legal</p>
                    <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors duration-200" href="#">Privacy Policy</a>
                    <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-secondary transition-colors duration-200" href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('modals')

    <!-- Interactive Scripts -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('mobile-menu-icon');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
            } else {
                menu.classList.add('hidden');
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
            }
        }

        // Navbar scroll effect (Optimized with requestAnimationFrame)
        document.addEventListener('DOMContentLoaded', () => {
            const nav = document.getElementById('public-navbar');
            if (nav) {
                let lastScrollY = window.scrollY;
                let ticking = false;

                function updateNavbar() {
                    if (lastScrollY > 20) {
                        nav.classList.add('scrolled');
                    } else {
                        nav.classList.remove('scrolled');
                    }
                    ticking = false;
                }

                function handleScroll() {
                    lastScrollY = window.scrollY;
                    if (!ticking) {
                        window.requestAnimationFrame(updateNavbar);
                        ticking = true;
                    }
                }
                
                window.addEventListener('scroll', handleScroll, { passive: true });
                handleScroll();
            }
        });

        // Splash Intro Screen controller
        document.addEventListener('DOMContentLoaded', () => {
            const intro = document.getElementById('intro-screen');
            if (intro) {
                if (!sessionStorage.getItem('intro-shown')) {
                    sessionStorage.setItem('intro-shown', 'true');
                    setTimeout(() => {
                        intro.classList.add('opacity-0', 'pointer-events-none');
                        setTimeout(() => {
                            intro.remove();
                        }, 1000);
                    }, 2200); // Show splash for 2.2 seconds
                } else {
                    intro.remove();
                }
            }
        });
    </script>
</body>
</html>
