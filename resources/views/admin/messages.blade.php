<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pesan Masuk - Prime Portal</title>

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
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/properties') }}" wire:navigate>
                    <span class="material-symbols-outlined">home_work</span>
                    <span class="font-label-uppercase text-label-uppercase">Properti</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">mail</span>
                    <span class="font-label-uppercase text-label-uppercase flex items-center justify-between w-full">
                        <span>Pesan</span>
                        <span class="bg-[#C9A961] text-[#1A1A1A] text-[11px] font-bold px-2 py-0.5 rounded-full unread-badge hidden">0</span>
                    </span>
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

    <!-- SideNavBar (Desktop) -->
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
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/properties') }}" wire:navigate>
                    <span class="material-symbols-outlined">home_work</span>
                    <span class="font-label-uppercase text-label-uppercase">Properti</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">mail</span>
                    <span class="font-label-uppercase text-label-uppercase flex items-center justify-between w-full">
                        <span>Pesan</span>
                        <span class="bg-[#C9A961] text-[#1A1A1A] text-[11px] font-bold px-2 py-0.5 rounded-full unread-badge hidden">0</span>
                    </span>
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

    <!-- Scrollable Canvas -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative bg-[#F9F9F9]">
        <!-- TopNavBar -->
        <header class="bg-white flex justify-between items-center w-full px-container-margin py-md border-b border-outline-variant/50 shrink-0 z-10 relative">
            <div class="flex items-center space-x-sm">
                <button onclick="toggleMobileSidebar()" class="md:hidden flex items-center justify-center p-xs text-on-surface-variant hover:text-primary rounded-full hover:bg-surface-container-low transition-colors cursor-pointer" title="Buka Menu">
                    <span class="material-symbols-outlined text-[24px]">menu</span>
                </button>
                <div class="flex items-center gap-xs">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8 w-auto object-contain">
                    <div class="font-headline-md text-headline-md font-semibold text-primary md:block hidden">
                        Prime Portal Agen
                    </div>
                    <div class="font-title-sm text-title-sm font-semibold text-primary md:hidden block">
                        Prime Portal
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-xl">
                <!-- Real-time search bar -->
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant/70 text-[20px] group-focus-within:text-secondary-container transition-colors">search</span>
                    <input class="bg-surface-container-low border border-outline-variant/50 py-sm pl-xl pr-md text-body-sm font-body-sm rounded-full focus:ring-2 focus:ring-[#C9A961]/20 focus:border-[#C9A961] w-72 transition-all placeholder:text-on-surface-variant/70" id="search-input" placeholder="Cari pesan..." type="text"/>
                </div>

                <div class="flex space-x-md text-on-surface-variant">
                    <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">notifications</span></button>
                    <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">help_outline</span></button>
                </div>
                
                <!-- Agent profile & Dropdown (Unified Verified Hover Fix) -->
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

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto px-md md:px-container-margin py-xl space-y-xl">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-md mb-md">
                <div>
                    <h2 class="font-display-lg text-3xl sm:text-[40px] font-bold text-[#1A1A1A] tracking-tight leading-tight">Pesan Masuk</h2>
                    <p class="font-body-lg text-sm sm:text-body-lg text-on-surface-variant mt-xs">Kelola komunikasi dan pertanyaan dari klien potensial</p>
                </div>
                
                <!-- Filter Controls -->
                <div class="flex gap-sm w-full sm:w-auto">
                    <div class="relative w-full sm:w-auto">
                        <select class="appearance-none bg-white border border-outline-variant/50 text-[#1A1A1A] font-body-sm text-body-sm py-sm pl-md pr-xl rounded-lg hover:border-[#C9A961] focus:ring-2 focus:ring-[#C9A961]/20 focus:border-[#C9A961] transition-colors cursor-pointer" id="status-filter">
                            <option value="all">Semua Pesan</option>
                            <option value="unread">Belum Dibaca</option>
                            <option value="read">Sudah Dibaca</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-sm top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>

            <!-- Table Card Container -->
            <div class="bg-white rounded-2xl border border-outline-variant/30 overflow-hidden shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)]">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="messages-table">
                        <thead class="bg-[#F9FAFB] border-b border-outline-variant/30">
                            <tr>
                                <th class="w-16 py-md px-lg text-center font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold tracking-wider text-xs">Status</th>
                                <th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold tracking-wider text-xs">Pengirim</th>
                                <th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold tracking-wider text-xs">Email</th>
                                <th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold tracking-wider text-xs hidden lg:table-cell">Tanggal & Waktu</th>
                                <th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold tracking-wider text-xs text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="font-body-sm text-body-sm text-on-surface divide-y divide-outline-variant/20" id="messages-tbody">
                            <!-- Populated dynamically via JS -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination Stats -->
            <div class="flex justify-between items-center text-on-surface-variant font-body-sm text-body-sm mt-md" id="pagination-container">
                <span id="pagination-info">Menampilkan 0 dari 0 pesan</span>
            </div>
        </main>
    </div>

    <!-- Message Detail Side Drawer (Stitch Adaptive Drawer UI) -->
    <div id="drawer-backdrop" class="fixed inset-0 bg-primary/20 backdrop-blur-sm z-40 transition-opacity duration-300 hidden opacity-0" onclick="closeDetailDrawer()"></div>
    
    <aside id="detail-drawer" class="fixed inset-y-0 right-0 w-full sm:w-[550px] bg-white z-50 flex flex-col shadow-[-10px_0_30px_rgba(0,0,0,0.08)] transform translate-x-full transition-transform duration-300 ease-in-out border-l border-outline-variant/20">
        <!-- Header -->
        <header class="flex items-center justify-between p-lg border-b border-outline-variant/25 bg-white">
            <div>
                <h2 class="font-display-lg text-2xl font-bold text-primary" id="drawer-sender-name">-</h2>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-xs" id="drawer-msg-date">-</p>
            </div>
            <button onclick="closeDetailDrawer()" class="p-sm hover:bg-surface-container rounded-full transition-colors group">
                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors text-[24px]">close</span>
            </button>
        </header>

        <!-- Content Body -->
        <div class="flex-1 overflow-y-auto p-lg space-y-lg no-scrollbar">
            <!-- Contact Card Info -->
            <div class="grid grid-cols-1 gap-md">
                <!-- Email Row -->
                <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/20 flex items-center justify-between group transition-all hover:border-[#C9A961]/40">
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[#C9A961] text-[20px]">mail</span>
                        <div>
                            <p class="text-[10px] font-label-uppercase text-label-uppercase text-on-surface-variant tracking-wider font-semibold">Email</p>
                            <p class="font-body-sm font-semibold text-primary mt-xs" id="drawer-sender-email">-</p>
                        </div>
                    </div>
                    <button onclick="copyToClipboard('email')" aria-label="Copy Email" class="text-on-surface-variant hover:text-primary transition-colors p-xs hover:bg-surface-container rounded-md flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">content_copy</span>
                    </button>
                </div>
                <!-- Phone Row -->
                <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant/20 flex items-center justify-between group transition-all hover:border-[#C9A961]/40">
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[#25D366] text-[20px]">chat</span>
                        <div>
                            <p class="text-[10px] font-label-uppercase text-label-uppercase text-on-surface-variant tracking-wider font-semibold">WhatsApp / Telepon</p>
                            <p class="font-body-sm font-semibold text-primary mt-xs" id="drawer-sender-phone">-</p>
                        </div>
                    </div>
                    <a id="drawer-whatsapp-btn" href="#" target="_blank" aria-label="Open WhatsApp" class="text-on-surface-variant hover:text-[#25D366] transition-colors p-xs hover:bg-surface-container rounded-md flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                    </a>
                </div>
            </div>

            <!-- Message Block -->
            <div class="space-y-sm">
                <p class="text-[10px] font-label-uppercase text-label-uppercase text-on-surface-variant tracking-wider font-semibold">Pesan Lengkap</p>
                <div class="bg-[#F5F5F5] p-lg rounded-xl border border-outline-variant/10 text-on-surface font-body-sm leading-relaxed whitespace-pre-wrap select-text" id="drawer-message-body">
                    -
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <footer class="p-lg border-t border-outline-variant/25 bg-[#F9FAFB] flex flex-col sm:flex-row gap-sm justify-between items-center shrink-0">
            <button onclick="deleteCurrentMessage()" class="w-full sm:w-auto px-md py-sm rounded-lg border border-error/30 text-error hover:bg-error/5 transition-colors font-semibold text-body-sm flex items-center justify-center gap-xs">
                <span class="material-symbols-outlined text-[18px]">delete</span>
                Hapus Pesan
            </button>
            <div class="flex w-full sm:w-auto gap-sm justify-end">
                <button id="drawer-toggle-read-btn" onclick="toggleReadCurrentMessage()" class="w-full sm:w-auto px-md py-sm rounded-lg border border-outline-variant text-[#1A1A1A] hover:bg-surface-container transition-all text-body-sm font-medium">
                    Tandai Sudah Dibaca
                </button>
                <a id="drawer-reply-email-btn" href="#" class="w-full sm:w-auto px-lg py-sm rounded-lg bg-[#C9A961] text-[#1A1A1A] font-semibold text-body-sm hover:bg-[#C9A961]/90 transition-all flex items-center justify-center gap-xs">
                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">mail</span>
                    Balas via Email
                </a>
            </div>
        </footer>
    </aside>

    <!-- Logout Confirmation Modal -->
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

    <!-- Interactive JavaScript -->
    <script>
        let messages = @json(session('prime_portal_messages', []));
        let selectedMessageId = null;

        function initApp() {
            renderTable();
            updateUnreadBadges();

            // Set up search and filter listeners
            const searchInput = document.getElementById('search-input');
            const statusFilter = document.getElementById('status-filter');
            if (searchInput) {
                searchInput.removeEventListener('input', renderTable);
                searchInput.addEventListener('input', renderTable);
            }
            if (statusFilter) {
                statusFilter.removeEventListener('change', renderTable);
                statusFilter.addEventListener('change', renderTable);
            }
        }

        document.addEventListener('DOMContentLoaded', initApp);
        document.addEventListener('livewire:navigated', initApp);

        function renderTable() {
            const tbody = document.getElementById('messages-tbody');
            const searchVal = document.getElementById('search-input') ? document.getElementById('search-input').value.toLowerCase().trim() : '';
            const filterVal = document.getElementById('status-filter') ? document.getElementById('status-filter').value : 'all';

            // Filter data
            const filtered = messages.filter(msg => {
                // Text Search check
                const matchesSearch = 
                    msg.name.toLowerCase().includes(searchVal) ||
                    msg.email.toLowerCase().includes(searchVal) ||
                    msg.message.toLowerCase().includes(searchVal) ||
                    (msg.tags && msg.tags.some(tag => tag.toLowerCase().includes(searchVal)));

                // Filter Status check
                let matchesStatus = true;
                if (filterVal === 'unread') {
                    matchesStatus = !msg.is_read;
                } else if (filterVal === 'read') {
                    matchesStatus = msg.is_read;
                }

                return matchesSearch && matchesStatus;
            });

            // Empty State
            if (filtered.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="py-lg text-center text-on-surface-variant/70 bg-white italic">
                            Tidak ada pesan yang sesuai dengan filter atau pencarian Anda.
                        </td>
                    </tr>
                `;
                const pagInfo = document.getElementById('pagination-info');
                if (pagInfo) pagInfo.innerText = "Menampilkan 0 pesan";
                return;
            }

            // Populate rows
            let html = '';
            filtered.forEach(msg => {
                const badgeHtml = msg.is_read 
                    ? `<div class="w-2.5 h-2.5 rounded-full bg-transparent mx-auto"></div>` 
                    : `<div class="w-2.5 h-2.5 rounded-full bg-[#C9A961] mx-auto shadow-sm" title="Belum dibaca"></div>`;

                const rowBg = msg.is_read ? 'bg-white' : 'bg-[#C9A961]/5 hover:bg-[#C9A961]/10';

                html += `
                    <tr class="border-b border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer group ${rowBg}" onclick="openDetailDrawer(${msg.id})">
                        <td class="py-md px-lg align-middle text-center">${badgeHtml}</td>
                        <td class="py-md px-lg align-middle font-semibold text-primary capitalize">${msg.name}</td>
                        <td class="py-md px-lg align-middle text-on-surface-variant/80">${msg.email}</td>
                        <td class="py-md px-lg align-middle text-on-surface-variant/80 hidden lg:table-cell whitespace-nowrap">${msg.date}</td>
                        <td class="py-md px-lg align-middle text-center w-32">
                            <button onclick="event.stopPropagation(); openDetailDrawer(${msg.id});" class="px-md py-sm bg-[#C9A961] text-[#1A1A1A] hover:bg-[#C9A961]/90 rounded-lg text-[12px] font-semibold transition-all inline-flex items-center gap-xs">
                                Detail
                            </button>
                        </td>
                    </tr>
                `;
            });

            tbody.innerHTML = html;
            const pagInfo = document.getElementById('pagination-info');
            if (pagInfo) pagInfo.innerText = `Menampilkan ${filtered.length} dari ${messages.length} pesan`;
        }

        // Unread badge count helper
        function updateUnreadBadges() {
            const unreadCount = messages.filter(msg => !msg.is_read).length;
            const badges = document.querySelectorAll('.unread-badge');
            
            badges.forEach(badge => {
                if (unreadCount > 0) {
                    badge.innerText = unreadCount;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            });
        }

        // Open Side Drawer & Populate Data
        function openDetailDrawer(id) {
            const msg = messages.find(m => m.id === id);
            if (!msg) return;

            selectedMessageId = id;

            // Populate text
            document.getElementById('drawer-sender-name').innerText = msg.name;
            document.getElementById('drawer-msg-date').innerText = msg.date;
            document.getElementById('drawer-sender-email').innerText = msg.email;
            document.getElementById('drawer-sender-phone').innerText = msg.phone;
            document.getElementById('drawer-message-body').innerText = msg.message;

            // WhatsApp link
            const cleanPhone = msg.phone.replace(/[^0-9+]/g, '');
            document.getElementById('drawer-whatsapp-btn').href = `https://wa.me/${cleanPhone.replace('+', '')}`;

            // Reply email href
            document.getElementById('drawer-reply-email-btn').href = `mailto:${msg.email}?subject=Balasan: Tanya Properti Prime`;

            // Adjust "Mark as Read" action button dynamically
            const readBtn = document.getElementById('drawer-toggle-read-btn');
            if (msg.is_read) {
                readBtn.innerText = "Tandai Belum Dibaca";
            } else {
                readBtn.innerText = "Tandai Sudah Dibaca";
            }

            // Show Drawer with transitions
            const backdrop = document.getElementById('drawer-backdrop');
            const drawer = document.getElementById('detail-drawer');

            backdrop.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                drawer.classList.remove('translate-x-full');
                drawer.classList.add('translate-x-0');
            }, 50);
        }

        // Close Side Drawer
        function closeDetailDrawer() {
            const backdrop = document.getElementById('drawer-backdrop');
            const drawer = document.getElementById('detail-drawer');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('translate-x-full');

            setTimeout(() => {
                backdrop.classList.add('hidden');
                selectedMessageId = null;
            }, 300);
        }

        // Action: Toggle read/unread status
        function toggleReadCurrentMessage() {
            if (selectedMessageId === null) return;
            const msg = messages.find(m => m.id === selectedMessageId);
            if (!msg) return;

            fetch(`/admin/messages/${selectedMessageId}/toggle-read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    msg.is_read = !msg.is_read;
                    renderTable();
                    updateUnreadBadges();

                    showToast(
                        msg.is_read 
                            ? `Pesan dari ${msg.name} berhasil ditandai sebagai sudah dibaca.`
                            : `Pesan dari ${msg.name} berhasil ditandai sebagai belum dibaca.`,
                        'success'
                    );
                } else {
                    showToast('Gagal mengubah status baca pesan.', 'error');
                }
            })
            .catch(error => {
                console.error('Error toggling read status:', error);
                showToast('Terjadi kesalahan koneksi.', 'error');
            });

            closeDetailDrawer();
        }

        // Action: Delete Message
        function deleteCurrentMessage() {
            if (selectedMessageId === null) return;
            const msg = messages.find(m => m.id === selectedMessageId);
            if (!msg) return;

            fetch(`/admin/messages/${selectedMessageId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messages = messages.filter(m => m.id !== selectedMessageId);
                    renderTable();
                    updateUnreadBadges();

                    showToast(`Pesan dari ${msg.name} berhasil dihapus dari kotak masuk.`, 'success');
                } else {
                    showToast('Gagal menghapus pesan.', 'error');
                }
            })
            .catch(error => {
                console.error('Error deleting message:', error);
                showToast('Terjadi kesalahan koneksi.', 'error');
            });

            closeDetailDrawer();
        }

        // Copy Email helper
        function copyToClipboard(field) {
            if (selectedMessageId === null) return;
            const msg = messages.find(m => m.id === selectedMessageId);
            if (!msg) return;

            const text = msg.email;
            navigator.clipboard.writeText(text).then(() => {
                showToast(`Alamat email "${text}" berhasil disalin ke clipboard!`, 'success');
            }).catch(() => {
                showToast("Gagal menyalin email ke clipboard.", 'error');
            });
        }

        // Toast Notification implementation (reused from existing dashboard)
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
                <div class="flex-1 font-body-sm font-semibold pr-lg">${message}</div>
                <button class="material-symbols-outlined text-on-surface-variant hover:text-primary transition-colors text-[18px] absolute top-sm right-sm">close</button>
                <div class="absolute bottom-0 left-0 w-full h-1 bg-[#F5F5F5]">
                    <div class="h-full bg-gradient-to-r from-[#C9A961] to-[#ffdc8e] w-full transition-all duration-[4000ms] ease-linear"></div>
                </div>
            `;

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

        // Mobile Sidebar toggler
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

        // Logout Confirmation
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
    </script>
    @livewireScripts
</body>
</html>
