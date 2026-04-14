@extends('layouts.admin')

@section('content')
    {{-- Search Bar --}}
    <div style="margin-bottom: 24px;">
        <div style="position: relative; max-width: 360px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #b8a0a5;">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" placeholder="Cari anggota..." class="admin-input" style="padding-left: 42px;" id="searchInput">
        </div>
    </div>

    {{-- Page Header --}}
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 32px;">
        <div>
            <h1 class="page-title">Pengelolaan Pengguna</h1>
            <p class="page-subtitle">Mengelola hak akses administratif, akun operator, dan tingkat akses sistem untuk infrastruktur pemantauan jalan.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn-admin-primary" style="white-space: nowrap;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Operator Baru
        </a>
    </div>

    {{-- Stats Cards --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px;">
        {{-- Total Pengguna Aktif --}}
        <div class="stat-card">
            <div>
                <p class="stat-label">Total Pengguna Aktif</p>
                <p class="stat-value">{{ $totalUsers ?? 0 }}</p>
                <p class="stat-footer">{{ $userPercentage ?? '98' }}% dari total kapasitas</p>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
            </div>
        </div>

        {{-- Super Admin --}}
        <div class="stat-card">
            <div>
                <p class="stat-label">Super Admin</p>
                <p class="stat-value">{{ $totalAdmins ?? 0 }}</p>
                <p class="stat-footer">Pengawas sistem</p>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
            </div>
        </div>

        {{-- Operator --}}
        <div class="stat-card">
            <div>
                <p class="stat-label">Operator</p>
                <p class="stat-value">{{ $totalOperators ?? 0 }}</p>
                <p class="stat-footer">Staf Lapangan & NOC</p>
            </div>
            <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Users Table --}}
    <div class="admin-card" style="margin-bottom: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 class="section-title">Pengguna</h2>
            <div style="display: flex; gap: 8px;">
                <div class="filter-pill active">Filter: All Peran</div>
                <div class="filter-pill">Urutkan: Terbaru</div>
            </div>
        </div>

        <table class="admin-table" id="usersTable">
            <thead>
                <tr>
                    <th>Avatar dan Nama</th>
                    <th>Alamat Email</th>
                    <th>Peran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users ?? [] as $user)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div class="user-avatar">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: #1a1a1a;">{{ $user->name }}</div>
                                    <div style="font-size: 0.7rem; color: #9ca3af;">Joined {{ $user->created_at?->format('M Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="color: #6b7280;">{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge badge-maroon">ADMIN</span>
                            @elseif($user->role === 'operator')
                                <span class="badge badge-neutral" style="border: 1px solid #d1d5db;">OPERATOR</span>
                            @else
                                <span class="badge badge-neutral">USER</span>
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 6px;">
                                <span class="status-dot {{ $user->email_verified_at ? 'online' : 'offline' }}"></span>
                                <span style="font-size: 0.8rem; color: {{ $user->email_verified_at ? '#374151' : '#9ca3af' }};">
                                    {{ $user->email_verified_at ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; gap: 4px;">
                                {{-- Edit Button --}}
                                <button class="action-btn" title="Edit pengguna">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>

                                {{-- Toggle Status / Ban --}}
                                @if($user->role !== 'admin')
                                    @if($user->email_verified_at)
                                        <button class="action-btn" title="Nonaktifkan pengguna">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                            </svg>
                                        </button>
                                    @else
                                        <button class="action-btn" title="Aktifkan pengguna" style="color: #22c55e;">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: #9ca3af;">
                            Belum ada pengguna terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 16px; border-top: 1px solid rgba(107, 29, 42, 0.04);">
            <p style="font-size: 0.8rem; color: #9ca3af;">
                Showing {{ $users?->firstItem() ?? 0 }} of {{ $users?->total() ?? 0 }} users
            </p>
            <div style="display: flex; gap: 8px;">
                @if ($users?->previousPageUrl())
                    <a href="{{ $users->previousPageUrl() }}" class="pagination-btn prev">Sebelumnya</a>
                @endif
                @if ($users?->nextPageUrl())
                    <a href="{{ $users->nextPageUrl() }}" class="pagination-btn next">Selanjutnya</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Role Hierarchy Info --}}
    <div class="info-panel">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20" style="color: var(--maroon, #6B1D2A);">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
            <h3 style="font-size: 0.95rem; font-weight: 700; color: var(--maroon, #6B1D2A);">Hierarki Peran</h3>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">
            <div style="display: flex; align-items: flex-start; gap: 12px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--maroon, #6B1D2A) 0%, #8B2E3B 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </div>
                <div>
                    <h4 style="font-weight: 600; font-size: 0.875rem; color: #1a1a1a;">Super Admin</h4>
                    <p style="font-size: 0.8rem; color: #9ca3af; margin-top: 2px;">Full access to security settings, billing, and user management. Cannot view road reports directly but manages the personnel who do.</p>
                </div>
            </div>

            <div style="display: flex; align-items: flex-start; gap: 12px;">
                <div style="width: 32px; height: 32px; border-radius: 50%; background: #f3f4f6; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#6b7280" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.049.58.025 1.193-.14 1.743" />
                    </svg>
                </div>
                <div>
                    <h4 style="font-weight: 600; font-size: 0.875rem; color: #1a1a1a;">Operator</h4>
                    <p style="font-size: 0.8rem; color: #9ca3af; margin-top: 2px;">Managed via this dashboard. Limited access to system parameters and field data visualization tools only.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Search Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function(e) {
                    const query = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#usersTable tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(query) ? '' : 'none';
                    });
                });
            }
        });
    </script>
@endsection
