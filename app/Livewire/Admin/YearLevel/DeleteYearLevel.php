<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class DeleteYearLevel extends Component
{
    public $title = "Year Level";

    public $route = 'year-level';

    public function mount($id){
        $detail = DB::table('year_levels')
            ->where('id','=',$id)
            ->first();
        $this->detail = [
            'id' => $detail->id,
            'year_level' => $detail->year_level,
        ];
    }

    public $detail = [
        'id'=> NULL,
        'year_level'=> NULL,
    ];

    public function save(){

        $updated = DB::table('year_levels')
            ->where('id','=',$this->detail['id'])
            ->delete();

        if ($updated) {
            // You can dispatch success notification or redirect here
        }
        $this->dispatch('notifySuccess', 
        'Deleted successfully!',
            route($this->route.'-lists'));
    }
    public function render()
    {
        return view('livewire.admin.year-level.delete-year-level')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
