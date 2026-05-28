<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Arsip Properti - Prime Property Superadmin</title>
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    <!-- Styles & Scripts (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/properties') }}">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_work</span>
                <span class="font-label-uppercase text-label-uppercase">Properti</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}">
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}">
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/logs') }}">
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
            <a class="flex items-center space-x-md px-sm py-sm text-primary font-bold bg-[#C9A961]/20 transition-all rounded-lg" href="{{ url('/admin/properties') }}">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_work</span>
                <span class="font-label-uppercase text-label-uppercase">Properti</span>
            </a>
            <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/messages') }}">
                <span class="material-symbols-outlined">mail</span>
                <span class="font-label-uppercase text-label-uppercase">Pesan</span>
            </a>
            @if(session('admin_user.role') === 'superadmin')
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/users') }}">
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="font-label-uppercase text-label-uppercase">Admin</span>
                </a>
                <a class="flex items-center space-x-md px-sm py-sm text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-all rounded-lg" href="{{ url('/admin/logs') }}">
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
<!-- Canvas -->
<main class="flex-1 overflow-y-auto p-md md:p-container-margin relative">
<div class="max-w-6xl mx-auto">
<!-- Header Section -->
<div class="mb-xl">
<h2 class="font-display-lg text-display-lg md:font-display-lg md:text-display-lg font-display-lg-mobile text-display-lg-mobile mb-sm text-primary">Arsip Properti</h2>
<div class="bg-surface-container-low border border-outline-variant p-md rounded flex items-start gap-md">
<span class="material-symbols-outlined text-on-surface-variant mt-xs">info</span>
<p class="font-body-lg text-body-lg text-on-surface-variant">Item di bawah ini adalah properti yang telah dihapus. Anda dapat memulihkannya kembali ke daftar aktif.</p>
</div>
</div>
<!-- Filters & Search -->
<form action="{{ url('/admin/properties/archive') }}" method="GET" class="flex flex-col md:flex-row justify-between items-center mb-lg gap-md bg-surface p-md rounded border border-outline-variant/50">
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-on-surface-variant">search</span>
<input name="search" value="{{ request('search') }}" class="w-full pl-xl pr-md py-sm bg-background border-b border-outline-variant focus:border-primary outline-none font-body-sm text-body-sm text-primary transition-all" placeholder="Cari properti arsip..." type="text"/>
</div>
<div class="w-full md:w-auto flex items-center gap-sm">
<span class="font-body-sm text-body-sm text-on-surface-variant">Filter:</span>
<select name="tipe" onchange="this.form.submit()" class="bg-background border-b border-outline-variant py-sm px-md outline-none font-body-sm text-body-sm text-primary min-w-[150px] cursor-pointer appearance-none">
<option value="" {{ request('tipe') == '' ? 'selected' : '' }}>Semua Tipe</option>
<option value="Villa" {{ request('tipe') == 'Villa' ? 'selected' : '' }}>Villa</option>
<option value="Ruko" {{ request('tipe') == 'Ruko' ? 'selected' : '' }}>Ruko</option>
</select>
<span class="material-symbols-outlined absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none" style="margin-left: -30px;">arrow_drop_down</span>
</div>
</form>
<!-- Data Table Container -->
<div class="bg-surface border border-outline-variant/30 rounded shadow-sm overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-outline-variant/50 bg-surface-container-lowest">
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold">Nama Properti</th>
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold">Group</th>
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold">Tipe</th>
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold">Harga</th>
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold">Tanggal Dihapus</th>
<th class="py-md px-lg font-label-uppercase text-label-uppercase text-on-surface-variant font-semibold text-right">Aksi</th>
</tr>
</thead>
<tbody class="font-body-sm text-body-sm text-[#666666]">
@forelse($properties as $property)
<tr class="border-b border-outline-variant/30 hover:bg-surface-container-low/50 transition-colors cursor-pointer" onclick="openArchiveDrawer({{ $property->id }})">
<td class="py-md px-lg">{{ $property->nama_property }}</td>
<td class="py-md px-lg">{{ $property->group_name }}</td>
<td class="py-md px-lg">{{ $property->tipe }}</td>
<td class="py-md px-lg">Rp {{ number_format($property->price, 0, ',', '.') }}</td>
<td class="py-md px-lg">{{ $property->deleted_at->format('d M Y') }}</td>
<td class="py-md px-lg text-right" onclick="event.stopPropagation()">
<button onclick="openRestoreModal({{ $property->id }}, '{{ addslashes($property->nama_property) }}')" class="font-label-uppercase text-label-uppercase font-bold hover:opacity-80 transition-opacity" style="color: #C9A961;">Pulihkan</button>
</td>
</tr>
@empty
<tr>
<td colspan="6" class="py-md px-lg text-center">Tidak ada properti arsip.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="border-t border-outline-variant/30 px-lg py-md bg-surface-container-lowest">
    {{ $properties->links() }}
</div>
</div>
</div>
</main>
</div>

<!-- Right Side Drawer -->
<div id="archive-drawer-backdrop" aria-hidden="true" class="fixed inset-0 bg-primary/30 backdrop-blur-sm z-40 transition-opacity hidden" onclick="closeArchiveDrawer()"></div>
<aside id="archive-drawer" class="fixed inset-y-0 right-0 z-50 w-full max-w-[500px] bg-surface shadow-2xl border-l border-outline-variant flex flex-col transform transition-transform duration-300 translate-x-full">
<!-- Red Archive Banner -->
<div class="bg-error text-on-error px-lg py-sm flex items-center justify-center gap-sm shrink-0">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">warning</span>
<span class="font-title-sm text-title-sm uppercase tracking-wider" id="drawer-deleted-at"></span>
</div>
<!-- Drawer Header & Actions -->
<div class="px-lg py-md border-b border-outline-variant flex justify-between items-center bg-surface shrink-0">
<div class="flex items-center gap-md">
<button aria-label="Tutup Detail" onclick="closeArchiveDrawer()" class="p-xs hover:bg-surface-container-low rounded transition-colors text-on-surface-variant hover:text-on-surface">
<span class="material-symbols-outlined">close</span>
</button>
<h2 class="font-headline-md-mobile text-headline-md-mobile text-primary">Detail Properti</h2>
</div>
<button id="drawer-restore-btn" onclick="" class="bg-secondary-fixed-dim hover:bg-secondary-fixed text-on-secondary-fixed px-md py-sm rounded font-title-sm text-title-sm transition-colors flex items-center gap-xs shadow-sm">
<span class="material-symbols-outlined text-[18px]">restore</span>
    Pulihkan Properti
</button>
</div>
<!-- Drawer Content (Scrollable) -->
<div class="flex-1 overflow-y-auto bg-surface-container-lowest relative">
<!-- Loading state -->
<div id="drawer-loader" class="absolute inset-0 bg-surface-container-lowest z-10 flex flex-col items-center justify-center gap-md text-on-surface-variant">
    <span class="material-symbols-outlined animate-spin text-[32px]">sync</span>
    <span>Mengambil data properti...</span>
</div>

<div id="drawer-content" class="hidden">
<!-- Property Image -->
<div class="w-full h-64 bg-surface-container-high relative overflow-hidden">
<img id="drawer-image" alt="Archived Property Photo" class="w-full h-full object-cover opacity-60 grayscale-[30%]" src=""/>
<div class="absolute bottom-md left-lg bg-surface/90 backdrop-blur px-sm py-xs rounded border border-outline-variant">
<span class="font-code-sm text-code-sm text-on-surface" id="drawer-id"></span>
</div>
</div>
<!-- Bento Grid Detail Layout -->
<div class="p-lg">
<h3 class="font-title-sm text-title-sm text-primary mb-md border-b border-surface-container-high pb-xs">Informasi Utama</h3>
<div class="grid grid-cols-2 gap-x-gutter gap-y-md mb-xl">
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Nama Properti</span>
<span class="font-body-lg text-body-lg text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-nama"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Group / Kategori</span>
<span class="font-body-lg text-body-lg text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-group"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Tipe Properti</span>
<span class="font-body-lg text-body-lg text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-tipe"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Status Kepemilikan</span>
<span class="font-body-lg text-body-lg text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-kepemilikan">SHM</span>
</div>
</div>
<h3 class="font-title-sm text-title-sm text-primary mb-md border-b border-surface-container-high pb-xs">Dimensi &amp; Spesifikasi</h3>
<div class="grid grid-cols-2 gap-x-gutter gap-y-md mb-xl">
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Lebar Tanah (m)</span>
<span class="font-code-sm text-code-sm text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-lebar"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Panjang Tanah (m)</span>
<span class="font-code-sm text-code-sm text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-panjang"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Harga</span>
<span class="font-code-sm text-code-sm text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-harga"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Dimensi (L x P)</span>
<span class="font-code-sm text-code-sm text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none" id="drawer-dimensi"></span>
</div>
</div>
<h3 class="font-title-sm text-title-sm text-primary mb-md border-b border-surface-container-high pb-xs">Lokasi &amp; Catatan</h3>
<div class="flex flex-col gap-md">
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Kawasan</span>
<span class="font-body-lg text-body-lg text-on-surface bg-surface-container px-sm py-xs rounded border border-surface-variant select-none min-h-[60px]" id="drawer-kawasan"></span>
</div>
<div class="flex flex-col gap-xs">
<span class="font-label-uppercase text-label-uppercase text-on-surface-variant">Alasan Pengarsipan (Catatan Internal)</span>
<span class="font-body-lg text-body-lg text-on-surface-variant bg-surface-container-low px-sm py-xs rounded border border-surface-variant border-dashed select-none min-h-[80px] italic" id="drawer-alasan">
    Properti ini dihapus dari daftar aktif (Soft Deleted).
</span>
</div>
</div>
</div>
<div class="h-xl"></div>
</div>
</div>
</aside>

<!-- Restore Modal -->
<div id="restore-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-primary/40 backdrop-blur-[1px] transition-opacity duration-300 hidden">
<div class="bg-surface rounded border border-outline-variant w-[480px] max-w-[90vw] p-xl shadow-2xl transform transition-all duration-300 relative overflow-hidden">
<div class="absolute top-0 left-0 right-0 h-[2px] bg-secondary-fixed-dim"></div>
<div class="flex flex-col">
<div class="w-12 h-12 rounded-full bg-secondary-container/20 flex items-center justify-center mb-md border border-secondary-container/30">
<span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 0, 'wght' 300;">restore_from_trash</span>
</div>
<h3 class="font-title-sm text-title-sm text-primary mb-sm font-medium tracking-tight">Konfirmasi Pemulihan</h3>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-xl leading-relaxed">
    Kembalikan properti <span class="font-semibold text-primary" id="restore-property-name"></span> ke daftar listing aktif?
</p>
<div class="flex items-center justify-end gap-md pt-md mt-sm border-t border-surface-container-high">
<button onclick="closeRestoreModal()" class="px-lg py-sm rounded bg-surface-container-lowest border border-outline-variant text-on-surface-variant font-code-sm text-code-sm hover:bg-surface-container hover:text-primary transition-all duration-200">
    Batal
</button>
<button onclick="confirmRestore()" class="px-lg py-sm rounded bg-secondary text-on-secondary font-code-sm text-code-sm hover:bg-[#5a4614] shadow-sm hover:shadow transition-all duration-200 flex items-center gap-sm">
<span class="material-symbols-outlined text-[18px]">check</span>
    Pulihkan
</button>
</div>
</div>
</div>
</div>

<script>
let currentRestoreId = null;

function openRestoreModal(id, name) {
    currentRestoreId = id;
    document.getElementById('restore-property-name').innerText = name;
    document.getElementById('restore-modal').classList.remove('hidden');
}

function closeRestoreModal() {
    currentRestoreId = null;
    document.getElementById('restore-modal').classList.add('hidden');
}

function confirmRestore() {
    if(!currentRestoreId) return;
    
    fetch(`/admin/properties/${currentRestoreId}/restore`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            window.location.reload();
        } else {
            alert(data.error || 'Terjadi kesalahan');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Gagal memulihkan properti.');
    });
}

function openArchiveDrawer(id) {
    document.getElementById('archive-drawer-backdrop').classList.remove('hidden');
    document.getElementById('archive-drawer').classList.remove('translate-x-full');
    
    document.getElementById('drawer-loader').classList.remove('hidden');
    document.getElementById('drawer-content').classList.add('hidden');
    
    fetch(`/admin/properties/archive/${id}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            closeArchiveDrawer();
            return;
        }
        
        document.getElementById('drawer-loader').classList.add('hidden');
        document.getElementById('drawer-content').classList.remove('hidden');
        
        document.getElementById('drawer-nama').innerText = data.nama_property;
        document.getElementById('drawer-group').innerText = data.group_name || '-';
        document.getElementById('drawer-tipe').innerText = data.tipe;
        document.getElementById('drawer-lebar').innerText = data.lebar;
        document.getElementById('drawer-panjang').innerText = data.panjang;
        document.getElementById('drawer-harga').innerText = data.formatted_price;
        document.getElementById('drawer-dimensi').innerText = data.dimensions;
        
        let kawasanStr = '';
        if (Array.isArray(data.kawasan)) {
            kawasanStr = data.kawasan.join(', ');
        } else if (typeof data.kawasan === 'string') {
            try {
                kawasanStr = JSON.parse(data.kawasan).join(', ');
            } catch(e) {
                kawasanStr = data.kawasan;
            }
        }
        document.getElementById('drawer-kawasan').innerText = kawasanStr;
        
        if (data.image) {
            document.getElementById('drawer-image').src = '/storage/' + data.image;
        } else {
            document.getElementById('drawer-image').src = '';
        }
        
        document.getElementById('drawer-id').innerText = 'ID: ' + data.id;
        
        if (data.deleted_at) {
            const date = new Date(data.deleted_at);
            document.getElementById('drawer-deleted-at').innerText = 'Status: Dihapus pada ' + date.toLocaleDateString('id-ID');
            
            // Dynamic ownership status based on property type
            document.getElementById('drawer-kepemilikan').innerText = data.tipe === 'Villa' ? 'SHM' : 'HGB';
            
            // Dynamic archive reason
            const creatorEmail = data.creator ? data.creator.email : 'Sistem';
            document.getElementById('drawer-alasan').innerText = `Properti ini dinonaktifkan (Soft Deleted) dari daftar listing aktif oleh ${creatorEmail} pada ${date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}.`;
        }
        
        document.getElementById('drawer-restore-btn').setAttribute('onclick', `openRestoreModal(${data.id}, '${data.nama_property.replace(/'/g, "\\'")}')`);
    })
    .catch(error => {
        console.error('Error fetching details:', error);
        closeArchiveDrawer();
        alert('Gagal memuat detail.');
    });
}

function closeArchiveDrawer() {
    document.getElementById('archive-drawer-backdrop').classList.add('hidden');
    document.getElementById('archive-drawer').classList.add('translate-x-full');
}

// Mobile sidebar controls
function toggleMobileSidebar() {
    const backdrop = document.getElementById('mobile-sidebar-backdrop');
    const sidebar = document.getElementById('mobile-sidebar');
    
    if (sidebar.classList.contains('-translate-x-full')) {
        backdrop.classList.remove('hidden');
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
    } else {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        backdrop.classList.add('hidden');
    }
}

// Logout modal controls
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

</body></html>
