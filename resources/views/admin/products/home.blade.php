<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>

        @if ( session('mensaje') )
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
    </x-slot>

    <div class="flex grid grid-cols-1 ">
        {{-- @if ($view) --}}
            <div>
                {{-- @include("livewire.$view") --}}
            </div>
        {{-- @endif --}}


        <div class="grid grid-cols-2">
            <div class="text-xl font-bold m-3 ">
                {{ __('Products') }}
            </div>
            <div wire:click="new" class="text-right mr-6 text-lg lg:text-2xl font-bold hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="Agregar Producto">
                <i class="fas fa-plus"></i>
            </div>
        </div>

        {{-- @include('livewire.table') --}}
    </div>
</x-app-layout>
