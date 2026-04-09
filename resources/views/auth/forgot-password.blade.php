<x-guest-layout>
    <div class="glass-panel rounded-3xl p-8 sm:p-10 lg:p-12 relative" x-data="{ submitting: false }">

        {{-- Logo --}}
        <div class="text-center mb-8 lg:mb-10">
            <a href="/" class="inline-block">
                <h1 class="text-4xl lg:text-5xl font-black tracking-tight" style="color: var(--maroon);">
                    jalan.in
                </h1>
            </a>
        </div>

        {{-- Welcome Text --}}
        <div class="mb-8 lg:mb-10">
            <h2 class="text-xl lg:text-2xl font-bold text-gray-800 mb-2">
                Lupa kata sandi?
            </h2>
            <p class="text-sm lg:text-base text-gray-500 leading-relaxed">
                Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.
            </p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert-success mb-6">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" x-on:submit="submitting = true">
            @csrf

            {{-- Email Field --}}
            <div class="mb-8 lg:mb-10">
                <label for="email" class="label-antigravity block mb-2">
                    EMAIL
                </label>
                <div class="input-group">
                    <div class="input-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4"/>
                            <path d="M16 8v5a3 3 0 006 0v-1a10 10 0 10-3.92 7.94"/>
                        </svg>
                    </div>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@integrity.org"
                        required
                        autofocus
                        class="input-antigravity w-full"
                    >
                </div>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="btn-maroon"
                :disabled="submitting"
            >
                <span x-show="!submitting">Kirim Tautan Reset</span>
                <span x-show="submitting" x-cloak>Mengirim...</span>

                <svg x-show="!submitting" class="arrow-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>

                <svg x-show="submitting" x-cloak class="animate-spin" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
            </button>
        </form>

        {{-- Back to Login --}}
        <div class="text-center mt-8 lg:mt-10">
            <p class="text-sm text-gray-500">
                Ingat kata sandi?
                <a href="{{ route('login') }}" class="link-maroon ml-1">
                    Kembali ke Login
                </a>
            </p>
        </div>

    </div>
</x-guest-layout>
