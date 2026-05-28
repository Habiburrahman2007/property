@extends('layouts.app')

@section('title', 'About Us - Prime Property')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-md md:px-container-margin pt-xl pb-container-margin">
    <div class="max-w-2xl">
        <h1 class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-display-lg text-primary mb-md font-bold leading-tight">
            Mendefinisikan Ulang Keanggunan.
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
            Lebih dari sekadar agen, kami adalah kurator ruang hidup eksklusif. Kami menghubungkan individu bernilai tinggi dengan properti paling prestisius melalui standar profesionalisme tanpa kompromi.
        </p>
    </div>
</section>

<!-- Two Column Vision/Mission/Values Section -->
<section class="max-w-7xl mx-auto px-md md:px-container-margin pb-container-margin">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-container-margin items-center">
        <!-- Left Column: Imagery -->
        <div class="relative h-[600px] w-full rounded-xl overflow-hidden bg-surface-container-high border border-primary/5 shadow-md">
            <img alt="Luxury property interior" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAY9V8lKnvlZBBMV9PFN81cklOTfxgiI56tiHmkQn2j6Jup8cVgRM9r_o-1_gpum_JpZi17zdtYKwDFYLi8Mor8cz074q8zb58I8s7Cbdq34yu16rRA6iNlVaX0Qx8-52jwf0SIwkJ76nTYHU0eA4RC0xwkRtP0f1TY4gNgAGZLYOizh7wHi79eXE8Zm0YL15SUgwHa6G95Kkij7tdRbB_AlYLhBwKSYW3782RSGXh5WiGicio36WKy-0ORaE2T4wDJ5itUVwhkFtQ"/>
        </div>
        <!-- Right Column: Content -->
        <div class="flex flex-col gap-xl">
            <!-- Vision -->
            <div class="border-b border-outline-variant/30 pb-lg">
                <h2 class="font-label-uppercase text-label-uppercase text-secondary mb-sm tracking-widest font-bold">
                    Visi
                </h2>
                <p class="font-headline-md-mobile text-headline-md-mobile md:font-headline-md md:text-headline-md text-primary font-bold leading-snug">
                    Menjadi partner properti terpercaya di kawasan premium, memberikan standar layanan kelas dunia dan portofolio eksklusif yang tidak tertandingi.
                </p>
            </div>
            <!-- Mission -->
            <div class="border-b border-outline-variant/30 pb-lg">
                <h2 class="font-label-uppercase text-label-uppercase text-secondary mb-sm tracking-widest font-bold">
                    Misi
                </h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                    Memberikan pelayanan properti unggul melalui keahlian pasar yang mendalam, transparansi penuh, dan dedikasi tanpa kompromi untuk melampaui ekspektasi klien di setiap transaksi. Kami membangun kepercayaan melalui presisi dan keunggulan operasional.
                </p>
            </div>
            <!-- Values -->
            <div>
                <h2 class="font-label-uppercase text-label-uppercase text-secondary mb-md tracking-widest font-bold">
                    Nilai Inti
                </h2>
                <div class="flex flex-col gap-sm">
                    <div class="flex items-center gap-md">
                        <span class="material-symbols-outlined text-primary text-xl font-bold">done</span>
                        <span class="font-title-sm text-title-sm text-primary font-medium">Integritas</span>
                    </div>
                    <div class="flex items-center gap-md">
                        <span class="material-symbols-outlined text-primary text-xl font-bold">done</span>
                        <span class="font-title-sm text-title-sm text-primary font-medium">Profesionalisme</span>
                    </div>
                    <div class="flex items-center gap-md">
                        <span class="material-symbols-outlined text-primary text-xl font-bold">done</span>
                        <span class="font-title-sm text-title-sm text-primary font-medium">Inovasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
