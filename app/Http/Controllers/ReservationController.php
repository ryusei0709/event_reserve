<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function detail($id)
    {

        $event = Event::findOrfail($id);

        // 集計の際はhavingを利用する
        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->whereNull('canceled_date')
            ->groupBy('event_id')
            ->having('event_id', $event->id)
            ->first();

        if (!is_null($reservedPeople)) {
            $reservablePeople = $event->max_people - $reservedPeople->number_of_people;
        } else {
            $reservablePeople = $event->max_people;
        }


        $isReserved = Reservation::where('user_id' , '=' , Auth::id())
        ->where('event_id' , '=' , $id)
        ->where('canceled_date', '=' , null)
        ->latest()
        ->first();

        // dd($reservablePeople,$reservedPeople,$event,$event->id);

        return view('event-detail', compact('event', 'reservablePeople', 'isReserved'));
    }


    public function reserve(Request $request)
    {
        $event = Event::findOrfail($request->id);


        // dd($event);

        $reservedPeople = DB::table('reservations')
            ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
            ->whereNull('canceled_date')
            ->groupBy('event_id')
            ->having('event_id', $request->id)
            ->first();

            // dd($reservedPeople,$event,$request->id,$event->max_people,$request->reserved_people);

        if (is_null($reservedPeople) || $event->max_people >= $reservedPeople->number_of_people + $request->reserved_people) {

            Reservation::create([
                'user_id' => Auth::id(),
                'event_id' => $request->id,
                'number_of_people' => $request->reserved_people,
            ]);

            session()->flash('status', '予約OK！');

            return to_route('dashboard');
        } else {
            session()->flash('status', 'この人数は予約できません。');
            return view('dashboard');
        }
    }
}
