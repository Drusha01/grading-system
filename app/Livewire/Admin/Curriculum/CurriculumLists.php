<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class CurriculumLists extends Component
{
    public $title = "Curriculum";

    public $route = "curriculum";

    public function render()
    {
         $table_data = DB::table('school_years as sy')
            ->orderBy('sy.id', 'desc')
            ->paginate(10);
        
        return view('livewire.admin.curriculum.curriculum-lists',[
            'table_data' =>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
