<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl mb-6">Welcome back <span class="text-black font-bold">{{ auth()->user()->name }}</span>!
            </h2>
            <div class="flex space-x-6" id="widget">
                <div class="flex h-64 w-64 flex-col items-center justify-center rounded-lg bg-white">
                    <div class="flex flex-col space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="mx-auto mb-5 rounded-full bg-yellow-200 p-1 text-yellow-500" width="42"
                            height="42" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="12" x2="12" y2="12.01"></line>
                            <path d="M14.828 9.172a4 4 0 0 1 0 5.656"></path>
                            <path d="M17.657 6.343a8 8 0 0 1 0 11.314"></path>
                            <path d="M9.168 14.828a4 4 0 0 1 0 -5.656"></path>
                            <path d="M6.337 17.657a8 8 0 0 1 0 -11.314"></path>
                        </svg>
                        <div class="text-center text-4xl font-bold">
                            {{ $totalContacts }}
                        </div>
                        <div class="my-2 text-center text-gray-500">
                            Contacts added
                        </div>
                    </div>
                </div>
                <div class="flex h-64 w-64 flex-col items-center justify-center rounded-lg bg-white">
                    <div class="flex flex-col space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-5" width="28" height="28"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill=""></path>
                            <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"
                                fill="#ef3637"></path>
                        </svg>
                        <div class="text-center text-4xl font-bold">1.92k</div>
                        <div class="my-2 text-center text-gray-500">
                            Likes received
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
