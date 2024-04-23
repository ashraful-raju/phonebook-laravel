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
            <div class="flex mt-3">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4"
                    placeholder="Type" name="detail[type][{{ $detail->id }}]" value="{{ $detail->type }}">
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-2"
                    placeholder="Value" name="detail[value][{{ $detail->id }}]" value="{{ $detail->data }}" />
            </div>
        @endforeach
    </div>
    <hr class="mt-4" />
    <form action="" method="POST">
        <h4 class="mt-2 text-black font-semibold">Enter a new details</h4>
        @csrf
        <div class="flex items-end mt-3">
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-1/4"
                placeholder="Enter Type" name="type" value="{{ old('type') }}">
            <input type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ml-2"
                placeholder="Enter Value" name="value" value="{{ old('value') }}" />

        </div>
        <x-primary-button class="mt-2">Add new</x-primary-button>
    </form>
</section>
