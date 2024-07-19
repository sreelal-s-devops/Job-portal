<nav>
    <ul class="flex">
        <li><a href="{{ route('work.index') }}" class="text-blue-500">Home</a></li>
        @foreach ($link as $key => $path)
    
            <li class="mx-2"><span><i class="fa-solid fa-arrow-right"></i></span></li>
            <li><a href="{{ $path }}" class="text-blue-500">{{ $key }}</a></li>
        @endforeach
    </ul>
</nav>
