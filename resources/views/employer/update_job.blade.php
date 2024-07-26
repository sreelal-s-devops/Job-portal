@extends('layouts.app')
@section('content')
<x-breadcrumb :link="['New Job' => '#']"></x-breadcrumb>
<x-alert></x-alert>
<form action="{{route('work.update', $work)}}" method="post">
    @csrf
    @method('put')
    <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
        <x-input-label>Job name</x-input-label>
        <x-form-input type="text" name="title" value="{{$work->title}}" placeholder="Enter job name"></x-form-input>
        @error('title')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>description</x-input-label>
        <x-form-input type="text" name="description" value="{{$work->description}}"
            placeholder="Description is optional"></x-form-input>
        @error('description')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>salary</x-input-label>
        <x-form-input type="number" name="salary" value="{{$work->salary}}" placeholder="Enter salary"></x-form-input>
        @error('salary')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>location</x-input-label>
        <x-form-input type="text" name="location" value="{{$work->location}}"
            placeholder="Enter location"></x-form-input>
        @error('location')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>Choose Category</x-input-label>
        @foreach ($categories as $category)
            <input type="radio" name="category" value="{{ $category }}" id="{{ $category }}"
                @checked($work->category === $category)>{{$category}}
        @endforeach
        @error('category')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-input-label>Exprience Level</x-input-label>
        @foreach ($experiences as $experience)
            <input type="radio" name="experience" value="{{ $experience }}" id="{{ $experience }}"
                @checked($work->experience === $experience)>{{$experience}}
        @endforeach
        @error('experience')
            <span class="text-sm text-red-600">{{$message}}</span>
        @enderror
        <x-button submit>Create</x-button>
    </div>
</form>
@endsection