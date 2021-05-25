<div class="">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label>{{ __('Name') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="name" wire:model="name" />
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label>{{ __('Price') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="price" wire:model="price" />
            @error('price') <span>{{ $message }}</span> @enderror
        </div>
    </div>
</div>
