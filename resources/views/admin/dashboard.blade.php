<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Prime Property - Dasbor Agen</title>
    
    <!-- Tailwind CSS with forms -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts & Custom Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    @livewireStyles

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

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        /* Hide scrollbar for clean premium aesthetic */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-surface-container-low text-on-surface font-body-sm flex h-screen overflow-hidden">

<!-- Mobile Sidebar Backdrop -->
<div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-primary/20 backdrop-blur-sm transition-opacity duration-300 z-40 hidden md:hidden" onclick="toggleMobileSidebar()"></div>

<!-- Mobile Drawer Sidebar -->
<aside id="mobile-sidebar" class="fixed top-0 bottom-0 left-0 w-64 bg-surface py-lg px-md z-50 border-r border-outline-variant transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col h-full shadow-2xl">
    <div class="mb-xl px-sm flex items-center justify-between">
        <div class="flex items-center gap-xs">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
            <div>
                <h1 class="text-lg font-bold text-primary leading-tight font-title-sm">Prime Portal</h1>
                <p class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Akses Eksklusif</p>
            </div>
        </div>
        <button onclick="toggleMobileSidebar()" class="p-xs text-on-surface-variant hover:text-primary rounded-full hover:bg-surface-container-low transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <div class="flex-1 space-y-md">
        <div class="space-y-sm">
            <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/properties') }}" wire:navigate>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_work</span>
                <span class="font-label-uppercase text-label-uppercase">Properti</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/logs') }}" wire:navigate>
                    <span class="material-symbols-outlined">history_edu</span>
                    <span class="font-label-uppercase text-label-uppercase">Log Audit</span>
                </a>
            @endif
        </div>
    </div>
</aside>

<!-- SideNavBar -->
<nav class="hidden md:flex bg-surface docked left-0 h-full w-64 border-r border-outline-variant flex-col py-lg px-md shrink-0">
    <div class="mb-xl px-sm flex items-center gap-xs">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-10 w-auto object-contain">
        <div>
            <h1 class="text-lg font-bold text-primary leading-tight font-title-sm">Prime Portal</h1>
            <p class="text-[10px] text-on-surface-variant tracking-wider uppercase font-semibold">Akses Eksklusif</p>
        </div>
    </div>
    <div class="flex-1 space-y-md">
        <div class="space-y-sm">
            <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/properties') }}" wire:navigate>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_work</span>
                <span class="font-label-uppercase text-label-uppercase">Properti</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/logs') }}" wire:navigate>
                    <span class="material-symbols-outlined">history_edu</span>
                    <span class="font-label-uppercase text-label-uppercase">Log Audit</span>
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- Main Content Area -->
<div class="flex-1 flex flex-col h-full overflow-hidden relative bg-[#F9F9F9]">
    <!-- TopNavBar -->
    <header class="bg-white flex justify-between items-center w-full px-container-margin py-md border-b border-outline-variant/50 shrink-0 z-10 relative">
        <div class="flex items-center space-x-sm">
            <button onclick="toggleMobileSidebar()" class="md:hidden flex items-center justify-center p-xs text-on-surface-variant hover:text-primary rounded-full hover:bg-surface-container-low transition-colors cursor-pointer" title="Open Menu">
                <span class="material-symbols-outlined text-[24px]">menu</span>
            </button>
            <div class="flex items-center gap-xs">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8 w-auto object-contain">
                <div class="font-headline-md text-headline-md font-semibold text-primary md:block hidden">
                    Prime Property Agen
                </div>
                <div class="font-title-sm text-title-sm font-semibold text-primary md:hidden block">
                    Prime Portal
                </div>
            </div>
        </div>
        
        <!-- Search bar -->
        <div class="flex items-center space-x-xl">
            <form action="{{ url('/admin/properties') }}" method="GET" class="relative group">
                <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant/70 text-[20px] group-hover:text-primary transition-colors">search</span>
                <input class="bg-surface-container-low border border-outline-variant/50 py-sm pl-xl pr-md text-body-sm font-body-sm rounded-full focus:ring-2 focus:ring-primary/20 focus:border-primary w-72 transition-all placeholder:text-on-surface-variant/70" name="search" placeholder="Cari properti..." type="text" value="{{ request('search') }}"/>
                
                <!-- Carry existing filters over in the search -->
                @foreach(request()->except(['search', 'page']) as $k => $v)
                    <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                @endforeach
            </form>
            <div class="flex space-x-md text-on-surface-variant">
                <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">notifications</span></button>
                <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">help_outline</span></button>
            </div>
            
            <!-- Agent profile & Dropdown -->
            <div class="relative group cursor-pointer border-l border-outline-variant/50 pl-xl flex items-center space-x-sm">
                <img alt="Foto Agen" class="w-10 h-10 rounded-full object-cover border border-outline-variant/50 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBKdO_nqLjkeR4IOPNSwJ_md1_4AiuIwugwHDDq2BucpefYguUm_hhKZph32rbhjrZ-ltMnmCU-8qQrg1gC-dI2ICQ0kiVKGu7wwzpi1Fn8_ld9MSSwhVU7M7rA7yfGlxtoShIIXytJ92dmw6QeaPCRaXuQBCts80hOeF92bX3fhoq4y_5eEJPH86cJUXKd2iAe6Nr7uiZsnMbiq2_iL2abk3ik9ex1c58YyuMDOOEQLPZrOdreaWpzK-y4WFMpqeLEgfs1I7ecY0"/>
                <span class="material-symbols-outlined text-on-surface-variant text-[20px] transition-transform duration-200 group-hover:rotate-180">arrow_drop_down</span>
                <div class="absolute right-0 top-full pt-2 w-72 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50">
                    <div class="bg-white border border-outline-variant/50 rounded-xl shadow-lg py-sm">
                        <div class="px-md py-sm border-b border-outline-variant/30">
                            <p class="font-body-sm font-semibold text-primary truncate" title="{{ session('admin_user.email') }}">{{ session('admin_user.email') }}</p>
                            <p class="text-[11px] text-on-surface-variant capitalize">{{ session('admin_user.role') }}</p>
                        </div>
                        <a class="block px-md py-sm font-body-sm text-body-sm text-error hover:bg-error-container/50 transition-colors cursor-pointer" onclick="showLogoutModal()">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Scrollable Canvas -->
    <main class="flex-1 overflow-y-auto px-md md:px-container-margin py-xl space-y-xl">
        
        <!-- Page Header & Actions -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-md mb-md">
            <div>
                <h2 class="font-display-lg text-3xl sm:text-[40px] font-bold text-[#1A1A1A] tracking-tight leading-tight">Inventaris Properti</h2>
                <p class="font-body-lg text-sm sm:text-body-lg text-on-surface-variant mt-xs">Kelola dan filter listing aktif</p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-md w-full sm:w-auto">
                @if(session('admin_user.role') === 'superadmin')
                    <a href="{{ url('/admin/properties/archive') }}" class="w-full sm:w-auto border border-[#C9A961] text-[#C9A961] hover:bg-[#C9A961]/10 font-body-lg text-body-lg px-xl py-md rounded-lg transition-all shadow-sm flex items-center justify-center space-x-sm font-semibold">
                        <span class="material-symbols-outlined text-[20px]">archive</span>
                        <span>Lihat Arsip</span>
                    </a>
                @endif
                @if(session('admin_user.role') !== 'admin')
                    <button class="w-full sm:w-auto bg-[#C9A961] text-[#1A1A1A] hover:text-white font-body-lg text-body-lg px-xl py-md rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm flex items-center justify-center space-x-sm font-semibold" onclick="openCreatePropertyModal()">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        <span>Tambah Properti</span>
                    </button>
                @endif
            </div>
        </div>

        <!-- Advanced Filters -->
        <div class="bg-white border border-outline-variant/30 rounded-2xl p-lg shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)]">
            <form action="{{ url('/admin/properties') }}" method="GET" id="filter-form">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <!-- Row 1: Dropdown selects + numeric inputs -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-md mb-md">
 
                    <!-- Kawasan -->
                    <div class="flex flex-col space-y-xs">
                        <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Kawasan</label>
                        <select class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 pl-sm pr-8 focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm cursor-pointer" name="kawasan" onchange="this.form.submit()">
                            <option value="Semua Kawasan" {{ request('kawasan') == 'Semua Kawasan' ? 'selected' : '' }}>Semua Kawasan</option>
                            <option value="Jakarta Selatan" {{ request('kawasan') == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                            <option value="Menteng" {{ request('kawasan') == 'Menteng' ? 'selected' : '' }}>Menteng</option>
                            <option value="Jakarta Pusat" {{ request('kawasan') == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                        </select>
                    </div>
 
                    <!-- Hadap -->
                    <div class="flex flex-col space-y-xs">
                        <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Hadap</label>
                        <select class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 pl-sm pr-8 focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm cursor-pointer" name="hadap" onchange="this.form.submit()">
                            <option value="Semua Arah" {{ request('hadap') == 'Semua Arah' ? 'selected' : '' }}>Semua Arah</option>
                            <option value="Utara" {{ request('hadap') == 'Utara' ? 'selected' : '' }}>Utara</option>
                            <option value="Selatan" {{ request('hadap') == 'Selatan' ? 'selected' : '' }}>Selatan</option>
                            <option value="Timur" {{ request('hadap') == 'Timur' ? 'selected' : '' }}>Timur</option>
                            <option value="Barat" {{ request('hadap') == 'Barat' ? 'selected' : '' }}>Barat</option>
                        </select>
                    </div>
 
                    <!-- Siap -->
                    <div class="flex flex-col space-y-xs">
                        <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Kondisi</label>
                        <select class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 pl-sm pr-8 focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm cursor-pointer" name="siap" onchange="this.form.submit()">
                            <option value="Semua Kondisi" {{ request('siap') == 'Semua Kondisi' ? 'selected' : '' }}>Semua Kondisi</option>
                            <option value="siap_huni" {{ request('siap') == 'siap_huni' ? 'selected' : '' }}>Siap Huni</option>
                            <option value="siap_kosong" {{ request('siap') == 'siap_kosong' ? 'selected' : '' }}>Siap Kosong</option>
                            <option value="siap_huni_renovasi" {{ request('siap') == 'siap_huni_renovasi' ? 'selected' : '' }}>Siap Huni Renovasi</option>
                        </select>
                    </div>

                    <!-- Lebar Min -->
                    <div class="flex flex-col space-y-xs">
                        <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Lebar Min (m)</label>
                        <input class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="0" type="number" name="lebar_min" value="{{ request('lebar_min') }}" onchange="this.form.submit()"/>
                    </div>

                    <!-- Harga Max -->
                    <div class="flex flex-col space-y-xs">
                        <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Harga Max (Rp)</label>
                        <input class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="Tanpa Batas" type="number" name="harga_max" value="{{ request('harga_max') }}" onchange="this.form.submit()"/>
                    </div>
                </div>

                <!-- Row 2: Radio filters + Carport toggle + Reset -->
                <div class="flex flex-wrap items-center gap-md border-t border-outline-variant/20 pt-md">

                    <!-- Tipe radios -->
                    <div class="flex items-center gap-xs">
                        <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider whitespace-nowrap">Tipe:</span>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="tipe" type="radio" value="Semua" {{ request('tipe', 'Semua') == 'Semua' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Semua</span>
                        </label>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="tipe" type="radio" value="Villa" {{ request('tipe') == 'Villa' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Villa</span>
                        </label>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="tipe" type="radio" value="Ruko" {{ request('tipe') == 'Ruko' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Ruko</span>
                        </label>
                    </div>

                    <div class="w-px h-5 bg-outline-variant/40 hidden sm:block"></div>

                    <!-- Status radios -->
                    <div class="flex items-center gap-xs">
                        <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider whitespace-nowrap">Status:</span>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="status" type="radio" value="All" {{ request('status', 'All') == 'All' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Semua</span>
                        </label>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="status" type="radio" value="in stock" {{ request('status') == 'in stock' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Aktif</span>
                        </label>
                        <label class="flex items-center gap-xs cursor-pointer">
                            <input class="text-primary focus:ring-primary border-outline-variant" name="status" type="radio" value="sold_out" {{ request('status') == 'sold_out' ? 'checked' : '' }} onchange="this.form.submit()"/>
                            <span class="font-body-sm text-body-sm">Terjual</span>
                        </label>
                    </div>

                    <div class="w-px h-5 bg-outline-variant/40 hidden sm:block"></div>

                    <!-- Carport toggle -->
                    <div class="flex items-center gap-sm">
                        <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider whitespace-nowrap">Carport</span>
                        <input type="hidden" name="carport" id="carport-val" value="{{ request('carport') }}">
                        <button type="button" onclick="toggleCarport()" class="w-11 h-6 rounded-full relative transition-colors focus:outline-none shadow-inner {{ request('carport') == 'true' ? 'bg-[#34C759]' : 'bg-outline-variant/60' }}" id="carport-btn">
                            <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all {{ request('carport') == 'true' ? 'right-1' : 'left-1' }}" id="carport-dot"></span>
                        </button>
                    </div>

                    <div class="w-px h-5 bg-outline-variant/40 hidden sm:block"></div>

                    <!-- Per Page Limit Selector -->
                    <div class="flex items-center gap-sm">
                        <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider whitespace-nowrap">Tampilkan:</span>
                        <select name="per_page" onchange="this.form.submit()" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-9 pl-sm pr-8 focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm cursor-pointer">
                            <option value="25" {{ request('per_page', 50) == 25 ? 'selected' : '' }}>25 Baris</option>
                            <option value="50" {{ request('per_page', 50) == 50 ? 'selected' : '' }}>50 Baris</option>
                            <option value="100" {{ request('per_page', 50) == 100 ? 'selected' : '' }}>100 Baris</option>
                        </select>
                    </div>

                    <!-- Reset button (pushed to the right) -->
                    <a href="{{ url('/admin/properties') }}" class="ml-auto flex items-center gap-xs text-on-surface-variant hover:text-primary font-body-sm text-body-sm font-medium px-md h-9 transition-colors rounded-lg hover:bg-surface-container-low border border-outline-variant/40">
                        <span class="material-symbols-outlined text-[16px]">refresh</span>
                        Reset Filter
                    </a>
                </div>
            </form>

            <!-- Active Filter Chips -->
            @php
                $activeFilters = array_filter(request()->only(['kawasan', 'hadap', 'siap', 'lebar_min', 'harga_max', 'tipe', 'status', 'carport']), function($v, $k) {
                    if ($k == 'kawasan' && $v == 'Semua Kawasan') return false;
                    if ($k == 'hadap' && $v == 'Semua Arah') return false;
                    if ($k == 'siap' && $v == 'Semua Kondisi') return false;
                    if ($k == 'tipe' && $v == 'Semua') return false;
                    if ($k == 'status' && $v == 'All') return false;
                    return !empty($v);
                }, ARRAY_FILTER_USE_BOTH);
            @endphp

            @if(count($activeFilters) > 0)
                <div class="mt-lg pt-md border-t border-outline-variant/30 flex flex-wrap gap-sm items-center">
                    <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider mr-sm">Aktif:</span>
                    @foreach($activeFilters as $key => $val)
                        <div class="bg-surface-container-low px-md py-xs rounded-full flex items-center space-x-sm text-body-sm font-body-sm border border-outline-variant/50 shadow-sm">
                            <span class="capitalize">{{ str_replace('_', ' ', $key) }}: {{ str_replace('_', ' ', $val) }}</span>
                            <a href="{{ request()->fullUrlWithQuery([$key => null]) }}" class="material-symbols-outlined text-[16px] cursor-pointer hover:text-error transition-colors">close</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Data Table -->
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="border-b border-outline-variant/30 bg-[#F9FAFB] text-on-surface-variant font-label-uppercase text-label-uppercase tracking-wider">
                            <th class="py-md px-lg font-semibold text-xs">Nama</th>
                            <th class="py-md px-lg font-semibold text-xs">Group</th>
                            <th class="py-md px-lg font-semibold text-xs">L x P</th>
                            <th class="py-md px-lg font-semibold text-xs">Hadap</th>
                            <th class="py-md px-lg font-semibold text-xs">Tipe</th>
                            <th class="py-md px-lg font-semibold text-xs text-right">Tingkat</th>
                            <th class="py-md px-lg font-semibold text-xs text-right">Harga (Rp)</th>
                            <th class="py-md px-lg font-semibold text-xs text-center">Carport</th>
                            <th class="py-md px-lg font-semibold text-xs">Status</th>
                            <th class="py-md px-lg font-semibold text-xs">Siap</th>
                            <th class="py-md px-lg font-semibold text-xs">Kawasan</th>
                        </tr>
                    </thead>
                    <tbody class="font-body-sm text-body-sm text-on-surface">
                        @forelse($properties as $index => $property)
                            <tr class="hover:bg-surface-container-lowest/50 transition-colors group cursor-pointer border-b border-outline-variant/20 {{ $index % 2 == 0 ? 'bg-white' : 'bg-[#F9FAFB]/50' }}" onclick="openPropertyDetail({{ $property->id }})">
                                <td class="py-md px-lg font-medium text-[#1A1A1A]">{{ $property->nama_property }}</td>
                                <td class="py-md px-lg text-on-surface-variant">{{ $property->group_name ?? '-' }}</td>
                                <td class="py-md px-lg text-on-surface-variant">{{ round($property->lebar) }} x {{ round($property->panjang) }}</td>
                                <td class="py-md px-lg text-on-surface-variant">{{ $property->hadap }}</td>
                                <td class="py-md px-lg text-on-surface-variant">{{ $property->tipe }}</td>
                                <td class="py-md px-lg text-right text-on-surface-variant">{{ round($property->tingkat) }}</td>
                                <td class="py-md px-lg text-right font-medium text-[#1A1A1A]">
                                    {{ number_format($property->price, 0, ',', '.') }}
                                </td>
                                <td class="py-md px-lg text-center">
                                    @if($property->carport)
                                        <span class="material-symbols-outlined text-[18px] text-[#1A1A1A]">check</span>
                                    @else
                                        <span class="material-symbols-outlined text-[18px] text-outline-variant">close</span>
                                    @endif
                                </td>
                                <td class="py-md px-lg">
                                    @if($property->status == 'in stock')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-[#D1FAE5] text-[#065F46] border border-[#A7F3D0]">Tersedia</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-[#FEE2E2] text-[#991B1B] border border-[#FECACA]">Terjual</span>
                                    @endif
                                </td>
                                <td class="py-md px-lg">
                                    @if($property->siap == 'siap_huni')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-[#FEF3C7] text-[#92400E] border border-[#FDE68A]">Siap Huni</span>
                                    @elseif($property->siap == 'siap_kosong')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-[#E0E7FF] text-[#3730A3] border border-[#C7D2FE]">Siap Kosong</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-surface-container-low text-on-surface-variant border border-outline-variant/50">Renovasi</span>
                                    @endif
                                </td>
                                <td class="py-md px-lg text-on-surface-variant">
                                    {{ is_array($property->kawasan) ? implode(', ', $property->kawasan) : $property->kawasan }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="py-lg text-center text-on-surface-variant bg-white">
                                    Tidak ada data properti yang sesuai dengan filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-lg py-md border-t border-outline-variant/30 bg-white flex justify-between items-center">
                <span class="font-body-sm text-sm text-on-surface-variant">
                    Menampilkan {{ $properties->firstItem() ?? 0 }}-{{ $properties->lastItem() ?? 0 }} dari {{ $properties->total() }} properti
                </span>
                <div>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>

        <div class="h-xl"></div>
    </main>
</div>

<!-- ========================================== -->
<!-- Dynamic Side Drawer Panel (Property Detail) -->
<!-- ========================================== -->
<div id="detail-drawer" class="fixed inset-0 z-50 flex justify-end hidden" role="dialog" aria-modal="true">
    <!-- Backdrop overlay -->
    <div class="fixed inset-0 bg-primary/20 backdrop-blur-sm transition-opacity duration-300" onclick="closePropertyDrawer()"></div>
    
    <!-- Drawer Panel container -->
    <div class="pointer-events-auto w-full max-w-lg bg-surface-container-lowest border-l border-outline-variant shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out z-10" id="drawer-panel">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-lg py-md border-b border-surface-variant bg-surface-container-lowest sticky top-0 z-10">
            <h2 class="font-headline-md-mobile text-headline-md-mobile text-on-surface font-semibold">Detail Properti</h2>
            <div class="flex items-center gap-sm">
                @if(session('admin_user.role') !== 'admin')
                    <button class="flex items-center gap-xs px-sm py-xs text-secondary hover:bg-surface-container-low transition-colors rounded-DEFAULT font-semibold" onclick="triggerEditFromDrawer()">
                        <span class="material-symbols-outlined text-[18px]">edit</span>
                        <span class="font-label-uppercase text-label-uppercase">Edit</span>
                    </button>
                    <button class="flex items-center gap-xs px-sm py-xs text-error hover:bg-error-container/30 transition-colors rounded-DEFAULT font-semibold" onclick="triggerDeleteFromDrawer()">
                        <span class="material-symbols-outlined text-[18px]">delete</span>
                        <span class="font-label-uppercase text-label-uppercase">Hapus</span>
                    </button>
                @endif
                <div class="w-px h-6 bg-outline-variant mx-xs"></div>
                <button class="p-xs text-on-surface-variant hover:text-on-surface transition-colors" onclick="closePropertyDrawer()">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
        </div>

        <!-- Scrollable content drawer -->
        <div class="flex-1 overflow-y-auto no-scrollbar" id="drawer-content">
            <!-- Loading state spinner -->
            <div class="flex flex-col items-center justify-center h-full gap-md text-on-surface-variant" id="drawer-loader">
                <span class="material-symbols-outlined animate-spin text-[32px]">sync</span>
                <span>Mengambil data properti...</span>
            </div>

            <!-- Real loaded details panel -->
            <div class="hidden flex flex-col" id="drawer-real-content">

                <!-- Text metadata -->
                <div class="p-lg flex flex-col gap-xl">
                    <div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-xs font-bold" id="detail-title"></h3>
                        <p class="font-body-lg text-body-lg text-on-surface-variant flex items-center gap-xs mb-md">
                            <span class="material-symbols-outlined text-[20px]">location_on</span>
                            <span id="detail-location-str"></span>
                        </p>
                        <div class="text-secondary font-display-lg-mobile text-display-lg-mobile font-bold" id="detail-price-str"></div>
                    </div>

                    <!-- 2-Column fields list -->
                    <div class="grid grid-cols-2 gap-x-gutter gap-y-md border-t border-outline-variant pt-lg">
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Nama Properti</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-nama"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Kawasan</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-kawasan"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Harga</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-price"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Dimensi (L x P)</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-dimensions"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Tipe</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-tipe"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Hadap</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-hadap"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Jumlah Lantai (Tingkat)</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-tingkat"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Carport</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-carport"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Status</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium flex items-center gap-xs" id="field-status"></span>
                        </div>
                        <div class="flex flex-col gap-xs border-b border-surface-variant pb-sm">
                            <span class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold">Kondisi Siap</span>
                            <span class="font-body-lg text-body-lg text-on-surface font-medium" id="field-siap"></span>
                        </div>
                    </div>

                    <!-- Internal Note -->
                    <div class="pt-sm">
                        <h4 class="font-label-uppercase text-label-uppercase text-on-surface-variant mb-sm font-bold">Catatan Internal Agen</h4>
                        <p class="font-body-sm text-body-sm text-on-surface-variant bg-surface-container-low p-md rounded-DEFAULT border border-outline-variant/30" id="detail-notes">
                            Kunci cadangan berada di lockbox satpam utama cluster. Lakukan verifikasi identitas prospek pembeli sebelum menjadwalkan kunjungan properti.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action footer button -->
        <div class="p-lg border-t border-surface-variant bg-surface-container-lowest sticky bottom-0" id="drawer-footer">
            <a id="detail-maps-btn" href="" target="_blank" class="w-full flex items-center justify-center gap-sm bg-primary text-on-primary py-md px-lg rounded-DEFAULT hover:bg-primary/90 transition-colors font-bold">
                <span class="font-label-uppercase text-label-uppercase tracking-widest">Buka di Google Maps</span>
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
            </a>
        </div>
    </div>
</div>

<script>
    // Carport Toggle Interaction
    function toggleCarport() {
        const input = document.getElementById('carport-val');
        const btn = document.getElementById('carport-btn');
        const dot = document.getElementById('carport-dot');
        
        if (input.value === 'true') {
            input.value = '';
        } else if (input.value === '') {
            input.value = 'true';
        }
        
        document.getElementById('filter-form').submit();
    }

    // Dynamic drawer implementation
    function openPropertyDetail(id) {
        const drawer = document.getElementById('detail-drawer');
        const panel = document.getElementById('drawer-panel');
        const loader = document.getElementById('drawer-loader');
        const content = document.getElementById('drawer-real-content');
        
        // Show drawer overlay and trigger slide-in transition
        drawer.classList.remove('hidden');
        setTimeout(() => {
            panel.classList.remove('translate-x-full');
            panel.classList.add('translate-x-0');
        }, 50);

        loader.classList.remove('hidden');
        content.classList.add('hidden');

        // Fetch detailed property model attributes via JSON
        fetch(`{{ url('/admin/properties') }}/${id}`)
            .then(res => res.json())
            .then(data => {
                // Populate details dynamically
                document.getElementById('detail-title').textContent = data.nama_property;
                document.getElementById('detail-location-str').textContent = (Array.isArray(data.kawasan) ? data.kawasan.join(', ') : data.kawasan);
                document.getElementById('detail-price-str').textContent = data.formatted_price;

                document.getElementById('field-nama').textContent = data.nama_property;
                document.getElementById('field-kawasan').textContent = (Array.isArray(data.kawasan) ? data.kawasan.join(', ') : data.kawasan);
                document.getElementById('field-price').textContent = data.formatted_price;
                document.getElementById('field-dimensions').textContent = data.dimensions;
                document.getElementById('field-tipe').textContent = data.tipe;
                document.getElementById('field-hadap').textContent = data.hadap;
                document.getElementById('field-tingkat').textContent = Math.round(data.tingkat);
                document.getElementById('field-carport').textContent = data.carport ? 'Ada Carport' : 'Tidak Ada';
                
                // Status badge
                const statusSpan = document.getElementById('field-status');
                if (data.status === 'in stock') {
                    statusSpan.innerHTML = '<span class="w-2 h-2 rounded-full bg-[#4CAF50] block"></span> Tersedia';
                } else {
                    statusSpan.innerHTML = '<span class="w-2 h-2 rounded-full bg-[#B33A3A] block"></span> Terjual';
                }

                // Move-in readiness
                const siapStr = data.siap === 'siap_huni' ? 'Siap Huni' : (data.siap === 'siap_kosong' ? 'Siap Kosong' : 'Siap Huni Renovasi');
                document.getElementById('field-siap').textContent = siapStr;

                // Maps button URL
                document.getElementById('detail-maps-btn').href = data.maps_link || 'https://maps.google.com';

                // Store loaded property globally
                window.currentLoadedProperty = data;

                loader.classList.add('hidden');
                content.classList.remove('hidden');
            });
    }

    function closePropertyDrawer() {
        const drawer = document.getElementById('detail-drawer');
        const panel = document.getElementById('drawer-panel');
        
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        
        setTimeout(() => {
            drawer.classList.add('hidden');
        }, 300);
    }

    // Restricted access warning modal toggles
    function showRestrictedModal() {
        const modal = document.getElementById('restricted-modal');
        const card = document.getElementById('modal-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeRestrictedModal() {
        const modal = document.getElementById('restricted-modal');
        const card = document.getElementById('modal-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

<!-- ========================================== -->
<!-- Access Restricted Warning Popup Dialog    -->
<!-- ========================================== -->
<div id="restricted-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10" id="modal-card">
        <div class="w-14 h-14 bg-[#B33A3A]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#B33A3A] text-[32px]" style="font-variation-settings: 'FILL' 1;">warning</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Akses Terbatas</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed">
                Hanya Superadmin yang memiliki otoritas untuk menambah, mengubah, atau menghapus data properti. Silakan hubungi administrator sistem untuk bantuan lebih lanjut.
            </p>
        </div>
        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="closeRestrictedModal()" class="w-full bg-[#C9A961] text-[#1A1A1A] font-bold py-md px-xl rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm">
                Mengerti
            </button>
            <button onclick="closeRestrictedModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm transition-colors py-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- Create Property Modal (Large Modal)        -->
<!-- ========================================== -->
<div id="create-property-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="create-property-card" class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full p-xl flex flex-col space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10 max-h-[90vh] overflow-y-auto no-scrollbar">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-md border-b border-outline-variant/30">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Tambah Properti Baru</h3>
            <button onclick="closeCreatePropertyModal()" class="p-xs text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Form body -->
        <form id="create-property-form" onsubmit="submitCreateProperty(event, true)" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-lg text-left pt-md">
            @csrf
            
            <!-- Nama -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Nama Properti <span class="text-error font-bold ml-1">*</span></label>
                <input type="text" name="nama_property" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="create-error-nama_property" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Group -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">
                    Nama Group <span class="text-on-surface-variant/50 font-normal normal-case text-[10px] ml-1">(Opsional)</span>
                </label>
                <input type="text" name="group_name" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm">
                <div id="create-error-group_name" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Lebar -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Lebar Min (m) <span class="text-error font-bold ml-1">*</span></label>
                <input type="number" name="lebar" step="0.01" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="create-error-lebar" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Panjang -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Panjang (m) <span class="text-error font-bold ml-1">*</span></label>
                <input type="number" name="panjang" step="0.01" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="create-error-panjang" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Hadap checkboxes -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Hadap Arah <span class="text-error font-bold ml-1">*</span></label>
                <div class="grid grid-cols-2 gap-sm bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 items-center">
                    @foreach(['Utara', 'Selatan', 'Timur', 'Barat'] as $dir)
                        <label class="flex items-center space-x-xs cursor-pointer">
                            <input type="checkbox" id="create-hadap-{{ $dir }}" class="text-primary focus:ring-primary border-outline-variant rounded" value="{{ $dir }}">
                            <span class="font-body-sm text-body-sm">{{ $dir }}</span>
                        </label>
                    @endforeach
                </div>
                <div id="create-error-hadap" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Tipe radios -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Tipe Properti <span class="text-error font-bold ml-1">*</span></label>
                <div class="flex space-x-xl bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 h-10 items-center pl-md">
                    <label class="flex items-center space-x-xs cursor-pointer">
                        <input type="radio" name="tipe" class="text-primary focus:ring-primary border-outline-variant" value="Villa" checked>
                        <span class="font-body-sm text-body-sm">Villa</span>
                    </label>
                    <label class="flex items-center space-x-xs cursor-pointer">
                        <input type="radio" name="tipe" class="text-primary focus:ring-primary border-outline-variant" value="Ruko">
                        <span class="font-body-sm text-body-sm">Ruko</span>
                    </label>
                </div>
                <div id="create-error-tipe" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Tingkat -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Tingkat Lantai <span class="text-error font-bold ml-1">*</span></label>
                <input type="number" name="tingkat" step="0.5" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="create-error-tingkat" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Harga -->
            <div class="flex flex-col space-y-xs">
                <div class="flex justify-between items-center">
                    <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Harga Jual (Rp) <span class="text-error font-bold ml-1">*</span></label>
                    <span class="text-[11px] text-secondary font-bold" id="create-price-helper">Rp 0</span>
                </div>
                <input type="number" name="price" id="create-price" oninput="updatePriceHelper('create', this.value)" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="create-error-price" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Carport toggle switch -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Carport</label>
                <div class="flex items-center justify-between bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 h-10 px-md">
                    <span class="text-body-sm text-on-surface-variant font-medium">Memiliki Carport?</span>
                    <input type="hidden" name="carport" id="create-carport-input" value="0">
                    <button type="button" onclick="toggleFormCarport('create')" class="w-11 h-6 bg-outline-variant/60 rounded-full relative transition-colors focus:outline-none shadow-inner" id="create-carport-btn">
                        <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all left-1" id="create-carport-dot"></span>
                    </button>
                </div>
                <div id="create-error-carport" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Status -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Status Properti <span class="text-error font-bold ml-1">*</span></label>
                <select name="status" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                    <option value="in stock">In Stock (Aktif Jual)</option>
                    <option value="sold_out">Sold Out (Terjual)</option>
                </select>
                <div id="create-error-status" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Siap -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Kondisi Kesiapan <span class="text-error font-bold ml-1">*</span></label>
                <select name="siap" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                    <option value="siap_huni">Siap Huni</option>
                    <option value="siap_kosong">Siap Kosong</option>
                    <option value="siap_huni_renovasi">Renovasi</option>
                </select>
                <div id="create-error-siap" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Unit code -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">
                    Kode Unit <span class="text-on-surface-variant/50 font-normal normal-case text-[10px] ml-1">(Opsional)</span>
                </label>
                <input type="text" name="unit" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="Contoh: A3">
                <div id="create-error-unit" class="text-error text-[11px] hidden mt-xs"></div>
            </div>


            <!-- Maps Link -->
            <div class="flex flex-col space-y-xs col-span-2">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">
                    Tautan Google Maps <span class="text-on-surface-variant/50 font-normal normal-case text-[10px] ml-1">(Opsional)</span>
                </label>
                <input type="url" name="maps_link" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="https://maps.google.com/?q=...">
                <div id="create-error-maps_link" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Kawasan tags input -->
            <div class="flex flex-col space-y-xs col-span-2">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Kawasan Lokasi (Ketik tag lalu tekan Enter atau Koma) <span class="text-error font-bold ml-1">*</span></label>
                <div class="flex flex-wrap gap-xs items-center bg-surface-container-low border border-outline-variant/50 p-sm rounded-lg min-h-12">
                    <div id="create-tags-container" class="flex flex-wrap gap-xs"></div>
                    <input type="text" id="create-tag-input" placeholder="Tambah kawasan..." class="flex-1 bg-transparent border-none focus:ring-0 p-0 text-body-sm h-6" onkeydown="handleTagInput(event, 'create')">
                </div>
                <div id="create-error-kawasan" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex justify-end gap-md pt-lg border-t border-outline-variant/30 col-span-2 mt-md">
                <button type="button" onclick="closeCreatePropertyModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm px-lg h-10 transition-colors rounded-lg hover:bg-surface-container-low border border-transparent">
                    Batal
                </button>
                <button type="button" onclick="submitCreateProperty(event, false)" class="bg-white border border-[#C9A961] text-[#C9A961] hover:bg-[#C9A961]/10 font-bold py-md px-xl rounded-lg transition-all shadow-sm">
                    Simpan & Tambah Lagi
                </button>
                <button type="submit" class="bg-[#C9A961] text-[#1A1A1A] hover:text-white font-bold py-md px-xl rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================== -->
<!-- Edit Property Modal (Large Modal)          -->
<!-- ========================================== -->
<div id="edit-property-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="edit-property-card" class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full p-xl flex flex-col space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10 max-h-[90vh] overflow-y-auto no-scrollbar">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-md border-b border-outline-variant/30">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Edit Data Properti</h3>
            <button onclick="closeEditPropertyModal()" class="p-xs text-on-surface-variant hover:text-primary transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Form body -->
        <form id="edit-property-form" onsubmit="submitEditProperty(event)" class="grid grid-cols-1 md:grid-cols-2 gap-lg text-left pt-md">
            @csrf
            <input type="hidden" id="edit-property-id" name="id">
            
            <!-- Nama -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Nama Properti <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-nama_property">•</span>
                </label>
                <input type="text" name="nama_property" id="edit-nama_property" oninput="checkDirtyField('edit', 'nama_property')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="edit-error-nama_property" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Group -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Nama Group <span class="text-on-surface-variant/50 font-normal normal-case text-[10px] ml-1">(Opsional)</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-group_name">•</span>
                </label>
                <input type="text" name="group_name" id="edit-group_name" oninput="checkDirtyField('edit', 'group_name')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm">
                <div id="edit-error-group_name" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Lebar -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Lebar Min (m) <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-lebar">•</span>
                </label>
                <input type="number" name="lebar" id="edit-lebar" step="0.01" oninput="checkDirtyField('edit', 'lebar')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="edit-error-lebar" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Panjang -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Panjang (m) <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-panjang">•</span>
                </label>
                <input type="number" name="panjang" id="edit-panjang" step="0.01" oninput="checkDirtyField('edit', 'panjang')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="edit-error-panjang" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Hadap checkboxes -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Hadap Arah <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-hadap">•</span>
                </label>
                <div class="grid grid-cols-2 gap-sm bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 items-center">
                    @foreach(['Utara', 'Selatan', 'Timur', 'Barat'] as $dir)
                        <label class="flex items-center space-x-xs cursor-pointer">
                            <input type="checkbox" id="edit-hadap-{{ $dir }}" onchange="checkDirtyField('edit', 'hadap')" class="text-primary focus:ring-primary border-outline-variant rounded" value="{{ $dir }}">
                            <span class="font-body-sm text-body-sm">{{ $dir }}</span>
                        </label>
                    @endforeach
                </div>
                <div id="edit-error-hadap" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Tipe radios -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Tipe Properti <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-tipe">•</span>
                </label>
                <div class="flex space-x-xl bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 h-10 items-center pl-md">
                    <label class="flex items-center space-x-xs cursor-pointer">
                        <input type="radio" name="tipe" id="edit-tipe-villa" onchange="checkDirtyField('edit', 'tipe')" class="text-primary focus:ring-primary border-outline-variant" value="Villa">
                        <span class="font-body-sm text-body-sm">Villa</span>
                    </label>
                    <label class="flex items-center space-x-xs cursor-pointer">
                        <input type="radio" name="tipe" id="edit-tipe-ruko" onchange="checkDirtyField('edit', 'tipe')" class="text-primary focus:ring-primary border-outline-variant" value="Ruko">
                        <span class="font-body-sm text-body-sm">Ruko</span>
                    </label>
                </div>
                <div id="edit-error-tipe" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Tingkat -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Tingkat Lantai <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-tingkat">•</span>
                </label>
                <input type="number" name="tingkat" id="edit-tingkat" step="0.5" oninput="checkDirtyField('edit', 'tingkat')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="edit-error-tingkat" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Harga -->
            <div class="flex flex-col space-y-xs">
                <div class="flex justify-between items-center">
                    <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                        Harga Jual (Rp) <span class="text-error font-bold ml-1">*</span>
                        <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-price">•</span>
                    </label>
                    <span class="text-[11px] text-secondary font-bold" id="edit-price-helper">Rp 0</span>
                </div>
                <input type="number" name="price" id="edit-price" oninput="updatePriceHelper('edit', this.value)" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                <div id="edit-error-price" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Carport toggle switch -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Carport
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-carport">•</span>
                </label>
                <div class="flex items-center justify-between bg-surface-container-low p-sm rounded-lg border border-outline-variant/50 h-10 px-md">
                    <span class="text-body-sm text-on-surface-variant font-medium">Memiliki Carport?</span>
                    <input type="hidden" name="carport" id="edit-carport-input" value="0">
                    <button type="button" onclick="toggleFormCarport('edit')" class="w-11 h-6 bg-outline-variant/60 rounded-full relative transition-colors focus:outline-none shadow-inner" id="edit-carport-btn">
                        <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all left-1" id="edit-carport-dot"></span>
                    </button>
                </div>
                <div id="edit-error-carport" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Status -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Status Properti <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-status">•</span>
                </label>
                <select name="status" id="edit-status" onchange="checkDirtyField('edit', 'status')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                    <option value="in stock">In Stock (Aktif Jual)</option>
                    <option value="sold_out">Sold Out (Terjual)</option>
                </select>
                <div id="edit-error-status" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Siap -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Kondisi Kesiapan <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-siap">•</span>
                </label>
                <select name="siap" id="edit-siap" onchange="checkDirtyField('edit', 'siap')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                    <option value="siap_huni">Siap Huni</option>
                    <option value="siap_kosong">Siap Kosong</option>
                    <option value="siap_huni_renovasi">Renovasi</option>
                </select>
                <div id="edit-error-siap" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Unit code -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Kode Unit
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-unit">•</span>
                </label>
                <input type="text" name="unit" id="edit-unit" oninput="checkDirtyField('edit', 'unit')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="Contoh: A3">
                <div id="edit-error-unit" class="text-error text-[11px] hidden mt-xs"></div>
            </div>


            <!-- Maps Link -->
            <div class="flex flex-col space-y-xs col-span-2">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Tautan Google Maps <span class="text-on-surface-variant/50 font-normal normal-case text-[10px] ml-1">(Opsional)</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-maps_link">•</span>
                </label>
                <input type="url" name="maps_link" id="edit-maps_link" oninput="checkDirtyField('edit', 'maps_link')" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="https://maps.google.com/?q=...">
                <div id="edit-error-maps_link" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Kawasan tags input -->
            <div class="flex flex-col space-y-xs col-span-2">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold flex items-center">
                    Kawasan Lokasi (Ketik tag lalu tekan Enter atau Koma) <span class="text-error font-bold ml-1">*</span>
                    <span class="text-[#C9A961] ml-1.5 hidden font-bold text-[14px]" id="edit-dirty-kawasan">•</span>
                </label>
                <div class="flex flex-wrap gap-xs items-center bg-surface-container-low border border-outline-variant/50 p-sm rounded-lg min-h-12">
                    <div id="edit-tags-container" class="flex flex-wrap gap-xs"></div>
                    <input type="text" id="edit-tag-input" placeholder="Tambah kawasan..." class="flex-1 bg-transparent border-none focus:ring-0 p-0 text-body-sm h-6" onkeydown="handleTagInput(event, 'edit')">
                </div>
                <div id="edit-error-kawasan" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex justify-end gap-md pt-lg border-t border-outline-variant/30 col-span-2 mt-md">
                <button type="button" onclick="closeEditPropertyModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm px-lg h-10 transition-colors rounded-lg hover:bg-surface-container-low border border-transparent">
                    Batal
                </button>
                <button type="submit" class="bg-[#C9A961] text-[#1A1A1A] hover:text-white font-bold py-md px-xl rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================== -->
<!-- Property Delete Confirmation Modal         -->
<!-- ========================================== -->
<div id="delete-property-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="delete-property-card" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10">
        <div class="w-14 h-14 bg-[#B33A3A]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#B33A3A] text-[32px]" style="font-variation-settings: 'FILL' 1;">delete_forever</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Hapus Properti?</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed">
                Yakin hapus properti <span class="font-bold text-primary" id="delete-property-name-span"></span>? Tindakan ini tidak dapat dibatalkan.
            </p>
        </div>
        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="confirmDeleteProperty()" class="w-full bg-[#B33A3A] text-white font-bold py-md px-xl rounded-lg hover:bg-[#B33A3A]/90 transition-all shadow-sm">
                Hapus
            </button>
            <button onclick="closeDeleteModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm transition-colors py-sm">
                Batal
            </button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- Access Restricted Warning Popup Dialog    -->
<!-- ========================================== -->
<div id="restricted-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10" id="modal-card">
        <div class="w-14 h-14 bg-[#B33A3A]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#B33A3A] text-[32px]" style="font-variation-settings: 'FILL' 1;">warning</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Akses Terbatas</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed">
                Hanya Superadmin yang memiliki otoritas untuk menambah, mengubah, atau menghapus data properti. Silakan hubungi administrator sistem untuk bantuan lebih lanjut.
            </p>
        </div>
        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="closeRestrictedModal()" class="w-full bg-[#C9A961] text-[#1A1A1A] font-bold py-md px-xl rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm">
                Mengerti
            </button>
            <button onclick="closeRestrictedModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm transition-colors py-sm">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    // Global loaded property
    window.currentLoadedProperty = null;

    // Tags management
    window.createKawasanTags = [];
    window.editKawasanTags = [];

    // Edit initial data for dirty check
    let editFormInitialData = {};

    // Modal toggles
    function openCreatePropertyModal() {
        const modal = document.getElementById('create-property-modal');
        const card = document.getElementById('create-property-card');
        
        document.getElementById('create-property-form').reset();
        window.createKawasanTags = [];
        renderKawasanTags('create');
        clearValidationErrors('create');
        updatePriceHelper('create', 0);

        // Reset image preview
        const previewContainer = document.getElementById('create-preview-container');
        const previewImg = document.getElementById('create-preview-img');
        if (previewContainer) {
            previewContainer.classList.add('hidden');
        }
        if (previewImg) {
            previewImg.src = '';
        }

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeCreatePropertyModal() {
        const modal = document.getElementById('create-property-modal');
        const card = document.getElementById('create-property-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function triggerEditFromDrawer() {
        if (window.currentLoadedProperty) {
            closePropertyDrawer();
            setTimeout(() => {
                openEditPropertyModal(window.currentLoadedProperty);
            }, 300);
        }
    }

    function openEditPropertyModal(data) {
        editFormInitialData = Object.assign({}, data);
        
        const modal = document.getElementById('edit-property-modal');
        const card = document.getElementById('edit-property-card');
        
        document.getElementById('edit-property-id').value = data.id;
        document.getElementById('edit-nama_property').value = data.nama_property;
        document.getElementById('edit-group_name').value = data.group_name;
        document.getElementById('edit-lebar').value = Math.round(data.lebar);
        document.getElementById('edit-panjang').value = Math.round(data.panjang);
        document.getElementById('edit-tingkat').value = Math.round(data.tingkat);
        document.getElementById('edit-price').value = data.price;
        document.getElementById('edit-maps_link').value = data.maps_link;
        document.getElementById('edit-unit').value = data.unit || '';
        
        updatePriceHelper('edit', data.price);

        const hadapArr = (data.hadap || '').split(',').map(s => s.trim());
        ['Utara', 'Selatan', 'Timur', 'Barat'].forEach(dir => {
            document.getElementById(`edit-hadap-${dir}`).checked = hadapArr.includes(dir);
        });

        document.getElementById('edit-tipe-villa').checked = data.tipe === 'Villa';
        document.getElementById('edit-tipe-ruko').checked = data.tipe === 'Ruko';

        const carportVal = !!data.carport;
        const carportBtn = document.getElementById('edit-carport-btn');
        const carportDot = document.getElementById('edit-carport-dot');
        const carportInput = document.getElementById('edit-carport-input');
        
        carportInput.value = carportVal ? '1' : '0';
        if (carportVal) {
            carportBtn.classList.remove('bg-outline-variant/60');
            carportBtn.classList.add('bg-[#34C759]');
            carportDot.classList.remove('left-1');
            carportDot.classList.add('right-1');
        } else {
            carportBtn.classList.remove('bg-[#34C759]');
            carportBtn.classList.add('bg-outline-variant/60');
            carportDot.classList.remove('right-1');
            carportDot.classList.add('left-1');
        }

        document.getElementById('edit-status').value = data.status;
        document.getElementById('edit-siap').value = data.siap;

        window.editKawasanTags = Array.isArray(data.kawasan) ? [...data.kawasan] : [];
        renderKawasanTags('edit');

        document.getElementById('edit-image').value = '';

        // Prepopulate existing photo preview if available
        const previewContainer = document.getElementById('edit-preview-container');
        const previewImg = document.getElementById('edit-preview-img');
        if (previewContainer && previewImg) {
            if (data.image) {
                previewImg.src = '{{ asset("storage") }}/' + data.image;
                previewContainer.classList.remove('hidden');
            } else {
                previewImg.src = '';
                previewContainer.classList.add('hidden');
            }
        }

        clearDirtyIndicators('edit');
        clearValidationErrors('edit');

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeEditPropertyModal() {
        const modal = document.getElementById('edit-property-modal');
        const card = document.getElementById('edit-property-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }


    // Carport toggles
    function toggleFormCarport(prefix) {
        const input = document.getElementById(`${prefix}-carport-input`);
        const btn = document.getElementById(`${prefix}-carport-btn`);
        const dot = document.getElementById(`${prefix}-carport-dot`);
        
        if (input.value === '1') {
            input.value = '0';
            btn.classList.remove('bg-[#34C759]');
            btn.classList.add('bg-outline-variant/60');
            dot.classList.remove('right-1');
            dot.classList.add('left-1');
        } else {
            input.value = '1';
            btn.classList.remove('bg-outline-variant/60');
            btn.classList.add('bg-[#34C759]');
            dot.classList.remove('left-1');
            dot.classList.add('right-1');
        }
        
        checkDirtyField(prefix, 'carport');
    }

    // Price formatting helpers
    function updatePriceHelper(prefix, value) {
        const label = document.getElementById(`${prefix}-price-helper`);
        if (!value || isNaN(value)) {
            label.textContent = 'Rp 0';
            return;
        }
        label.textContent = 'Rp ' + Number(value).toLocaleString('id-ID');
        checkDirtyField(prefix, 'price');
    }

    // Kawasan tags renderer
    function renderKawasanTags(prefix) {
        const container = document.getElementById(`${prefix}-tags-container`);
        const tags = prefix === 'create' ? window.createKawasanTags : window.editKawasanTags;
        
        container.innerHTML = '';
        tags.forEach((tag, idx) => {
            const chip = document.createElement('div');
            chip.className = 'bg-[#C9A961]/15 text-[#1A1A1A] px-2 py-0.5 rounded-full flex items-center space-x-xs text-xs font-semibold border border-[#C9A961]/35';
            chip.innerHTML = `
                <span>${tag}</span>
                <span class="material-symbols-outlined text-[14px] cursor-pointer hover:text-error transition-colors font-bold ml-1" onclick="removeTag('${prefix}', ${idx})">close</span>
            `;
            container.appendChild(chip);
        });
        
        checkDirtyField(prefix, 'kawasan');
    }

    function handleTagInput(event, prefix) {
        if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            const input = document.getElementById(`${prefix}-tag-input`);
            const value = input.value.trim().replace(',', '');
            if (value) {
                const tags = prefix === 'create' ? window.createKawasanTags : window.editKawasanTags;
                if (!tags.includes(value)) {
                    tags.push(value);
                    renderKawasanTags(prefix);
                }
            }
            input.value = '';
        }
    }

    function removeTag(prefix, idx) {
        const tags = prefix === 'create' ? window.createKawasanTags : window.editKawasanTags;
        tags.splice(idx, 1);
        renderKawasanTags(prefix);
    }

    // Validation & dirty state indicators
    function checkDirtyField(prefix, fieldName) {
        if (prefix === 'create') return;
        
        const bullet = document.getElementById(`edit-dirty-${fieldName}`);
        if (!bullet) return;
        
        let isDirty = false;
        const initial = editFormInitialData;
        
        if (fieldName === 'nama_property') {
            isDirty = document.getElementById('edit-nama_property').value !== initial.nama_property;
        } else if (fieldName === 'group_name') {
            isDirty = document.getElementById('edit-group_name').value !== initial.group_name;
        } else if (fieldName === 'lebar') {
            isDirty = Number(document.getElementById('edit-lebar').value) !== Math.round(initial.lebar);
        } else if (fieldName === 'panjang') {
            isDirty = Number(document.getElementById('edit-panjang').value) !== Math.round(initial.panjang);
        } else if (fieldName === 'tingkat') {
            isDirty = Number(document.getElementById('edit-tingkat').value) !== Math.round(initial.tingkat);
        } else if (fieldName === 'price') {
            isDirty = Number(document.getElementById('edit-price').value) !== initial.price;
        } else if (fieldName === 'unit') {
            isDirty = document.getElementById('edit-unit').value !== (initial.unit || '');
        } else if (fieldName === 'maps_link') {
            isDirty = document.getElementById('edit-maps_link').value !== initial.maps_link;
        } else if (fieldName === 'status') {
            isDirty = document.getElementById('edit-status').value !== initial.status;
        } else if (fieldName === 'siap') {
            isDirty = document.getElementById('edit-siap').value !== initial.siap;
        } else if (fieldName === 'tipe') {
            const isVillaChecked = document.getElementById('edit-tipe-villa').checked;
            isDirty = (isVillaChecked ? 'Villa' : 'Ruko') !== initial.tipe;
        } else if (fieldName === 'carport') {
            isDirty = (document.getElementById('edit-carport-input').value === '1') !== !!initial.carport;
        } else if (fieldName === 'hadap') {
            const currentHadap = ['Utara', 'Selatan', 'Timur', 'Barat']
                .filter(dir => document.getElementById(`edit-hadap-${dir}`).checked)
                .join(', ');
            isDirty = currentHadap !== initial.hadap;
        } else if (fieldName === 'kawasan') {
            const initialKawasan = Array.isArray(initial.kawasan) ? initial.kawasan.join(', ') : '';
            const currentKawasan = window.editKawasanTags.join(', ');
            isDirty = currentKawasan !== initialKawasan;
        }
        
        if (isDirty) {
            bullet.classList.remove('hidden');
        } else {
            bullet.classList.add('hidden');
        }
    }

    // Restricted access warning modal toggles
    function showRestrictedModal() {
        const modal = document.getElementById('restricted-modal');
        const card = document.getElementById('modal-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeRestrictedModal() {
        const modal = document.getElementById('restricted-modal');
        const card = document.getElementById('modal-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function clearDirtyIndicators(prefix) {
        if (prefix === 'create') return;
        const bullets = document.querySelectorAll(`[id^="edit-dirty-"]`);
        bullets.forEach(b => b.classList.add('hidden'));
    }

    function clearValidationErrors(prefix) {
        const errorDivs = document.querySelectorAll(`[id^="${prefix}-error-"]`);
        errorDivs.forEach(div => {
            div.textContent = '';
            div.classList.add('hidden');
        });
    }

    function showValidationErrors(prefix, errors) {
        clearValidationErrors(prefix);
        for (const [field, messages] of Object.entries(errors)) {
            const errorDiv = document.getElementById(`${prefix}-error-${field}`);
            if (errorDiv) {
                errorDiv.textContent = messages[0];
                errorDiv.classList.remove('hidden');
            }
        }
    }

    // CRUD AJAX handlers
    function submitCreateProperty(event, closeAfter) {
        if (event) event.preventDefault();
        
        // Auto-add any untriggered text in the tag input
        const tagInput = document.getElementById('create-tag-input');
        if (tagInput && tagInput.value.trim()) {
            const val = tagInput.value.trim().replace(',', '');
            if (val && !window.createKawasanTags.includes(val)) {
                window.createKawasanTags.push(val);
                renderKawasanTags('create');
            }
            tagInput.value = '';
        }

        const form = document.getElementById('create-property-form');
        const formData = new FormData(form);
        
        formData.delete('kawasan[]');
        window.createKawasanTags.forEach(tag => {
            formData.append('kawasan[]', tag);
        });

        formData.delete('hadap[]');
        ['Utara', 'Selatan', 'Timur', 'Barat'].forEach(dir => {
            if (document.getElementById(`create-hadap-${dir}`).checked) {
                formData.append('hadap[]', dir);
            }
        });

        fetch('{{ url("/admin/properties") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (res.status === 422) {
                return res.json().then(data => {
                    showValidationErrors('create', data.errors);
                    throw new Error('Validation failed');
                });
            }
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                if (closeAfter) {
                    sessionStorage.setItem('success_toast', 'Properti berhasil ditambahkan!');
                    closeCreatePropertyModal();
                    window.location.reload();
                } else {
                    form.reset();
                    window.createKawasanTags = [];
                    renderKawasanTags('create');
                    clearValidationErrors('create');
                    updatePriceHelper('create', 0);
                    // Reset image preview
                    document.getElementById('create-preview-container').classList.add('hidden');
                    document.getElementById('create-preview-img').src = '';
                    showToast('Properti berhasil ditambahkan! Silakan tambahkan properti berikutnya.', 'success');
                }
            }
        })
        .catch(err => {
            if (err.message !== 'Validation failed') {
                alert('Terjadi kesalahan saat menyimpan properti.');
            }
        });
    }

    function submitEditProperty(event) {
        event.preventDefault();

        // Auto-add any untriggered text in the tag input
        const tagInput = document.getElementById('edit-tag-input');
        if (tagInput && tagInput.value.trim()) {
            const val = tagInput.value.trim().replace(',', '');
            if (val && !window.editKawasanTags.includes(val)) {
                window.editKawasanTags.push(val);
                renderKawasanTags('edit');
            }
            tagInput.value = '';
        }

        const form = document.getElementById('edit-property-form');
        const id = document.getElementById('edit-property-id').value;
        const formData = new FormData(form);
        
        formData.append('_method', 'PUT');

        formData.delete('kawasan[]');
        window.editKawasanTags.forEach(tag => {
            formData.append('kawasan[]', tag);
        });

        formData.delete('hadap[]');
        ['Utara', 'Selatan', 'Timur', 'Barat'].forEach(dir => {
            if (document.getElementById(`edit-hadap-${dir}`).checked) {
                formData.append('hadap[]', dir);
            }
        });

        fetch(`{{ url("/admin/properties") }}/${id}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => {
            if (res.status === 422) {
                return res.json().then(data => {
                    showValidationErrors('edit', data.errors);
                    throw new Error('Validation failed');
                });
            }
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                sessionStorage.setItem('success_toast', 'Properti berhasil diperbarui!');
                closeEditPropertyModal();
                window.location.reload();
            }
        })
        .catch(err => {
            if (err.message !== 'Validation failed') {
                alert('Terjadi kesalahan saat memperbarui properti.');
            }
        });
    }

    // Delete flow
    let deletePropertyId = null;
    function triggerDeleteFromDrawer() {
        if (window.currentLoadedProperty) {
            closePropertyDrawer();
            setTimeout(() => {
                openDeleteModal(window.currentLoadedProperty.id, window.currentLoadedProperty.nama_property);
            }, 300);
        }
    }

    function openDeleteModal(id, name) {
        deletePropertyId = id;
        document.getElementById('delete-property-name-span').textContent = name;
        
        const modal = document.getElementById('delete-property-modal');
        const card = document.getElementById('delete-property-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-property-modal');
        const card = document.getElementById('delete-property-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmDeleteProperty() {
        if (!deletePropertyId) return;

        fetch(`{{ url("/admin/properties") }}/${deletePropertyId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                sessionStorage.setItem('success_toast', 'Properti berhasil dihapus!');
                closeDeleteModal();
                window.location.reload();
            }
        })
        .catch(err => {
            alert('Terjadi kesalahan saat menghapus properti.');
        });
    }

    // Logout modal triggers
    function showLogoutModal() {
        const modal = document.getElementById('logout-modal');
        const card = document.getElementById('logout-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeLogoutModal() {
        const modal = document.getElementById('logout-modal');
        const card = document.getElementById('logout-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmLogout() {
        document.getElementById('logout-form').submit();
    }

    // Toggle Mobile Sidebar
    function toggleMobileSidebar() {
        const backdrop = document.getElementById('mobile-sidebar-backdrop');
        const drawer = document.getElementById('mobile-sidebar');
        
        if (drawer.classList.contains('-translate-x-full')) {
            backdrop.classList.remove('hidden');
            drawer.classList.remove('-translate-x-full');
            drawer.classList.add('translate-x-0');
        } else {
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('-translate-x-full');
            setTimeout(() => {
                backdrop.classList.add('hidden');
            }, 300);
        }
    }
</script>

<!-- ========================================== -->
<!-- Logout Confirmation Modal                 -->
<!-- ========================================== -->
<div id="logout-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="logout-card" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10">
        <div class="w-14 h-14 bg-[#B33A3A]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#B33A3A] text-[32px]">logout</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Keluar dari Portal</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed">
                Yakin ingin keluar dari portal Prime Property? Anda harus memasukkan kredensial lagi untuk mengakses dashboard.
            </p>
        </div>
        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="confirmLogout()" class="w-full bg-[#B33A3A] text-white font-bold py-md px-xl rounded-lg hover:bg-[#B33A3A]/90 transition-all shadow-sm">
                Ya, Keluar
            </button>
            <button onclick="closeLogoutModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm transition-colors py-sm">
                Batal
            </button>
        </div>
    </div>
</div>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
    @csrf
</form>

<!-- Toast Notification Container -->
<div id="toast-container" class="fixed top-md right-md z-[200] flex flex-col gap-sm pointer-events-none max-w-sm w-full"></div>

<script>
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = 'bg-white text-[#1A1A1A] border-l-4 border-[#C9A961] p-md rounded-xl shadow-2xl flex items-center gap-sm transform translate-x-12 opacity-0 transition-all duration-300 pointer-events-auto cursor-pointer relative overflow-hidden';
        
        let iconHtml = '<span class="material-symbols-outlined text-[#C9A961] text-[24px]">check_circle</span>';
        if (type === 'error') {
            toast.className = 'bg-white text-[#1A1A1A] border-l-4 border-error p-md rounded-xl shadow-2xl flex items-center gap-sm transform translate-x-12 opacity-0 transition-all duration-300 pointer-events-auto cursor-pointer relative overflow-hidden';
            iconHtml = '<span class="material-symbols-outlined text-error text-[24px]">error</span>';
        }

        toast.innerHTML = `
            ${iconHtml}
            <div class="flex-1 font-body-sm font-semibold pr-md text-[13px]">${message}</div>
            <button class="text-on-surface-variant/60 hover:text-[#1A1A1A] transition-colors p-xs flex items-center justify-center">
                <span class="material-symbols-outlined text-[16px]">close</span>
            </button>
            <div class="absolute bottom-0 left-0 h-1 bg-[#C9A961]/20 w-full">
                <div class="h-full bg-[#C9A961] transition-all linear" style="width: 100%; transition-duration: 4000ms;"></div>
            </div>
        `;
        
        if (type === 'error') {
            toast.querySelector('.absolute.bottom-0.left-0 .h-full').className = 'h-full bg-error transition-all linear';
        }

        toast.querySelector('button').addEventListener('click', (e) => {
            e.stopPropagation();
            toast.classList.add('opacity-0', 'translate-x-12');
            setTimeout(() => toast.remove(), 300);
        });

        toast.addEventListener('click', () => {
            toast.classList.add('opacity-0', 'translate-x-12');
            setTimeout(() => toast.remove(), 300);
        });

        container.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('opacity-0', 'translate-x-12');
            toast.querySelector('.absolute.bottom-0.left-0 .h-full').style.width = '0%';
        }, 50);

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-x-12');
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const savedToast = sessionStorage.getItem('success_toast');
        if (savedToast) {
            showToast(savedToast, 'success');
            sessionStorage.removeItem('success_toast');
        }
    });
</script>
@livewireScripts
</body>
</html>
