@extends('layouts.app')
@section('content')
<x-breadcrumb></x-breadcrumb>
<x-alert></x-alert>
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
    <form action="{{route('work.index')}}" method="get">
        <div>
            <x-input-label>Job Name</x-input-label>
            <x-form-input name="jobname" placeholder="Enter Job Name" value="{{request('jobname')}}"></x-form-input>
        </div>
        <x-button submit>Search</x-button>
        @method('get')
        <x-button :href="route('work.create')">New Job</x-button>
    </form>
</div>
@forelse ($works as $work)
    <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
        <div class=" flex justify-between">
            <div class=" text-xl p-4">{{ $work->title }}</div><br>
            <div class="p-4"><span>&#8377;</span>{{number_format($work->salary)}}/Month</div>
        </div>
        <div class="pl-4 mt-2">
            <table>
                <tr>
                    <td><i class="fa-solid fa-location-dot"></i> Location:</td>
                    <td class="p-2">{{$work->location}}</td>
                </tr>
                <tr>
                    <td><i class="fa-solid fa-layer-group"></i> Category:</td>
                    <td class="p-2">{{$work->category}}</td>
                </tr>
                <tr>
                    <td><i class="fa-solid fa-graduation-cap"></i> Experience:</td>
                    <td class="p-2">{{$work->experience}}</td>
                </tr>
            </table>
            <div class="flex space-x-4">
                <div>
                    <form action="{{ route('work.destroy', $work) }}" method="post"
                        onsubmit="return confirm('Are you sure you want to delete this job?')">
                        @csrf
                        @method('delete')
                        <x-button type="submit">Delete Job</x-button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('work.edit', $work) }}" method="get">
                        <x-button type="submit">Update Job</x-button>
                    </form>
                </div>
                <div>
                    <x-button href="{{ route('manageApplications', $work) }}">Manage Applicants</x-button>
                </div>
            </div>

        </div>
    </div>
@empty
    <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
        <p class=" p-4  mt-2 text-center">No Job Post</p>
    </div>
@endforelse
@endsection