@extends('layouts.admin')

@section('content')
    {{-- Page Header --}}
    <div style="margin-bottom: 32px;">
        <h1 class="page-title">Menambahkan Operator</h1>
        <p class="page-subtitle">Buat profil layanan baru dan tetapkan batasan wilayah.</p>
    </div>

    {{-- Form Card --}}
    <div class="admin-card" style="max-width: 820px;">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                {{-- Full Name --}}
                <div>
                    <label for="name" class="admin-label">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="admin-input"
                        placeholder="e.g. Budi Santoso"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Address --}}
                <div>
                    <label for="email" class="admin-label">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="admin-input"
                        placeholder="budi.s@jalan.gov.id"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="admin-label">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="admin-input"
                        placeholder="Minimal 8 karakter"
                        required
                    >
                    @error('password')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Select Region --}}
                <div>
                    <label for="region" class="admin-label">Select Region</label>
                    <div style="position: relative;">
                        <input
                            type="text"
                            id="region"
                            name="region"
                            class="admin-input"
                            placeholder="Central Jakarta"
                            value="{{ old('region') }}"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18" style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); color: #b8a0a5; pointer-events: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    @error('region')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Action Buttons --}}
            <div style="display: flex; justify-content: flex-end; align-items: center; gap: 16px; margin-top: 48px;">
                <a href="{{ route('admin.users.index') }}" class="btn-admin-secondary">Batal</a>
                <button type="submit" class="btn-admin-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    Tambahkan
                </button>
            </div>
        </form>
    </div>
@endsection
