<?php

namespace App\Livewire\Admin\Student;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class StudentLists extends Component
{
    use WithPagination;

    public $title = "Student";

    public $route = "student";

    public $colleges = [];
    public $departments = [];
    public $year_levels = [];

    public $grades = [];

    public $equivalent_grade = [];
    public $filters = [
        'search'=> NULL,
        'college_id' =>NULL,
        'department_id' =>NULL,
        'year_level_id' =>NULL,
    ];

    public $detail = [
        'user_id'=> NULL,
        'new_password' => NULL,
        'confirm_password' => NULL,
    ];


    public function mount(){
        $this->colleges = DB::table('colleges')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
        $this->departments = DB::table('departments')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
        $this->year_levels = DB::table('year_levels')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
    }

    public function render()
    {

        $table_data = DB::table('students as s')
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
        
        if($this->filters['college_id']){
            $table_data->where('s.college_id', '=',$this->filters['college_id']);
        }

        if($this->filters['department_id']){
            if($this->filters['department_id']){
            $table_data->where('s.department_id', '=',$this->filters['department_id']);
        }
        }

        if($this->filters['year_level_id']){
            $table_data->where('s.year_level_id', '=',$this->filters['year_level_id']);
        }
        
    

        if (!empty($this->filters['search'])) {
            $table_data
            ->where('s.code','like','%'.$this->filters['search'] .'%')
            ->orwhere('s.email','like','%'.$this->filters['search'] .'%')
            ->orwhere(DB::raw('CONCAT_WS(" ", s.first_name, s.middle_name, s.last_name, s.suffix)'), 'like','%'.$this->filters['search'] .'%');
        }
        $table_data = $table_data
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'desc')
            ->paginate(10);
        return view('livewire.admin.student.student-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }


    public function gradeLists($id,$modal_id){
        $this->grades = DB::table('lab_lec_grades as llg')
            ->selectRaw('
                COUNT(cl.subject_id) as subject_count,
                ((SUM(llg.grade / llg.sub_weight) * 100) / COUNT(cl.subject_id)) as calculated_grade,
                llg.other,
                s.lecture_unit,
                s.laboratory_unit,
                sm.semester,
                s.subject_id, 
                s.subject_code,
                cl.date_created
            ')
            ->join('curriculums as cl', 'cl.id', '=', 'llg.curriculum_id')
            ->join('subjects as s', 's.id', '=', 'cl.subject_id')
            ->join('school_years as sy', 'sy.id', '=', 'cl.school_year_id')
            ->join('semesters as sm', 'sm.id', '=', 'cl.semester_id')
            ->where('llg.student_id', $id)
            ->groupBy('cl.subject_id', 
                'llg.other', 
                's.lecture_unit', 
                's.laboratory_unit',
                'sm.semester',
                's.subject_id', 
                's.subject_code',
                'cl.date_created'
                )
            ->orderBy('cl.date_created', 'asc')
            ->get()
            ->toArray();

        $this->equivalent_grade = DB::table('point_grade_equivalent')
            ->get()
            ->toArray();
        $this->dispatch('openModal',modal_id : $modal_id);
        
    }

    public function rules(){
        return [
        'detail.new_password' => [
        'required',
            Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
        'detail.confirm_password' => 'required|same:detail.new_password',
        ];
    }
    protected $messages = [
        'detail.new_password.required' => 'The new password field is required.',
        'detail.new_password.min' => 'The new password must be at least 8 characters.',
        'detail.new_password.mixed_case' => 'The new password must contain both uppercase and lowercase letters.',
        'detail.new_password.letters' => 'The new password must include at least one letter.',
        'detail.new_password.numbers' => 'The new password must include at least one number.',
        'detail.new_password.symbols' => 'The new password must include at least one special character.',
        'detail.new_password.uncompromised' => 'This new password has appeared in a data leak. Please choose a different password.',
        
        'detail.confirm_password.required_with' => 'Please confirm your password.',
        'detail.confirm_password.required' => 'The confirm password field is required.',
        'detail.confirm_password.same' => 'The password confirmation does not match.',
    ];

    public function change_password($id,$modal_id){
        $this->detail = [
            'user_id'=> $id,
            'new_password' => NULL,
            'confirm_password' => NULL,
        ];
        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function save_password($modal_id){
        $this->validate();

        $res = DB::table('users')
            ->where('id','=',$this->detail['user_id'])
            ->update([
                'password' => Hash::make($this->detail['new_password'])
            ]);

        if($res){
            $this->dispatch('notifySuccess', 
            'Updated successfully!',
                '');
        }
         $this->dispatch('closeModal',modal_id:$modal_id);
    }
}
