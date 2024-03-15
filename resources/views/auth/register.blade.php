<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Choice Role -->
        <div class="mt-4">
            <label for="role">Choice role</label>
            <select name="role" id="role" class="border-gray-300 text-center dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <option value="">-- Choice role --</option>
                <option value="1">Customer</option>
                <option value="2">Seller</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Choice service using -->
        <div class="mt-4">
            <label for="service_using">Choice service using</label>
            <select name="service_using" id="service_using" class="border-gray-300 text-center dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <option value="">-- Choice service using --</option>
                <option value="1">Buyer</option>
                <option value="2">Seller</option>
            </select>
            <x-input-error :messages="$errors->get('service_using')" class="mt-2" />
        </div>

        <!-- Choice fee service -->
        <div class="mt-4">
            <label for="fee_service">Choice fee service</label>
            <select name="fee_service" id="fee_service" class="border-gray-300 text-center dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                <option value="">-- Choice fee service --</option>
                <option value="1-1-50">Customer - Buyer is $50 / month have sale 5%</option>
                <option value="1-2-100">Customer - Seller is $100 / month have sale (5% - 10%)</option>
                <option value="2-1-150">Seller - Buyer is $150 / month have sale (5% - 20%)</option>
                <option value="2-2-250">Seller - Full is $250 / month have sale (5% - 50%)</option>
            </select>
            <x-input-error :messages="$errors->get('fee_service')" class="mt-2" />
            @if (session()->get('error') != null)
                <x-input-error :messages="session()->get('error')" class="mt-2" />
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
