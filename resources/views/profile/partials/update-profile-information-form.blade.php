<div>
    <header>
        <h2 class="text-center">
            Profile Information
        </h2>

        <p class="text-center">
            Update your account's profile information and email address.
        </p>
    </header>

    <div class="container">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <label class="form-label" for="name"> Name </label>
                <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required/>
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <div>
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}"/>
                @error('email')
                    {{ $message }}
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <button class="btn btn-primary mb-3">Save</button>

                @if (session('status') === 'profile-updated')
                    <p>Saved</p>
                @endif
            </div>
        </form>
    </div>
</div>
