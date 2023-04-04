<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MypageService;
use Carbon\Carbon;
use Caron\Caron;


class MyPageController extends Controller
{
    
    public function index()
    {

        $user = User::findOrFail(Auth::id());
        $events = $user->events;

        // dd($user, $events);

        $fromTodayEvents = MyPageService::reservedEvent($events, 'fromToday');
        $pastEvents = MyPageService::reservedEvent($events, 'past');

        // dd($user, $events,$fromTodayEvents,$pastEvents);

        return view('mypage.index', compact('fromTodayEvents','pastEvents'));

    }


    public function show($id)
    {

        $event = Event::findOrFail($id);
        $reservation = Reservation::where('user_id' , '=' , Auth::id())
        ->where('event_id' , '=' , $id)
        ->latest()
        ->first();

        return view('mypage.show', compact('event' , 'reservation'));

    }


    public function cancel($id)
    {
        // dd($id);

        $reservation = Reservation::where('user_id' , '=' , Auth::id())
        ->latest()
        ->where('event_id' , '=' , $id)->first();


        $reservation->canceled_date = Carbon::now()->format('Y-m-d H:i:s');

        $reservation->save();

        session()->flash('status', 'キャンセルが完了しました');
        return to_route('dashboard');

    }


}
