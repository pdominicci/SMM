<div>
    <div class="px-4 py-5 bg-white sm:p-6">
        <x-jet-label>{{ __('Country') }}</x-jet-label>

        <select wire:model="country" id="country_id" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="" selected>{{ __('Choose Country') }}</option>
            @foreach ($countries as $c)
                <option value="{{ $c->id }}">{{ $c->country }}</option>
            @endforeach
        </select>

        @error('country_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

        @if (!is_null($country))
            <x-jet-label>{{ __('State') }}</x-jet-label>

            <select wire:model="state_id" id="state_id" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" selected>{{ __('Choose State') }}</option>
                @foreach($states as $s)
                    <option value="{{ $s->id }}">{{ $s->state }}</option>
                @endforeach
            </select>
            @error('state_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
        @endif

        @if (!is_null($state))
        <x-jet-label>{{ __('City') }}</x-jet-label>

        <select wire:model="city_id" id="city_id" class="mb-2 shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="" selected>{{ __('Choose City') }}</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->city }}</option>
            @endforeach
        </select>
        @endif
        @error('city_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
    </div>
</div>
