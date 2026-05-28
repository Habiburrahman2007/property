<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Prime Property - Manajemen Akun Admin</title>
    
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
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">manage_accounts</span>
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
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/properties') }}" wire:navigate>
                <span class="material-symbols-outlined">home_work</span>
                <span class="font-label-uppercase text-label-uppercase">Properti</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}" wire:navigate>
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">manage_accounts</span>
                <span class="font-label-uppercase text-label-uppercase">Admin</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/logs') }}" wire:navigate>
                <span class="material-symbols-outlined">history_edu</span>
                <span class="font-label-uppercase text-label-uppercase">Log Audit</span>
            </a>
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
                    Portal Administrasi Superadmin
                </div>
                <div class="font-title-sm text-title-sm font-semibold text-primary md:hidden block">
                    Prime Portal
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-xl">
            <div class="flex space-x-md text-on-surface-variant">
                <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">notifications</span></button>
                <button class="p-sm hover:bg-surface-container-low hover:text-primary rounded-full transition-colors"><span class="material-symbols-outlined text-[20px]">help_outline</span></button>
            </div>
            
            <div class="relative group cursor-pointer border-l border-outline-variant/50 pl-xl flex items-center space-x-sm">
                <img alt="Superadmin Headshot" class="w-10 h-10 rounded-full object-cover border border-outline-variant/50 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBKdO_nqLjkeR4IOPNSwJ_md1_4AiuIwugwHDDq2BucpefYguUm_hhKZph32rbhjrZ-ltMnmCU-8qQrg1gC-dI2ICQ0kiVKGu7wwzpi1Fn8_ld9MSSwhVU7M7rA7yfGlxtoShIIXytJ92dmw6QeaPCRaXuQBCts80hOeF92bX3fhoq4y_5eEJPH86cJUXKd2iAe6Nr7uiZsnMbiq2_iL2abk3ik9ex1c58YyuMDOOEQLPZrOdreaWpzK-y4WFMpqeLEgfs1I7ecY0"/>
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
                <h2 class="font-display-lg text-3xl sm:text-[40px] font-bold text-[#1A1A1A] tracking-tight leading-tight">Akun Admin</h2>
                <p class="font-body-lg text-sm sm:text-body-lg text-on-surface-variant mt-xs">Kelola hak akses dan kredensial sistem</p>
            </div>
            <button class="w-full sm:w-auto bg-[#C9A961] text-[#1A1A1A] hover:text-white font-body-lg text-body-lg px-xl py-md rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm flex items-center justify-center space-x-sm font-semibold" onclick="openCreateUserDrawer()">
                <span class="material-symbols-outlined text-[20px]">person_add</span>
                <span>Buat Admin</span>
            </button>
        </div>

        <!-- Data Table Card -->
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[900px]">
                    <thead>
                        <tr class="border-b border-outline-variant/30 bg-[#F9FAFB] text-on-surface-variant font-label-uppercase text-label-uppercase tracking-wider">
                            <th class="py-md px-lg font-semibold text-xs">Email / Nama</th>
                            <th class="py-md px-lg font-semibold text-xs">Peran</th>
                            <th class="py-md px-lg font-semibold text-xs">Status</th>
                            <th class="py-md px-lg font-semibold text-xs">Aktivitas Login Terakhir</th>
                            <th class="py-md px-lg font-semibold text-xs text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="font-body-sm text-body-sm text-on-surface" id="users-table-body">
                        @foreach($users as $user)
                            <tr class="border-b border-outline-variant/20 hover:bg-surface-container-lowest/50 transition-colors {{ !$user->is_active ? 'opacity-60 bg-gray-50/50' : 'bg-white' }}" id="user-row-{{ $user->id }}">
                                <td class="py-md px-lg font-medium text-[#1A1A1A]">
                                    <div class="flex items-center space-x-md">
                                        <div class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center font-bold text-[#1A1A1A] capitalize text-sm">
                                            {{ substr($user->email, 0, 2) }}
                                        </div>
                                        <div>
                                            <span class="font-semibold block">{{ $user->email }}</span>
                                            <span class="text-[11px] text-on-surface-variant block">ID Account: #{{ $user->id }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-md px-lg">
                                    @if($user->role === 'superadmin')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#C9A961]/15 text-[#8A7139] border border-[#C9A961]/35">
                                            Superadmin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-surface-container text-on-surface-variant border border-outline-variant/50">
                                            Admin
                                        </span>
                                    @endif
                                </td>
                                <td class="py-md px-lg" id="user-status-cell-{{ $user->id }}">
                                    @if($user->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-[#F3F4F6] text-[#374151] border border-[#E5E7EB]" id="badge-active-{{ $user->id }}">Aktif</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-outline-variant/40 text-on-surface-variant border border-outline-variant/50" id="badge-disabled-{{ $user->id }}">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="py-md px-lg text-on-surface-variant">
                                    {{ $user->last_login_at ? $user->last_login_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB' : 'Belum ada aktivitas login' }}
                                </td>
                                <td class="py-md px-lg text-center">
                                    <div class="flex items-center justify-center space-x-lg">
                                        <!-- Active Status Toggle -->
                                        <div class="flex items-center space-x-xs">
                                            <span class="text-[11px] font-label-uppercase text-on-surface-variant/80 tracking-wider">Akses</span>
                                            <button type="button" 
                                                    onclick="toggleUserActive({{ $user->id }})" 
                                                    class="w-11 h-6 rounded-full relative transition-colors focus:outline-none shadow-inner {{ $user->is_active ? 'bg-[#34C759]' : 'bg-outline-variant/60' }} {{ $user->id == session('admin_user.id') ? 'opacity-40 cursor-not-allowed' : '' }}" 
                                                    id="toggle-btn-{{ $user->id }}"
                                                    {{ $user->id == session('admin_user.id') ? 'disabled' : '' }}>
                                                <span class="absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all {{ $user->is_active ? 'right-1' : 'left-1' }}" id="toggle-dot-{{ $user->id }}"></span>
                                            </button>
                                        </div>
                                        
                                        <div class="w-px h-5 bg-outline-variant/40"></div>

                                        <!-- Reset Password Button -->
                                        <button onclick="triggerResetPassword({{ $user->id }}, '{{ $user->email }}')" class="flex items-center gap-xs font-semibold text-secondary hover:text-[#5a4302] transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">lock_reset</span>
                                            <span class="text-xs uppercase tracking-wider">Reset Sandi</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="h-xl"></div>
    </main>
</div>

<!-- ========================================== -->
<!-- Create Admin Side Drawer Form             -->
<!-- ========================================== -->
<div id="create-user-drawer" class="fixed inset-0 z-50 flex justify-end hidden" role="dialog" aria-modal="true">
    <!-- Backdrop overlay -->
    <div class="fixed inset-0 bg-primary/20 backdrop-blur-sm transition-opacity duration-300" onclick="closeCreateUserDrawer()"></div>
    
    <!-- Drawer Panel container -->
    <div class="pointer-events-auto w-full max-w-md bg-surface-container-lowest border-l border-outline-variant shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out z-10" id="user-drawer-panel">
        
        <!-- Header -->
        <div class="flex items-center justify-between px-lg py-md border-b border-surface-variant bg-surface-container-lowest sticky top-0 z-10">
            <h2 class="font-headline-md-mobile text-headline-md-mobile text-on-surface font-semibold">Buat Akun Admin</h2>
            <button class="p-xs text-on-surface-variant hover:text-on-surface transition-colors" onclick="closeCreateUserDrawer()">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Form content -->
        <form id="create-user-form" onsubmit="submitCreateUser(event)" class="flex-1 overflow-y-auto p-lg space-y-lg text-left no-scrollbar">
            @csrf
            
            <p class="text-body-sm text-on-surface-variant leading-relaxed">
                Daftarkan akun administratif baru secara manual. Pendaftaran mandiri dinonaktifkan demi keamanan. Kata sandi kuat akan digenerate secara otomatis.
            </p>

            <!-- Email -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Alamat Email <span class="text-error font-bold ml-1">*</span></label>
                <input type="email" name="email" id="user-email-input" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" placeholder="agen@primeproperty.com" required>
                <div id="user-error-email" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Role Selector -->
            <div class="flex flex-col space-y-xs">
                <label class="font-label-uppercase text-[11px] text-on-surface-variant/80 tracking-wider font-semibold">Tingkat Hak Akses <span class="text-error font-bold ml-1">*</span></label>
                <select name="role" id="user-role-input" class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" required>
                    <option value="admin" selected>Admin (Akses visual, CRUD dikunci)</option>
                    <option value="superadmin">Superadmin (Akses CRUD sistem penuh)</option>
                </select>
                <div id="user-error-role" class="text-error text-[11px] hidden mt-xs"></div>
            </div>

            <!-- Footer Buttons -->
            <div class="pt-lg border-t border-outline-variant/30 flex space-x-md">
                <button type="button" onclick="closeCreateUserDrawer()" class="flex-1 border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low py-md rounded-lg font-medium transition-colors">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-[#C9A961] text-[#1A1A1A] hover:text-white py-md rounded-lg font-bold transition-all shadow-sm">
                    Buat Akun
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ========================================== -->
<!-- Reset Password Confirmation Modal          -->
<!-- ========================================== -->
<div id="reset-password-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="reset-password-card" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10">
        <div class="w-14 h-14 bg-[#B33A3A]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#B33A3A] text-[32px]" style="font-variation-settings: 'FILL' 1;">lock_reset</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]">Reset Password Admin</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed">
                Yakin ingin mereset password untuk akun <span class="font-bold text-primary" id="reset-user-email-span"></span>? Password lama akan langsung diganti dengan password acak baru.
            </p>
        </div>
        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="confirmResetPassword()" class="w-full bg-[#C9A961] text-[#1A1A1A] font-bold py-md px-xl rounded-lg hover:bg-[#C9A961]/90 transition-all shadow-sm">
                Konfirmasi Reset
            </button>
            <button onclick="closeResetPasswordModal()" class="text-on-surface-variant hover:text-[#1A1A1A] font-medium text-body-sm transition-colors py-sm">
                Batal
            </button>
        </div>
    </div>
</div>

<!-- ========================================== -->
<!-- Credentials / Success Display Modal       -->
<!-- ========================================== -->
<div id="success-credentials-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-[#1A1C1C]/40 backdrop-blur-sm p-lg hidden transition-opacity duration-300 opacity-0" role="dialog" aria-modal="true">
    <div id="success-credentials-card" class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-xl flex flex-col items-center text-center space-y-md transform scale-95 opacity-0 transition-all duration-300 ease-out z-10">
        <div class="w-14 h-14 bg-[#34C759]/10 rounded-full flex items-center justify-center mb-sm shadow-inner">
            <span class="material-symbols-outlined text-[#34C759] text-[32px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        <div class="space-y-sm">
            <h3 class="text-headline-md font-bold text-[#1A1A1A]" id="success-title">Berhasil Dibuat</h3>
            <p class="text-body-lg text-on-surface-variant px-md leading-relaxed" id="success-desc">
                Berikut adalah kredensial login baru untuk akun yang baru saja diproses. Salin kredensial ini karena hanya ditampilkan sekali.
            </p>
        </div>
        
        <!-- Credential box -->
        <div class="w-full bg-surface-container-low border border-outline-variant/40 p-md rounded-xl space-y-sm text-left font-body-sm">
            <div>
                <span class="font-label-uppercase text-[10px] text-on-surface-variant tracking-wider block">Email</span>
                <span class="font-semibold text-primary block break-all" id="cred-email"></span>
            </div>
            <div class="relative">
                <span class="font-label-uppercase text-[10px] text-on-surface-variant tracking-wider block">Password</span>
                <div class="flex items-center justify-between">
                    <span class="font-mono text-sm font-bold text-secondary break-all" id="cred-password"></span>
                    <button onclick="copyPasswordToClipboard()" class="p-xs text-[#C9A961] hover:bg-[#C9A961]/10 rounded transition-colors" title="Copy password">
                        <span class="material-symbols-outlined text-[18px]">content_copy</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="w-full pt-md flex flex-col space-y-md">
            <button onclick="closeSuccessCredentialsModal()" class="w-full bg-[#1A1A1A] text-white font-bold py-md px-xl rounded-lg hover:bg-[#1A1A1A]/90 transition-all shadow-sm">
                Mengerti & Tutup
            </button>
        </div>
    </div>
</div>

<script>
    // Create User Drawer toggles
    function openCreateUserDrawer() {
        const drawer = document.getElementById('create-user-drawer');
        const panel = document.getElementById('user-drawer-panel');
        
        document.getElementById('create-user-form').reset();
        clearUserValidationErrors();
        
        drawer.classList.remove('hidden');
        setTimeout(() => {
            panel.classList.remove('translate-x-full');
            panel.classList.add('translate-x-0');
        }, 50);
    }

    function closeCreateUserDrawer() {
        const drawer = document.getElementById('create-user-drawer');
        const panel = document.getElementById('user-drawer-panel');
        
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        
        setTimeout(() => {
            drawer.classList.add('hidden');
        }, 300);
    }

    // Toggle active status via AJAX fetch
    function toggleUserActive(id) {
        const btn = document.getElementById(`toggle-btn-${id}`);
        const dot = document.getElementById(`toggle-dot-${id}`);
        const row = document.getElementById(`user-row-${id}`);
        const statusCell = document.getElementById(`user-status-cell-${id}`);
        
        fetch(`{{ url("/admin/users") }}/${id}/toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (!res.ok) {
                return res.json().then(err => { throw new Error(err.error || 'Request failed') });
            }
            return res.json();
        })
        .then(data => {
            if (data.success) {
                if (data.is_active) {
                    btn.className = 'w-11 h-6 rounded-full relative transition-colors focus:outline-none shadow-inner bg-[#34C759]';
                    dot.className = 'absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all right-1';
                    row.classList.remove('opacity-60', 'bg-gray-50/50');
                    statusCell.innerHTML = `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-[#F3F4F6] text-[#374151] border border-[#E5E7EB]" id="badge-active-${id}">Aktif</span>`;
                } else {
                    btn.className = 'w-11 h-6 rounded-full relative transition-colors focus:outline-none shadow-inner bg-outline-variant/60';
                    dot.className = 'absolute top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all left-1';
                    row.classList.add('opacity-60', 'bg-gray-50/50');
                    statusCell.innerHTML = `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-outline-variant/40 text-on-surface-variant border border-outline-variant/50" id="badge-disabled-${id}">Nonaktif</span>`;
                }
            }
        })
        .catch(err => {
            alert(err.message || 'Terjadi kesalahan saat mengubah status admin.');
        });
    }

    // Reset password confirmation and handlers
    let resetUserId = null;
    function triggerResetPassword(id, email) {
        resetUserId = id;
        document.getElementById('reset-user-email-span').textContent = email;
        
        const modal = document.getElementById('reset-password-modal');
        const card = document.getElementById('reset-password-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeResetPasswordModal() {
        const modal = document.getElementById('reset-password-modal');
        const card = document.getElementById('reset-password-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function confirmResetPassword() {
        if (!resetUserId) return;
        
        fetch(`{{ url("/admin/users") }}/${resetUserId}/reset-password`, {
            method: 'POST',
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
                closeResetPasswordModal();
                showSuccessCredentials('Password Berhasil Direset', `Password untuk akun admin tersebut berhasil direset. Silakan salin dan bagikan password baru berikut secara aman.`, data.email || document.getElementById('reset-user-email-span').textContent, data.password);
            }
        })
        .catch(err => {
            alert('Terjadi kesalahan saat mereset password.');
        });
    }

    // Success Credentials Modal
    function showSuccessCredentials(title, desc, email, password) {
        document.getElementById('success-title').textContent = title;
        document.getElementById('success-desc').textContent = desc;
        document.getElementById('cred-email').textContent = email;
        document.getElementById('cred-password').textContent = password;
        
        const modal = document.getElementById('success-credentials-modal');
        const card = document.getElementById('success-credentials-card');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.classList.add('opacity-100');
            card.classList.remove('scale-95', 'opacity-0');
            card.classList.add('scale-100', 'opacity-100');
        }, 50);
    }

    function closeSuccessCredentialsModal() {
        const modal = document.getElementById('success-credentials-modal');
        const card = document.getElementById('success-credentials-card');
        
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        card.classList.remove('scale-100', 'opacity-100');
        card.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            window.location.reload(); // Reload after closing credentials modal to show fresh state
        }, 300);
    }

    function copyPasswordToClipboard() {
        const passwordText = document.getElementById('cred-password').textContent;
        navigator.clipboard.writeText(passwordText).then(() => {
            alert('Password berhasil disalin ke clipboard!');
        });
    }

    // Create admin via AJAX
    function submitCreateUser(event) {
        event.preventDefault();
        const form = document.getElementById('create-user-form');
        const formData = new FormData(form);
        
        clearUserValidationErrors();

        fetch('{{ url("/admin/users") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (res.status === 422) {
                return res.json().then(data => {
                    showUserValidationErrors(data.errors);
                    throw new Error('Validation failed');
                });
            }
            if (!res.ok) throw new Error('Request failed');
            return res.json();
        })
        .then(data => {
            if (data.success) {
                closeCreateUserDrawer();
                showSuccessCredentials('Akun Admin Berhasil Dibuat', `Akun administrator baru berhasil dibuat secara manual di portal. Silakan salin kredensial masuk di bawah ini.`, data.email, data.password);
            }
        })
        .catch(err => {
            if (err.message !== 'Validation failed') {
                alert('Terjadi kesalahan saat membuat akun admin baru.');
            }
        });
    }

    function clearUserValidationErrors() {
        const errEmail = document.getElementById('user-error-email');
        const errRole = document.getElementById('user-error-role');
        errEmail.textContent = '';
        errEmail.classList.add('hidden');
        errRole.textContent = '';
        errRole.classList.add('hidden');
    }

    function showUserValidationErrors(errors) {
        if (errors.email) {
            const errEmail = document.getElementById('user-error-email');
            errEmail.textContent = errors.email[0];
            errEmail.classList.remove('hidden');
        }
        if (errors.role) {
            const errRole = document.getElementById('user-error-role');
            errRole.textContent = errors.role[0];
            errRole.classList.remove('hidden');
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

<script>
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
@livewireScripts
</body>
</html>
