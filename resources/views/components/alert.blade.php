<div>
@if(session('success'))
    <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button onclick="document.getElementById('alert').remove()" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 hover:text-green-900 focus:outline-none">close
        </button>
    </div>
@endif

@if(session('error'))
    <div id="alert"class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
        <button onclick="document.getElementById('alert').remove()" class="absolute top-0 right-0 mt-2 mr-2 text-red-700 hover:text-red-900 focus:outline-none">close

        </button>
    </div>
@endif

</div>