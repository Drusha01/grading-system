<?php

namespace App\Livewire\Admin\College;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class CollegeLists extends Component
{

    public $title = "College";
    public $route = 'college';

    public $filters = [
        'search'=> NULL,

    ];

    public function render()
    {
         $table_data = DB::table('colleges as c')
            // ->where('is_active','=',1)
            ->where('c.code','like',$this->filters['search'] .'%')
            ->where('c.name','like',$this->filters['search'] .'%')
            ->orderBy('c.is_active','desc')
            ->paginate(10);
        return view('livewire.admin.college.college-lists',[
            'table_data'=>$table_data
        ])
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
