<?php

namespace App\Livewire\Admin\Evaluation;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class EvaluationLists extends Component
{

    public $title = "Evaluation";

    public $route = "evaluation";

    public $colleges = [];

    public $students = [];

    public $departments = [];

    public $school_years = [];

    public $semesters = [];

    public $subjects = [];

    public $year_levels = []; 

    public $terms = [];

    public $school_work_types = [];

    public $school_works = [];

    public $detail = [
        'student_id'=> NULL,
        'curriculum_id'=> NULL,
        'term_id'=> NULL,
    ];

    public $school_work_type = [
        'id' => NULL,
        'curriculum_id' => NULL,
        'term_id' => NULL,
        'lab_lec_id' => NULL,
        'school_work_type' => NULL,
        'weight' => NULL,
        'number_order' => NULL,
    ];
    
    public $school_work = [
        'id' => NULL,
        'curriculum_id' => NULL,
        'term_id' => NULL,
        'school_work_name' => NULL,
        'school_work_type_id' => NULL,
        'max_score' => NULL,
        'schedule_date' => NULL,
        'number_order' => NULL,
    ];

    public $student_scores = [];

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

        self::terms($this->detail['curriculum_id']);
        if(count($this->terms)){
            $this->detail['term_id'] = $this->terms[0]->id;
        }
        self::school_work_types($this->detail['curriculum_id']);
    }

    public function UpdatedDetailTermId($term_id){
        $this->detail['term_id'] = $term_id;
        self::school_work_types($this->detail['curriculum_id']);
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

        $student_id = $table_data->pluck('id');

        self::student_scores($student_id);

        return view('livewire.admin.evaluation.evaluation-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }

    public function terms($curriculum_id){
        $this->terms = DB::table('terms')
        ->where('curriculum_id','=',$curriculum_id)
        ->orderBy('term_order','asc')
        ->get()
        ->toArray();
    }

    public $school_work_type_value = [];
    public function school_work_types($curriculum_id){
        $this->school_work_types = DB::table('school_works_types')
            ->where('curriculum_id','=',$curriculum_id)
            ->where('term_id','=',$this->detail['term_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();

        $this->school_work_type_value = [];
        foreach ($this->school_work_types as $key => $value) {
            array_push($this->school_work_type_value,['val'=>$value->weight]);
        }
    }


    public function open_school_work_types_modal($modal_id){
        self::school_work_types($this->detail['curriculum_id']);

        $total = DB::table('school_works_types')
            ->select(DB::raw('count(*) as total'))
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->first();

        $this->school_work_type = [
            'id' => NULL,
            'curriculum_id' => $this->detail['curriculum_id'],
            'term_id'=> $this->detail['term_id'],
            'lab_lec_id' => NULL,
            'school_work_type' => NULL,
            'weight' => 0,
            'number_order' => (intval($total->total)+1),
        ];

        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function add_school_work_type(){
        $this->validate(
            [
                'school_work_type.school_work_type' => 'required|string',
                'school_work_type.weight' => 'required|numeric|min:0.1',
            ],
            [
                'school_work_type.school_work_type.required' => 'The school work type is required.',
                'school_work_type.school_work_type.string' => 'The school work type must be a valid string.',
                'school_work_type.weight.required' => 'The weight is required.',
                'school_work_type.weight.numeric' => 'The weight must be a valid number.',
                'school_work_type.weight.min' => 'The weight must be greater than zero.',
            ]
        );

        if(DB::table('school_works_types')  
            ->where('school_work_type','=',$this->school_work_type['school_work_type'])  
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->first()){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'school_work_type.school_work_type' => 'School work type exists',
            ]);
        }

        $weight = DB::table('school_works_types')
            ->select(DB::raw('sum(weight) as total_weight'))
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->first();

        if($weight->total_weight + $this->school_work_type['weight'] >100 ){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'school_work_type.weight' => 'The weight exceeds '.(100 - $weight->total_weight),
            ]);
        }

        $res = DB::table('school_works_types')
            ->insert($this->school_work_type);

        if($res){
            $this->dispatch('notifySuccess', 
            'Added successfully!',
                '');
            $total = DB::table('school_works_types')
                    ->select(DB::raw('count(*) as total'))
                    ->where('curriculum_id','=',$this->detail['curriculum_id'])
                    ->where('term_id','=',$this->detail['term_id'])
                    ->first();

            $this->school_work_type = [
                'id' => NULL,
                'curriculum_id' => $this->detail['curriculum_id'],
                'term_id'=> $this->detail['term_id'],
                'lab_lec_id' => NULL,
                'school_work_type' => NULL,
                'weight' => 0,
                'number_order' => (intval($total->total)+1),
            ];
        }
        self::school_work_types($this->detail['curriculum_id']);
    }

    public function deleteSchoolWorkType($id){
        $res = DB::table('school_works_types')
            ->where('id','=',$id)
            ->delete();
        if($res){
            $this->dispatch('notifySuccess', 
                'Deleted successfully!',
                   '');
        }
        self::school_work_types($this->detail['curriculum_id']);

    }

    public function updateSchoolWorktype($id, $weight){
        $total_weight = DB::table('school_works_types')
            ->select(DB::raw('sum(weight) as total_weight'))
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->where('id','<>',$id)
            ->first();

        if($total_weight->total_weight + $weight >100 ){
             $this->dispatch('notifyWarning', 
            'The weight exceeds '.(100 - $total_weight->total_weight),
                '');
            self::school_work_types($this->detail['curriculum_id']);
            return;
        }

        $res = DB::table('school_works_types')
            ->where('id','=',$id)
            ->update([
                'weight'=> $weight
            ]);
        if($res){
            $this->dispatch('notifySuccess', 
                'Updated successfully!',
                   '');
        }
        self::school_work_types($this->detail['curriculum_id']);

    }

    public function open_school_work_modal($modal_id){

        $total = DB::table('school_works')
            ->select(DB::raw('count(*) as total'))
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->first();
        $this->school_work = [
            'id' => NULL,
            'curriculum_id' => $this->detail['curriculum_id'],
            'term_id'=> $this->detail['term_id'],
            'school_work_name' => NULL,
            'school_work_type_id' => NULL,
            'max_score' => NULL,
            'schedule_date' => NULL,
            'number_order' => intval($total->total) + 1,
        ];

        self::school_works();
        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function add_school_work($modal_id){
        $this->validate([
            'school_work.school_work_name' => 'required|string',
            'school_work.schedule_date' => 'required|date',
            'school_work.max_score' => 'required|numeric|min:1',
            'school_work.school_work_type_id' => 'required|exists:school_works_types,id',
        ], [
            'school_work.school_work_name.required' => 'The school work name is required.',
            'school_work.school_work_name.string' => 'The school work name must be a string.',
            'school_work.max_score.required' => 'The maximum score is required.',
            'school_work.max_score.numeric' => 'The maximum score must be a number.',
            'school_work.max_score.min' => 'The maximum score must be at least 1.',
            'school_work.schedule_date.required' => 'The schedule date is required.',
            'school_work.schedule_date.date' => 'The schedule date must be a valid date.',
            'school_work.school_work_type_id.required' => 'The school work type is required.',
            'school_work.school_work_type_id.exists' => 'The selected school work type is invalid.',
        ]);

        if(DB::table('school_works')  
            ->where('school_work_name','=',$this->school_work['school_work_name'])  
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->first()){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'school_work.school_work_name' => 'School work exists',
            ]);
        }

       $res = DB::table('school_works')
            ->insert($this->school_work);
        if($res){
            $this->dispatch( 'notifySuccess', 
                'Added successfully!',
                   '');
            $total = DB::table('school_works')
                ->select(DB::raw('count(*) as total'))
                ->where('curriculum_id','=',$this->detail['curriculum_id'])
                ->where('term_id','=',$this->detail['term_id'])
                ->first();
            $this->school_work = [
                'id' => NULL,
                'curriculum_id' => $this->detail['curriculum_id'],
                'term_id'=> $this->detail['term_id'],
                'school_work_name' => NULL,
                'school_work_type_id' => $this->school_work['school_work_type_id'],
                'max_score' => NULL,
                'schedule_date' => NULL,
                'number_order' => intval($total->total) + 1,
            ];
        }
        self::school_works();
    }

    public function UpdatedSchoolWorkSchoolWorkTypeId($school_work_type_id){
        $this->school_work['school_work_type_id'] = $school_work_type_id;

        self::school_works();
    }

    public function deleteSchoolWork($id){
         $res = DB::table('school_works')
            ->where('id','=',$id)
            ->delete();
        if($res){
            $this->dispatch('notifySuccess', 
                'Deleted successfully!',
                   '');
        }
        self::school_works();
    }

    public function school_works(){
        $this->school_works = DB::table('school_works')
            ->where('curriculum_id','=',$this->detail['curriculum_id'])
            ->where('term_id','=',$this->detail['term_id'])
            ->where('school_work_type_id','=',$this->school_work['school_work_type_id'])
            ->orderBy('number_order','asc')
            ->get()
            ->toArray();
    }

    public function student_scores($student_ids){
        $this->student_scores = [];
         foreach ($student_ids as $v_key => $v_value) {
            $scores = [];
            foreach ($this->school_work_types as $key => $value) {
                $school_works = DB::table('school_works_types as swt')
                    ->select(
                        'swt.id as school_work_type_id',
                        'sw.id',
                        'sw.max_score',
                        'score',
                        'sws.id as score_id',
                    )
                    ->leftjoin('school_works as sw','sw.school_work_type_id','swt.id')
                    ->leftjoin('school_work_scores as sws','sws.school_work_id','sw.id')
                    ->where('swt.curriculum_id','=',$this->detail['curriculum_id'])
                    ->where('swt.term_id','=',$this->detail['term_id'])
                    ->where('swt.id','=', $value->id)
                    // ->leftjoin('school_work_scores as sws','sws.school_work_id','sw.id')
                    ->orderBy('sw.number_order','asc')
                    ->get()
                    ->toArray();
                if( $school_works ){
                    foreach ($school_works as $s_key => $s_value) {
                        if($s_value->id){
                            array_push( $scores,[
                                'score_id' => $s_value->score_id,
                                'curriculum_id' => $this->detail['curriculum_id'],
                                'student_id'=>$v_value,
                                'term_id' => $this->detail['term_id'],
                                'school_work_id' => $s_value->id,
                                'key' => $key ,
                                'score' => $s_value->score,
                                'max_score' =>$s_value->max_score,
                            ]);
                        }else{
                            array_push($scores,[
                                'score_id' => NULL,
                                'curriculum_id' => $this->detail['curriculum_id'],
                                'term_id' => $this->detail['term_id'],
                                'student_id'=>$v_value,
                                'school_work_id' => NULL,
                                'key' => $key ,
                                'score' => NULL,
                                'max_score' => NULL,
                            ]);
                        }
                    }
                }
            }
            array_push($this->student_scores,$scores);
        }
        $school_work_types = DB::table('school_works_types as swt')
            ->where('swt.curriculum_id','=',$this->detail['curriculum_id'])
            ->where('swt.term_id','=',$this->detail['term_id'])
            ->leftjoin('school_works as sw','sw.school_work_type_id','swt.id')
            ->orderBy('swt.number_order','asc')
            ->get()
            ->toArray();
        // dd($school_work_types);
            
    }

    public function updateScore(
        $score_id,
        $curriculum_id,
        $student_id,
        $term_id,
        $school_work_id,
        $score,
        $max_score,){
        dd($score_id,$curriculum_id,$student_id,$term_id,$school_work_id,$score,$max_score);
    }
}
