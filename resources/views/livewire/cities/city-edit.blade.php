<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalEditForm">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

        <div class="text-xl font-bold m-3">{{ __("Edit City") }}</div>
        <div class="hidden sm:block">
            <div class="mt-1">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        @include('livewire.cities.city-form')

        <div class="px-4 py-5 bg-gray-100 justify-end sm:p-6">
            <x-jet-button wire:click="update">
                {{ __("Confirm") }}
            </x-jet-button>
            <x-jet-secondary-button wire:click="default" class="px-4 py-2 ml-4">
                {{ __("Cancel") }}
            </x-jet-secondary-button>
        </div>
    </div>
</div>
