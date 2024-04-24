<section>
    <header class="mb-4 flex items-start justify-between">
        <div>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Address') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Update your addresses.') }}
            </p>
        </div>
        <x-primary-button class="mt-4" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-address-form')">{{ __('Add New') }}</x-primary-button>
    </header>

    <div class="addresses flex flex-col space-y-2">
        @foreach ($contact->addresses as $address)
            <div x-data="{ open: false }">
                <div class="flex items-center justify-between">
                    <h4 class="mt-2 text-black cursor-pointer" @click="open=!open">
                        <span class="font-semibold">{{ ucfirst($address->type) }}</span> -
                        {{ $address->getFullAddress(', ') }}
                    </h4>
                    <form method="POST"
                        action="{{ route('contacts.address.destroy', [
                            'contact' => $contact->id,
                            'address' => $address->id,
                        ]) }}"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="px-1 py-0.5">
                            Delete
                        </x-danger-button>
                    </form>
                </div>

                <div x-show="open" class="border rounded-md">
                    <form method="post"
                        action="{{ route('contacts.address.update', [
                            'contact' => $contact->id,
                            'address' => $address->id,
                        ]) }}"
                        class="m-4 space-y-6">
                        @csrf
                        @method('PUT')

                        <h1 class="font-bold text-xl text-black">Edit address</h1>
                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full"
                                :value="old('type', $address->type)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="address_line" :value="__('Address (Rd/St)')" />
                            <x-text-input id="address_line" name="address_line" type="text" class="mt-1 block w-full"
                                :value="old('address_line', $address->address_line)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('address_line')" />
                        </div>
                        <div>
                            <x-input-label for="city" :value="__('City')" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                                :value="old('city', $address->city)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div>
                            <x-input-label for="state" :value="__('State')" />
                            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full"
                                :value="old('state', $address->state)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('state')" />
                        </div>
                        <div>
                            <x-input-label for="zip_code" :value="__('Zip Code')" />
                            <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full"
                                :value="old('zip_code', $address->zip_code)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
                        </div>
                        <div>
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full"
                                :value="old('country', $address->country)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('country')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</section>

<x-slot:footer>
    <x-modal name="add-address-form" focusable>
        <form method="post" action="{{ route('contacts.address.store', $contact->id) }}" class="m-4 space-y-6">
            @csrf
            <h1 class="font-bold text-2xl text-black">Add new address</h1>
            <div>
                <x-input-label for="type" :value="__('Type')" />
                <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type')"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('type')" />
            </div>

            <div>
                <x-input-label for="address_line" :value="__('Address (Rd/St)')" />
                <x-text-input id="address_line" name="address_line" type="text" class="mt-1 block w-full"
                    :value="old('address_line')" required />
                <x-input-error class="mt-2" :messages="$errors->get('address_line')" />
            </div>
            <div>
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>
            <div>
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state')"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>
            <div>
                <x-input-label for="zip_code" :value="__('Zip Code')" />
                <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old('zip_code')"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
            </div>
            <div>
                <x-input-label for="country" :value="__('Country')" />
                <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country')"
                    required />
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>
</x-slot:footer>
