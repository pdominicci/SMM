<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalEditForm">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

        <div class="text-xl font-bold m-3">{{ __("Edit Product") }}</div>

        @include('livewire.form')

        <div class="px-4 py-5 bg-gray-100 justify-end sm:p-6">
            <button wire:click="update" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                {{ __("Confirm") }}
            </button>

            <button wire:click="default" class="items-center px-4 py-2 ml-4 px-4 py-2 bg-gray-500 border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-900 focus:outline-none focus:border-gray-600 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                {{ __("Cancel") }}
            </button>
        </div>
      </div>
    </div>
</div>
