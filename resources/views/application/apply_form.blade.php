@extends('layouts.app')
@section('content')
<x-breadcrumb :link="[$work->title => route('work.show',$work),'Apply'=>'#']"></x-breadcrumb>
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
<p>apply here</p>
<form action="{{route('Application.store')}}"method="post">
    @csrf
    <x-form-input name="work_id" placeholder="enter name" value="{{$work->id}}" type="hidden"></x-form-input>
    <x-button :submit="true">Apply</x-button>
</form>
</div>
@endsection