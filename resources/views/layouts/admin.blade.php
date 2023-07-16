<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <div class="flex space-x-4">
        <sidebar/>
        <!-- Page Content -->
        <main class="flex-1">
            <div class="max-w-6xl mx-auto">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>


<script>
    import Sidebar from "@/components/Sidebar.vue";

    export default {
        components: {Sidebar}
    }
</script>
