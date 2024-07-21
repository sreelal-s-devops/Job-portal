@extends('layouts.app')
@section('content')
<x-breadcrumb :link="['Applications' =>'#']"></x-breadcrumb>
@foreach ($applications as $application )
<div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
            <div class=" flex justify-between">
                <div class=" text-xl p-4 ">{{ $application->work->title }}</div><br>
                <div class="p-4"><span>&#8377;</span>{{number_format($application->work->salary)}}/Month</div>
            </div>
            <div class="pl-4 mt-2">
                <table>
                    <tr>
                        <td><i class="fa-solid fa-location-dot"></i> Location:</td>
                        <td class="p-2">{{$application->work->location}}</td>
                    </tr>
                </table>
                <td><i class="fa-solid fa-clock"></i> Applied:</td>
                <td class="p-2">{{$application->created_at->diffForHumans()}}</td>
            </div>
</div>

@endforeach
@endsection