<div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-2">
        <div class="col-span-1">
            <div class="px-4 py-5 bg-white sm:p-6">
                <x-jet-label>{{ __('Nombre') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="company" wire:model="company" />
                @error('company')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>{{ __('Web') }}</x-jet-label>
                    <x-jet-input type="text" class="block mt-1 w-full" id="web" wire:model="web" disabled>{{ $web }}</x-jet-input>
                    @error('web')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>
                <x-jet-label>{{ __('Country') }}</x-jet-label>
                <select wire:model="country" id="country_id" class="border-gray-300 mb-2 shadow appearance-none w-full border text-gray-700  px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="" selected>{{ __('Choose Country') }}</option>
                    @foreach ($countries as $c)
                        <option value="{{ $c->id }}">{{ $c->country }}</option>
                    @endforeach
                </select>
                @error('country_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

                <x-jet-label>{{ __('State') }}</x-jet-label>
                <select wire:model="state" id="state_id" class="border-gray-300 mb-2 shadow appearance-none w-full border text-gray-700  px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="" selected>{{ __('Choose State') }}</option>
                    @if ($country)
                        @foreach($states as $s)
                            <option value="{{ $s->id }}">{{ $s->state }}</option>
                        @endforeach
                    @endif
                </select>
                @error('state_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

                <x-jet-label>{{ __('City') }}</x-jet-label>
                <select wire:model="city_id" id="city_id" class="border-gray-300 mb-2 shadow appearance-none w-full border text-gray-700  px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="" selected>{{ __('Choose City') }}</option>
                    @if ($state)
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                        @endforeach
                    @endif
                </select>
                @error('city_id')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

                <x-jet-label>{{ __('Address') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="address" wire:model="address" />
                @error('address')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
        </div>
        <div class="col-span-1 sm:p-6 px-4 pb-2 bg-white sm:p-6">
            <x-jet-label>{{ __('Email') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="email" wire:model="email" />
            @error('email')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

            <x-jet-label>{{ __('Confirm Email') }}</x-jet-label>
            <x-jet-input type="text" class="block mt-1 w-full" id="confirm_email" wire:model="confirm_email" />
            @error('confirm_email')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>{{ __('Instagram') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="instagram" wire:model="instagram" />
                @error('instagram')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>{{ __('Facebook') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="facebook" wire:model="facebook" />
                @error('facebook')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>{{ __('Twitter') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="twitter" wire:model="twitter" />
                @error('twitter')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>{{ __('Whatsapp') }}</x-jet-label>
                <x-jet-input type="text" class="block mt-1 w-full" id="whatsapp" wire:model="whatsapp" />
            </div>
            <x-jet-label class="mt-2">{{ __('Whatsapp') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fab fa-whatsapp"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Username" />
                @error('whatsapp')<div role="alert"><div class="mt-2 border border-red-400 rounded bg-red-100 px-4 py-3 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
        </div>
    </div>
</div>




