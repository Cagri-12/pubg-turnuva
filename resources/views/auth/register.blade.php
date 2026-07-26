<x-guest-layout>

<div style="text-align:center;margin-bottom:30px;">

    <h2 style="
        color:white;
        font-size:32px;
        font-weight:bold;
        margin-bottom:10px;
    ">
        👤 Hesap Oluştur
    </h2>

    <p style="color:#cbd5e1;">
        Turnuvalara katılmak için ücretsiz hesabınızı oluşturun.
    </p>

</div>

<form method="POST" action="{{ route('register') }}">

    @csrf

    <div>

        <x-input-label for="name" value="👤 Ad Soyad" />

        <x-text-input
            id="name"
            class="block mt-2 w-full"
            type="text"
            name="name"
            :value="old('name')"
            required
            autofocus
            autocomplete="name" />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />

    </div>

    <div class="mt-5">

        <x-input-label for="email" value="📧 E-Posta" />

        <x-text-input
            id="email"
            class="block mt-2 w-full"
            type="email"
            name="email"
            :value="old('email')"
            required
            autocomplete="username" />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />

    </div>

    <div class="mt-5">

        <x-input-label for="password" value="🔒 Şifre" />

        <x-text-input
            id="password"
            class="block mt-2 w-full"
            type="password"
            name="password"
            required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

    </div>

    <div class="mt-5">

        <x-input-label for="password_confirmation" value="🔒 Şifre Tekrar" />

        <x-text-input
            id="password_confirmation"
            class="block mt-2 w-full"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

    </div>

    <div class="flex items-center justify-between mt-8">

        <a
            href="{{ route('login') }}"
            style="
                color:#a78bfa;
                text-decoration:none;
                font-weight:600;
            ">

            Zaten hesabın var mı?

        </a>

        <button
            type="submit"
            style="
                background:linear-gradient(135deg,#7c3aed,#4f46e5);
                color:white;
                border:none;
                padding:12px 28px;
                border-radius:12px;
                font-weight:bold;
                cursor:pointer;
                transition:.3s;
            ">

            🚀 Hesap Oluştur

        </button>

    </div>

</form>

</x-guest-layout>