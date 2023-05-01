<x-form-section submit="updatePassword">
    <x-slot name="title">
        <h2 style="font-size: 25px;font-weight: bold;color: #d2d0d6">Update Password</h2>
    </x-slot>

    <x-slot name="description">
        <p style="color: #aaa8ae">Ensure your account is using a long, random password to stay secure.</p>
    </x-slot>

    <x-slot name="form" >
        <div class="col-span-6 sm:col-span-4 form-group">
            <label for="current_password" class="col-form-label">Current Password </label>
            <input id="current_password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.current_password" autocomplete="current-password"/>
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 form-group">
            <label  class="col-form-label" for="password" >New Password</label>
            <input  id="password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 form-group" >
            <label  class="col-form-label" for="password_confirmation" >Confirm Password</label>
            <input  id="password_confirmation" type="password" class="form-control " wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
