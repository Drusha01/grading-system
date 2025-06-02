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
    
    public $colleges = [];

    public $students = [];

    public $departments = [];

    public $school_years = [];

    public $semesters = [];

    public $subjects = [];

    public $year_levels = []; 

    public $studentFilter = [
        'college_id'=> NULL,
        'studentFilter'=> NULL
    ];

    public $detail = [
        'student_id'=> NULL,
        'curriculum_id'=> NULL,
    ];

    protected $rules = [
        'detail.student_id' => 'required|exists:students,id',
        'detail.curriculum_id' => 'required|exists:curriculums,id',
    ];

    protected $messages = [
        'detail.student_id.required' => 'Student is required.',
        'detail.student_id.exists' => 'The selected student does not exist.',
        'detail.curriculum_id.required' => 'Curriculum is required.',
        'detail.curriculum_id.exists' => 'The selected curriculum does not exist.',
    ];



    public function mount($curriculum_id){
        $this->detail['curriculum_id'] = $curriculum_id;
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

        $table_data =  DB::table('enrolled_students as es')
            ->select(
                's.id' ,
                's.college_id' ,
                'department_id' ,
                'year_level' ,
                DB::raw('CONCAT_WS(" ", s.first_name, s.middle_name, s.last_name, s.suffix) AS fullname'),
                's.code' ,
                'first_name' ,
                'middle_name' ,
                'last_name' ,
                'suffix' ,
                'email' ,
                's.is_active' ,
                'c.name as college',
                'd.name as department',
                'c.code as college_code',
                'd.code as department_code',
                'yl.year_level'
            )
            ->leftJoin('students as s','s.id','es.student_id')
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftJoin('year_levels as yl','yl.id','s.year_level_id')
            ->where('es.curriculum_id','=',$this->detail['curriculum_id']);
        

        if (!empty($this->studentFilter['search'])) {
            $table_data
            ->where('s.code','like','%'.$this->studentFilter['search'] .'%')
            ->orwhere('s.email','like','%'.$this->studentFilter['search'] .'%')
            ->orwhere(DB::raw('CONCAT_WS(" ", s.first_name, s.middle_name, s.last_name, s.suffix)'), 'like','%'.$this->studentFilter['search'] .'%');
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
        $this->studentFilter = [
            'college_id'=> NULL,
            'studentFilter'=> NULL
        ];
        self::studentList();
        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function studentList(){
        $this->detail['student_id'] = NULL;
         $this->students = DB::table('students as s')
            ->select(
                's.id' ,
                's.college_id' ,
                'department_id' ,
                'year_level' ,
                DB::raw('CONCAT_WS(" ", s.first_name, s.middle_name, s.last_name, s.suffix) AS fullname'),
                's.code' ,
                'first_name' ,
                'middle_name' ,
                'last_name' ,
                'suffix' ,
                'email' ,
                's.is_active' ,
                'c.name as college',
                'd.name as department',
                'c.code as college_code',
                'd.code as department_code',
                'yl.year_level'
            )
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftJoin('year_levels as yl','yl.id','s.year_level_id');
        
        if($this->studentFilter['college_id']){
            $this->students->where('s.college_id', '=',$this->studentFilter['college_id']);
        }

        if (!empty($this->studentFilter['search'])) {
            $this->students
            ->where('s.code','like','%'.$this->studentFilter['search'] .'%')
            ->orwhere('s.email','like','%'.$this->studentFilter['search'] .'%')
            ->orwhere(DB::raw('CONCAT_WS(" ", s.first_name, s.middle_name, s.last_name, s.suffix)'), 'like','%'.$this->studentFilter['search'] .'%');
        }
        $this->students = $this->students
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'desc')
            ->get()
            ->toArray();
    }
    
    public function saveAdd($modal_id){
        $this->validate();

        if(DB::table('enrolled_students')
            ->where('student_id','=',$this->detail['student_id'])
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->first()
            ){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'detail.student_id' => 'Student is already added.',
            ]);
        }

        $inserted = DB::table('enrolled_students')
            ->insert($this->detail)
            ;
        if ($inserted) {
            // You can dispatch success notification or redirect here
            $this->dispatch('notifySuccess', 
            'Added successfully!',
                '');
            $this->dispatch('closeModal',modal_id : $modal_id);
        }
    }

    public function deleteStudent($id,$modal_id){
        $this->detail['student_id'] = $id;
        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function saveDelete($modal_id){
        if(DB::table('enrolled_students')
            ->where('student_id','=',$this->detail['student_id'])
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->delete()
            ){
                $this->dispatch('notifySuccess', 
        'Successfully deleted!',
            '');
            $this->dispatch('closeModal',modal_id : $modal_id);
        }
        
    }
}
