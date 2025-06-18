<x-layouts.app :title="__('Interview Calendar')">
    <div class="max-w-3xl mx-auto py-8">
        <div class="flex justify-between items-center mb-4">
            <form method="GET" class="flex gap-2">
                <button name="month" value="{{ $month == 1 ? 12 : $month - 1 }}" name="year" value="{{ $month == 1 ? $year - 1 : $year }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-neutral-700">&lt;</button>
                <span class="text-lg font-bold">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>
                <button name="month" value="{{ $month == 12 ? 1 : $month + 1 }}" name="year" value="{{ $month == 12 ? $year + 1 : $year }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-neutral-700">&gt;</button>
            </form>
            <a href="{{ route('interviews.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Schedule Interview</a>
        </div>
        <div class="grid grid-cols-7 gap-2 text-center text-xs font-semibold text-neutral-500 mb-2">
            @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $d)
                <div>{{ $d }}</div>
            @endforeach
        </div>
        <div class="grid grid-cols-7 gap-2">
            @for($i = 1; $i < $firstDayOfWeek; $i++)
                <div></div>
            @endfor
            @for($day = 1; $day <= $daysInMonth; $day++)
                <div class="relative bg-white dark:bg-neutral-800 rounded-lg p-2 min-h-[60px] border border-neutral-200 dark:border-neutral-700
                    {{ now()->isSameDay(\Carbon\Carbon::create($year, $month, $day)) ? 'ring-2 ring-blue-500' : '' }}">
                    <div class="text-xs font-bold mb-1">{{ $day }}</div>
                    @if(isset($interviews[$day]))
                        @foreach($interviews[$day] as $interview)
                            <div class="bg-blue-100 text-blue-800 text-xs rounded px-1 py-0.5 mb-1 truncate">
                                {{ $interview->title ?? 'Interview' }}
                                <span class="block text-[10px] text-blue-500">{{ $interview->scheduled_at->format('H:i') }}</span>
                            </div>
                        @endforeach
                    @endif
                    <a href="{{ route('interviews.create', ['date' => "$year-$month-$day"]) }}"
                       class="absolute bottom-1 right-1 text-2xl p-1 text-blue-600 hover:underline">
                        +
                    </a>
                </div>
            @endfor
        </div>
    </div>
</x-layouts.app>