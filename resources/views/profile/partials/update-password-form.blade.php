<section>

    <header style="margin-bottom:30px;">

        <h2 style="
            font-size:26px;
            font-weight:bold;
            color:white;
        ">
            🔒 Şifre Değiştir
        </h2>

        <p style="
            margin-top:10px;
            color:#cbd5e1;
        ">
            Hesabınızın güvenliği için güçlü ve benzersiz bir şifre kullanmanız önerilir.
        </p>

    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">

        @csrf
        @method('PUT')

        <div>

            <label
    for="update_password_current_password"
    style="
        display:block;
        margin-bottom:8px;
        color:#ffffff;
        font-weight:600;
    "
>
    🔑 Mevcut Şifre
</label>

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />

        </div>

        <div>

            <label
    for="update_password_password"
    style="
        display:block;
        margin-bottom:8px;
        color:#ffffff;
        font-weight:600;
    "
>
    🆕 Yeni Şifre
</label>

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />

        </div>

        <div>

            <label
    for="update_password_password_confirmation"
    style="
        display:block;
        margin-bottom:8px;
        color:#ffffff;
        font-weight:600;
    "
>
    ✅ Yeni Şifre Tekrar
</label>

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>
                🔒 Şifreyi Güncelle
            </x-primary-button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show:true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(()=>show=false,2000)"
                    style="color:#22c55e;"
                >
                    ✔ Şifreniz güncellendi.
                </p>

            @endif

        </div>

    </form>

</section>