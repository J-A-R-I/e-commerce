<?php

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('Profile settings')] class extends Component {
    use WithFileUploads;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public $photo = null;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $user = Auth::user();

        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $photo = $this->photo;
        unset($validated['photo']);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($photo) {
            $user->addMedia($photo->getRealPath())
                ->usingFileName($photo->getClientOriginalName())
                ->toMediaCollection('profile_picture');
            $this->photo = null;
        }

        Flux::toast(variant: 'success', text: __('Profile updated.'));
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('backend', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    #[Computed]
    public function hasUnverifiedEmail(): bool
    {
        return Auth::user() instanceof MustVerifyEmail && !Auth::user()->hasVerifiedEmail();
    }

    #[Computed]
    public function showDeleteUser(): bool
    {
        return !Auth::user() instanceof MustVerifyEmail || (Auth::user() instanceof MustVerifyEmail && Auth::user()->hasVerifiedEmail());
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading level="2" class="sr-only">{{ __('Profile settings') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <div class="flex items-center gap-4">
                @if (auth()->user()->hasMedia('profile_picture'))
                    <img 
                        src="{{ auth()->user()->getFirstMediaUrl('profile_picture', 'avatar') }}"
                        alt="{{ auth()->user()->name }}"
                        class="size-16 rounded-full object-cover border border-zinc-200 dark:border-zinc-700 shrink-0" 
                        loading="lazy"
                    />
                @else
                    <div class="size-16 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400 shrink-0">
                        <flux:icon icon="user" class="size-8" />
                    </div>
                @endif

                <div class="flex-1">
                    <flux:label for="photo">{{ __('Profielfoto') }}</flux:label>
                    <flux:description class="mb-1 text-xs">{{ __('Optioneel. Maximaal 5MB (JPG, PNG, WebP).') }}</flux:description>
                    <input
                        id="photo"
                        type="file"
                        wire:model="photo"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full text-sm text-zinc-500
                            file:mr-4 file:rounded-lg file:border-0
                            file:bg-zinc-100 file:px-4 file:py-2
                            file:font-medium file:text-zinc-900
                            hover:file:bg-zinc-200
                            dark:file:bg-zinc-800 dark:file:text-white"
                    />
                    <flux:error name="photo" />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input wire:model="firstname" :label="__('Voornaam')" type="text" required autofocus autocomplete="given-name" />
                <flux:input wire:model="lastname" :label="__('Achternaam')" type="text" required autocomplete="family-name" />
            </div>

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if ($this->hasUnverifiedEmail)
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}

                            <flux:link class="text-sm cursor-pointer"
                                wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full" data-test="update-profile-button">
                        {{ __('Save') }}
                    </flux:button>
                </div>

            </div>
        </form>

        @if ($this->showDeleteUser)
            <livewire:pages::settings.delete-user-form />
        @endif
    </x-pages::settings.layout>
</section>
