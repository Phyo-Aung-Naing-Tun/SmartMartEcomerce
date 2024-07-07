<x-app-layout>
    <div class=" p-3 bg-white min-w-full h-screen items-center ">
        <div>
            <div>
                <div class="relative overflow-x-auto  sm:rounded-lg">
                    <div class="pb-4 bg-white ps-3">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div
                                class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for items">
                        </div>
                    </div>
                    <table class="w-full mt-[100px] text-sm shadow-md rounded-xl overflow-hidden text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs uppercase bg-[#0d2882] text-white  ">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Guard Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Updated At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permissions as $permission)
                            <tr
                            class="bg-white border-b">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                   
                            <td class="px-6 py-4">
                                {{ $permission->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $permission->guard_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $permission->created_at }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $permission->updated_at }}
                            </td>
                            <td>
                                <x-primary-button>edit </x-primary-button>
                                <button></button>
                            </td>
                        </tr>
                            @endforeach
                           
                            
                        </tbody>
                    </table>
                    <div class="mt-10 mb-3">
                       {{  $permissions->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
