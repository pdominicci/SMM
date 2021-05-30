<div class="">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-jet-input type="hidden" id="country_id" wire:model="country_id" /> --}}
            <x-jet-label>{{ __('Country') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="country" wire:model="country" />
            @error('country')
                <div role="alert">
                    <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror
        </div>
    </div>
</div>
