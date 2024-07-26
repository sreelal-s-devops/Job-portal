<div>
    @if($type == 'number')
        <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" autocomplete="off"
            min="5000" class="w-full px-3 py-2  border-gray-300 rounded-md shadow-md focus:outline-none text-md">
    @else
        <input type="{{$type}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" autocomplete="off"
            class="w-full px-3 py-2  border-gray-300 rounded-md shadow-md focus:outline-none text-md">
    @endif
</div>