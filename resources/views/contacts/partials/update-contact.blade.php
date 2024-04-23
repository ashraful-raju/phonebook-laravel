<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Contact Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update the contact basic information.') }}
        </p>
    </header>
    <form class="mt-6" action="{{ route('contacts.update', $contact->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <x-messages.alert />

        <label class="block">
            <span class="text-gray-700 text-sm">Full Name:</span>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="name" placeholder="Full Name" value="{{ $contact->name }}" required>
        </label>

        <label class="block mt-3">
            <span class="text-gray-700 text-sm">Title:</span>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="title" placeholder="ex: Software Engineer" value="{{ $contact->title }}">
        </label>

        <label class="block mt-3">
            <span class="text-gray-700 text-sm">Company:</span>
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Enter company or group" name="company" value="{{ $contact->company }}">
        </label>

        <label class="block mt-3">
            <span class="text-gray-700 text-sm">Notes</span>
            <textarea type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                name="notes" placeholder="Write something...">{{ $contact->notes }}</textarea>
        </label>

        <label class="block mt-3">
            <span class="text-gray-700 text-sm">Profile Picture:</span>
            <div class="flex">
                <input type="file"
                    class="border border-gray-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-1.5"
                    accept="image/*" name="photo">
                <img class="h-10 w-10 ml-4 rounded-full" src="{{ $contact->photo }}" alt="{{ $contact->name }}" />
            </div>
        </label>

        <div class="flex mt-3 justify-between">
            <x-primary-button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</x-primary-button>

        </div>
    </form>
</section>
