<x-app-layout>

<x-slot name="header">

<div class="admin-hero">

    <h2 class="section-title stats-title">
        👥 Kullanıcı Yönetimi
    </h2>

    <p class="stats-subtitle">
        Sistemde kayıtlı kullanıcıları buradan yönetebilirsiniz.
    </p>

</div>

</x-slot>

<div class="admin-container">

<div class="page-card dark-card">

    @if(session('success'))
        <div style="background:#16a34a;color:white;padding:15px;border-radius:10px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#dc2626;color:white;padding:15px;border-radius:10px;margin-bottom:20px;">
            {{ session('error') }}
        </div>
    @endif

    <table style="width:100%;border-collapse:collapse;">

        <tr style="background:#4f46e5;color:white;">

            <th style="padding:15px;">ID</th>
            <th>Ad Soyad</th>
            <th>Email</th>
            <th>Yetki</th>
            <th>İşlem</th>

        </tr>

        @foreach($users as $user)

        <tr style="text-align:center;border-bottom:1px solid #ddd;">

            <td>{{ $user->id }}</td>

            <td>{{ $user->name }}</td>

            <td>{{ $user->email }}</td>

            <td>

                @if($user->is_admin)

                    👑 Admin

                @else

                    👤 Oyuncu

                @endif

            </td>

            <td>

                @if($user->id != auth()->id())

                <form action="{{ route('users.toggle',$user->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf

                    <button
                        style="background:#2563eb;color:white;border:none;padding:8px 15px;border-radius:8px;cursor:pointer;">

                        {{ $user->is_admin ? 'Oyuncu Yap' : 'Admin Yap' }}

                    </button>

                </form>

                <form action="{{ route('users.destroy',$user->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Bu kullanıcı silinsin mi?')"
                        style="background:#dc2626;color:white;border:none;padding:8px 15px;border-radius:8px;cursor:pointer;">

                        Sil

                    </button>

                </form>

                @else

                    <span style="color:#16a34a;font-weight:bold;">
                        Kendi Hesabın
                    </span>

                @endif

            </td>

        </tr>

        @endforeach

    </table>

</div>

</div>

</x-app-layout>