<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class CurriculumProspectus extends Component
{
    use WithPagination;

    public $title = "Prospectu";

    public $route = "prospectus";

    public $subjects = [];

    public $year_levels = [];

    public $semesters = [];

    public $edit = false;

    public $permanent = false;
    public $curriculum = [
        'id'=> NULL,
        'school_year_id' => NULL,
        'college_id' => NULL,
        'department_id' => NULL,
        'prospectus' => NULL,
        'is_editable' => true,
    ];
     public $detail = [
        'id' => NULL,
        'curriculum_id' => NULL,
        'year_level_id' => NULL,
        'semester_id' => NULL,
        'subject_id' => NULL,
    ];

    
    public function mount($school_year,$college,$department){


        $this->curriculum['school_year_id'] = DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$school_year)->first()->id;
        $this->curriculum['college_id'] = DB::table('colleges')->where('code','=',$college)->first()->id;
        $this->curriculum['department_id'] = DB::table('departments')->where('code','=',$department)->first()->id;

        $this->semesters = DB::table('semesters as s')
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'asc')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
        $this->year_levels = DB::table('year_levels as yl')
            ->orderBy('yl.id', 'asc')
            ->where('is_active','=',1)
            ->get()
            ->toArray();

        self::getCurriculum();
    }

    public function render()
    {
        $table_data = DB::table('curriculum_subjects as cs')
            ->select(
                'cs.id',
                's.subject_id' ,
                's.subject_code' ,
                's.description',
                's.prerequisite_subject_id' ,
                'pr.subject_id as prerequisite_subject_id',
                'pr.subject_code as prerequisite_subject_code',
                'sm.semester',
                'yl.year_level'
            )
            ->where('curriculum_id','=',$this->curriculum['id'])
            ->leftjoin('subjects as s','s.id','cs.subject_id')
            ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id')
            ->leftjoin('year_levels as yl','yl.id','cs.year_level_id')
            ->leftjoin('semesters as sm','sm.id','cs.semester_id')
            ->orderBy('yl.year_level')   // Order first by year level
            ->orderBy('sm.semester') 
            ->paginate(10);
        return view('livewire.admin.curriculum.curriculum-prospectus',[
            'table_data' =>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }

    public function add($modal_id){
        $this->detail = [
            'id' => NULL,
            'curriculum_id' => $this->curriculum['id'],
            'year_level_id' => NULL,
            'semester_id' => NULL,
            'subject_id' => NULL,
        ];
        self::subjectLists();
        self::yearLevels();
        $this->dispatch('openModal',modal_id:$modal_id);
    }

    public function saveAdd($modal_id){
        if(
           $res = DB::table('schedulings')
                ->where('school_year_id' ,'=', DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$this->detail['school_year'])->first()->id)
                ->where('college_id' ,'=', DB::table('colleges')->where('code','=',$this->detail['college'])->first()->id)
                ->where('department_id' ,'=', DB::table('departments')->where('code','=',$this->detail['department'])->first()->id)
                ->where('year_level_id' ,'=', DB::table('year_levels')->where('year_level','=',$this->detail['year_level'])->first()->id)
                ->where('semester_id' ,'=', DB::table('semesters')->where('semester','=',$this->detail['semester'])->first()->id)
                ->where('subject_id' ,'=', $this->detail['subject_id'])
                ->first()
        ){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'detail.subject_id' => 'Schedule already exists.',
            ]);
        }
    }

    public function getCurriculum(){
        $curriculum = DB::table('curriculums')
            ->where('school_year_id','=',$this->curriculum['school_year_id'])
            ->where('college_id','=',$this->curriculum['college_id'])
            ->where('department_id','=',$this->curriculum['department_id'])
            ->first();

        if($curriculum){
            $curriculum = (array)$curriculum;
            $this->curriculum = [
                'id'=> $curriculum['id'],
                'school_year_id' => $curriculum['school_year_id'],
                'college_id' => $curriculum['college_id'],
                'department_id' => $curriculum['department_id'],
                'prospectus' => $curriculum['prospectus'],
                'is_editable' => $curriculum['is_editable'],
            ];
            $this->permanent = (!$curriculum['is_editable']) ;
            $this->detail['curriculum_id'] = $curriculum['id']; 
        }else{
            $this->edit = true;
        }
    }

    public function view_prospectus(){
        $this->edit = true;
    }

    public function save_prospectus(){
        $rules = [
            'curriculum.id' => 'nullable|integer',
            'curriculum.school_year_id' => 'nullable|integer',
            'curriculum.college_id' => 'nullable|integer',
            'curriculum.department_id' => 'nullable|integer',
            'curriculum.prospectus' => 'required|string', // REQUIRED field
        ];

        $messages = [
            'curriculum.prospectus.required' => 'The prospectus field is required.',
        ];
        $this->validate($rules, $messages);

        if(intval($this->curriculum['id'])){
            if(DB::table('curriculums')
                ->where('id','=',$this->curriculum['id'])
                ->update($this->curriculum)){
            }
        }else{
            if(DB::table('curriculums')
                ->insert($this->curriculum)){
            }
        }
        $this->dispatch('notifySuccess', 
            'Updated successfully!',
                '');
        if($this->permanent){
            DB::table('curriculums')
                ->where('id','=',$this->curriculum['id'])
                ->update(['is_editable'=>false]);
        }
        self::getCurriculum();
        $this->edit = false;
    }

    public function subjectLists(){
        $this->subjects = DB::table('subjects')
        ->where('is_active','=',1)
        ->get()
        ->toArray();
    }

    public function yearLevels(){
        $this->year_levels = DB::table('year_levels')
        ->where('is_active','=',1)
        ->get()
        ->toArray();
    }

    public function addSubject($modal_id){
        $rules = [
            'detail.curriculum_id' => 'required|integer',
            'detail.year_level_id' => 'required|integer',
            'detail.semester_id' => 'required|integer',
            'detail.subject_id' => [
                'required',
                'integer',
                Rule::unique('curriculum_subjects','subject_id')
                    ->where(function ($query) {
                        return $query->where('curriculum_id', $this->detail['curriculum_id'])
                            ->where('subject_id', $this->detail['subject_id']);
                    })
                    ->ignore($this->detail['id']), // Exclude current row if updating
            ],
        ];

        $messages = [
            'detail.subject_id.unique' => 'This subject already exists for the curriculum.',
            'detail.curriculum_id.required' => 'Curriculum is required.',
            'detail.year_level_id.required' => 'Year level is required.',
            'detail.semester_id.required' => 'Semester is required.',
            'detail.subject_id.required' => 'Subject is required.',
        ];

        $this->validate($rules, $messages);

       if( DB::table('curriculum_subjects')
            ->insert($this->detail)){
            $this->dispatch('notifySuccess', 
            'Added successfully!',
                '');
            }
        $this->dispatch('closeModal',modal_id:$modal_id);
    }

    public function view($id,$modal_id){
     
        $detail = DB::table('curriculum_subjects as cs')
            ->where('id','=',$id)
            ->first();

        $this->detail = [
            'id'=> $detail->id,
            'curriculum_id'=> $detail->curriculum_id,
            'year_level'=> $detail->year_level_id,
            'semester_id'=> $detail->semester_id,
            'subject_id'=> $detail->subject_id,
        ];
        $this->dispatch('openModal',modal_id:$modal_id);
        
    }

    public function saveDelete($id,$modal_id){
        if(DB::table('curriculum_subjects')
            ->where('id','=',$id)
            ->delete()){

            $this->dispatch('notifySuccess', 
            'Deleted successfully!',
                '');
            $this->dispatch('closeModal',modal_id:$modal_id);
        }

    }
}
