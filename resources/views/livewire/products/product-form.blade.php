<div class="">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label>{{ __('Name') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="name" wire:model="name" />
            @error('name')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
        </div>
    </div>

    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label>{{ __('Price') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="price" wire:model="price" />
            @error('price')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
        </div>
    </div>
</div>
