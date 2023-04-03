<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\CarbonImmutable;
use App\Services\EventService;

class Calendar extends Component
{

    public $currentDate;
    public $currentWeek;
    public $day;
    public $checkDay;
    public $dayOfWeek;
    public $sevenDaysLater;
    public $events;

    public function mount()
    {
        $this->currentDate = CarbonImmutable::today();
        $this->sevenDaysLater = $this->currentDate->addDays(7);
        $this->currentWeek = [];

        // dd($this->currentDate, $this->sevenDaysLater);

        $this->events = EventService::getWeekEvents(
            $this->currentDate->format('Y-m-d'),
            $this->sevenDaysLater->format('Y-m-d')
        );


        // dd($this->events);
        // echo '<pre>';
        // var_dump($this->events);
        // exit;

    // $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . ' ' . \Constant::EVENT_TIME[$j];

    
    
    
    for($i = 0; $i < 7; $i++) {
        $this->day = CarbonImmutable::today()->addDays($i)->format('m月d日');
        $this->checkDay = CarbonImmutable::today()->addDays($i)->format('Y-m-d');
        $this->dayOfWeek = CarbonImmutable::today()->addDays($i)->dayName;
        $this->currentWeek [] = [
            'day' => $this->day,
            'checkDay' => $this->checkDay,
            'dayOfWeek' => $this->dayOfWeek,
        ];
    }

        // dd($this->currentWeek);

    }

    public function getDate($date)
    {

        
        $this->currentDate = $date;
        $this->sevenDaysLater = CarbonImmutable::parse($this->currentDate)->addDays(7);
        $this->currentWeek = [];

        $this->events = EventService::getWeekEvents(
            $this->currentDate,
            $this->sevenDaysLater->format('Y-m-d')
        );

        for($i = 0; $i < 7; $i++) {
            $this->day = CarbonImmutable::parse($this->currentDate)->addDays($i)->format('m月d日');
            $this->checkDay = CarbonImmutable::parse($this->currentDate)->addDays($i)->format('Y-m-d');
            $this->dayOfWeek = CarbonImmutable::parse($this->currentDate)->addDays($i)->dayName;
            $this->currentWeek [] = [
                'day' => $this->day,
                'checkDay' => $this->checkDay,
                'dayOfWeek' => $this->dayOfWeek,
            ];
        }

    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
