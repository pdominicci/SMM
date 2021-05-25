<div class="bg-white overflow-hidden shadow-md rounded-md col-span-12 sm:col-span-12">
    <div class="bg-gray-200 grid shadow-inner grid-cols-1 divide-y-2 divide-gray-300">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="mx-10 sm:ml-4">
                    <th scope="col" class="ml-2 hidden lg:block py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-2">{{ __("Id") }}</div>
                    </th>
                    <th scope="col" class="py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-4">{{ __("Country") }}</div>
                    </th>
                    <th scope="col" class="relative px-2 py-2">
                        <div wire:click="new" class="mr-6 text-lg lg:text-3xl font-bold hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Add Country') }}">
                            <i class="mr-2 float-right far fa-plus-square"></i>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($countries as $country)
                <tr class="my-auto">
                    <td class="py-4 hidden lg:block px-2">
                        <div class="ml-2 text-sm font-medium text-gray-900">
                            {{ $country->id }}
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="text-sm font-medium text-gray-900 sm:ml-2">
                            {{ $country->country }}
                        </div>
                    </td>
                    <td class="pl-2 pr-6 text-right">
                        <a wire:click="edit({{ $country->id }})">
                            <i class="text-xs lg:text-2xl far fa-edit hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Edit Country') }}"></i>
                        </a>
                        <a wire:click="destroy({{ $country->id }})">
                            <i class="ml-2 text-xs lg:text-2xl far fa-trash-alt hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Delete Country') }}"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
