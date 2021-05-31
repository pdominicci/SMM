<div class="bg-white overflow-hidden shadow-md rounded-md col-span-12 sm:col-span-12">
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
        @if ($companies->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr class="mx-10 sm:ml-4">
                    <th scope="col" class="ml-2 hidden lg:block py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-2">{{ __("Id") }}</div>
                    </th>
                    <th scope="col" class="py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-4">{{ __("City | Address") }}</div>
                    </th>
                    <th scope="col" class="py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="text-left my-2 ml-4">{{ __("Company | Email") }}</div>
                    </th>
                    <th scope="col" class="relative px-2 py-2">
                        <div wire:click="new" class="mr-6 text-lg lg:text-3xl font-bold hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Add City') }}">
                            <i class="mr-2 float-right far fa-plus-square"></i>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($companies as $company)
                <tr class="my-auto">
                    <td class="py-4 hidden lg:block px-2">
                        <div class="ml-2 text-sm font-medium text-gray-900">
                            {{ $company->id }}
                        </div>
                    </td>
                    <td class="px-2">
                        <div class="text-sm text-gray-500 sm:ml-2">
                            {{ $company->relCity->city }}
                        </div>
                        <div class="text-sm text-gray-900 sm:ml-2">
                            {{ $company->address }}
                        </div>
                    </td>

                    <td class="px-2">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-2">
                                <div class="text-sm font-medium text-gray-900 sm:ml-2">
                                    {{ $company->company }}
                                </div>
                                <div class="text-sm text-gray-500 sm:ml-2">
                                    {{ $company->email }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="pl-2 pr-6 text-right">
                        <a wire:click="edit({{ $company->id }})">
                            <i class="text-xs lg:text-2xl far fa-edit hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Edit City') }}"></i>
                        </a>
                        <a wire:click="destroy({{ $company->id }})">
                            <i class="ml-2 text-xs lg:text-2xl far fa-trash-alt hover:text-gray-400 active:text-gray-600 focus:outline-none focus:text-gray-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" data-toggle="tooltip" data-placement="top" title="{{ __('Delete City') }}"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $companies->links() }}
        </div>
    @else
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 text-gray-500">
            {{ __("There are no results for this search") }} "{{ $search }}"
        </div>
    @endif
    </div>
</div>
