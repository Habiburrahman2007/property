<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Prime Property - Log Audit</title>
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @livewireStyles

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
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/logs') }}" wire:navigate>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">history_edu</span>
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
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}" wire:navigate>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/logs') }}" wire:navigate>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">history_edu</span>
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
                    Portal Administrasi Superadmin
                </div>
                <div class="font-title-sm text-title-sm font-semibold text-primary md:hidden block">
                    Prime Portal
                </div>
            </div>
        </div>
        
        <div class="flex items-center space-x-xl">
            <div class="relative group cursor-pointer flex items-center space-x-sm" id="profile-menu-trigger">
                <img alt="Admin Avatar" class="w-10 h-10 rounded-full object-cover border border-outline-variant/50 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBKdO_nqLjkeR4IOPNSwJ_md1_4AiuIwugwHDDq2BucpefYguUm_hhKZph32rbhjrZ-ltMnmCU-8qQrg1gC-dI2ICQ0kiVKGu7wwzpi1Fn8_ld9MSSwhVU7M7rA7yfGlxtoShIIXytJ92dmw6QeaPCRaXuQBCts80hOeF92bX3fhoq4y_5eEJPH86cJUXKd2iAe6Nr7uiZsnMbiq2_iL2abk3ik9ex1c58YyuMDOOEQLPZrOdreaWpzK-y4WFMpqeLEgfs1I7ecY0"/>
                <span class="material-symbols-outlined text-on-surface-variant text-[20px] transition-transform duration-200 group-hover:rotate-180" id="profile-chevron">arrow_drop_down</span>
                <div class="absolute right-0 top-full pt-2 w-72 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-all duration-200 z-50" id="profile-dropdown">
                    <div class="bg-white border border-outline-variant/50 rounded-xl shadow-xl py-sm">
                        <div class="px-md py-sm border-b border-outline-variant/30">
                            <p class="font-body-sm font-semibold text-primary truncate" title="{{ session('admin_user.email') }}">{{ session('admin_user.email') }}</p>
                            <p class="text-[11px] text-on-surface-variant capitalize">{{ session('admin_user.role') }}</p>
                        </div>
                        <a class="flex items-center gap-sm px-md py-sm font-body-sm text-body-sm text-error hover:bg-error-container/50 transition-colors cursor-pointer" onclick="showLogoutModal()">
                            <span class="material-symbols-outlined text-[16px]">logout</span>
                            Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Scrollable Canvas -->
    <main class="flex-1 overflow-y-auto px-md md:px-container-margin py-xl space-y-xl">
        
        <!-- Page Header -->
        <div class="mb-md">
            <h2 class="font-display-lg text-3xl sm:text-[40px] font-bold text-[#1A1A1A] tracking-tight leading-tight">Log Audit Sistem</h2>
            <p class="font-body-lg text-sm sm:text-body-lg text-on-surface-variant mt-xs">Lacak dan analisis semua tindakan administratif dan kejadian keamanan di seluruh sistem</p>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white border border-outline-variant/30 rounded-2xl p-lg shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)]">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-lg items-end" id="filter-controls">
                
                <!-- Keyword search -->
                <div class="flex flex-col space-y-xs">
                    <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Cari Log</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant/70 text-[20px] group-hover:text-primary transition-colors">search</span>
                        <input class="w-full bg-surface-container-low border border-outline-variant/50 py-sm pl-xl pr-md text-body-sm font-body-sm rounded-lg focus:ring-1 focus:ring-primary focus:border-primary transition-all placeholder:text-on-surface-variant/70 h-10" id="filter-search" placeholder="Kata kunci, Pengguna, atau IP..." type="text" value="{{ request('search') }}"/>
                    </div>
                </div>

                <!-- Module Select -->
                <div class="flex flex-col space-y-xs">
                    <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Modul</label>
                    <select class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" id="filter-module">
                        <option value="All Modules" {{ request('module', 'All Modules') == 'All Modules' ? 'selected' : '' }}>Semua Modul</option>
                        <option value="Properties" {{ request('module') == 'Properties' ? 'selected' : '' }}>Properti</option>
                        <option value="Admin Management" {{ request('module') == 'Admin Management' ? 'selected' : '' }}>Manajemen Admin</option>
                        <option value="Authentication" {{ request('module') == 'Authentication' ? 'selected' : '' }}>Autentikasi</option>
                        <option value="Settings" {{ request('module') == 'Settings' ? 'selected' : '' }}>Pengaturan</option>
                    </select>
                </div>

                <!-- Action Type Select -->
                <div class="flex flex-col space-y-xs">
                    <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Tipe Tindakan</label>
                    <select class="bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" id="filter-action">
                        <option value="All Actions" {{ request('action_type', 'All Actions') == 'All Actions' ? 'selected' : '' }}>Semua Tindakan</option>
                        <option value="Create" {{ request('action_type') == 'Create' ? 'selected' : '' }}>Tambah</option>
                        <option value="Update" {{ request('action_type') == 'Update' ? 'selected' : '' }}>Ubah</option>
                        <option value="Delete" {{ request('action_type') == 'Delete' ? 'selected' : '' }}>Hapus</option>
                        <option value="Login/Logout" {{ request('action_type') == 'Login/Logout' ? 'selected' : '' }}>Masuk/Keluar</option>
                    </select>
                </div>

                <!-- Date Filter -->
                <div class="flex flex-col space-y-xs">
                    <label class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Tanggal</label>
                    <div class="flex space-x-md">
                        <input class="flex-1 bg-surface-container-low border border-outline-variant/50 text-body-sm font-body-sm h-10 px-sm focus:ring-1 focus:ring-primary focus:border-primary rounded-lg shadow-sm" id="filter-date" type="date" value="{{ request('date') }}"/>
                        <button type="button" onclick="resetFilters()" class="flex items-center justify-center gap-xs border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low py-sm px-md h-10 rounded-lg text-body-sm transition-colors" title="Reset Filter">
                            <span class="material-symbols-outlined text-[16px]">refresh</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Active Filter Chips (live-updated) -->
            <div id="active-chips" class="hidden mt-lg pt-md border-t border-outline-variant/30 flex flex-wrap gap-sm items-center">
                <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider mr-sm">Filter Aktif:</span>
                <div id="chips-container" class="flex flex-wrap gap-sm"></div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white border border-outline-variant/30 rounded-2xl shadow-[0_2px_10px_-4px_rgba(0,0,0,0.05)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead>
                        <tr class="border-b border-outline-variant/30 bg-[#F9FAFB] text-on-surface-variant font-label-uppercase text-label-uppercase tracking-wider">
                            <th class="py-md px-lg font-semibold text-xs">Waktu</th>
                            <th class="py-md px-lg font-semibold text-xs">Pengguna</th>
                            <th class="py-md px-lg font-semibold text-xs">Tindakan</th>
                            <th class="py-md px-lg font-semibold text-xs">Target</th>
                            <th class="py-md px-lg font-semibold text-xs">Modul</th>
                        </tr>
                    </thead>
                    <tbody class="font-body-sm text-body-sm text-on-surface" id="logs-tbody">
                        @forelse($logs as $index => $log)
                            @php
                                $email = $log->user->email ?? 'sistem@prime.com';
                                $name  = $log->user->name ?? explode('@', $email)[0];
                                $initials = strtoupper(substr($name, 0, 2));
                                $colorPalette = ['bg-[#1c1b1b] text-white', 'bg-[#745b1b] text-white', 'bg-[#0D47A1] text-white', 'bg-[#1B5E20] text-white', 'bg-[#4A148C] text-white'];
                                $avatarClass  = $colorPalette[crc32($email) % count($colorPalette)];

                                // Action Translation to Indonesian
                                $actionTranslations = [
                                    'System Login' => 'Masuk Sistem',
                                    'System Logout' => 'Keluar Sistem',
                                    'Created Admin' => 'Admin Dibuat',
                                    'Updated Admin' => 'Admin Diperbarui',
                                    'Reset Password' => 'Reset Sandi',
                                    'Created Property' => 'Properti Dibuat',
                                    'Updated Property' => 'Properti Diperbarui',
                                    'Deleted Listing' => 'Listing Dihapus',
                                    'Restored Property' => 'Properti Dipulihkan',
                                ];
                                $translatedAction = $actionTranslations[$log->action] ?? $log->action;

                                // Indonesian Date Formatting
                                $months = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                                    7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                                $dt = $log->created_at->setTimezone('Asia/Jakarta');
                                $formattedDate = $dt->format('d') . ' ' . $months[$dt->format('n')] . ' ' . $dt->format('Y') . ' | ' . $dt->format('H:i') . ' WIB';
                            @endphp
                            <!-- Main Row -->
                            <tr class="transition-colors border-b border-outline-variant/20 {{ $index % 2 == 0 ? 'bg-white' : 'bg-[#F9FAFB]/50' }}">
                                <!-- Timestamp -->
                                <td class="py-md px-lg whitespace-nowrap text-on-surface-variant font-medium">
                                    {{ $formattedDate }}
                                </td>
                                
                                <!-- User -->
                                <td class="py-md px-lg">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs {{ $avatarClass }}">
                                            {{ $initials }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-primary capitalize leading-tight">{{ $name }}</div>
                                            <div class="text-[11px] text-on-surface-variant">{{ $email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Action (with Custom Badges) -->
                                <td class="py-md px-lg">
                                    <div class="flex items-center">
                                        @if(Str::contains(strtolower($log->action), 'create'))
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#E8F5E9] text-[#1B5E20] border border-[#C8E6C9]">
                                                {{ $translatedAction }}
                                            </span>
                                        @elseif(Str::contains(strtolower($log->action), 'update') || Str::contains(strtolower($log->action), 'modify') || Str::contains(strtolower($log->action), 'reset'))
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#E3F2FD] text-[#0D47A1] border border-[#BBDEFB]">
                                                {{ $translatedAction }}
                                            </span>
                                        @elseif(Str::contains(strtolower($log->action), 'delete') || Str::contains(strtolower($log->action), 'destroy'))
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#FFEBEE] text-[#B71C1C] border border-[#FFCDD2]">
                                                {{ $translatedAction }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-surface-variant text-on-surface border border-outline-variant">
                                                {{ $translatedAction }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Target -->
                                <td class="py-md px-lg font-medium text-[#1A1A1A]">
                                    {{ $log->target ?? '-' }}
                                </td>

                                <!-- Module -->
                                <td class="py-md px-lg text-on-surface-variant">
                                    {{ $log->module }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-lg text-center text-on-surface-variant bg-white">
                                    Tidak ada log audit yang sesuai dengan filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        <!-- Pagination -->
            <div class="px-lg py-md border-t border-outline-variant/30 bg-white flex justify-between items-center" id="logs-pagination">
                <span class="font-body-sm text-sm text-on-surface-variant">
                    Menampilkan {{ $logs->firstItem() ?? 0 }}-{{ $logs->lastItem() ?? 0 }} dari {{ $logs->total() }} entri
                </span>
                <div>
                    {{ $logs->links() }}
                </div>
            </div>
        </div>

        <div class="h-xl"></div>
    </main>
</div>

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

    // =============================================
    // Debounced Realtime Filter — 400ms
    // =============================================
    const BASE_URL = '{{ url("/admin/logs") }}';
    let debounceTimer = null;

    function getFilterParams() {
        return {
            search:      document.getElementById('filter-search').value.trim(),
            module:      document.getElementById('filter-module').value,
            action_type: document.getElementById('filter-action').value,
            date:        document.getElementById('filter-date').value,
        };
    }

    function buildQuery(params) {
        const q = new URLSearchParams();
        Object.entries(params).forEach(([k, v]) => { if (v) q.set(k, v); });
        return q.toString();
    }

    const ACTION_TRANSLATIONS = {
        'System Login': 'Masuk Sistem',
        'System Logout': 'Keluar Sistem',
        'Created Admin': 'Admin Dibuat',
        'Updated Admin': 'Admin Diperbarui',
        'Reset Password': 'Reset Sandi',
        'Created Property': 'Properti Dibuat',
        'Updated Property': 'Properti Diperbarui',
        'Deleted Listing': 'Listing Dihapus',
        'Restored Property': 'Properti Dipulihkan',
    };

    function actionBadge(action) {
        const trans = ACTION_TRANSLATIONS[action] || action;
        const a = action.toLowerCase();
        if (a.includes('create'))                                      return `<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#E8F5E9] text-[#1B5E20] border border-[#C8E6C9]">${trans}</span>`;
        if (a.includes('update')||a.includes('modify')||a.includes('reset')) return `<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#E3F2FD] text-[#0D47A1] border border-[#BBDEFB]">${trans}</span>`;
        if (a.includes('delete')||a.includes('destroy'))               return `<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-[#FFEBEE] text-[#B71C1C] border border-[#FFCDD2]">${trans}</span>`;
        return `<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">${trans}</span>`;
    }

    const AVATAR_COLORS = [
        'bg-[#1c1b1b] text-white', 'bg-[#745b1b] text-white',
        'bg-[#0D47A1] text-white', 'bg-[#1B5E20] text-white', 'bg-[#4A148C] text-white'
    ];
    function avatarColor(email) {
        let h = 0; for (let c of email) h = (h * 31 + c.charCodeAt(0)) & 0xffff;
        return AVATAR_COLORS[h % AVATAR_COLORS.length];
    }
    function initials(name) { return name.substring(0, 2).toUpperCase(); }
    function escapeHTML(s) { return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }

    function renderLogs(data) {
        const tbody  = document.getElementById('logs-tbody');
        const pagDiv = document.getElementById('logs-pagination');

        if (!data.logs.length) {
            tbody.innerHTML = `<tr><td colspan="5" class="py-lg text-center text-on-surface-variant bg-white">Tidak ada log audit yang sesuai dengan filter.</td></tr>`;
            pagDiv.innerHTML = `<span class="font-body-sm text-sm text-on-surface-variant">Menampilkan 0 entri</span><div></div>`;
            return;
        }

        let html = '';
        data.logs.forEach((log, i) => {
            const email  = log.user_email || 'sistem';
            const name   = log.user_name  || email.split('@')[0];
            const ac     = avatarColor(email);
            const ini    = initials(name);
            const stripe = i % 2 === 0 ? 'bg-white' : 'bg-[#F9FAFB]/50';
            const ts     = log.created_at_formatted;
            const target = escapeHTML(log.target || '-');
            const module = escapeHTML(log.module);
            const badge  = actionBadge(log.action);

            html += `
            <tr class="transition-colors border-b border-outline-variant/20 ${stripe}">
                <td class="py-md px-lg whitespace-nowrap text-on-surface-variant font-medium">${ts}</td>
                <td class="py-md px-lg">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold text-xs ${ac}">${ini}</div>
                        <div>
                            <div class="font-semibold text-primary capitalize leading-tight">${escapeHTML(name)}</div>
                            <div class="text-[11px] text-on-surface-variant">${escapeHTML(email)}</div>
                        </div>
                    </div>
                </td>
                <td class="py-md px-lg"><div class="flex items-center">${badge}</div></td>
                <td class="py-md px-lg font-medium text-[#1A1A1A]">${target}</td>
                <td class="py-md px-lg text-on-surface-variant">${module}</td>
            </tr>`;
        });
        tbody.innerHTML = html;

        pagDiv.innerHTML = `
            <span class="font-body-sm text-sm text-on-surface-variant">Menampilkan ${data.from}–${data.to} dari ${data.total} entri</span>
            <div></div>`;
    }

    function updateChips(params) {
        const labelMap = { search: 'Cari', module: 'Modul', action_type: 'Tindakan', date: 'Tanggal' };
        const skipVals = { module: 'All Modules', action_type: 'All Actions' };
        const chips    = document.getElementById('chips-container');
        const wrapper  = document.getElementById('active-chips');
        chips.innerHTML = '';
        let count = 0;
        Object.entries(params).forEach(([k, v]) => {
            if (!v || v === skipVals[k]) return;
            count++;
            const chip = document.createElement('div');
            chip.className = 'bg-surface-container-low px-md py-xs rounded-full flex items-center space-x-sm text-body-sm font-body-sm border border-outline-variant/50 shadow-sm';
            chip.innerHTML = `<span class="capitalize">${labelMap[k] || k}: ${v.replace(/_/g,' ')}</span><button onclick="removeFilter('${k}')" class="material-symbols-outlined text-[16px] hover:text-error transition-colors">close</button>`;
            chips.appendChild(chip);
        });
        wrapper.classList.toggle('hidden', count === 0);
    }

    function removeFilter(key) {
        const el = document.getElementById('filter-' + (key === 'action_type' ? 'action' : (key === 'search' ? 'search' : key)));
        if (el) el.value = el.tagName === 'SELECT' ? el.options[0].value : '';
        triggerFilter();
    }

    function resetFilters() {
        document.getElementById('filter-search').value = '';
        document.getElementById('filter-module').value = 'All Modules';
        document.getElementById('filter-action').value = 'All Actions';
        document.getElementById('filter-date').value = '';
        triggerFilter();
    }

    function triggerFilter() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(doFetch, 400);
    }

    function doFetch() {
        const params = getFilterParams();
        const qs = buildQuery(params);
        const url = BASE_URL + (qs ? '?' + qs : '') + (qs ? '&' : '?') + '_json=1';

        // Show loading state
        document.getElementById('logs-tbody').innerHTML = `<tr><td colspan="5" class="py-lg text-center text-on-surface-variant"><span class="material-symbols-outlined animate-spin text-[20px] inline-block">sync</span> Memuat...</td></tr>`;

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(r => r.json())
            .then(data => {
                renderLogs(data);
                updateChips(params);
                // Update browser URL without reload
                window.history.replaceState({}, '', BASE_URL + (qs ? '?' + qs : ''));
            })
            .catch(() => {
                document.getElementById('logs-tbody').innerHTML = `<tr><td colspan="5" class="py-lg text-center text-error">Gagal memuat data. Coba lagi.</td></tr>`;
            });
    }

    // Attach listeners
    ['filter-search', 'filter-module', 'filter-action', 'filter-date'].forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('input', triggerFilter);
        el.addEventListener('change', triggerFilter);
    });

    // =============================================
    // Toggle Payload Collapsible
    // =============================================
    function togglePayload(id) {
        const row = document.getElementById(`payload-row-${id}`);
        if (row) row.classList.toggle('hidden');
    }

    // =============================================
    // Logout Modal
    // =============================================
    function showLogoutModal() {
        const modal = document.getElementById('logout-modal');
        const card  = document.getElementById('logout-card');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0'); modal.classList.add('opacity-100');
            card.classList.remove('scale-95','opacity-0'); card.classList.add('scale-100','opacity-100');
        }, 50);
    }
    function closeLogoutModal() {
        const modal = document.getElementById('logout-modal');
        const card  = document.getElementById('logout-card');
        modal.classList.remove('opacity-100'); modal.classList.add('opacity-0');
        card.classList.remove('scale-100','opacity-100'); card.classList.add('scale-95','opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }
    function confirmLogout() { document.getElementById('logout-form').submit(); }

    // =============================================
    // Mobile Sidebar
    // =============================================
    function toggleMobileSidebar() {
        const backdrop = document.getElementById('mobile-sidebar-backdrop');
        const drawer   = document.getElementById('mobile-sidebar');
        if (drawer.classList.contains('-translate-x-full')) {
            backdrop.classList.remove('hidden');
            drawer.classList.remove('-translate-x-full');
            drawer.classList.add('translate-x-0');
        } else {
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('-translate-x-full');
            setTimeout(() => backdrop.classList.add('hidden'), 300);
        }
    }
</script>
@livewireScripts
</body>
</html>
