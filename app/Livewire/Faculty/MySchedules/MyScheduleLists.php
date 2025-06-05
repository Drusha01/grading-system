<?php

namespace App\Livewire\Faculty\MySchedules;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class MyScheduleLists extends Component
{
    use WithPagination;
    public $title = "My Schedule";
    public $route = 'my-schedule';
    
    public function render()
    {

        $userId = Session::get('user_id');

        $table_data = DB::table('users as u')
            ->select(
                'cl.id' ,
                's.college_id' ,
                's.department_id' ,
                'cl.subject_id' ,
                'cl.room_id' ,
                's.subject_code' ,
                's.description',
                's.prerequisite_subject_id' ,
                's.lecture_unit',
                's.laboratory_unit' ,
                'c.name as college',
                'd.name as department',
                'c.code as college_code',
                'd.code as department_code',
                'pr.subject_id as prerequisite_subject_id',
                'pr.subject_code as prerequisite_subject_code',
                DB::raw('CONCAT_WS(" ", u.first_name, u.middle_name, u.last_name, u.suffix) AS faculty_fullname'),
                DB::raw('CONCAT(s.subject_id," - ",s.subject_code) as subject'),
                'r.code as room_code',
                'r.name as room_name',
                's.is_active',
                DB::raw("DATE_FORMAT(cl.schedule_from, '%h:%i %p') as schedule_from"),
                DB::raw("DATE_FORMAT(cl.schedule_to, '%h:%i %p') as schedule_to"),
                'sh.day' ,
                'sh.is_lec' ,
                'cl.faculty_id',
            )
            ->join('faculty as f','f.user_id','u.id')
            ->join('curriculums as cl','cl.faculty_id','f.id')
            ->where('f.user_id','=',$userId)
            ->leftJoin('subjects as s','s.id','cl.subject_id')
            ->leftJoin('rooms as r','r.id','cl.room_id')
            ->leftJoin('schedules as sh','sh.id','cl.schedule_id')
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id');

        if (!empty($this->filters['search'])) {
            $table_data
            ->where('s.subject_id','like','%'.$this->filters['search'] .'%')
            ->orwhere('s.subject_code','like','%'.$this->filters['search'] .'%');
        }
        $table_data = $table_data
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'desc')
            ->paginate(10);
        return view('livewire.faculty.my-schedules.my-schedule-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
