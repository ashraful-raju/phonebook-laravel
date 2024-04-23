<x-app-layout>
    <!-- Main Content Start -->
    <div class="flex flex-col mt-8 max-w-md mb-4">
        <h1 class="text-2xl font-bold">Add Contact</h1>
        <form class="mt-6" action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-messages.alert />

            <label class="block">
                <span class="text-gray-700 text-sm">Full Name:</span>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="name" placeholder="Full Name" required>
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Title:</span>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="title" placeholder="ex: Software Engineer">
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Company:</span>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Enter company or group" name="company">
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Email:</span>
                <input type="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Enter email" name="email">
            </label>
            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Phone Number:</span>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Enter phone number" name="mobile">
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Notes</span>
                <textarea type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    name="notes" placeholder="Write something..."></textarea>
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Profile Picture:</span>
                <input type="file"
                    class="border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1.5"
                    accept="image/*" name="photo">
            </label>

            <div class="flex mt-3 justify-between">
                <x-primary-button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</x-primary-button>

            </div>
        </form>
    </div>
    <!-- Main Content End -->
</x-app-layout>
