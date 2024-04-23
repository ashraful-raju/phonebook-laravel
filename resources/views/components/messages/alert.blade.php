@if (session()->has('alert'))
    <div class="border-l-4 my-2 border-blue-500 py-4 px-2 bg-gray-200">
        {{ session('alert') }}
    </div>
@endif
