@include('partials.header')
@php 
  $now = (new DateTime())->format('Y-m-d');
@endphp
<div class="xl:w-3/4 mx-auto grid lg:grid-cols-8 lg:pt-10 px-4 xl:px-0">
  <section class="lg:col-span-2 lg:mr-8 bg-slate-50 px-4 py-6 rounded-md">
    <div class="mt-4 lg:mt-0">
      <h1 class="text-2xl font-bold">Task</h1>
      <span class="text-slate-700">Never too late to start a task.</span>
    </div>
    <form action="/tasks/insert" method="POST" class="flex flex-col gap-8 mt-4">
      @csrf
      <div class="flex flex-col gap-1">
        <label for="" class="font-semibold">Name</label>
        <input name="title" class="px-4 py-2 border rounded-md border-slate-400" type="text" placeholder="Have a task in mind?" required>
      </div>
      <div class="flex flex-col gap-1">
        <label for="" class="font-semibold">Description</label>
        <input name="description" class="px-4 py-2 border rounded-md border-slate-400" type="text" placeholder="Briefly describe your task">
      </div>
      <div class="flex flex-col gap-1">
        <label for="" class="font-semibold">Due Date</label>
        <input name="duedate" class="px-4 py-2 border rounded-md border-slate-400" type="date" min="{{ (new DateTime())->format('Y-m-d') }}" value="{{ $now }}" required>
      </div>
      <button type="submit" class="px-4 hover:bg-sky-950 transition py-2 w-fit rounded-md bg-sky-900 text-white"> Insert Task </button>
    </form>


    <div class="lg:col-span-6 mt-6 lg:mt-24">
      <div class="">
        <h2 class="text-2xl font-bold">User <span class="text-sky-900">Tip</span>!
        </h2>
        <div class="flex items-center mt-1">
          <p class="flex">Click the stack icon on a task for more options!
          </p>
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24" fill="none" class="hover:stroke-sky-950 cursor-pointer transition duration-250 stroke-sky-900">
              <path d="M5 6H19M5 10H19M5 14H19M5 18H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
        </div>
      </div>

    </div>
    @if(!true)
    <div class="lg:col-span-6 mt-6 lg:mt-24">
      <div class="">
        <h2 class="text-2xl font-bold">Completed <span class="text-sky-900">Tasks</span></h2>
        <p>Your recent completed task will show up here</p>
      </div>
      <div class="grid col-span-6">
        <div class="mt-10 grid lg:grid-cols-1 lg:col-span-6 grid-flow-row gap-4" id="tasksContainer">

          @foreach ($completedTasks as $task)
          <x-task-compact :title="$task->title" :updated_at="$task->updated_at" :iscomplete="$task->iscomplete" />
          @endforeach

        </div>
      </div>
      @endif

  </section>

  <section class="lg:col-span-6 lg:ms-8 lg:mt-0 mt-8 pb-16">
    <div class="lg:col-span-6">
      <h2 class="text-2xl font-bold mb-4 lg:mb-0">Current <span class="text-sky-900">Tasks</span></h2>
      {{ $tasks->links() }}
    </div>
    <div class="grid col-span-6">
      <div class="mt-10 grid lg:grid-cols-2 lg:col-span-6 gap-4" id="tasksContainer">
        <!-- Create container -->

        @if (count($tasks))
        @foreach ($tasks as $task)
        <x-task :title="$task->title" :description="$task->description" :duedate="$task->duedate" :id="$task->id" :iscomplete="$task->iscomplete" />
        @endforeach
        @else
        <div class=""><span>You've caught up! You can always add more if you want! </span></div>
        @endif
      </div>

  </section>
</div>




</div>

@include('partials.footer')