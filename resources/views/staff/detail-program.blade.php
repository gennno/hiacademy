@extends('staff.layoutadmin.layout')

@section('pagetitle', 'Program')

@section('content')

  <div class="bg-white rounded-xl shadow-md p-4 mb-2">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 ">

      <!-- LEFT: BACK BUTTON -->
      <a href="{{ route('staffdashboard') }}"
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

      </div>

    </div>
  </div>


  <div class="bg-white rounded-xl shadow-md p-8 mb-6">
    <div class="flex flex-col md:flex-row gap-8">

      <div class="md:w-1/4">
        <img src="{{ $program->image
    ? asset($program->image)
    : asset('img/default-program.png') }}" class="h-64 w-auto rounded-lg">
      </div>

      <div class="md:w-3/4">
        <h1 class="text-3xl font-bold mb-4">
          {{ $program->name }}
        </h1>
        <p class="text-gray-600 mb-6">
          {{ $program->description }}
        </p>

        <div class="mb-6">
          <div class="flex justify-between text-sm mb-1">
            <span>Your Progress</span>
            <span>{{ $progressPercent }}%</span>
          </div>

          <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $progressPercent }}%"></div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
          <div>
            <h3 class="font-bold">Lessons</h3>
            <p>{{ $lessons->count() }}</p>
          </div>
        </div>
      </div>

    </div>
  </div>

<div class="bg-white rounded-xl shadow-md p-8">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold">Lessons</h2>

    <button
      id="openAddLessonModal"
      class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
      + Add Lesson
    </button>
  </div>

<div class="space-y-4">
  @foreach ($lessons as $index => $lesson)
    <div class="block border rounded-lg p-4 transition-all hover:bg-blue-50 hover:shadow-md
                {{ $index === 0 ? 'bg-gray-50' : '' }}">

      <div class="flex items-center justify-between">
        <!-- LEFT: INFO -->
        <div>
          <h3 class="font-bold">
            {{ $index + 1 }}. {{ $lesson->title }}
          </h3>

          <p class="text-sm text-gray-500">
            5 Materials
          </p>
        </div>

        <!-- RIGHT: ACTIONS -->
        <div class="flex items-center gap-2">
          <!-- VIEW -->
          <a
            href="{{ route('stafflessondetail', [$program->slug, $lesson->id]) }}"
            class="px-3 py-1 text-sm bg-blue-400 rounded hover:bg-blue-500">
            View
          </a>

          <!-- EDIT -->
          <button
            type="button"
            class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600"
            onclick="openEditLessonModal(
              {{ $lesson->id }},
              '{{ addslashes($lesson->title) }}',
              '{{ addslashes($lesson->description) }}',
              {{ $lesson->order }}
            )">
            Edit
          </button>

          <!-- DELETE -->
          <form
            method="POST"
            action="{{ route('stafflesson.destroy', $lesson->id) }}"
            onsubmit="return confirm('Delete this lesson?')">
            @csrf
            @method('DELETE')

            <button
              type="submit"
              class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
  @endforeach
</div>

  </div>
<!-- ADD LESSON MODAL -->
<div
  id="addLessonModal"
  class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">

  <div class="bg-white rounded-xl w-full max-w-lg p-6 shadow-lg relative">

    <h3 class="text-xl font-bold mb-4">Add New Lesson</h3>

    <form method="POST" action="{{ route('stafflesson.store') }}">
      @csrf

      <input type="hidden" name="program_id" value="{{ $program->id }}">

      <!-- TITLE -->
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Lesson Title</label>
        <input
          type="text"
          name="title"
          required
          class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200">
      </div>

      <!-- DESCRIPTION -->
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Description</label>
        <textarea
          name="description"
          rows="3"
          class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-indigo-200"></textarea>
      </div>

      <!-- ORDER -->
      <div class="mb-6">
        <label class="block text-sm font-medium mb-1">Order</label>
        <input
          type="number"
          name="order"
          value="0"
          class="w-full border rounded-lg px-3 py-2">
      </div>

      <!-- ACTIONS -->
      <div class="flex justify-end gap-3">
        <button
          type="button"
          id="closeAddLessonModal"
          class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
          Cancel
        </button>

        <button
          type="submit"
          class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
          Save Lesson
        </button>
      </div>
    </form>

  </div>
</div>
<!-- EDIT LESSON MODAL -->
<div
  id="editLessonModal"
  class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

  <div class="bg-white rounded-xl w-full max-w-lg p-6 shadow-lg">
    <h3 class="text-xl font-bold mb-4">Edit Lesson</h3>

    <form id="editLessonForm" method="POST">
      @csrf
      @method('PUT')

      <!-- TITLE -->
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Lesson Title</label>
        <input
          type="text"
          id="editLessonTitle"
          name="title"
          required
          class="w-full border rounded-lg px-3 py-2">
      </div>

      <!-- DESCRIPTION -->
      <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Description</label>
        <textarea
          id="editLessonDescription"
          name="description"
          rows="3"
          class="w-full border rounded-lg px-3 py-2"></textarea>
      </div>

      <!-- ORDER -->
      <div class="mb-6">
        <label class="block text-sm font-medium mb-1">Order</label>
        <input
          type="number"
          id="editLessonOrder"
          name="order"
          class="w-full border rounded-lg px-3 py-2">
      </div>

      <!-- ACTIONS -->
      <div class="flex justify-end gap-3">
        <button
          type="button"
          onclick="closeEditLessonModal()"
          class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">
          Cancel
        </button>

        <button
          type="submit"
          class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
          Update
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addLessonModal');
    const openBtn = document.getElementById('openAddLessonModal');
    const closeBtn = document.getElementById('closeAddLessonModal');

    openBtn.addEventListener('click', function () {
      modal.classList.remove('hidden');
    });

    closeBtn.addEventListener('click', function () {
      modal.classList.add('hidden');
    });

    // Close when clicking outside modal content
    modal.addEventListener('click', function (e) {
      if (e.target === modal) {
        modal.classList.add('hidden');
      }
    });
  });
</script>
<script>
  const editModal = document.getElementById('editLessonModal');
  const editForm = document.getElementById('editLessonForm');

  function openEditLessonModal(id, title, description, order) {
    editForm.action = `/staff/lessons/${id}`;

    document.getElementById('editLessonTitle').value = title;
    document.getElementById('editLessonDescription').value = description ?? '';
    document.getElementById('editLessonOrder').value = order ?? 0;

    editModal.classList.remove('hidden');
    editModal.classList.add('flex');
  }

  function closeEditLessonModal() {
    editModal.classList.add('hidden');
    editModal.classList.remove('flex');
  }

  // Close when clicking outside
  editModal.addEventListener('click', function (e) {
    if (e.target === editModal) {
      closeEditLessonModal();
    }
  });
</script>

@endsection