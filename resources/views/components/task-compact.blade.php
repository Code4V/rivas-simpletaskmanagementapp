<div class="border-t text-xs border-t-slate-400/70 px-4 py-2 opacity-60">
    <div class="min-w-24 flex items-center">
        <p class="font-bold whitespace-nowrap w-24"> {{ $title }} </p>
        <div class="flex bg-slate-100">
            @if ($iscomplete)
            <span class="border border-green-400 bg-green-100/50 text-green-900 font-semibold rounded-full px-2 py-1">
                Complete
            </span>
            @else
            <span class="border border-orange-400 bg-orange-100/50 text-orange-900 font-semibold rounded-full px-2 py-1">
                Pending
            </span>
            @endif
        </div>
        <div class="ms-auto flex relative items-center gap-2">
            <span class="ms-auto text-slate-700">{{ (new DateTime($updatedAt))->format('M d, h:i') }}</span>
        </div>
    </div>
</div>