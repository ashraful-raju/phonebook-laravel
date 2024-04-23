<x-app-layout>
    <!-- Main Content Start -->
    <div class="flex flex-col mt-8 max-w-xl mb-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Show Contact</h1>
            <a href="{{ route('contacts.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center">
                Back
            </a>
        </div>
        <div class="mt-6 border-t border-gray-100 bg-gray-50 p-8 rounded">
            <dl class="divide-y divide-gray-100">
                <x-contacts.details-item title="Name">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{ $contact->photo }}"
                                alt="{{ $contact->name }}" />
                        </div>
                        <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                                {{ $contact->name }}
                            </div>
                        </div>
                    </div>
                </x-contacts.details-item>

                <x-contacts.details-item title="Title">
                    {{ $contact->title }}
                </x-contacts.details-item>
                <x-contacts.details-item title="Company/Group">
                    {{ $contact->company }}
                </x-contacts.details-item>
                <x-contacts.details-item title="Details">
                    <ul>
                        @foreach ($contact->details as $detail)
                            <li class="mb-2">
                                <span class="text-black font-bold">
                                    {{ ucfirst($detail->type) }}
                                </span>: {{ $detail->data }}
                            </li>
                        @endforeach
                    </ul>
                </x-contacts.details-item>
                <x-contacts.details-item title="Addresses">
                    <ul>
                        @foreach ($contact->address as $address)
                            <li class="mb-2">
                                <p class="text-black font-bold">{{ ucfirst($address->type) }}</p>
                                <p>{{ $address->getFullAddress(', ') }}</p>
                            </li>
                        @endforeach
                    </ul>
                </x-contacts.details-item>

                <x-contacts.details-item title="Notes">
                    {{ $contact->notes }}
                </x-contacts.details-item>
            </dl>
        </div>


    </div>
    <!-- Main Content End -->
</x-app-layout>
