<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Prime Property - Luxury Real Estate')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}"/>
    
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

        /* Cinematic zoom effect for hero image */
        @keyframes zoomBackground {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }
        .animate-zoom-image {
            animation: zoomBackground 20s ease-in-out infinite;
        }

        /* Bouncing animation for scroll down indicator */
        @keyframes scrollBounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-8px); }
            60% { transform: translateY(-4px); }
        }
        .animate-scroll-bounce {
            animation: scrollBounce 2s infinite;
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
    <footer class="bg-[#111313] text-neutral-300 border-t border-neutral-800/80 full-width mt-auto relative overflow-hidden">
        <!-- Subtle gold accent line at the top of footer -->
        <div class="h-[2px] bg-gradient-to-r from-transparent via-[#C9A961]/70 to-transparent w-full"></div>
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-xl px-md md:px-container-margin py-xl max-w-7xl mx-auto">
            <!-- Brand & Info Column -->
            <div class="md:col-span-5 flex flex-col justify-between gap-md">
                <div>
                    <div class="flex items-center gap-2 text-headline-md-mobile font-headline-md-mobile font-bold text-white mb-md">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Prime Property Logo" class="h-9 w-auto object-contain">
                        <span class="tracking-tight">Prime <span class="text-[#C9A961]">Property</span></span>
                    </div>
                    <p class="font-body-sm text-body-sm text-neutral-400 max-w-sm mb-lg leading-relaxed">
                        Elevating the standard of luxury real estate through precision, exclusivity, and unwavering dedication. Discover your dream home in Jakarta's prime locations.
                    </p>
                    <!-- Social Media Links -->
                    <div class="flex items-center gap-4 mt-4">
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-neutral-800/50 hover:bg-[#C9A961] text-neutral-400 hover:text-[#111313] flex items-center justify-center transition-all duration-300 shadow-sm border border-neutral-700/30 hover:border-transparent" aria-label="Instagram">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="https://wa.me/62812345678" target="_blank" class="w-9 h-9 rounded-full bg-neutral-800/50 hover:bg-[#C9A961] text-neutral-400 hover:text-[#111313] flex items-center justify-center transition-all duration-300 shadow-sm border border-neutral-700/30 hover:border-transparent" aria-label="WhatsApp">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.262 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.73-1.45L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.528 2.016 14.056.99 11.433.99c-5.436 0-9.862 4.37-9.865 9.801 0 1.738.48 3.424 1.39 4.925L1.922 20.2l4.725-1.226zM17.5 15c-.29-.146-1.72-.848-1.986-.944-.266-.097-.46-.146-.653.146-.193.29-.748.944-.917 1.138-.17.193-.338.217-.628.072-2.316-1.16-3.83-2.062-5.326-4.628-.396-.68-.073-1.047.224-1.344.269-.267.599-.699.899-1.048.3-.349.4-.598.599-.997.2-.399.1-.749-.05-1.048-.15-.299-1.481-3.568-2.03-4.894-.534-1.288-1.077-1.114-1.482-1.136-.266-.014-.57-.014-.874-.014-.304 0-.799.114-1.218.571-.419.456-1.6 1.563-1.6 3.81s1.635 4.417 1.865 4.721c.23.304 3.218 4.914 7.796 6.89.858.369 1.606.608 2.155.782.86.273 1.64.235 2.259.143.69-.103 2.126-.869 2.425-1.71.3-.84.3-1.563.21-1.71-.09-.146-.337-.243-.627-.39z"/></svg>
                        </a>
                    </div>
                </div>
                <!-- Desktop Copyright -->
                <div class="font-body-sm text-[13px] text-neutral-500 hidden md:block">
                    © 2026 Prime Property. All rights reserved.
                </div>
            </div>
            
            <!-- Navigation Column -->
            <div class="md:col-span-3 flex flex-col gap-md">
                <h3 class="font-label-uppercase text-label-uppercase text-white tracking-widest border-b border-neutral-800 pb-sm font-semibold">
                    Navigation
                </h3>
                <ul class="flex flex-col gap-sm">
                    <li>
                        <a class="{{ request()->is('/') ? 'text-[#C9A961] font-bold' : 'text-neutral-400' }} font-body-sm text-body-sm hover:text-white transition-colors duration-200 flex items-center gap-xs" href="{{ url('/') }}">
                            <span class="material-symbols-outlined text-[14px]">chevron_right</span> Home
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('about') ? 'text-[#C9A961] font-bold' : 'text-neutral-400' }} font-body-sm text-body-sm hover:text-white transition-colors duration-200 flex items-center gap-xs" href="{{ url('/about') }}">
                            <span class="material-symbols-outlined text-[14px]">chevron_right</span> About Us
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('contact') ? 'text-[#C9A961] font-bold' : 'text-neutral-400' }} font-body-sm text-body-sm hover:text-white transition-colors duration-200 flex items-center gap-xs" href="{{ url('/contact') }}">
                            <span class="material-symbols-outlined text-[14px]">chevron_right</span> Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Office Column -->
            <div class="md:col-span-4 flex flex-col gap-md">
                <h3 class="font-label-uppercase text-label-uppercase text-white tracking-widest border-b border-neutral-800 pb-sm font-semibold">
                    Contact Office
                </h3>
                <div class="flex flex-col gap-md text-neutral-400 font-body-sm text-body-sm">
                    <div class="flex items-start gap-sm">
                        <span class="material-symbols-outlined text-[#C9A961] text-[18px] mt-0.5">location_on</span>
                        <span>Jl. Sudirman No. 123<br/>Jakarta, Indonesia</span>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[#C9A961] text-[18px]">call</span>
                        <a href="tel:+622155551234" class="hover:text-white transition-colors">+62 21 5555 1234</a>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[#C9A961] text-[18px]">mail</span>
                        <a href="mailto:info@primeproperty.co.id" class="hover:text-white transition-colors">info@primeproperty.co.id</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Copyright -->
        <div class="border-t border-neutral-800/60 mt-xl pt-lg pb-md px-md md:px-container-margin max-w-7xl mx-auto flex flex-col justify-between items-center gap-sm md:hidden text-center">
            <div class="font-body-sm text-[13px] text-neutral-500">
                © 2026 Prime Property. All rights reserved.
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
