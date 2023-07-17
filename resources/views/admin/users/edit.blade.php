<x-admin-layout>

    <h1 class="mt-4 mx-auto font-bold text-2xl monospace text-emerald-700">Edit User</h1>

    <x-splade-form :default="$user" :action="route('admin.users.update', $user)" method="PUT" class="mt-4 p-4 bg-white">
        <div class="grid gap-4 mb-6 md:grid-cols-2">
            <div>
                <x-splade-input class="" name="username" label="Username"/>
                <x-splade-errors>
                    <p v-if="errors.has('username')" v-text="errors.first('username')"/>
                </x-splade-errors>
            </div>

            <div>
                <x-splade-input name="first_name" label="First Name"/>
                <x-splade-errors>
                    <p v-if="errors.has('first_name')" v-text="errors.first('first_name')"/>
                </x-splade-errors>
            </div>

            <div>
                <x-splade-input name="last_name" label="Last Name"/>
                <x-splade-errors>
                    <p v-if="errors.has('last_name')" v-text="errors.first('last_name')"/>
                </x-splade-errors>
            </div>

            <div>
                <x-splade-input type="email" name="email" label="Email address"/>
                <x-splade-errors>
                    <p v-if="errors.has('email')" v-text="errors.first('email')"/>
                </x-splade-errors>
            </div>

            <div>
                <x-splade-input type="password" name="password" label="Password" />
                <x-splade-errors>
                    <p v-if="errors.has('password')" v-text="errors.first('password')"/>
                </x-splade-errors>
            </div>

            <div>
                <x-splade-input type="password" name="password_confirmation" label="Password Confirmation" />
                <x-splade-errors>
                    <p v-if="errors.has('password_confirmation')" v-text="errors.first('password_confirmation')"/>
                </x-splade-errors>
            </div>
        </div>
        <div class="mt-5 text-center">
            <x-splade-submit style="color: honeydew" class="bg-green-500"/>
        </div>
    </x-splade-form>


</x-admin-layout>
