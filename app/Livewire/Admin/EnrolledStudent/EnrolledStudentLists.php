<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class EnrolledStudentLists extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";

    public $filters = [
        'search'=> NULL,
        'college_id' =>NULL,
        'department_id' =>NULL,
    ];

    public $detail = [
        'id',
        'college_id',
        'department_id' ,
        'school_year_id' ,
        'semester_id' ,
        'student_id' ,
        'year_level_id' ,
        'schedule_id' ,
    ];
    
    public $colleges = [];

    public $students = [];

    public $departments = [];

    public $school_years = [];

    public $semesters = [];

    public $subjects = [];

    public $year_levels = []; 

    public function mount($curriculum_id){


        $this->semesters = DB::table('semesters as s')
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'asc')
            ->get()
            ->toArray();
        $this->year_levels = DB::table('year_levels as yl')
            ->orderBy('yl.id', 'asc')
            ->get()
            ->toArray();

        $this->colleges = DB::table('colleges')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
        $this->departments = DB::table('departments')
            ->where('is_active','=',1)
            ->get()
            ->toArray();

    }
    public function render()
    {

         $table_data = DB::table('subjects as s')
            ->select(
                's.id' ,
                's.college_id' ,
                's.department_id' ,
                's.subject_id' ,
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
                's.is_active',
            )
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id');
        if($this->filters['college_id']){
            $table_data->where('s.college_id', '=',$this->filters['college_id']);
        }

        if($this->filters['department_id']){
            if($this->filters['department_id']){
            $table_data->where('s.department_id', '=',$this->filters['department_id']);
        }
        }
    

        if (!empty($this->filters['search'])) {
            $table_data
            ->where('s.subject_id','like','%'.$this->filters['search'] .'%')
            ->orwhere('s.subject_code','like','%'.$this->filters['search'] .'%');
        }
        $table_data = $table_data
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'desc')
            ->paginate(10);
        return view('livewire.admin.enrolled-student.enrolled-student-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }

    public function add($modal_id){
        $this->detail['shedule_id'] = NULL;
        $this->dispatch('openModal',$modal_id);
    }
}
