<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function getCalendar($year, $month) {
        $date =  Carbon::create($year, $month, 1);
        $daysInMonth = $date->daysInMonth;

        $calendar = [];

        for($day = 1; $day <= $daysInMonth; $day++) {
            $currentDate = Carbon::create($year, $month, $day);

            $calendar[] = [
                'date' => $currentDate->toDateString(),
                'day' => $day,
                'day_of_week' => $currentDate->format('l'),
                'is_weekend' => $currentDate->isWeekend()
            ];
        }
        return response()->json($calendar);
    }
}
