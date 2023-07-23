<x-admin-layout>

    <h1 class="mt-4 mx-auto font-bold text-2xl monospace text-emerald-700">Create New User</h1>

    <x-splade-form  :action="route('admin.users.store')" method="post" class="mt-4 p-4 bg-white">

        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div>
                <x-splade-input name="username" label="Username"/>
            </div>

            <div>
                <x-splade-input name="first_name" label="First name"/>
            </div>
            <div>
                <x-splade-input name="last_name" label="Last name"/>
            </div>
            <div>
                <x-splade-input name="email" label="Email address"/>
            </div>
            <div>
                <x-splade-input type="password" name="password" label="Password"/>
            </div>
            <div>
                <x-splade-input type="password" name="password_confirmation" label="Password Confirmation"/>

            </div>
            {{--            <x-splade-select name="roles[]" :options="$roles" multiple relation choices />--}}
            {{--            <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices />--}}
        </div>

        <div class="mt-5 text-center">
            <x-splade-submit style="color: honeydew" class="bg-green-500"/>
        </div>
    </x-splade-form>


</x-admin-layout>
