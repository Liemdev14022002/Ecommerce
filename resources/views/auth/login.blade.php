<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Google Login Button -->
        <div class="mt-4">
            <a href="{{route('auth.google.redirect')}}" class="btn-google">
                <i class="fab fa-google mr-2"></i> {{ __('Log in with Google') }}
            </a>
        </div>
    </form>
</x-guest-layout>

<style>
    .btn-google {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #4285F4; /* Google Blue */
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-align: center;
        text-decoration: none;
        width: 100%;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn-google:hover {
        background-color: #357ae8; /* Google Dark Blue */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .btn-google:active {
        background-color: #3367d6; /* Google Darker Blue */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }
    .btn-google i {
        margin-right: 8px;
    }
</style>
