<div class="">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="col-span-6 sm:col-span-4">

            <label for="country">País</label>
            <select  name="country_id" id="country" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option selected>Seleccionar País</option>
                @foreach ($countries as $c)
                    <option value="{{ $c->id }}">{{ $c->country }}</option>
                @endforeach
            </select>
            @error('country')
                <div role="alert">
                    <div class="my-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror
            {{-- <select class="browser-default custom-select" name="state_id" id="state">
            </select>
            @error('state_id')
                <div role="alert">
                    <div class="my-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror --}}

            @if (!is_null($selectedCountry))
                    <label for="state">{{ __('State') }}</label>
                    <select wire:model="selectedState" class="form-control">
                        <option value="" selected>Choose state</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            {{-- <label for="state">Provincia</label>


            <select wire:model="country_id" id="country_id" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Seleccione un País</option>
                @foreach ($countries as $c)
                    <option value="{{$c->id}}">{{$c->country}}</option>
                @endforeach
            </select>

            <select wire:model="state_id" id="state_id" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="">Seleccione una Provincia</option>
                @foreach ($states as $s)
                    <option value="{{$s->id}}">{{$s->state}}</option>
                @endforeach
            </select>
             --}}
            <x-jet-label>{{ __('City') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="city" wire:model="city" />
            @error('city')
                <div role="alert">
                    <div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            @enderror
        </div>
    </div>
</div>


