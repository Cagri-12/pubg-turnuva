<section>

    <header style="margin-bottom:30px;">

        <h2 style="
            font-size:26px;
            font-weight:bold;
            color:white;
        ">
            👤 Profil Bilgileri
        </h2>

        <p style="
            margin-top:10px;
            color:#cbd5e1;
        ">
            Kullanıcı adınızı ve e-posta adresinizi buradan güncelleyebilirsiniz.
        </p>

    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">

        @csrf
        @method('PATCH')

        <div>

            <x-input-label
                for="name"
                value="👤 Kullanıcı Adı"
                class="!text-white"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>

        <div>

            <x-input-label
                for="email"
                value="📧 E-Posta"
                class="!text-white"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div style="margin-top:15px;">

                    <p style="color:#cbd5e1;">

                        E-posta adresiniz henüz doğrulanmamış.

                        <button
                            form="send-verification"
                            style="
                                color:#a78bfa;
                                text-decoration:underline;
                                background:none;
                                border:none;
                                cursor:pointer;
                            "
                        >
                            Tekrar doğrulama e-postası gönder.
                        </button>

                    </p>

                    @if (session('status') === 'verification-link-sent')

                        <p style="
                            color:#22c55e;
                            margin-top:10px;
                        ">
                            ✅ Doğrulama bağlantısı tekrar gönderildi.
                        </p>

                    @endif

                </div>

            @endif

        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>
                💾 Bilgileri Kaydet
            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show:true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(()=>show=false,2000)"
                    style="color:#22c55e;"
                >
                    ✔ Kaydedildi
                </p>

            @endif

        </div>

    </form>

</section>