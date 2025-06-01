<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class CurriculumEnrolled extends Component
{

    public $school_year;
    public $college;
    public $department;

    public $title = "Curriculum";
    public $route = 'Curriculum';

    public $filters = [
        'search'=> NULL,
    ];
    public function mount($school_year,$college,$department){
        $this->school_year = $school_year;
        $this->college = $college;
        $this->department = $department;

        $semester = DB::table('semesters as s')
            ->orderBy('s.is_active','desc')
            ->orderBy('s.id', 'asc')
            ->first();

        $year_levels = DB::table('year_levels as yl')
            ->orderBy('yl.id', 'asc')
            ->first();

        return redirect('admin/curriculums/'.$school_year.'/'.$college.'/'.$department.'/'.$year_levels->year_level.'/'.$semester->semester);
    }
    public function render()
    {
        $table_data = DB::table('colleges as c')
            ->orwhere('c.code','like','%'.$this->filters['search'] .'%')
            ->orwhere('c.name','like','%'.$this->filters['search'] .'%')
            ->orderBy('c.is_active','desc')
            ->orderBy('c.id', 'desc')
            ->paginate(10);
        return view('livewire.admin.curriculum.curriculum-enrolled',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
