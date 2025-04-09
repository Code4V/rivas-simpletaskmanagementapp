@include('partials.header')
@php 
  $now = (new DateTime("now", new DateTimeZone("GMT+08:00")))->format('Y-m-d');
@endphp
<div class="xl:w-1/2 mx-auto lg:pt-10 px-4 xl:px-0">

  <div class="mt-12">
    <h1 class="text-2xl font-bold">Update <span class="text-sky-900">Task</span> #{{ $task->title }}</h1>
  </div>
  <div class="mt-8">
    <x-task :title="$task->title" :description="$task->description" :duedate="$task->duedate" :id="$task->id" :iscomplete="$task->iscomplete" />
  </div>

  <form action="/tasks/update" method="POST" class="flex flex-col mt-10 gap-8">
    @csrf
    <div class="flex flex-col gap-1">
      <label for="title" class="font-semibold">Title<span class="text-sky-900"> *</span></label>
      <input id="title" name="title" class="px-4 py-2 border rounded-md border-slate-400" type="text" placeholder="What's on your mind" value="{{ $task->title }}">
    </div>
    <div class="flex flex-col gap-1">
      <label for="description" class="font-semibold">Description</label>
      <input id="description" name="description" class="px-4 py-2 border rounded-md border-slate-400" type="text" placeholder="Describe this task" value="{{ $task->description }}">
    </div>
    <div class="flex flex-col gap-1">
      <label for="dueDate" class="font-semibold">Due Date<span class="text-sky-900"> *</span></label>
      <input id="dueDate" name="duedate" class="px-4 py-2 border rounded-md border-slate-400" type="date" min="{{ $now }}" value="{{ (new DateTime($task->duedate))->format('Y-m-d') }}">
    </div>

    <input type="hidden" name="id" value="{{ $task->id }}">
    <input type="hidden" name="_method" value="PATCH" />

    <div class="flex gap-2">
      <button type="submit" class="border bg-sky-900 text-white border-sky-900 px-4 rounded-md hover:bg-sky-950 transition py-2"> Update Task </button>
      <a href="/" class="px-4 py-2 rounded-md hover:text-white hover:bg-red-800 transition text-red-800 border block">Cancel</a>
    </div>
  </form>

</div>
@include('partials.footer')