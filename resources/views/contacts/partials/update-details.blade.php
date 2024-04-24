<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Contact Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update the contact details.') }}
        </p>
    </header>

    <div id="details-list">
        @foreach ($contact->details as $detail)
            <div class="flex space-x-1 mt-3">
                <form class="flex space-x-1 items-center"
                    action="{{ route('contacts.detail.update', [
                        'contact' => $contact->id,
                        'detail' => $detail->id,
                    ]) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4"
                        placeholder="Type" name="type" value="{{ $detail->type }}">
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-2"
                        placeholder="Value" name="data" value="{{ $detail->data }}" />

                    <x-secondary-button type="submit" class="px-2 py-1 text-white bg-indigo-500 hover:bg-indigo-600">
                        Update
                    </x-secondary-button>
                </form>
                <form class="flex items-center"
                    action="{{ route('contacts.detail.update', [
                        'contact' => $contact->id,
                        'detail' => $detail->id,
                    ]) }}"
                    onsubmit="return confirm('Are you sure?')" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button type="submit" class="px-2 py-1 bg-red-500 hover:bg-red-600">
                        Delete
                    </x-primary-button>
                </form>
            </div>
        @endforeach
    </div>
    <hr class="mt-4" />
    <div x-data="{ open: false }">
        <h4 class="mt-2 text-black font-semibold cursor-pointer" @click="open=!open">Add new details</h4>
        <form action="{{ route('contacts.detail.store', $contact->id) }}" method="POST" x-show="open">
            @csrf
            <div class="flex items-end mt-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4"
                    placeholder="Enter Type" name="type" value="{{ old('type') }}" required>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-2"
                    placeholder="Enter Value" name="data" value="{{ old('value') }}" required />

            </div>
            <x-primary-button class="mt-2">Add new</x-primary-button>
        </form>
    </div>
</section>
