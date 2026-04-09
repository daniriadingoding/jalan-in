<x-guest-layout>
    <div class="glass-panel rounded-3xl p-8 sm:p-10 lg:p-12 relative" x-data="{
        submitting: false,
        showPassword: false,
        emailFocused: false,
        passFocused: false,
    }">

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
                Selamat datang kembali
            </h2>
            <p class="text-sm lg:text-base text-gray-500 leading-relaxed">
                Masuk ke akun Anda untuk lanjut melaporkan dan memperbaiki infrastruktur jalan kita.
            </p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert-success mb-6">
                {{ session('status') }}
            </div>
        @endif

        {{-- Server Error --}}
        @if ($errors->has('email') && $errors->first('email') === __('auth.failed'))
            <div class="alert-error mb-6">
                Kombinasi email dan kata sandi salah. Silakan coba lagi.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" x-on:submit="submitting = true">
            @csrf

            {{-- Email Field --}}
            <div class="mb-6 lg:mb-8">
                <label for="email" class="label-antigravity block mb-2">
                    EMAIL
                </label>
                <div class="input-group">
                    {{-- @ Icon --}}
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
                        placeholder="Masukkan Email Anda"
                        required
                        autofocus
                        autocomplete="username"
                        class="input-antigravity w-full"
                        x-on:focus="emailFocused = true"
                        x-on:blur="emailFocused = false"
                    >
                </div>
                @error('email')
                    @if ($message !== __('auth.failed'))
                        <p class="error-message">{{ $message }}</p>
                    @endif
                @enderror
            </div>

            {{-- Password Field --}}
            <div class="mb-8 lg:mb-10">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="label-antigravity">
                        KATA SANDI
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link-maroon text-xs lg:text-sm">
                            Lupa Kata Sandi?
                        </a>
                    @endif
                </div>
                <div class="input-group">
                    {{-- Lock Icon --}}
                    <div class="input-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4"/>
                        </svg>
                    </div>
                    <input
                        id="password"
                        :type="showPassword ? 'text' : 'password'"
                        name="password"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                        class="input-antigravity w-full"
                        x-on:focus="passFocused = true"
                        x-on:blur="passFocused = false"
                    >
                    {{-- Toggle Password Visibility --}}
                    <button
                        type="button"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors z-10"
                        x-on:click="showPassword = !showPassword"
                        tabindex="-1"
                    >
                        <svg x-show="!showPassword" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg x-show="showPassword" x-cloak width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center mb-8">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="w-4 h-4 rounded border-gray-300 focus:ring-2 focus:ring-offset-0"
                    style="color: var(--maroon); --tw-ring-color: rgba(107,29,42,0.3);"
                >
                <label for="remember_me" class="ml-2.5 text-sm text-gray-500 select-none cursor-pointer">
                    Ingat saya
                </label>
            </div>

            {{-- Submit Button --}}
            <button
                type="submit"
                class="btn-maroon"
                :disabled="submitting"
            >
                <span x-show="!submitting">Masuk</span>
                <span x-show="submitting" x-cloak>Masuk...</span>

                {{-- Arrow Icon --}}
                <svg x-show="!submitting" class="arrow-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>

                {{-- Loading Spinner --}}
                <svg x-show="submitting" x-cloak class="animate-spin" width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                </svg>
            </button>
        </form>

        {{-- Register Link --}}
        <div class="text-center mt-8 lg:mt-10">
            <p class="text-sm text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="link-maroon ml-1">
                    Daftar
                </a>
            </p>
        </div>

    </div>
</x-guest-layout>
