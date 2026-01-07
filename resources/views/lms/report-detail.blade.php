@extends('lms.layoutlms.layout')

@section('pagetitle', 'Report Detail')

@section('content')


<style>
    .table-action-btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.2s;
        }
</style>
<div class="bg-white rounded-xl shadow-md p-6 mb-4">
    <a href="{{ url()->previous() }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
</div>

<div class="bg-white rounded-xl shadow-md p-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold">
                {{ $report->program->name ?? '-' }}
            </h2>

            <p class="text-gray-500 mt-1">
                {{ ucfirst($report->type) }} Report • {{ $report->created_at->format('d M Y') }}
            </p>

            @if($report->lesson)
                <p class="text-gray-500">
                    Lesson: {{ $report->lesson->title }}
                </p>
            @endif
        </div>
    </div>

    {{-- DESCRIPTION --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Description :</h3>
        <p class="text-gray-700">
            {{ $report->description ?? '—' }}
        </p>
    </div>

    {{-- PDF PREVIEW --}}
    <div>
        <h3 class="font-semibold mb-3">Report File</h3>

        @if($report->file)
            <div class="h-[300px] md:h-[600px] rounded-lg overflow-hidden border bg-white">
                                    <iframe src="{{ asset($report->file) }}#toolbar=0" class="w-full h-full" loading="lazy"></iframe>
                                </div>

            <div class="mt-4 flex gap-3">
                <a href="{{ asset($report->file) }}" target="_blank"
                   class="table-action-btn view">
                    <i class="fa-solid fa-eye"></i> Open in New Tab
                </a>

                <a href="{{ asset($report->file) }}" download
                   class="table-action-btn bg-green-200 border border-green-400">
                    <i class="fa-solid fa-download"></i> Download
                </a>
            </div>
        @else
            <p class="text-gray-400 italic">No file uploaded</p>
        @endif
    </div>

</div>

@endsection
