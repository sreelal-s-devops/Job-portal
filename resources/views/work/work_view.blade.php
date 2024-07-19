@extends('layouts.app')
@section('content')
<x-breadcrumb :link="[$work->title => '#']"></x-breadcrumb>
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
            <div class=" flex justify-between">
                <div class=" text-xl p-4 ">{{ $work->title }}</div><br>
                <div class="p-4"><span>&#8377;</span>{{number_format($work->salary)}}</div>
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
                <p class="mt-2">
                    {{$work->description}}
                </p>
                <x-button :href="route('work.show',$work)">View Job</x-button>
            </div>
        </div>
@endsection