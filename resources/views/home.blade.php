@extends('layouts.app')

@section('title', 'Prime Property - Home')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[880px] min-h-[700px] flex items-center justify-center bg-[#111313] overflow-hidden">
    <!-- Cinematic Zoom Background Image -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <img alt="Luxury Villa" class="w-full h-full object-cover opacity-45 mix-blend-overlay scale-100 animate-zoom-image" data-alt="A breathtaking twilight view of a highly modern, minimalist luxury villa with expansive glass walls, overlooking an infinity pool and a serene ocean vista." src="{{ asset('assets/img/hero-luxury-villa.jpg') }}" fetchpriority="high" loading="eager"/>
        <!-- Double Dark Overlay for maximum contrast and blending -->
        <div class="absolute inset-0 bg-gradient-to-b from-[#111313]/60 via-[#111313]/85 to-[#111313] z-10"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-transparent via-[#111313]/30 to-[#111313]/90 z-10"></div>
    </div>
    
    <!-- Hero Contents -->
    <div class="relative z-20 text-center px-md md:px-container-margin max-w-5xl mx-auto flex flex-col items-center justify-center h-full pt-16">
        <!-- Luxury Brand Badge -->
        <div class="inline-flex items-center gap-2 px-md py-sm bg-white/5 backdrop-blur-md rounded-full border border-white/10 mb-md animate-fade-in shadow-inner">
            <span class="material-symbols-outlined text-[#C9A961] text-[16px]">workspace_premium</span>
            <span class="font-label-uppercase text-[10px] tracking-[0.25em] text-[#C9A961] font-bold">Experience Luxury Real Estate</span>
        </div>
        
        <!-- Premium Heading -->
        <h1 class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-[54px] text-white mb-md font-bold leading-tight tracking-tight max-w-4xl animate-slide-up" style="text-shadow: 0 4px 20px rgba(0,0,0,0.6);">
            Where Luxury Meets <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FFDF9B] via-[#C9A961] to-[#FFDF9B]">Exclusivity</span>
        </h1>
        
        <!-- Elegant Subtitle -->
        <p class="font-body-lg text-body-lg text-neutral-300 mb-xl max-w-2xl leading-relaxed animate-slide-up" style="text-shadow: 0 2px 10px rgba(0,0,0,0.4);">
            Discover our curated portfolio of prestigious estates and premium commercial hubs in Jakarta's most sought-after neighborhoods.
        </p>

        <!-- Glassmorphic Floating Search Card -->
        <div class="w-full max-w-4xl bg-white/10 dark:bg-black/35 backdrop-blur-xl border border-white/15 dark:border-white/10 p-lg rounded-2xl shadow-2xl flex flex-col md:flex-row gap-lg md:items-end mt-sm text-left animate-slide-up">
            <!-- Filter Kawasan -->
            <div class="flex-1 flex flex-col gap-2">
                <label for="filter-kawasan" class="font-label-uppercase text-[10px] tracking-wider text-neutral-300 font-bold flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[#C9A961] text-[14px]">location_on</span>
                    <span>LOKASI</span>
                </label>
                <div class="relative">
                    <select id="filter-kawasan" class="w-full bg-neutral-900/60 text-white font-body-sm text-sm px-md py-sm rounded-xl border border-white/10 focus:border-[#C9A961] focus:ring-0 transition-colors appearance-none pr-8 cursor-pointer">
                        <option value="semua" class="bg-[#111313]">Semua Lokasi</option>
                        <option value="Menteng" class="bg-[#111313]">Menteng (Jakarta Pusat)</option>
                        <option value="Senopati" class="bg-[#111313]">Senopati (Jakarta Selatan)</option>
                        <option value="Kebayoran Baru" class="bg-[#111313]">Kebayoran Baru</option>
                        <option value="Pondok Indah" class="bg-[#111313]">Pondok Indah</option>
                        <option value="Kemang" class="bg-[#111313]">Kemang</option>
                        <option value="BSD City" class="bg-[#111313]">BSD City (Tangerang)</option>
                        <option value="Gading Serpong" class="bg-[#111313]">Gading Serpong</option>
                        <option value="Ubud" class="bg-[#111313]">Ubud (Bali)</option>
                        <option value="Seminyak" class="bg-[#111313]">Seminyak (Bali)</option>
                    </select>
                    <span class="material-symbols-outlined text-neutral-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[18px]">expand_more</span>
                </div>
            </div>

            <!-- Filter Tipe -->
            <div class="flex-1 flex flex-col gap-2">
                <label for="filter-tipe" class="font-label-uppercase text-[10px] tracking-wider text-neutral-300 font-bold flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[#C9A961] text-[14px]">domain</span>
                    <span>TIPE PROPERTI</span>
                </label>
                <div class="relative">
                    <select id="filter-tipe" class="w-full bg-neutral-900/60 text-white font-body-sm text-sm px-md py-sm rounded-xl border border-white/10 focus:border-[#C9A961] focus:ring-0 transition-colors appearance-none pr-8 cursor-pointer">
                        <option value="semua" class="bg-[#111313]">Semua Tipe</option>
                        <option value="Villa" class="bg-[#111313]">Villa (Hunian Mewah)</option>
                        <option value="Ruko" class="bg-[#111313]">Ruko (Komersial)</option>
                    </select>
                    <span class="material-symbols-outlined text-neutral-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[18px]">expand_more</span>
                </div>
            </div>

            <!-- Filter Harga Maksimum -->
            <div class="flex-1 flex flex-col gap-2">
                <label for="filter-price" class="font-label-uppercase text-[10px] tracking-wider text-neutral-300 font-bold flex items-center gap-xs">
                    <span class="material-symbols-outlined text-[#C9A961] text-[14px]">payments</span>
                    <span>HARGA MAKSIMUM</span>
                </label>
                <div class="relative">
                    <select id="filter-price" class="w-full bg-neutral-900/60 text-white font-body-sm text-sm px-md py-sm rounded-xl border border-white/10 focus:border-[#C9A961] focus:ring-0 transition-colors appearance-none pr-8 cursor-pointer">
                        <option value="semua" class="bg-[#111313]">Semua Harga</option>
                        <option value="15000000000" class="bg-[#111313]">s/d Rp 15 Miliar</option>
                        <option value="30000000000" class="bg-[#111313]">s/d Rp 30 Miliar</option>
                        <option value="50000000000" class="bg-[#111313]">s/d Rp 50 Miliar</option>
                        <option value="80000000000" class="bg-[#111313]">s/d Rp 80 Miliar</option>
                        <option value="100000000000" class="bg-[#111313]">s/d Rp 100 Miliar</option>
                    </select>
                    <span class="material-symbols-outlined text-neutral-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-[18px]">expand_more</span>
                </div>
            </div>

            <!-- Search Button -->
            <div class="flex-shrink-0">
                <button onclick="applyHeroFilter()" class="w-full md:w-auto h-[38px] px-xl bg-[#C9A961] hover:bg-[#ffdf9b] text-neutral-900 font-label-uppercase text-label-uppercase font-bold rounded-xl transition-all duration-300 shadow-lg shadow-[#C9A961]/20 flex items-center justify-center gap-xs cursor-pointer active:scale-95 border-0">
                    <span class="material-symbols-outlined text-[18px] font-bold">search</span>
                    <span>Cari Properti</span>
                </button>
            </div>
        </div>

        <!-- Bouncing Scroll Down Indicator -->
        <a href="#featured-properties" class="absolute bottom-6 flex flex-col items-center gap-sm text-neutral-400 hover:text-white transition-colors animate-scroll-bounce">
            <span class="font-label-uppercase text-[9px] tracking-[0.2em] uppercase font-bold opacity-80">Scroll Down</span>
            <span class="material-symbols-outlined text-[20px] text-[#C9A961]">keyboard_double_arrow_down</span>
        </a>
    </div>
</section>

<!-- Featured Properties Bento Grid -->
<section id="featured-properties" class="py-xl md:py-[96px] px-md md:px-container-margin max-w-7xl mx-auto scroll-mt-20">
    <div class="flex justify-between items-end mb-xl">
        <div>
            <h2 class="font-headline-md-mobile text-headline-md-mobile md:font-headline-md md:text-headline-md text-primary mb-sm font-bold">Featured Properties</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Exclusive listings curated for discerning buyers.</p>
        </div>
    </div>
    <div id="property-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        @forelse($properties as $property)
            @php
                $isAvailable = $property->status === 'in stock';
                $translatedKawasan = is_array($property->kawasan) && count($property->kawasan) > 0 
                    ? $property->kawasan[0] 
                    : (is_string($property->kawasan) ? $property->kawasan : '-');
            @endphp
            <!-- Property Card -->
            <div class="property-card group bg-surface-container-lowest border border-[#C9A961]/25 hover:border-[#C9A961]/60 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col animate-card p-lg"
                 data-kawasan="{{ is_array($property->kawasan) ? implode(',', $property->kawasan) : $property->kawasan }}"
                 data-tipe="{{ $property->tipe }}"
                 data-price="{{ $property->price }}">
                <!-- Header: Status Badge & Area info -->
                <div class="flex justify-between items-center mb-sm shrink-0">
                    @if($isAvailable)
                        <span class="bg-[#E8F5E9] text-[#1B5E20] border border-[#C8E6C9] px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase">Tersedia</span>
                    @else
                        <span class="bg-[#FFEBEE] text-[#B71C1C] border border-[#FFCDD2] px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase">Terjual</span>
                    @endif
                    <span class="font-label-uppercase text-[10px] font-semibold text-secondary tracking-wider">{{ $property->tipe }} — {{ $translatedKawasan }}</span>
                </div>

                <!-- Title & Group -->
                <div class="mb-sm shrink-0">
                    <h3 class="font-title-sm text-lg md:text-title-sm text-primary font-bold line-clamp-1 group-hover:text-secondary transition-colors" title="{{ $property->nama_property }}">{{ $property->nama_property }}</h3>
                    @if($property->group_name)
                        <span class="text-[10px] text-on-surface-variant/70 font-semibold uppercase tracking-wider block mt-0.5">{{ $property->group_name }}</span>
                    @endif
                </div>

                <p class="font-body-sm text-body-sm text-on-surface-variant mb-md leading-relaxed line-clamp-2">
                    {{ $property->tipe === 'Villa' 
                       ? 'Hunian eksklusif dengan keindahan desain arsitektur modern yang menyatu dengan kenyamanan premium.' 
                       : 'Ruang usaha strategis berpotensi bisnis sangat tinggi di kawasan pusat komersial yang prestisius.' }}
                </p>

                <!-- Specifications grid -->
                <div class="grid grid-cols-2 gap-y-sm gap-x-md my-md text-on-surface-variant font-body-sm text-[12px] border-t border-b border-outline-variant/30 py-md mt-auto">
                    <div class="flex items-center gap-1.5 text-on-surface-variant font-medium">
                        <span class="material-symbols-outlined text-[16px] text-secondary">square_foot</span>
                        <span>{{ round($property->lebar * $property->panjang) }} m² ({{ round($property->lebar) }}x{{ round($property->panjang) }}m)</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-on-surface-variant font-medium">
                        <span class="material-symbols-outlined text-[16px] text-secondary">layers</span>
                        <span>{{ round($property->tingkat) }} Lantai</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-on-surface-variant font-medium">
                        <span class="material-symbols-outlined text-[16px] text-secondary">explore</span>
                        <span>Hadap {{ $property->hadap }}</span>
                    </div>
                    <div class="flex items-center gap-1.5 text-on-surface-variant font-medium">
                        <span class="material-symbols-outlined text-[16px] text-secondary">garage</span>
                        <span>{{ $property->carport ? 'Ada Carport' : 'Tanpa Carport' }}</span>
                    </div>
                </div>

                <!-- Footer (Price & Action) -->
                <div class="pt-md border-t border-outline/10 flex flex-col sm:flex-row justify-between items-start sm:items-center w-full gap-sm mt-auto shrink-0 {{ !$isAvailable ? 'opacity-60' : '' }}">
                    <span class="font-label-uppercase text-label-uppercase text-secondary font-bold text-base {{ !$isAvailable ? 'line-through text-primary' : '' }}">
                        Rp {{ number_format($property->price, 0, ',', '.') }}
                    </span>
                    <button onclick="openPublicDetailDrawer({{ $property->id }})" class="w-full sm:w-auto px-md h-9 bg-primary hover:bg-[#C9A961] text-white hover:text-[#1A1A1A] rounded-lg text-xs font-bold transition-all duration-300 shadow-sm flex items-center justify-center gap-xs cursor-pointer">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        <span>Lihat Detail</span>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-3 py-xl text-center text-on-surface-variant italic">
                Belum ada data properti yang aktif saat ini.
            </div>
        @endforelse
    </div>
    <!-- Client-side filter no results message -->
    <div id="no-properties-message" class="hidden py-xl text-center text-on-surface-variant italic w-full">
        Tidak ada properti yang cocok dengan kriteria pencarian Anda. Silakan coba filter lain.
    </div>
</section>

<!-- Why Prime Property -->
<section class="bg-surface-container py-xl md:py-[96px] px-md md:px-container-margin">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-xl">
            <h2 class="font-headline-md-mobile text-headline-md-mobile md:font-headline-md md:text-headline-md text-primary mb-sm font-bold">Why Prime Property</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Delivering uncompromising quality and strategic expertise in the luxury real estate market.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
            <!-- Value Prop 1 -->
            <div class="p-lg bg-surface-container-lowest rounded-xl border border-outline/5 hover:-translate-y-1 transition-transform duration-300">
                <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-primary text-[24px]">real_estate_agent</span>
                </div>
                <h3 class="font-title-sm text-title-sm text-primary font-bold mb-xs">Expert Agents</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Industry-leading professionals dedicated to your vision.</p>
            </div>
            <!-- Value Prop 2 -->
            <div class="p-lg bg-surface-container-lowest rounded-xl border border-outline/5 hover:-translate-y-1 transition-transform duration-300">
                <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-primary text-[24px]">gavel</span>
                </div>
                <h3 class="font-title-sm text-title-sm text-primary font-bold mb-xs">Transparent Process</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Clear, honest communication at every step of the transaction.</p>
            </div>
            <!-- Value Prop 3 -->
            <div class="p-lg bg-surface-container-lowest rounded-xl border border-outline/5 hover:-translate-y-1 transition-transform duration-300">
                <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-primary text-[24px]">location_on</span>
                </div>
                <h3 class="font-title-sm text-title-sm text-primary font-bold mb-xs">Prime Locations</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Exclusive access to the most sought-after neighborhoods.</p>
            </div>
            <!-- Value Prop 4 -->
            <div class="p-lg bg-surface-container-lowest rounded-xl border border-outline/5 hover:-translate-y-1 transition-transform duration-300">
                <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center mb-md">
                    <span class="material-symbols-outlined text-primary text-[24px]">trending_up</span>
                </div>
                <h3 class="font-title-sm text-title-sm text-primary font-bold mb-xs">Proven Track Record</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Years of successful acquisitions and satisfied clients.</p>
            </div>
        </div>
    </div>
</section>

@push('modals')
<!-- Public Property Centered Detail Popup Modal -->
<div id="public-drawer-backdrop" class="fixed inset-0 bg-[#1a1c1ca1] backdrop-blur-md z-[100] transition-opacity duration-300 hidden opacity-0 flex items-center justify-center p-md md:p-lg" onclick="closePublicDetailDrawer()">
    <!-- Modal Dialog -->
    <div id="public-detail-drawer" class="relative w-full max-w-2xl bg-white rounded-2xl flex flex-col max-h-[78vh] sm:max-h-[82vh] shadow-2xl border border-[#C9A961]/35 transform scale-95 transition-all duration-300 opacity-0" onclick="event.stopPropagation()">
        <!-- Header -->
        <header class="flex items-center justify-between p-lg border-b border-outline-variant/25 bg-white shrink-0 rounded-t-2xl">
            <div>
                <span class="bg-[#E8F5E9] text-[#1B5E20] border border-[#C8E6C9] px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase hidden shadow-sm" id="detail-drawer-status-available">Tersedia</span>
                <span class="bg-[#FFEBEE] text-[#B71C1C] border border-[#FFCDD2] px-2 py-0.5 rounded text-[10px] font-bold tracking-wider uppercase hidden shadow-sm" id="detail-drawer-status-sold">Terjual</span>
                <h2 class="font-display-lg text-xl md:text-2xl font-bold text-primary mt-sm" id="detail-drawer-name">-</h2>
                <p class="font-body-sm text-body-sm text-on-surface-variant font-semibold mt-xs" id="detail-drawer-group-kawasan">-</p>
            </div>
            <button onclick="closePublicDetailDrawer()" class="p-sm hover:bg-surface-container rounded-full transition-colors group cursor-pointer border-0 bg-transparent flex items-center justify-center">
                <span class="material-symbols-outlined text-on-surface-variant group-hover:text-primary transition-colors text-[24px]">close</span>
            </button>
        </header>

        <!-- Scrollable content -->
        <div class="flex-1 overflow-y-auto p-lg space-y-lg no-scrollbar">
            <!-- Skeleton Loader -->
            <div id="detail-drawer-loader" class="flex flex-col items-center justify-center py-xl gap-md text-on-surface-variant">
                <span class="material-symbols-outlined animate-spin text-[32px] text-secondary">sync</span>
                <span class="font-body-sm">Mengambil spesifikasi lengkap...</span>
            </div>

            <div id="detail-drawer-content" class="hidden space-y-lg text-left">
                <!-- Property Details Section -->
                <div class="bg-surface-container-low p-lg rounded-2xl border border-outline-variant/20 space-y-md">
                    <h3 class="font-title-sm text-[#C9A961] font-bold border-b border-outline-variant/30 pb-xs">Detail Properti</h3>
                    
                    <div class="grid grid-cols-2 gap-y-sm gap-x-md text-on-surface">
                        <div>
                            <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Tipe Properti</span>
                            <span class="font-body-lg font-semibold text-primary block mt-xs" id="detail-spec-tipe">-</span>
                        </div>
                        <div>
                            <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Kode Unit / Kavling</span>
                            <span class="font-body-lg font-semibold text-primary block mt-xs" id="detail-spec-unit">-</span>
                        </div>
                        <div class="col-span-2">
                            <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider">Kawasan / Lokasi</span>
                            <span class="font-body-lg font-semibold text-primary block mt-xs" id="detail-spec-kawasan">-</span>
                        </div>
                    </div>
                </div>

                <!-- Specs Grid Section -->
                <div class="bg-surface-container-low p-lg rounded-2xl border border-outline-variant/20 space-y-md">
                    <h3 class="font-title-sm text-[#C9A961] font-bold border-b border-outline-variant/30 pb-xs">Spesifikasi Fisik</h3>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-md text-on-surface">
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">square_foot</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Luas Tanah</span>
                                <span class="font-body-sm font-bold text-primary block mt-xs" id="detail-spec-luas">-</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">straighten</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Dimensi (L x P)</span>
                                <span class="font-body-sm font-bold text-[#C9A961] block mt-xs" id="detail-spec-dimensi">-</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">layers</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Tingkat Lantai</span>
                                <span class="font-body-sm font-bold text-primary block mt-xs" id="detail-spec-tingkat">-</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">explore</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Hadap Arah</span>
                                <span class="font-body-sm font-bold text-primary block mt-xs" id="detail-spec-hadap">-</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">garage</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Carport</span>
                                <span class="font-body-sm font-bold text-primary block mt-xs" id="detail-spec-carport">-</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-sm p-sm rounded-xl bg-white/40 hover:bg-white hover:shadow-sm border border-[#C9A961]/5 hover:border-[#C9A961]/25 transition-all">
                            <span class="material-symbols-outlined text-secondary text-[22px]">vpn_key</span>
                            <div>
                                <span class="font-label-uppercase text-[9px] text-on-surface-variant/80 tracking-wider block font-semibold">Kondisi Kesiapan</span>
                                <span class="font-body-sm font-bold text-primary block mt-xs" id="detail-spec-siap">-</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Google Maps Section -->
                <div class="space-y-sm hidden" id="detail-maps-container">
                    <span class="font-label-uppercase text-[10px] text-on-surface-variant/80 tracking-wider block font-semibold">Peta Lokasi</span>
                    <a id="detail-spec-maps-link" href="#" target="_blank" class="flex items-center gap-sm px-md py-sm rounded-xl border border-[#C9A961]/35 bg-[#C9A961]/5 text-secondary hover:text-[#5a4302] hover:border-[#C9A961] font-semibold text-body-sm transition-all shadow-sm">
                        <span class="material-symbols-outlined">map</span>
                        <span>Lihat di Google Maps</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <footer class="p-lg border-t border-outline-variant/25 bg-[#F9FAFB] flex flex-col sm:flex-row justify-between items-center shrink-0 gap-md rounded-b-2xl">
            <div class="flex justify-between sm:justify-start items-center gap-md w-full sm:w-auto">
                <span class="font-label-uppercase text-[10px] text-on-surface-variant tracking-wider font-semibold">Harga Penawaran</span>
                <span class="font-display-lg text-xl font-bold text-secondary" id="detail-drawer-price">Rp -</span>
            </div>
            <a id="detail-drawer-reply-btn" href="{{ url('/contact') }}" class="w-full sm:w-auto px-lg py-sm rounded-lg bg-[#C9A961] text-[#1A1A1A] hover:text-white font-bold text-body-sm hover:bg-[#C9A961]/90 transition-all flex items-center justify-center gap-xs shadow-sm">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                <span>Hubungi Kami</span>
            </a>
        </footer>
    </div>
</div>
@endpush

<script>
    function openPublicDetailDrawer(id) {
        const backdrop = document.getElementById('public-drawer-backdrop');
        const modal = document.getElementById('public-detail-drawer');
        const loader = document.getElementById('detail-drawer-loader');
        const content = document.getElementById('detail-drawer-content');
        
        // Show backdrop container in flex mode and loaders
        backdrop.classList.remove('hidden');
        backdrop.classList.add('flex');
        loader.classList.remove('hidden');
        content.classList.add('hidden');
        
        // Prevent background scrolling
        document.body.classList.add('overflow-hidden');
        
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
            modal.classList.remove('scale-95', 'opacity-0');
            modal.classList.add('scale-100', 'opacity-100');
        }, 50);

        // Fetch detail dynamically
        fetch(`/properties/${id}/json`)
            .then(res => {
                if (!res.ok) throw new Error();
                return res.json();
            })
            .then(data => {
                loader.classList.add('hidden');
                content.classList.remove('hidden');

                // Populate data
                document.getElementById('detail-drawer-name').innerText = data.nama_property;
                document.getElementById('detail-drawer-group-kawasan').innerText = 
                    (data.group_name ? data.group_name + ' — ' : '') + 
                    (Array.isArray(data.kawasan) ? data.kawasan.join(', ') : data.kawasan);

                // Status badges
                const availableBadge = document.getElementById('detail-drawer-status-available');
                const soldBadge = document.getElementById('detail-drawer-status-sold');
                if (data.status === 'in stock') {
                    availableBadge.classList.remove('hidden');
                    soldBadge.classList.add('hidden');
                } else {
                    availableBadge.classList.add('hidden');
                    soldBadge.classList.remove('hidden');
                }

                // Specs
                document.getElementById('detail-spec-tipe').innerText = data.tipe;
                document.getElementById('detail-spec-unit').innerText = data.unit || 'Tidak ada kode unit';
                document.getElementById('detail-spec-kawasan').innerText = Array.isArray(data.kawasan) ? data.kawasan.join(', ') : data.kawasan;
                
                document.getElementById('detail-spec-luas').innerText = Math.round(data.lebar * data.panjang) + ' m²';
                document.getElementById('detail-spec-dimensi').innerText = Math.round(data.lebar) + 'm x ' + Math.round(data.panjang) + 'm';
                document.getElementById('detail-spec-tingkat').innerText = Math.round(data.tingkat) + ' Lantai';
                document.getElementById('detail-spec-hadap').innerText = 'Hadap ' + data.hadap;
                document.getElementById('detail-spec-carport').innerText = data.carport ? 'Memiliki Carport' : 'Tidak Ada Carport';
                
                // Siap mapping
                const siapMap = {
                    'siap_huni': 'Siap Huni',
                    'siap_kosong': 'Siap Kosong',
                    'siap_huni_renovasi': 'Siap Huni (Tahap Renovasi)'
                };
                document.getElementById('detail-spec-siap').innerText = siapMap[data.siap] || data.siap;



                // Price
                document.getElementById('detail-drawer-price').innerText = 'Rp ' + Number(data.price).toLocaleString('id-ID');

                // Google Maps
                const mapsContainer = document.getElementById('detail-maps-container');
                const mapsLink = document.getElementById('detail-spec-maps-link');
                if (data.maps_link) {
                    mapsContainer.classList.remove('hidden');
                    mapsLink.href = data.maps_link;
                } else {
                    mapsContainer.classList.add('hidden');
                    mapsLink.href = '#';
                }

                // CTA button prefill contact form
                document.getElementById('detail-drawer-reply-btn').href = `/contact?nama=${encodeURIComponent('Tertarik dengan ' + data.nama_property)}`;
            })
            .catch(() => {
                loader.innerHTML = `
                    <span class="material-symbols-outlined text-error text-[32px]">error</span>
                    <span class="font-body-sm text-error">Gagal memuat spesifikasi properti.</span>
                    <button onclick="openPublicDetailDrawer(${id})" class="mt-sm text-xs font-bold text-secondary uppercase tracking-wider underline">Coba Lagi</button>
                `;
            });
    }

    function closePublicDetailDrawer() {
        const backdrop = document.getElementById('public-drawer-backdrop');
        const modal = document.getElementById('public-detail-drawer');

        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');
        modal.classList.remove('scale-100', 'opacity-100');
        modal.classList.add('scale-95', 'opacity-0');

        // Restore background scrolling
        document.body.classList.remove('overflow-hidden');

        setTimeout(() => {
            backdrop.classList.add('hidden');
            backdrop.classList.remove('flex');
        }, 300);
    }

    // Client-side quick filter logic
    function applyHeroFilter() {
        const selectedKawasan = document.getElementById('filter-kawasan').value;
        const selectedTipe = document.getElementById('filter-tipe').value;
        const selectedPriceMax = document.getElementById('filter-price').value;

        const cards = document.querySelectorAll('.property-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const kawasan = card.getAttribute('data-kawasan') || '';
            const tipe = card.getAttribute('data-tipe') || '';
            const price = parseFloat(card.getAttribute('data-price') || '0');

            let match = true;

            // Kawasan filter
            if (selectedKawasan && selectedKawasan !== 'semua') {
                if (!kawasan.toLowerCase().includes(selectedKawasan.toLowerCase())) {
                    match = false;
                }
            }

            // Tipe filter
            if (selectedTipe && selectedTipe !== 'semua') {
                if (tipe.toLowerCase() !== selectedTipe.toLowerCase()) {
                    match = false;
                }
            }

            // Price filter
            if (selectedPriceMax && selectedPriceMax !== 'semua') {
                const priceLimit = parseFloat(selectedPriceMax);
                if (price > priceLimit) {
                    match = false;
                }
            }

            if (match) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        const noMsg = document.getElementById('no-properties-message');
        if (visibleCount === 0) {
            if (noMsg) noMsg.classList.remove('hidden');
        } else {
            if (noMsg) noMsg.classList.add('hidden');
        }

        // Smooth scroll to featured properties section
        const targetSection = document.getElementById('featured-properties');
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
@endsection
