<div class="bg-gray-200 grid shadow-inner grid-cols-1 divide-y-2 divide-gray-300">
    <div class="flex m-4">
        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
            wire:model="search" class="" type="text" placeholder={{ __("Search") }}>
        <div class="block p-2 ">
            <select wire:model="perPage" name="" id="" class="border-gray-300 rounded-md text-sm text-gray-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="5">5 {{ __("per page") }}</option>
                <option value="10">10 {{ __("per page") }}</option>
                <option value="15">15 {{ __("per page") }}</option>
                <option value="25">25 {{ __("per page") }}</option>
                <option value="50">50 {{ __("per page") }}</option>
                <option value="100">100 {{ __("per page") }}</option>
            </select>
        </div>
    </div>
    @if ($products->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="mx-10 sm:ml-4">
                    <th scope="col" class="ml-2 hidden lg:block py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-2">{{ __("Id") }}</div>
                    </th>
                    <th scope="col" class="py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-4">{{ __("Title") }}</div>
                    </th>
                    <th scope="col" class="py-2 hidden lg:block text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-2">{{ __("Price") }}</div>
                    </th>
                    <th scope="col" class="relative px-2 py-2">
                        <div wire:click="new" class="mr-6 text-lg lg:text-3xl font-bold hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="Agregar Producto">
                            <i class="float-right fas fa-plus-circle"></i>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($products as $product)
                <tr class="my-auto">
                    <td class="py-4 hidden lg:block px-2">
                        <div class="ml-2 text-sm font-medium text-gray-900">
                            {{ $product->id }}
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="text-sm font-medium text-gray-900 sm:ml-2">
                            {{ $product->name }}
                        </div>
                    </td>
                    <td class="px-2 hidden lg:block">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $product->price }}
                        </div>
                    </td>
                    <td class="pl-2 pr-6 text-right">
                        <a wire:click="edit({{ $product->id }})">
                            <i class="text-xs lg:text-2xl fas fa-edit hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="Modificar Producto"></i>
                        </a>
                        <a wire:click="destroy({{ $product->id }})">
                            <i class="ml-2 text-xs lg:text-2xl far fa-trash-alt hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="Eliminar Producto"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $products->links() }}
        </div>
    @else
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 text-gray-500">
            {{ __("There are no results for this search") }} "{{ $search }}"
        </div>
    @endif
</div>
