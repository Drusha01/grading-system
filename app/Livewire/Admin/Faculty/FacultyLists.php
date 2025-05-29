<?php

namespace App\Livewire\Admin\Faculty;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class FacultyLists extends Component
{

    public $title = "Faculty";
    public $route = "faculty";

    public $colleges = [];
    public $departments = [];

    public $filters = [
        'search'=> NULL,
        'college_id' =>NULL,
        'department_id' =>NULL,
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
            
            
    }
    public function render()
    {

        $table_data = DB::table('faculty as f')
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
                'hours_per_week'
            )
            ->leftJoin('users as u','u.id','f.user_id')
            ->leftJoin('colleges as c','c.id','f.college_id')
            ->leftJoin('departments as d','d.id','f.department_id')
            ->leftJoin('academic_ranks as ar','ar.id','f.academic_rank_id')
            ->leftJoin('designations as ds','ds.id','f.designation_id')
            ->leftJoin('faculty_types as ft','ft.id','f.faculty_type_id');
        if($this->filters['college_id']){
            $table_data->where('f.college_id', '=',$this->filters['college_id']);
        }

        if($this->filters['department_id']){
            if($this->filters['department_id']){
            $table_data->where('f.department_id', '=',$this->filters['department_id']);
        }
        }


        if (!empty($this->filters['search'])) {
            $table_data
            ->where('f.code','like','%'.$this->filters['search'] .'%')
            ->orwhere('u.email','like','%'.$this->filters['search'] .'%')
            ->orwhere(DB::raw('CONCAT_WS(" ", u.first_name, u.middle_name, u.last_name, u.suffix)'), 'like','%'.$this->filters['search'] .'%');
        }
        $table_data = $table_data
            ->orderBy('u.is_active','desc')
            ->orderBy('f.id', 'desc')
            ->paginate(10);

        return view('livewire.admin.faculty.faculty-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
