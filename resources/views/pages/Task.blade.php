@include('partials.header')
<div class="w-1/2 mx-auto mt-4">

  <div class="mt-12">
    <h1 class="text-2xl font-bold">Update Task #{{ $task->title }}</h1>
  </div>
  <div class="mt-8">
    <x-task :title="$task->title" :description="$task->description" :duedate="$task->duedate" :id="$task->id" :iscomplete="$task->iscomplete" />
  </div>

  <form action="/tasks/update" method="POST" class="flex flex-col mt-10 gap-8">
    @csrf
    <div class="flex flex-col gap-1">
      <label for="" class="font-semibold">Title</label>
      <input name="title" class="px-4 py-2 border" type="text" placeholder="What's on your mind" value="{{ $task->title }}">
    </div>
    <div class="flex flex-col gap-1">
      <label for="" class="font-semibold">Description</label>
      <input name="description" class="px-4 py-2 border" type="text" placeholder="Describe this task" value="{{ $task->description }}">
    </div>
    <div class="flex flex-col gap-1">
      <label for="" class="font-semibold">Due Date</label>
      <input name="duedate" class="px-4 py-2 border" type="date" min="{{ (new DateTime())->format('Y-m-d') }}" value="{{ (new DateTime($task->duedate))->format('Y-m-h') }}">
    </div>

    <input type="hidden" name="id" value="{{ $task->id }}">
    <input type="hidden" name="_method" value="PATCH" />

    <div class="flex gap-2">
      <button type="submit" class="border bg-sky-900 text-white border-sky-900 px-4 py-2"> Update Task </button>
      <a href="/" class="px-4 py-2 text-red-600 border block">Cancel</a>
    </div>
  </form>

</div>
@include('partials.footer')