<x-admin-layout>

    <h1 class="mt-4 mx-auto font-bold text-2xl monospace text-emerald-700">Users List</h1>

   <div class="mt-5">
       <x-splade-table :for="$users">


           @cell('action',$user)
           <Link href="{{route('admin.users.edit',$user)}}">Edit</Link>
           @endcell

           <x-slot:empty-state>
               <p>Whoops!</p>
               </x-slot:empty-state>
       </x-splade-table>
   </div>

</x-admin-layout>
