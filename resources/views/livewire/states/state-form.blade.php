<div class="">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">
            <select wire:model="country_id" id="country_id" class="border-gray-300 mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Seleccione un País</option>
                @foreach ($countries as $c)
                    <option value="{{$c->id}}">{{$c->country}}</option>
                @endforeach
            </select>
            @error('country_id')
                <div role="alert">
                    <div class="my-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror
            <x-jet-label>{{ __('State') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="state" wire:model="state" />
            @error('state')
                <div role="alert">
                    <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror
        </div>
    </div>
</div>
