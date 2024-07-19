@props(['href'=>'','submit'=>false])
@if($submit)
<div class="mt-3">
  <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
    {{$slot}}
</button>
</div>
@else
<div class="mt-3">
  <a href="{{$href}}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
    {{$slot}}
  </a>
</div>

@endif