<x-layouts.app :title="__('Interview Calendar')">
  @php
      // Calculate next month and year
      $nextMonth = $month == 12 ? 1 : $month + 1;
      $nextYear = $month == 12 ? $year + 1 : $year;
      $nextFirstDayOfWeek = \Carbon\Carbon::create($nextYear, $nextMonth, 1)->dayOfWeekIso;
      $nextDaysInMonth = \Carbon\Carbon::create($nextYear, $nextMonth, 1)->daysInMonth;
  @endphp

  <div class="max-w-6xl mx-auto px-4 py-8 dark:bg-neutral-900 min-h-screen">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
      <form method="GET" class="flex items-center gap-3">
        <button name="month" value="{{ $month == 1 ? 12 : $month - 1 }}" name="year" value="{{ $month == 1 ? $year - 1 : $year }}"
                class="w-9 h-9 rounded-full bg-neutral-800 text-white hover:bg-blue-600 transition">
          <i class="fa fa-chevron-left"></i>
        </button>

        <span class="text-lg font-medium text-neutral-600 dark:text-neutral-400">{{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</span>

        <button name="month" value="{{ $month == 12 ? 1 : $month + 1 }}" name="year" value="{{ $month == 12 ? $year + 1 : $year }}"
                class="w-9 h-9 rounded-full bg-neutral-800 text-black dark:text-white hover:bg-blue-600 hover:text-white transition">
          <i class="fa fa-chevron-right"></i>
        </button>
      </form>

      <a href="{{ route('interviews.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition text-sm font-medium">
        <i class="fa fa-calendar-plus mr-1"></i> Schedule Interview
      </a>
    </div>

    <!-- Days of the Week -->
    <div class="grid grid-cols-7 text-center text-xs text-neutral-400 font-medium mb-2">
      @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $d)
        <div class="py-2">{{ $d }}</div>
      @endforeach
    </div>

    <!-- Calendar Grid (Dark + Scrollable) -->
    <div class="overflow-x-auto">
      <div class="flex flex-col sm:flex-row gap-8 min-w-[860px] bg-zinc-800/90 rounded-3xl shadow-2xl p-4 sm:p-10">
        <!-- First Month -->
        <div class="flex-1">
          <div class="grid grid-cols-7 gap-x-4 gap-y-6 mb-2">
            @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $d)
              <div class="text-xs text-zinc-400 text-center font-semibold tracking-wide">{{ $d }}</div>
            @endforeach
          </div>
          <div class="grid grid-cols-7 gap-x-4 gap-y-6">
            @for($i = 1; $i < $firstDayOfWeek; $i++)
              <div></div>
            @endfor
            @for($day = 1; $day <= $daysInMonth; $day++)
              <div class="flex items-center justify-center">
                @if(isset($interviews[$day]) && count($interviews[$day]) > 0)
                    <a href="{{ route('interviews.edit', $interviews[$day][0]) }}">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full text-base font-medium transition select-none cursor-pointer
                            {{ now()->isSameDay(\Carbon\Carbon::create($year, $month, $day)) ? 'border-2 text-black dark:border-white dark:text-white' : '' }}
                            bg-blue-600 text-white">
                            {{ $day }}
                        </span>
                    </a>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-full text-base font-medium transition select-none
                        {{ now()->isSameDay(\Carbon\Carbon::create($year, $month, $day)) ? 'border-2 text-black dark:border-white dark:text-white' : '' }}
                        text-zinc-200">
                        {{ $day }}
                    </span>
                @endif
              </div>
            @endfor
          </div>
        </div>

        <!-- Second Month -->
        <div class="flex-1">
          <div class="grid grid-cols-7 gap-x-4 gap-y-6 mb-2">
            @foreach(['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $d)
              <div class="text-xs text-zinc-400 text-center font-semibold tracking-wide">{{ $d }}</div>
            @endforeach
          </div>
          <div class="grid grid-cols-7 gap-x-4 gap-y-6">
            @for($i = 1; $i < $nextFirstDayOfWeek; $i++)
              <div></div>
            @endfor
            @for($day = 1; $day <= $nextDaysInMonth; $day++)
              <div class="flex items-center justify-center">
                @if(isset($interviewsNextMonth[$day]) && count($interviewsNextMonth[$day]) > 0)
                    <a href="{{ route('interviews.edit', $interviewsNextMonth[$day][0]) }}">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full text-base font-medium transition select-none cursor-pointer
                            {{ (\Carbon\Carbon::now()->year == $nextYear && \Carbon\Carbon::now()->month == $nextMonth && \Carbon\Carbon::now()->day == $day) ? 'border-2 border-white text-white' : '' }}
                            bg-gradient-to-br from-blue-500 to-violet-600 text-white">
                            {{ $day }}
                        </span>
                    </a>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-full text-base font-medium transition select-none
                        {{ (\Carbon\Carbon::now()->year == $nextYear && \Carbon\Carbon::now()->month == $nextMonth && \Carbon\Carbon::now()->day == $day) ? 'border-2 border-white text-white' : '' }}
                        text-zinc-200">
                        {{ $day }}
                    </span>
                @endif
              </div>
            @endfor
          </div>
        </div>
      </div>
    </div>

    <!-- 📊 Event Summary Section -->
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4 text-white">
      <div class="dark:bg-neutral-900 border border-neutral-700 rounded-lg p-4">
        <div class="text-sm text-neutral-600 dark:text-neutral-400">All Events</div>
        <div class="text-2xl font-bold dark:text-white text-black">{{ collect($interviews)->flatten()->count() }}</div>
      </div>
      <div class="dark:bg-neutral-900 border border-neutral-700 rounded-lg p-4">
        <div class="text-sm text-neutral-600 dark:text-neutral-400">Upcoming</div>
        <div class="text-2xl font-bold dark:text-white text-black">
          {{ collect($interviews)->flatten()->filter(fn($i) => $i->scheduled_at->isFuture())->count() }}
        </div>
      </div>
      <div class="dark:bg-neutral-900 border border-neutral-700 rounded-lg p-4">
        <div class="text-sm text-neutral-600 dark:text-neutral-400">Past</div>
        <div class="text-2xl font-bold dark:text-white text-black">
          {{ collect($interviews)->flatten()->filter(fn($i) => $i->scheduled_at->isPast())->count() }}
        </div>
      </div>
    </div>

  </div>
</x-layouts.app>
