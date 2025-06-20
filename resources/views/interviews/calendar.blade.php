<x-layouts.app :title="__('Interview Calendar')">
    <div class="max-w-4xl mx-auto py-8 px-2">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <form method="GET" class="flex gap-2 items-center">
                <button name="month" value="{{ $month == 1 ? 12 : $month - 1 }}" name="year" value="{{ $month == 1 ? $year - 1 : $year }}" class="flex items-center justify-center w-9 h-9 rounded-full bg-neutral-200 dark:bg-neutral-700 text-lg font-bold hover:bg-blue-100 dark:hover:bg-blue-800 transition">&lt;</button>
                <span class="text-xl font-bold text-neutral-900 dark:text-white px-4">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>
                <button name="month" value="{{ $month == 12 ? 1 : $month + 1 }}" name="year" value="{{ $month == 12 ? $year + 1 : $year }}" class="flex items-center justify-center w-9 h-9 rounded-full bg-neutral-200 dark:bg-neutral-700 text-lg font-bold hover:bg-blue-100 dark:hover:bg-blue-800 transition">&gt;</button>
            </form>
            <a href="{{ route('interviews.create') }}" class="">
                <flux:button class="!bg-blue-600 hover:!bg-blue-700 border !border-blue-600"><i class="fa fa-calendar-plus"></i>
                Schedule Interview</flux:button>
            </a>
        </div>
        <div class="overflow-x-auto pb-2">
            <div class="min-w-[600px] grid grid-cols-7 gap-2 text-center text-xs font-semibold text-neutral-500 mb-2">
                @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $d)
                    <div>{{ $d }}</div>
                @endforeach
            </div>
            <div class="min-w-[600px] grid grid-cols-7 gap-2">
                @for($i = 1; $i < $firstDayOfWeek; $i++)
                    <div></div>
                @endfor
                @for($day = 1; $day <= $daysInMonth; $day++)
                    <div class="relative group bg-white/80 dark:bg-neutral-900/80 rounded-2xl p-2 min-h-[80px] border border-neutral-200 dark:border-neutral-700 shadow-sm flex flex-col transition-all duration-200
                        {{ now()->isSameDay(\Carbon\Carbon::create($year, $month, $day)) ? 'ring-2 ring-blue-500 scale-[1.03] z-10' : 'hover:ring-2 hover:ring-blue-300' }}">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-bold text-neutral-700 dark:text-neutral-200">{{ $day }}</span>
                            <a href="{{ route('interviews.create', ['date' => "$year-$month-$day"]) }}"
                               class="text-blue-500 hover:text-blue-700 text-lg font-bold opacity-0 group-hover:opacity-100 focus:opacity-100 transition absolute top-2 right-2 z-20">
                                <i class="fa fa-plus-circle"></i>
                            </a>
                        </div>
                        <div class="flex flex-col gap-1">
                            @if(isset($interviews[$day]))
                                @foreach($interviews[$day] as $interview)
                                    <div class="flex items-center gap-2 bg-blue-50 dark:bg-blue-900/40 text-blue-800 dark:text-blue-200 text-xs rounded-lg px-2 py-1 mb-1 shadow-sm">
                                        <i class="fa fa-briefcase text-blue-400"></i>
                                        <span class="truncate font-semibold">{{ $interview->title ?? 'Interview' }}</span>
                                        <span class="ml-auto text-[11px] text-blue-500 dark:text-blue-300 font-mono">{{ $interview->scheduled_at->format('H:i') }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-layouts.app>