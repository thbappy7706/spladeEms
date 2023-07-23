<x-admin-layout>
    <h1 class="mt-4 mx-auto font-bold text-2xl monospace text-emerald-700">Create New Country</h1>
    <x-splade-form :action="route('admin.countries.store')" class="mt-4 p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="country_code" label="Code" />
        <x-splade-input name="name" label="Name" />

        <div class="mt-5 text-center">
            <x-splade-submit style="color: honeydew" class="bg-green-500"/>
        </div>
    </x-splade-form>
</x-admin-layout>
