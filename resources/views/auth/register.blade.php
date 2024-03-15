<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="login__header">
            <p class="login__header--text">Register</p>
            
        </div>
        <!-- Name -->
        <div class="name__contents top__contents">
            <i class="fa-solid fa-user"></i>
            <x-text-input id="name" class="login__name" type="text" name="name" :value="old('name')" placeholder="UserName" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="email__contents">
            <i class="fa-solid fa-envelope"></i>
            <x-text-input id="email" class="login__email" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div  class="pass__contents">
            <i class="fa-solid fa-lock"></i>
            <x-text-input id="password" class="login__pass"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="logon__button">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
