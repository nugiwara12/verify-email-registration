
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.updatePassword') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"  required autofocus autocomplete="current-password" />
            <div id="passwordHelp" class="form-text" style="color:red">Re Enter old password</div>
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
            
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
            <div id="passwordHelp" class="form-text"  style="color:red">Must be 8-20 characters long, Input atleast 1 number and letters with Upper and Lower case.</div>
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
            <div id="passwordHelp" class="form-text"  style="color:red">Must be same in new password</div>
            <x-input-error class="mt-2" :messages="$errors->get('new-password')" />
        </div>

        <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Update Password') }}</x-primary-button>

        @if (session('status') === 'password-updated')
            <p class="text-sm text-green-500 dark:text-green-400">{{ __('Password updated.') }}</p>
        @endif
    </form>
</section>
