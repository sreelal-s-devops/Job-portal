@extends('layouts.app')
@section('content')
<x-breadcrumb :link="[$work->title => route('work.show', $work), 'Apply' => '#']"></x-breadcrumb>
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
    <form action="{{route('Application.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-form-input name="work_id" placeholder="enter name" value="{{$work->id}}" type="hidden"></x-form-input>
        <table>
            <tr>
                <td> <X-input-label>Upload CV</X-input-label></td>
                <td> <x-form-input name="cv" placeholder="" value="" type="file"></x-form-input></td>
                @error('cv')
                    <span class="text-sm text-red-600">{{$message}}</span>
                @enderror
            </tr>
        </table>
        <x-button :submit="true">Upload</x-button>
    </form>
</div>
@endsection