<div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-2">
        <div class="col-span-1">
            <div class="px-4 bg-white sm:p-6 ">
                <x-jet-label class="">{{ __('Name') }}</x-jet-label>
                <div class="flex flex-wrap items-stretch w-full relative">
                    <div class="flex -mr-px">
                        <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fas fa-store"></i></span>
                    </div>
                    <x-jet-input type="text" id="company" wire:model="company" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                    @error('company')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

                <x-jet-label class="mt-1">{{ __('WebSite') }}</x-jet-label>
                <div class="flex flex-wrap items-stretch w-full relative">
                    <div class="flex -mr-px">
                        <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fas fa-globe-americas"></i></span>
                    </div>
                    <x-jet-input type="text" id="web" wire:model="web" disabled class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                    @error('web')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

                <div class="mt-1 col-span-6 sm:col-span-4">
                    <x-jet-label>{{ __('Country') }}</x-jet-label>
                    <select wire:model="country" id="country_id" class="mt-1 border-gray-300 shadow appearance-none w-full border text-gray-700 px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" selected>{{ __('Choose Country') }}</option>
                        @foreach ($countries as $c)
                            <option value="{{ $c->id }}">{{ $c->country }}</option>
                        @endforeach
                    </select>
                    @error('country_id')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

                <div class="mt-1 col-span-6 sm:col-span-4">
                    <x-jet-label>{{ __('State') }}</x-jet-label>
                    <select wire:model="state" id="state_id" class="mt-1 border-gray-300 shadow appearance-none w-full border text-gray-700  px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" selected>{{ __('Choose State') }}</option>
                        @if ($country)
                            @foreach($states as $s)
                                <option value="{{ $s->id }}">{{ $s->state }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('state_id')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

                <div class="mt-1 col-span-6 sm:col-span-4">
                    <x-jet-label>{{ __('City') }}</x-jet-label>
                    <select wire:model="city" id="city_id" class="mt-1 border-gray-300 shadow appearance-none w-full border text-gray-700  px-4 pr-8 rounded leading-tight focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" selected>{{ __('Choose City') }}</option>
                        @if ($state)
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('city_id')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

                <x-jet-label class="mt-1">{{ __('Address') }}</x-jet-label>
                <div class="flex flex-wrap items-stretch w-full relative">
                    <div class="flex -mr-px">
                        <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fas fa-map-marker-alt"></i></span>
                    </div>
                    <x-jet-input type="text" id="address" wire:model="address" disabled class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                    @error('address')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
                </div>

            </div>
        </div>
        <div class="col-span-1 sm:p-6 px-4 pb-2 bg-white sm:p-6">
            <x-jet-label class="">{{ __('Email') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl far fa-envelope"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('email')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <x-jet-label class="mt-1">{{ __('Confirm Email') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl far fa-envelope"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('confirm_email')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <x-jet-label class="mt-1">{{ __('Whatsapp') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fab fa-whatsapp"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('whatsapp')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <x-jet-label class="mt-1">{{ __('Instagram') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fab fa-instagram"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('instagram')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <x-jet-label class="mt-1">{{ __('Facebook') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fab fa-facebook"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('facebook')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
            <x-jet-label class="mt-1">{{ __('Twitter') }}</x-jet-label>
            <div class="flex flex-wrap items-stretch w-full relative">
                <div class="flex -mr-px">
                    <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm"><i class="text-2xl fab fa-twitter"></i></span>
                </div>
                <x-jet-input type="text" class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-gray-300 rounded rounded-l-none px-3 relative focus:border-blue focus:shadow" />
                @error('twitter')<div role="alert"><div class=" border border-red-400 rounded bg-red-100 px-4 text-red-700"><p>{{ $message }}</p></div></div>@enderror
            </div>
        </div>
    </div>

    {{-- <form action="" >
        @csrf
    <div class=""><input type="text" id="address" ></div>
    <button id="submit" onclick="event.preventDefault();
    this.closest('form').submit();">boton</button>--}}
        <div id="map" class="h-48 w-200 bg-red"></div>

    {{-- </form>  --}}
    {{-- @livewire('maps.map-component') --}}


</div>




