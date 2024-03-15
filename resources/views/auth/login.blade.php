<script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login__header">
            <p class="login__header--text">Login</p>
            
        </div>
        <!-- Email Address -->
        <div class="email__contents top__contents">
            <i class="fa-solid fa-envelope"></i>
            <x-text-input   id="email" 
                            class="login__email" 
                            placeholder="Email"
                            type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="pass__contents">
            <i class="fa-solid fa-lock"></i>
            <x-text-input id="password" class="block mt-1 w-full login__pass"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button class="ms-3 logon__button">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
