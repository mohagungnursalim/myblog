<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <a href="/">
                    <img  src="{{ asset('/img/logonavbartdc.png') }}" width="160px">
                </a>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirim email kepada Anda tautan pengaturan ulang kata sandi yang memungkinkan Anda mengganti yang baru.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Kirim Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
