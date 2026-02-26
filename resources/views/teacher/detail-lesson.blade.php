@extends('teacher.layoutlms.layout')

@section('pagetitle', $lesson->title)

@section('content')

    <div class="bg-white rounded-xl shadow-md p-4 mb-2">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 ">

            <!-- LEFT: BACK BUTTON -->
            <a href="{{ route('teacherdetailprogram', $program->slug) }}"
                class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>


            <!-- RIGHT: PAGE STRUCTURE -->
            <div class="text-gray-600 text-sm md:text-base font-medium">
                <a href="{{ route('teachermyprogram') }}" class="hover:text-indigo-600 cursor-pointer">Program</a>
                <span class="mx-2">/</span>
                <span class="text-indigo-600 font-semibold">
                    {{ $program->name }}
                </span>
                <span class="mx-2">/</span>
                <span class="text-indigo-600 font-semibold">
                    {{ $lesson->title }}
                </span>

            </div>

        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-8 mb-6">

        {{-- LESSON HEADER --}}
        <h1 class="text-3xl font-bold mb-2">
            {{ $lesson->title }}
        </h1>

        <p class="text-gray-600 mb-8">
            {{ $lesson->description ?? 'No description available.' }}
        </p>

        {{-- ================= MATERIAL SECTION ================= --}}
        <h2 class="text-xl font-semibold mb-4">
            📘 Lesson Material
        </h2>

        <div class="space-y-8 mb-10">
            @foreach ($lesson->materials as $material)

                <div class="border rounded-xl p-5 bg-gray-50">

                    {{-- TEXT --}}
                    @if ($material->type === 'text')
                        <div class="prose max-w-none">
                            {!! nl2br(e($material->content)) !!}
                        </div>

                        {{-- IMAGE --}}
                    @elseif ($material->type === 'image')
                        <img src="{{ asset($material->content) }}" class="rounded-lg shadow max-w-full">

                        {{-- LINK --}}
                    @elseif ($material->type === 'link')
                        <div class="space-y-3">
                            <div class="aspect-video rounded-lg overflow-hidden border bg-white">
                                <iframe src="{{ $material->content }}" class="w-full h-full" loading="lazy"
                                    allowfullscreen></iframe>
                            </div>

                            <a href="{{ $material->content }}" target="_blank"
                                class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:underline">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                Open link in new tab
                            </a>
                        </div>

            {{-- PDF --}}
@elseif ($material->type === 'pdf')
<div class="space-y-3">

    <div class="h-[300px] md:h-[700px] overflow-y-auto rounded-lg overflow-hidden border bg-white">
        <div class="border rounded-lg bg-white p-2 overflow-auto">
            <canvas 
                class="pdf-canvas w-full"
                data-url="{{ asset($material->content) }}">
            </canvas>
        </div>
    </div>

    <a href="{{ url('/pdf-viewer?file=' . urlencode(asset($material->content))) }}"
    target="_blank"
    class="inline-flex items-center gap-2 text-red-600 font-semibold hover:underline">
        <i class="fa-solid fa-file-pdf"></i>
        Open PDF in new tab
    </a>

</div>
@endif

                </div>

            @endforeach
        </div>

        {{-- ================= TASK SECTION ================= --}}
        @if ($lesson->tasks->count())
            <h2 class="text-xl font-semibold mb-4">
                📝 Assignment
            </h2>

            <div class="space-y-8 mb-10">
                @foreach ($lesson->tasks as $task)

                    <div class="border rounded-xl p-5 bg-yellow-50">

                        {{-- TEXT --}}
                        @if ($task->isText())
                            <div class="prose max-w-none">
                                {!! nl2br(e($task->content)) !!}
                            </div>

                            {{-- IMAGE --}}
                        @elseif ($task->isImage())
                            <img src="{{ asset($task->content) }}" class="rounded-lg shadow max-w-full">

                            {{-- LINK --}}
                        @elseif ($task->isLink())
                            <div class="space-y-3">
                                <div class="aspect-video rounded-lg overflow-hidden border bg-white">
                                    <iframe src="{{ $task->content }}" class="w-full h-full" loading="lazy" allowfullscreen></iframe>
                                </div>

                                <a href="{{ $task->content }}" target="_blank"
                                    class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:underline">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    Open task link
                                </a>
                            </div>

                            {{-- PDF --}}
                        @elseif ($task->isPdf())
                            <div class="space-y-3">
                                <div class="h-[300px] md:h-[600px] rounded-lg overflow-hidden border bg-white">
                                    <iframe src="{{ asset($task->content) }}#toolbar=0" class="w-full h-full" loading="lazy"></iframe>
                                </div>

                                <a href="{{ asset($task->content) }}" target="_blank"
                                    class="inline-flex items-center gap-2 text-red-600 font-semibold hover:underline">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    Open assignment PDF
                                </a>
                            </div>
                        @endif


                    </div>

                @endforeach
            </div>
        @endif

        {{-- ================= COMPLETE BUTTON ================= --}}
        <div class="flex justify-end pt-6 border-t">
            <button class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Mark Lesson as Completed
            </button>
        </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
pdfjsLib.GlobalWorkerOptions.workerSrc =
    "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";

document.addEventListener("DOMContentLoaded", function () {

    const canvases = document.querySelectorAll(".pdf-canvas");

    canvases.forEach(function(canvas) {

        const url = canvas.getAttribute("data-url");
        const container = canvas.parentElement;

        pdfjsLib.getDocument(url).promise.then(function(pdf) {

            container.innerHTML = ""; // clear single canvas

            for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {

                pdf.getPage(pageNum).then(function(page) {

                    const newCanvas = document.createElement("canvas");
                    newCanvas.classList.add("mb-4", "w-full");

                    const context = newCanvas.getContext("2d");

                    const viewport = page.getViewport({ scale: 1 });
                    const containerWidth = container.clientWidth;
                    const scale = containerWidth / viewport.width;
                    const scaledViewport = page.getViewport({ scale: scale });

                    newCanvas.height = scaledViewport.height;
                    newCanvas.width = scaledViewport.width;

                    container.appendChild(newCanvas);

                    page.render({
                        canvasContext: context,
                        viewport: scaledViewport
                    });

                });

            }

        }).catch(function(error){
            console.error("PDF Load Error:", error);
        });

    });

});
</script>
@endsection