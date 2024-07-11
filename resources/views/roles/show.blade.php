
<x-app-layout>
    <div class=" p-3 bg-white min-w-full h-screen relative">
        @session('success')
            <x-success-alert>
            {{ session('success')  }}
            </x-success-alert>
        @endsession
        <div class=" mb-4 shadow-lg p-4">
            <x-heading> Role</x-heading>
            <p class=" font-[400] text-[16px]">{{ $role->name }}</p>
        </div>
        <div class="p-4">
            <x-heading>Permissions</x-heading>
            @if (count($role->permissions))
            <div class=" flex gap-3 mt-2 flex-wrap">
                @foreach ($role->permissions as $permission)
                    <form action="{{ route('roles.revoke-permission',[ "role" => $role, "permission" => $permission]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class=" capitalize  pl-4 pr-10 py-1 rounded-[5px] border bg-[#2f54cd] relative text-white">
                            {{str_replace('-', " ",  $permission->name)}} <button type="button" data-modal-target="{{ $permission->name }}" data-modal-toggle="{{ $permission->name }}"
                                class=" hover:bg-blue-300 shadow-lg absolute border border-[#2f54cd] px-1 top-0 bottom-0 right-0  bg-white ">
                                <img class="w-5" src="{{ asset('images/delete-icon.svg') }}" alt=""> </button>
                        </div>
                        <x-custom-modal modalName="{{ $permission->name }}" title='' >
                            <img class=" select-none mx-auto mb-4" src="{{ asset('images/delete-icon.svg') }}" alt="">
                                        <h1 class=" select-none text-center text-red-400 font-[500] text-[18px]">Are you sure to revoke {{ $permission->name }} permission?</h1>
                                        <form action="{{ route('roles.revoke-permission',['role' => $role, 'permission' => $permission]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="flex justify-center gap-3 items-center mt-5">
                                                <x-delete-button>Confirm</x-delete-button>
                                                <x-secondary-button data-modal-hide="{{ $permission->name }}">Cancle</x-secondary-button>
                                            </div>
                                        </form>
                        </x-custom-modal>
                    </form>
                @endforeach
            </div>  
            @else
            <div class=" text-[20px] font-[600] py-3 rounded-[10px] text-[#2f54cd] my-4 text-center border-2 border-[#2f54cd]"> Haven't Assigned Permission Yet! </div>

            @endif
        </div>
        <div class=" p-4">
          <x-heading>Assign Permission to Role</x-heading>
          <div>
            <form  action="{{ route('roles.assign-permssion',$role) }}" method="POST" class="max-w-sm ">
                @csrf
                <label for="countries" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Select a permission</label>
            <div class=" flex items-center gap-4">
                <select name="permission" id="countries" class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @if (count($roleNotHavePermissions))
                    <option value="" selected>Choose a permission</option>            
                    @else
                    <option value="" selected>All permssions have given.</option>
                    @endif
                    @foreach ($roleNotHavePermissions as $permission)
                    <option class="capitalize py-2" value="{{ $permission->id }}" >{{ str_replace('-', " ",  $permission->name) }}</option>
                    @endforeach
                  </select>
  
                  <x-primary-button>Assign</x-primary-button>
            </div>
                    @error('permission')
                        <span class="text-[14px] text-red-400 font-[400]" >{{ $message }}</span>
                    @enderror
              </form>
          </div>
        </div>
      
    </div>
</x-app-layout>
