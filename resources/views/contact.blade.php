@extends('layouts.app')

@section('title', 'Contact Us - Prime Property')

@section('content')
<div class="w-full max-w-7xl mx-auto px-md md:px-container-margin py-xl md:py-24">
    <!-- Header Title -->
    <div class="mb-xl md:mb-24 text-center md:text-left">
        <h1 class="font-display-lg-mobile text-display-lg-mobile md:font-display-lg md:text-display-lg text-primary mb-sm font-bold">
            Get in Touch
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            Connect with our dedicated team of real estate professionals to discover your next premium property in Jakarta.
        </p>
    </div>

    <!-- Contact details & Form grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl md:gap-container-margin">
        <!-- Contact Info & Map Column -->
        <div class="lg:col-span-5 flex flex-col gap-xl">
            <!-- Office details Card -->
            <div class="bg-surface-container-lowest p-md md:p-xl border border-outline-variant/30 rounded-lg flex flex-col gap-lg shadow-sm">
                <h2 class="font-title-sm text-title-sm text-primary border-b border-outline-variant/50 pb-sm font-semibold">
                    Head Office
                </h2>
                <div class="flex items-start gap-md group">
                    <span class="material-symbols-outlined text-secondary-container group-hover:text-secondary transition-colors text-[24px]">location_on</span>
                    <div>
                        <p class="font-label-uppercase text-label-uppercase text-on-surface-variant mb-xs font-bold">Address</p>
                        <p class="font-body-lg text-body-lg text-primary leading-relaxed">Jl. Sudirman No. 123<br/>Jakarta, Indonesia</p>
                    </div>
                </div>
                <div class="flex items-start gap-md group">
                    <span class="material-symbols-outlined text-secondary-container group-hover:text-secondary transition-colors text-[24px]">call</span>
                    <div>
                        <p class="font-label-uppercase text-label-uppercase text-on-surface-variant mb-xs font-bold">Phone</p>
                        <a class="font-body-lg text-body-lg text-primary hover:text-secondary transition-colors" href="tel:+622155551234">+62 21 5555 1234</a>
                    </div>
                </div>
                <div class="flex items-start gap-md group">
                    <span class="material-symbols-outlined text-secondary-container group-hover:text-secondary transition-colors text-[24px]">mail</span>
                    <div>
                        <p class="font-label-uppercase text-label-uppercase text-on-surface-variant mb-xs font-bold">Email</p>
                        <a class="font-body-lg text-body-lg text-primary hover:text-secondary transition-colors" href="mailto:info@primeproperty.co.id">info@primeproperty.co.id</a>
                    </div>
                </div>
                <div class="pt-sm border-t border-outline-variant/50">
                    <a class="inline-flex items-center gap-sm text-primary hover:text-secondary font-label-uppercase text-label-uppercase transition-colors font-bold" href="https://wa.me/62812345678" target="_blank">
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                        Message via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Map illustration -->
            <div class="h-64 md:h-80 w-full rounded-lg overflow-hidden border border-outline-variant/30 relative bg-surface-container shadow-sm">
                <img alt="Map" class="w-full h-full object-cover grayscale opacity-80" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtKTBS6nof1Pshq-_fvJVQg99bJfHErZUjSK83LSA-EjvdWr022Ig29DbahsZvamQK0So6-EzOcffY8FtY_M7uaKGPXNccUGny9lxhcdLoiaJC6ft8fM8daTqCBbDTI8J3wJmz19ZrJKhDXF-e5_UcNIh035YLq--CoeeqB3nOtzHrjQ9sIEdYdXpJBe7DdkXuj7Oe72aj2c5DseFoLRyUNav8Bmdl9cWlm8MVFE7n9Slc5hHEWUW_8CNUFx-K7woSpgM-yg65a-s"/>
                <div class="absolute bottom-4 left-4 bg-surface-container-lowest px-md py-sm shadow-[0_4px_24px_rgba(0,0,0,0.1)] rounded font-semibold text-primary">
                    <p class="font-label-uppercase text-label-uppercase">Prime Property Office</p>
                </div>
            </div>
        </div>

        <!-- Form Column -->
        <div class="lg:col-span-7 bg-surface-container-lowest p-md md:p-container-margin border border-outline-variant/20 shadow-[0_8px_32px_rgba(0,0,0,0.02)] rounded-lg">
            
            <!-- Validation & Rate Limit Errors -->
            @if($errors->any())
                <div class="bg-red-50 text-error border border-red-200 p-md rounded-xl shadow-sm text-body-sm font-semibold flex flex-col gap-xs mb-lg">
                    @foreach($errors->all() as $error)
                        <div class="flex items-center gap-xs">
                            <span class="material-symbols-outlined text-error text-[18px]">error</span>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/contact') }}" method="POST" class="flex flex-col gap-xl">
                @csrf
                <div class="flex flex-col gap-2">
                    <label class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold" for="nama">Nama Lengkap</label>
                    <input class="luxury-input w-full bg-surface text-primary font-body-lg text-body-lg px-0 py-sm border-0 border-b border-outline focus:border-primary focus:ring-0 transition-colors placeholder:text-outline-variant" id="nama" name="nama" placeholder="John Doe" required type="text" value="{{ old('nama') }}"/>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                    <div class="flex flex-col gap-2">
                        <label class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold" for="email">Alamat Email</label>
                        <input class="luxury-input w-full bg-surface text-primary font-body-lg text-body-lg px-0 py-sm border-0 border-b border-outline focus:border-primary focus:ring-0 transition-colors placeholder:text-outline-variant" id="email" name="email" placeholder="john@example.com" required type="email" value="{{ old('email') }}"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold" for="phone">Nomor HP</label>
                        <input class="luxury-input w-full bg-surface text-primary font-body-lg text-body-lg px-0 py-sm border-0 border-b border-outline focus:border-primary focus:ring-0 transition-colors placeholder:text-outline-variant" id="phone" name="phone" pattern="[0-9]{10,13}" placeholder="0812345678" required title="Please enter a valid phone number (10 to 13 digits)" type="tel" value="{{ old('phone') }}"/>
                        <span class="font-body-sm text-body-sm text-outline-variant mt-1">Format: 10-13 digits (e.g. 0812345678)</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="font-label-uppercase text-label-uppercase text-on-surface-variant font-bold" for="pesan">Pesan</label>
                    <textarea class="luxury-input w-full bg-surface text-primary font-body-lg text-body-lg px-0 py-sm border-0 border-b border-outline focus:border-primary focus:ring-0 transition-colors placeholder:text-outline-variant resize-none" id="pesan" name="pesan" placeholder="How can we assist you with your property journey?" required rows="4">{{ old('pesan') }}</textarea>
                </div>
                <div class="mt-md flex justify-end">
                    <button class="bg-secondary-container text-primary font-label-uppercase text-label-uppercase px-xl py-md rounded hover:bg-secondary hover:text-on-secondary transition-all duration-300 flex items-center gap-2 font-bold shadow-md hover:shadow-lg active:scale-95 transform" type="submit">
                        Send Message
                        <span class="material-symbols-outlined text-[18px] font-bold">arrow_forward</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Toast Notification Container -->
<div id="toast-container" class="fixed top-md right-md z-[200] flex flex-col gap-sm pointer-events-none max-w-sm w-full"></div>

<script>
    // Lightweight interaction for inputs to add a subtle active class to parent if needed
    document.querySelectorAll('input, textarea').forEach(element => {
        element.addEventListener('focus', (e) => {
            e.target.parentElement.classList.add('opacity-100');
        });
        element.addEventListener('blur', (e) => {
            e.target.parentElement.classList.remove('opacity-100');
        });
    });

    // Toast Notification implementation (reused from dashboard)
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
            <div class="flex-1 font-body-sm font-semibold pr-lg text-left">${message}</div>
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
</script>

@if(session('success_message'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            showToast("{{ session('success_message') }}", 'success');
        });
    </script>
@endif
@endsection
