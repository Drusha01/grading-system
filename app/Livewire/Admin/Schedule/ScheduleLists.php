<?php

namespace App\Livewire\Admin\Schedule;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ScheduleLists extends Component
{
    public $title = "Schedule";

    public $route = "schedule";

    public $subjects;

    public $rooms;
    
    public $days  = [
        ['day'=>'M','day_full'=>'Monday'],
        ['day'=>'T','day_full'=>'Tuesday'],
        ['day'=>'W','day_full'=>'Wednesday'],
        ['day'=>'TH','day_full'=>'Thursday'],
        ['day'=>'F','day_full'=>'Friday'],
        ['day'=>'S','day_full'=>'Saturday'],
        ['day'=>'Sun','day_full'=>'Sunday'],
    ];

    public function mount(){
        $this->subjects = DB::table('subjects')
            ->where('is_active','=',1)
            ->get()
            ->toArray();

        $this->rooms = DB::table('rooms')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
    }

    public function render()
    {

        $table_data = DB::table('schedules as s')
            ->paginate(10);
        return view('livewire.admin.schedule.schedule-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
