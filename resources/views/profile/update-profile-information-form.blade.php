<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
       <h2 style="font-size: 25px;font-weight: bold;color: #d2d0d6">Profile Information</h2>
    </x-slot>

    <x-slot name="description">
    </x-slot>
    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 form-group">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-5 sm:col-span-3  form-group">
            <label class="col-form-label" for="fname">First Name</label>
            <input id="fname" name="fname" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.fname" autocomplete="fname"/>
            <x-input-error for="fname" class="mt-2"/>
        </div>
        <div class="col-span-5 sm:col-span-3  form-group">
            <label class="col-form-label" for="ar_fname">Arabic First Name</label>
            <input id="ar_fname" name="ar_fname" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.ar_fname" autocomplete="fname"/>
            <x-input-error for="ar_fname" class="mt-2"/>
        </div>
        <div class="col-span-5 sm:col-span-3 form-group">
            <label class="col-form-label" for="lname">last Name</label>
            <input  id="lname" name="lname" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.lname" autocomplete="lname"/>
            <x-input-error for="lname" class="mt-2"/>
        </div>
        <div class="col-span-5 sm:col-span-3 form-group">
            <label class="col-form-label" for="ar_lname">Arabic Last Name</label>
            <input id="ar_lname" name="ar_lname" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.ar_lname" autocomplete="ar_lname"/>
            <x-input-error for="ar_lname" class="mt-2"/>
        </div>
        <div class="col-span-4 sm:col-span-2 form-group">
            <label class="col-form-label" for="birthdate">Birthdate</label>
            <input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full form-control" wire:model.defer="state.birthdate" autocomplete="birthdate"/>
            <x-input-error for="birthdate" class="mt-2"/>
        </div>
        <div class="col-span-4 sm:col-span-2 form-group">
            <label class="col-form-label" for="commune">Commune</label>
            <input id="commune" name="commune" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.commune" autocomplete="commune"/>
            <x-input-error for="commune" class="mt-2"/>
        </div>
        <div class="col-span-4 sm:col-span-2 form-group">
            <label class="col-form-label" for="field" >Field</label>
            <input id="field" name="field" type="text" class="mt-1 block w-full form-control" wire:model.defer="state.field" autocomplete="field" />
            <x-input-error for="field" class="mt-2"/>
        </div>
        <!-- Email -->
        <div class="col-span-8 sm:col-span-6 form-group">
            <label class="col-form-label" for="email" value="{{ __('Email') }}">Email</label>
            <input id="email" type="email" class="mt-1 block w-full form-control" wire:model.defer="state.email"
                     autocomplete="username"/>
            <x-input-error for="email" class="mt-2"/>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
