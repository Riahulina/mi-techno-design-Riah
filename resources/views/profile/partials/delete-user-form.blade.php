<section class="space-y-6">
    <header class="text-center">
        <h2 class="text-2xl font-bold text-red-700 tracking-tight">
            ⚠️ {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-3 text-gray-600 text-sm leading-relaxed max-w-2xl mx-auto">
            {{ __('Setelah akun kamu dihapus, semua data dan sumber daya akan dihapus secara permanen. Pastikan kamu sudah mencadangkan data penting sebelum melanjutkan.') }}
        </p>
    </header>

    {{-- Tombol Trigger --}}
    <div class="flex justify-center">
        <button
            type="button"
            class="px-6 py-2.5 bg-gradient-to-r from-red-500 to-rose-600 text-white font-medium text-sm rounded-xl shadow-md hover:from-red-600 hover:to-rose-700 hover:shadow-lg transition-all duration-200"
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            🗑️ {{ __('Hapus Akun Saya') }}
        </button>
    </div>

    {{-- Modal Konfirmasi --}}
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-2xl">
            @csrf
            @method('delete')

            <h3 class="text-lg font-semibold text-gray-800 mb-2 text-center">
                Apakah kamu yakin ingin menghapus akun ini?
            </h3>
            <p class="text-sm text-gray-500 mb-6 text-center">
                Aksi ini <span class="font-semibold text-red-600">tidak dapat dibatalkan</span>.  
                Masukkan password untuk konfirmasi.
            </p>

            {{-- Input Password --}}
            <div class="mb-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full rounded-lg border-gray-300 focus:border-red-500 focus:ring-red-500 px-4 py-2 text-sm"
                    placeholder="{{ __('Masukkan Password Kamu') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-center" />
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-center gap-4">
                <button 
                    type="button" 
                    class="px-5 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition"
                    x-on:click="$dispatch('close')"
                >
                    ❌ {{ __('Batal') }}
                </button>

                <button 
                    type="submit"
                    class="px-5 py-2 bg-gradient-to-r from-red-600 to-rose-700 text-white text-sm font-medium rounded-lg shadow hover:from-red-700 hover:to-rose-800 transition-all"
                >
                    🔥 {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
