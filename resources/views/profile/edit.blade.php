<x-app-layout>

    <div style="
        max-width:1100px;
        margin:30px auto;
        background:linear-gradient(135deg,#6d28d9,#4f46e5);
        border-radius:18px;
        padding:35px;
        color:white;
        box-shadow:0 10px 25px rgba(0,0,0,.25);
    ">

        <h1 style="margin:0;font-size:34px;font-weight:bold;">
            👤 Profilim
        </h1>

        <p style="margin-top:12px;color:#ddd6fe;">
            Hesap bilgilerinizi, şifrenizi ve güvenlik ayarlarınızı buradan yönetebilirsiniz.
        </p>

    </div>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-6 bg-gray-900 border border-gray-700 shadow-lg rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 bg-gray-900 border border-gray-700 shadow-lg rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 bg-gray-900 border border-red-700 shadow-lg rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>

    </div>

</x-app-layout>