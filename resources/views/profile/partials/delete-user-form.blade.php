<section class="space-y-6">

    <header>

        <h2 style="
            font-size:26px;
            font-weight:bold;
            color:#ef4444;
        ">
            🗑️ Hesabı Sil
        </h2>

        <p style="
            margin-top:10px;
            color:#cbd5e1;
            line-height:1.7;
        ">
            Hesabınızı sildiğinizde tüm bilgileriniz, kayıtlarınız ve ilişkili verileriniz kalıcı olarak silinir.
            <br><br>
            <strong style="color:#f87171;">
                ⚠️ Bu işlem geri alınamaz.
            </strong>
        </p>

    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="!bg-red-600 hover:!bg-red-700"
    >
        🗑️ Hesabımı Sil
    </x-danger-button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >

        <form method="POST" action="{{ route('profile.destroy') }}" class="p-6">

            @csrf
            @method('DELETE')

            <h2 style="
                font-size:24px;
                font-weight:bold;
                color:#ef4444;
            ">
                ⚠️ Hesabı Silmeyi Onayla
            </h2>

            <p style="
                margin-top:15px;
                color:#475569;
                line-height:1.7;
            ">
                Hesabınızı kalıcı olarak silmek üzeresiniz.
                Bu işlemi onaylamak için lütfen mevcut şifrenizi girin.
            </p>

            <div class="mt-6">

                <x-input-label
                    for="password"
                    value="🔑 Şifreniz"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full"
                    placeholder="Şifrenizi giriniz"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />

            </div>

            <div class="mt-6 flex justify-end gap-3">

                <x-secondary-button x-on:click="$dispatch('close')">
                    Vazgeç
                </x-secondary-button>

                <x-danger-button>
                    🗑️ Hesabı Sil
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>