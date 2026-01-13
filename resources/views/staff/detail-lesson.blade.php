@extends('staff.layoutadmin.layout')

@section('pagetitle', $lesson->title)

@section('content')

    <div class="bg-white rounded-xl shadow-md p-4 mb-2">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 ">

            <!-- LEFT: BACK BUTTON -->
            <a href="{{ route('staffdetailprogram', $program->slug) }}"
                class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>


            <!-- RIGHT: PAGE STRUCTURE -->
            <div class="text-gray-600 text-sm md:text-base font-medium">
                <a href="{{ route('staffprogram') }}" class="hover:text-indigo-600 cursor-pointer">Program</a>
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
<div class="flex	tracking-tight items-center justify-between mb-4">
  <h2 class="text-xl font-semibold">
    📘 Lesson Material
  </h2>

  <button
    type="button"
    onclick="openMaterialModal()"
    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
    + Add Material
  </button>
</div>


        <div class="space-y-8 mb-10">
            @foreach ($lesson->materials as $material)

                <div class="border rounded-xl p-5 bg-gray-50 relative">

  <!-- ACTIONS -->
  <div class="absolute top-3 right-3 flex gap-2">
    <button
      type="button"
      class="text-sm px-2 py-1 bg-blue-500 text-white rounded"
      onclick="openMaterialModal(
        {{ $material->id }},
        '{{ $material->type }}',
        '{{ addslashes($material->content) }}',
        {{ $material->order }}
      )">
      Edit
    </button>

    <form
      method="POST"
      action="{{ route('staffmaterial.destroy', $material->id) }}"
      onsubmit="return confirm('Delete this material?')">
      @csrf
      @method('DELETE')

      <button
        type="submit"
        class="text-sm px-2 py-1 bg-red-500 text-white rounded">
        Delete
      </button>
    </form>
  </div>


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
                            <div class="h-[300px] md:h-[600px] rounded-lg overflow-hidden border bg-white">
                                <iframe src="{{ asset($material->content) }}#toolbar=0" class="w-full h-full"
                                    loading="lazy"></iframe>
                            </div>

                            <a href="{{ asset($material->content) }}" target="_blank"
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

    </div>
<!-- MATERIAL MODAL -->
<div
  id="materialModal"
  class="fixed inset-0 hidden bg-black/50 z-50 flex items-center justify-center">

  <div class="bg-white rounded-xl w-full max-w-xl p-6 shadow-lg">
    <h3 id="materialModalTitle" class="text-xl font-bold mb-4">
      Add Material
    </h3>

    <form id="materialForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="materialMethod" value="POST">
      <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

      <!-- TYPE -->
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Type</label>
        <select
          name="type"
          id="materialType"
          required
          class="w-full border rounded-lg px-3 py-2">
          <option value="text">Text</option>
          <option value="image">Image</option>
          <option value="link">Link</option>
          <option value="pdf">PDF</option>
        </select>
      </div>

<!-- CONTENT -->
<div class="mb-4">
  <label class="block text-sm font-medium mb-1">Content</label>

  <!-- TEXT -->
  <textarea
    id="contentText"
    name="content_text"
    rows="4"
    class="w-full border rounded-lg px-3 py-2 hidden"
  ></textarea>

  <!-- LINK -->
  <input
    type="url"
    id="contentLink"
    name="content_link"
    class="w-full border rounded-lg px-3 py-2 hidden"
    placeholder="https://example.com"
  >

  <!-- FILE (IMAGE / PDF) -->
  <input
    type="file"
    id="contentFile"
    name="content_file"
    class="w-full border rounded-lg px-3 py-2 hidden"
    accept="image/*,.pdf"
  >
</div>


      <!-- ORDER -->
      <div class="mb-6">
        <label class="block text-sm font-medium mb-1">Order</label>
        <input
          type="number"
          name="order"
          id="materialOrder"
          value="0"
          class="w-full border rounded-lg px-3 py-2">
      </div>

      <!-- ACTIONS -->
      <div class="flex justify-end gap-3">
        <button
          type="button"
          onclick="closeMaterialModal()"
          class="px-4 py-2 bg-gray-100 rounded-lg">
          Cancel
        </button>

        <button
          type="submit"
          class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
          Save
        </button>
      </div>
    </form>
  </div>
</div>
<script>
  const materialModal = document.getElementById('materialModal');
  const materialForm = document.getElementById('materialForm');
  const materialTitle = document.getElementById('materialModalTitle');
  const materialMethod = document.getElementById('materialMethod');

  const typeSelect = document.getElementById('materialType');

  const textInput = document.getElementById('contentText');
  const linkInput = document.getElementById('contentLink');
  const fileInput = document.getElementById('contentFile');

  function resetContentInputs() {
    textInput.classList.add('hidden');
    linkInput.classList.add('hidden');
    fileInput.classList.add('hidden');

    textInput.removeAttribute('required');
    linkInput.removeAttribute('required');
    fileInput.removeAttribute('required');
  }

  function switchContentInput(type) {
    resetContentInputs();

    if (type === 'text') {
      textInput.classList.remove('hidden');
      textInput.setAttribute('required', true);
    }

    if (type === 'link') {
      linkInput.classList.remove('hidden');
      linkInput.setAttribute('required', true);
    }

    if (type === 'image' || type === 'pdf') {
      fileInput.classList.remove('hidden');
      fileInput.setAttribute('required', true);
    }
  }

  typeSelect.addEventListener('change', function () {
    switchContentInput(this.value);
  });

  function openMaterialModal(id = null, type = 'text', content = '', order = 0) {
    materialModal.classList.remove('hidden');

    if (id) {
      materialTitle.innerText = 'Edit Material';
      materialForm.action = `/staff/materials/${id}`;
      materialMethod.value = 'PUT';
    } else {
      materialTitle.innerText = 'Add Material';
      materialForm.action = `/staff/materials`;
      materialMethod.value = 'POST';
    }

    typeSelect.value = type;
    switchContentInput(type);

    textInput.value = type === 'text' ? content : '';
    linkInput.value = type === 'link' ? content : '';
    document.getElementById('materialOrder').value = order;
  }

  function closeMaterialModal() {
    materialModal.classList.add('hidden');
  }

  materialModal.addEventListener('click', function (e) {
    if (e.target === materialModal) {
      closeMaterialModal();
    }
  });
</script>



@endsection