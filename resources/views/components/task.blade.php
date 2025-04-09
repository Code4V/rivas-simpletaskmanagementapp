@php 
    $now = (new DateTime('now', new DateTimeZone('GMT+08:00')));
    $duedate = (new DateTime($duedate, new DateTimeZone('GMT+08:00')));
    $duedateFormatted = sprintf("hover:after:content-['%s']", $duedate->format("Y-m-d"));

    $dueRelative = date_diff($now, $duedate);

    $remaining = (int) $dueRelative->format("%R%a");

    $daysleft = '';

    $isoverdue = $remaining < 0 ? true : false;

    if ($remaining == 0)  {
        $daysleft = "Within the day";
    } else if ($remaining == 1) {
        $daysleft = "A day left";
    } else if ($remaining == -1) {
        $daysleft = "A day ago";
    } else if ($remaining < 0) {
        $daysleft = sprintf("%s day ago", abs($remaining));
    } else 
        $daysleft = sprintf("%s days left", $remaining);

@endphp

<div class="border-t bg-slate-50 rounded-md {{ $iscomplete ? 'opacity-50 pointer-events-none' : '' }} border-t-slate-400/70 px-4 py-6 ">
    <section class="flex flex-col gap-2 h-full">
        <div class="min-w-24 flex">
            <p class="text-lg leading-4 font-bold"> {{ ucfirst($title) }} </p>
            <div class="ms-auto flex relative items-center gap-2">
                <span class="ms-auto relative text-gray-500">{{ $iscomplete ? 'Task Done' : $daysleft }}</span>
                <span onclick="showOptions('{{$id}}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" viewBox="0 0 24 24" fill="none" class="hover:stroke-sky-950 cursor-pointer transition duration-250 stroke-sky-900">
                        <path d="M5 6H19M5 10H19M5 14H19M5 18H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <div data-tab="{{ $id }}" class="absolute hidden flex bg-slate-50 flex-col w-38 -left-4 content-center -bottom-28 rounded-md shadow-md text-xs">
                    <form action="/tasks/delete" id="deleteForm" class="w-full" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="id" value="{{ $id }}" />
                        <button class="px-4 py-2 hover:text-red-800 hover:font-semibold transition text-left w-full" type="submit"> Delete
                        </button>
                    </form>
                    <a href="/task/{{ $id }}" class="px-4 py-2 transition hover:font-semibold border-t border-t-slate-400/70 hover:text-sky-900">Edit</a>
                    @if (!$iscomplete)
                    <form action="/tasks/mark" id="deleteForm" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <input type="hidden" name="id" value="{{ $id }}" />
                        <button class="px-4 py-2 transition hover:text-green-900 border-t w-full text-left border-t-slate-400/70 hover:font-semibold">Mark As Complete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="max-w-80 text-sm line-clamp-3 text-slate-700 mb-2">
            <p>{{ $description }}</p>
        </div>
        <div class="flex gap-1 mt-auto">
            @if ($iscomplete)
            <span class="border text-xs border-green-400 bg-green-100/50 text-green-900 font-semibold rounded-full px-2 py-1">
                Complete
            </span>
            @else
            <span class="border text-xs border-orange-400 bg-orange-100/50 text-orange-900 font-semibold rounded-full px-2 py-1">
                Pending
            </span>
            @endif
            @if ($isoverdue && !$iscomplete) 
            <span class="border text-xs border-red-400 bg-red-100/50 text-red-900 font-semibold rounded-full px-2 py-1">
                Overdue
            </span>
            @endif 
        </div>
    </section>
</div>