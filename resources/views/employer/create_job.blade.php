@extends('layouts.app')
@section('content')
<x-breadcrumb :link="['New Job' => '#']"></x-breadcrumb>
<x-alert></x-alert>
<form action="{{route('work.store')}}" method="post">
    @csrf
    <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
        <x-input-label>Job name</x-input-label>
        <x-form-input type="text" name="title" value="{{old('title')}}" placeholder="Enter job name"></x-form-input>
        @error('title')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>description</x-input-label>
        <x-form-input type="text" name="description" value="{{old('description')}}"
            placeholder="Description is optional"></x-form-input>
        @error('description')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>salary</x-input-label>
        <x-form-input type="number" name="salary" value="{{old('salary')}}" placeholder="Enter salary"></x-form-input>
        @error('salary')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>location</x-input-label>
        <x-form-input type="text" name="location" value="{{old('location')}}"
            placeholder="Enter location"></x-form-input>
        @error('location')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>Choose Category</x-input-label>
        <x-radio-group name="category" :options="$category"></x-radio-group>
        @error('category')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>Exprience Level</x-input-label>
        <x-radio-group name="experience" :options="$experiences"></x-radio-group>
        @error('experience')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-button submit>Create</x-button>
    </div>
</form>
@endsection