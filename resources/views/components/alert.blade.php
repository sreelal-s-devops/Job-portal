<div>
@if (session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
        <strong class="font-bold">Success!!!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif
</div>