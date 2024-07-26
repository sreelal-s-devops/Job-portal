@extends('layouts.app')
@section('content')
<x-breadcrumb :link="['Applicants' => '#']"></x-breadcrumb>
@forelse($jobapplications as $jobapplication)
    <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <tbody class="text-gray-700">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 border-b border-gray-200">{{ $jobapplication->user->name }}</td>
                <td class="px-6 py-4 border-b border-gray-200">
                    <a href="{{ route('download', $jobapplication->cvname) }}"
                        class="text-blue-500 hover:underline">Download CV Here</a>
                </td>
            </tr>
            @empty
                <div class="rounded-md border border-slate-300 p-4  mt-2 bg-white dark:bg-gray-800 shadow">
                    <p class=" p-4  mt-2 text-center">No Applications so far..</p>
                </div>
@endforelse
    </tbody>
</table>
@endsection