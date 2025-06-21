<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Carbon\Carbon;


class CurriculumSubjects extends Component
{
    use WithPagination;
    public $title = "Curriculum Subject";

    public $route = "curriculum-subjects";

    public $filters = [
        'search'=> NULL,
        'college_id' =>NULL,
        'department_id' =>NULL,
    ];

    public $detail = [
        'id' => NULL,
        'school_year_id' => NULL,
        'college_id' => NULL,
        'department_id' => NULL,
        'year_level_id' => NULL,
        'semester_id' => NULL,
        'schedule_id' => NULL,

        'subject_id' => NULL,
        'faculty_id' => NULL,
        'room_id' => NULL,
        'schedule_from' => NULL,
        'schedule_to' => NULL,
        'day' => NULL,
        'is_lec' => NULL,
        'with_default'=>false,
    ];
    

    public $subjectFilter = [
        'college_id'=> NULL,
        'search'=> NULL,
        'department_id'=> NULL,
    ];
    public $colleges = [];

    public $students = [];

    public $departments = [];

    public $school_years = [];

    public $semesters = [];

    public $rooms = [];

    public $subjects = [];

    public $faculty = [];

    public $year_levels = []; 

    public function mount($school_year,$college,$department,$year_level,$semester){

        $this->detail['school_year'] = $school_year;
        $this->detail['college'] = $college;
        $this->detail['department'] = $department;
        $this->detail['year_level'] = $year_level;
        $this->detail['semester'] = $semester;

        $this->detail['school_year_id'] = DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$this->detail['school_year'])->first()->id;
        $this->detail['college_id'] = DB::table('colleges')->where('code','=',$this->detail['college'])->first()->id;
        $this->detail['department_id'] = DB::table('departments')->where('code','=',$this->detail['department'])->first()->id;
        $this->detail['year_level_id'] = DB::table('year_levels')->where('year_level','=',$this->detail['year_level'])->first()->id;
        $this->detail['semester_id'] = DB::table('semesters')->where('semester','=',$this->detail['semester'])->first()->id;

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

        $this->rooms = DB::table('rooms')
            ->where('is_active','=',1)
            ->get()
            ->toArray();
    }

    public function redirectPath($field, $value){
        $this->dispatch('navigateTo', url: '/admin/curriculums/'.$this->detail['school_year'].'/'.$this->detail['college'].
            '/'.$this->detail['department'].'/'.$this->detail['year_level'].'/'.$this->detail['semester']);

    }
    public function render(){

        $table_data = DB::table('curriculums as cl')
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
            ->leftJoin('subjects as s','s.id','cl.subject_id')
            ->leftJoin('rooms as r','r.id','cl.room_id')
            ->leftJoin('schedules as sh','sh.id','cl.schedule_id')
            ->leftJoin('faculty as f','f.id','cl.faculty_id')
            ->leftJoin('users as u','u.id','f.user_id')
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id')

            ->where('cl.school_year_id','=',$this->detail['school_year_id'])
            ->where('cl.college_id','=',$this->detail['college_id'])
            ->where('cl.department_id','=',$this->detail['department_id'])
            ->where('cl.year_level_id','=',$this->detail['year_level_id'])
            ->where('cl.semester_id','=',$this->detail['semester_id'])
            ;

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

        return view('livewire.admin.curriculum.curriculum-subjects',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }

    public function add($modal_id){
        $this->detail['schedule_id'] = NULL;
        $this->detail['faculty_id'] = NULL;

        self::filterSubject();
        self::filterFaculty();
        self::selectSubject();
        $this->dispatch('openModal',modal_id : $modal_id);
        $this->dispatch('select2');
        
    }

    public function filterSubject(){
        $this->subjects = DB::table('schedules as sh')
                ->select(
                    'sh.id' ,
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
                    DB::raw("DATE_FORMAT(sh.schedule_from, '%h:%i %p') as schedule_from"),
                    DB::raw("DATE_FORMAT(sh.schedule_to, '%h:%i %p') as schedule_to"),
                    's.is_active',
                    'r.code as room_code',
                    'r.id as room_id',
                    'r.name as room_name',
                    'sh.day' ,
                    'sh.is_lec' ,
                )
                ->leftJoin('subjects as s','s.id','sh.subject_id')
                ->leftJoin('colleges as c','c.id','s.college_id')
                ->leftjoin('rooms as r','r.id','sh.room_id')
                ->leftJoin('departments as d','d.id','s.department_id')
                ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id');
        if($this->subjectFilter['college_id']){
            $this->subjects->where('s.college_id', '=',$this->subjectFilter['college_id']);
        }

    

        if (!empty($this->subjectFilter['search'])) {
            $this->subjects
            ->where('s.subject_id','like','%'.$this->subjectFilter['search'] .'%')
            ->orwhere('s.subject_code','like','%'.$this->subjectFilter['search'] .'%');
        }
        $this->subjects = $this->subjects
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'desc')
            ->get()
            ->toArray();
    }

    public function filterFaculty(){
         $this->faculty = DB::table('faculty as f')
            ->select(
                'f.id' ,
                'f.college_id' ,
                'f.department_id' ,
                'f.academic_rank_id',
                'f.designation_id',
                'f.faculty_type_id',
                DB::raw('CONCAT_WS(" ", u.first_name, u.middle_name, u.last_name, u.suffix) AS fullname'),
                'f.code' ,
                'u.first_name' ,
                'u.middle_name' ,
                'u.last_name' ,
                'u.suffix' ,
                'u.email' ,
                'u.is_active' ,
                'c.name as college',
                'c.code as college_code',
                'd.name as department',
                'd.code as department_code',
                'ds.name as designation',
                'ds.code as designation_code',
                'ar.name as academic_rank',
                'ar.code as academic_rank_code',
                'ft.name as faculty_type',
                'ft.code as faculty_type_code',
                'release_time',
                'hours_per_week',
            )
            ->leftJoin('users as u','u.id','f.user_id')
            ->leftJoin('colleges as c','c.id','f.college_id')
            ->leftJoin('departments as d','d.id','f.department_id')
            ->leftJoin('academic_ranks as ar','ar.id','f.academic_rank_id')
            ->leftJoin('designations as ds','ds.id','f.designation_id')
            ->leftJoin('faculty_types as ft','ft.id','f.faculty_type_id')
            ->get()
            ->toArray();
    }

    public function updatedSubjectFilterSearch(){
        // dd($this->subjectFilter);
    }

    public function selectSubject(){
        if($this->detail['schedule_id']){

            $subject = DB::table('schedules as sh')
                ->select(
                    'sh.id' ,
                    's.id as subjectid',
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
                    'r.code as room_code',
                    'r.id as room_id',
                    'r.name as room_name',
                    'sh.schedule_from',
                    'sh.schedule_to',
                    'sh.day' ,
                    'sh.is_lec' ,
                )
                ->leftJoin('subjects as s','s.id','sh.subject_id')
                ->leftJoin('colleges as c','c.id','s.college_id')
                ->leftjoin('rooms as r','r.id','sh.room_id')
                ->leftJoin('departments as d','d.id','s.department_id')
                ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id')
                ->where('sh.id','=',intval($this->detail['schedule_id']))
                ->first();

            $this->detail['subject_id'] = $subject->subjectid;
            $this->detail['room_id'] = $subject->room_id;
            $this->detail['code'] = $subject->subject_code;
            $this->detail['schedule_from'] = (Carbon::createFromFormat('Y-m-d H:i:s', $subject->schedule_from))->format('H:i');
            $this->detail['schedule_to'] = (Carbon::createFromFormat('Y-m-d H:i:s', $subject->schedule_to))->format('H:i');
            $this->detail['day'] = implode(', ', json_decode($subject->day, true));
            $this->detail['is_lec'] = $subject->is_lec;
        }else{
            $this->detail['room_id'] = NULL;
            $this->detail['code'] =  NULL;
            $this->detail['schedule_from'] = NULL;
            $this->detail['schedule_to'] =  NULL;
            $this->detail['day'] =  NULL;
            $this->detail['is_lec'] =  NULL;
        }
    }

    public function addSchedule($modal_id){
        
        // added with same sy,college,department,yl,semester, schedule
        if(
           $res = DB::table('curriculums')
                ->where('school_year_id' ,'=', DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$this->detail['school_year'])->first()->id)
                ->where('college_id' ,'=', DB::table('colleges')->where('code','=',$this->detail['college'])->first()->id)
                ->where('department_id' ,'=', DB::table('departments')->where('code','=',$this->detail['department'])->first()->id)
                ->where('year_level_id' ,'=', DB::table('year_levels')->where('year_level','=',$this->detail['year_level'])->first()->id)
                ->where('semester_id' ,'=', DB::table('semesters')->where('semester','=',$this->detail['semester'])->first()->id)
                ->where('schedule_id' ,'=', $this->detail['schedule_id'])
                ->first()
        ){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'detail.schedule_id' => 'Schedule already exists.',
            ]);
        }

        $curriculum_id = DB::table('curriculums')->insertGetId([
            'school_year_id' => DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$this->detail['school_year'])->first()->id,
            'college_id' => DB::table('colleges')->where('code','=',$this->detail['college'])->first()->id,
            'department_id' => DB::table('departments')->where('code','=',$this->detail['department'])->first()->id,
            'year_level_id' => DB::table('year_levels')->where('year_level','=',$this->detail['year_level'])->first()->id,
            'semester_id' => DB::table('semesters')->where('semester','=',$this->detail['semester'])->first()->id,
            'schedule_id' => $this->detail['schedule_id'],

            'subject_id' => $this->detail['subject_id'],
            'faculty_id' => ($this->detail['faculty_id'] ? $this->detail['faculty_id'] : NULL),
            'room_id' => $this->detail['room_id'],
            'schedule_from' => Carbon::createFromFormat('H:i', $this->detail['schedule_from']),
            'schedule_to' => Carbon::createFromFormat('H:i', $this->detail['schedule_to']),
            'day' => $this->detail['day'],
            'is_lec' => $this->detail['is_lec'],
        ]);

        // subject details

        // terms
        $midterm_id = DB::table('terms')
        ->insertGetId([
            'id' => NULL,
            'curriculum_id' => $curriculum_id,
            'term_name' => 'Midterm',
            'weight' => 40.0,
            'term_order' => 1,
        ]);

        $finalterm_id = DB::table('terms')
        ->insertGetId([
            'id' => NULL,
            'curriculum_id' => $curriculum_id,
            'term_name' => 'Finalterm',
            'weight' => 60.0,
            'term_order' => 2,
        ]);
            
        // lab lec
        DB::table(table: 'lab_lec')
        ->insertGetId([
            'id' => NULL,
            'curriculum_id' => $curriculum_id,
            'term_id' => $midterm_id,
            'sub_weight' => 50.0,
            'is_lecture' => $this->detail['is_lec'],
        ]);

        DB::table(table: 'lab_lec')
        ->insertGetId([
            'id' => NULL,
            'curriculum_id' => $curriculum_id,
            'term_id' => $finalterm_id,
            'sub_weight' => 50.0,
            'is_lecture' => $this->detail['is_lec'],
        ]);


        DB::table('school_works_types')
            ->insert([
                'id'  => NULL,
                'curriculum_id'  => $curriculum_id,
                'term_id'  => $midterm_id,
                'lab_lec_id'  => NULL,
                'school_work_type'  => 'Attendance',
                'weight' => 0,
                'number_order' => 1,
            ]);
        DB::table('school_works_types')
            ->insert([
                'id'  => NULL,
                'curriculum_id' => $curriculum_id,
                'term_id' => $finalterm_id,
                'lab_lec_id' => NULL,
                'school_work_type' => 'Attendance',
                'weight' => 0,
                'number_order' => 1,
            ]);
    
            // defaults
        if($this->detail['with_default']){
            // school works
            
            // individual school works
        }


        if ($curriculum_id) {
            // You can dispatch success notification or redirect here
            $this->dispatch('notifySuccess', 
            'Added successfully!',
                '');
            $this->dispatch('closeModal',modal_id : $modal_id);
        }
    }
    
    public function view($id,$modal_id){
        $curriculum = DB::table('curriculums as cl')
            ->select(
                'cl.id',
                's.college_id' ,
                's.department_id' ,
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
                'sh.schedule_from',
                'sh.schedule_to',
                'sh.day' ,
                'sh.is_lec' ,
                'cl.subject_id',
                'cl.room_id',
                'cl.schedule_id',
                'cl.faculty_id',

            )
            ->leftJoin('subjects as s','s.id','cl.subject_id')
            ->leftJoin('rooms as r','r.id','cl.room_id')
            ->leftJoin('schedules as sh','sh.id','cl.schedule_id')
            ->leftJoin('faculty as f','f.id','cl.faculty_id')
            ->leftJoin('users as u','u.id','f.user_id')
            ->leftJoin('colleges as c','c.id','s.college_id')
            ->leftJoin('departments as d','d.id','s.department_id')
            ->leftjoin('subjects as pr','pr.id','s.prerequisite_subject_id')
            ->where('cl.id','=',$id)
            ->first();


        $this->detail['id'] = $curriculum->id;
        $this->detail['schedule_id'] = $curriculum->schedule_id;
        $this->detail['subject_id'] = $curriculum->subject_id;
        $this->detail['faculty_id'] = $curriculum->faculty_id;

        self::filterSubject();
        self::filterFaculty();
        self::selectSubject();
        $this->dispatch('openModal',modal_id : $modal_id);
    }

    public function deleteSchedule($id,$modal_id){
         if(DB::table('curriculums')
                ->where('id','=',$this->detail['id'])
                ->delete()){
        }
        $this->dispatch('notifySuccess', 
        'Deleted successfully!',
            '');
        $this->dispatch('closeModal',modal_id : $modal_id);

    }

    public function editSchedule($modal_id){

        // if(
        //    $res = DB::table('curriculums')
        //         ->where('school_year_id' ,'=', DB::table('school_years')->where(DB::raw('concat(year_start,"-",year_end)'),'=',$this->detail['school_year'])->first()->id)
        //         ->where('college_id' ,'=', DB::table('colleges')->where('code','=',$this->detail['college'])->first()->id)
        //         ->where('department_id' ,'=', DB::table('departments')->where('code','=',$this->detail['department'])->first()->id)
        //         ->where('year_level_id' ,'=', DB::table('year_levels')->where('year_level','=',$this->detail['year_level'])->first()->id)
        //         ->where('semester_id' ,'=', DB::table('semesters')->where('semester','=',$this->detail['semester'])->first()->id)
        //         ->where('schedule_id' ,'=', $this->detail['schedule_id'])
        //         ->where('id' ,'=', $this->detail['id'])
        //         ->first()
        // ){
        //     throw \Illuminate\Validation\ValidationException::withMessages([
        //         'detail.schedule_id' => 'Schedule already exists.',
        //     ]);
        // }

        $curriculum_id = DB::table('curriculums')
            ->where('id' ,'=', $this->detail['id'])
            ->update([
                'subject_id' => $this->detail['subject_id'],
                'faculty_id' => ($this->detail['faculty_id'] ? $this->detail['faculty_id'] : NULL),
        ]);
        $this->dispatch('notifySuccess', 
        'Updated successfully!',
            '');
        $this->dispatch('closeModal',modal_id : $modal_id);

    }
}
