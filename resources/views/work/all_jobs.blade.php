@extends('layouts.app')
@section('content')
<x-breadcrumb></x-breadcrumb>
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
    <form action="{{route('work.index')}}" method="get">
        <div class="grid grid-cols-2 gap-x-2 gap-y-2">
            <div>
                <x-input-label>Job Name</x-input-label>
                <x-form-input name="jobname" placeholder="Enter Job Name" value="{{request('jobname')}}"></x-form-input>
            </div>
            <div>
                <x-input-label>Salary</x-input-label>
                <div class="flex gap-1">
                    <x-form-input name="min" placeholder="Min" value="{{request('min')}}"></x-form-input>
                    <x-form-input name="max" placeholder="Max" value="{{request('max')}}"></x-form-input>
                </div>
            </div>
            <div>
                <x-input-label> Experience</x-input-label>
                <input type="radio" name="experience" value="" id="all" @checked(!request('experience'))> All
                <x-radio-group name="experience" :options="$experiences"></x-radio-group>
              
            </div>
            <div>
            <div>
                <x-input-label> Category</x-input-label>
                <input type="radio" name="category" value="" id="all" @checked(!request('category'))> All
                <x-radio-group name="category" :options="$categories"></x-radio-group>
               
            </div>
            </div>
        </div>
        <x-button submit>Search</x-button>
    </form>
</div>
@if($works->isEmpty())
    <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
        <p class=" p-4  mt-2 text-center">No works available</p>
    </div>
@else
    @foreach ($works as $work)
        <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
            <div class=" flex justify-between">
                <div class=" text-xl p-4 ">{{ $work->title }}</div><br>
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
                @if (Auth::user()->user_type==0)
                
                <x-button :href="route('work.show', $work)">View Job</x-button>
                @endif
            </div>
        </div>
    @endforeach
@endif
<div class="m-5">
    {{$works->links()}}
</div>

@endsection