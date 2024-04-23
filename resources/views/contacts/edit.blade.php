<x-app-layout>
    <!-- Main Content Start -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <h1 class="text-2xl font-bold my-4">Edit Contact</h1>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('contacts.partials.update-contact')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('contacts.partials.update-details')
            </div>
        </div>

    </div>
    <!-- Main Content End -->
</x-app-layout>
