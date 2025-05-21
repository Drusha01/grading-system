<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Dashboard\Dashboard;

use App\Livewire\Admin\College\AddCollege;
use App\Livewire\Admin\College\EditCollege;
use App\Livewire\Admin\College\ViewCollege;


use App\Livewire\Admin\Department\AddDepartment;
use App\Livewire\Admin\Department\EditDepartment;
use App\Livewire\Admin\Department\ViewDepartment;

use App\Livewire\Admin\Faculty\AddFaculty;
use App\Livewire\Admin\Faculty\EditFaculty;
use App\Livewire\Admin\Faculty\ViewFaculty;

use App\Livewire\Admin\SchoolYear\AddSchoolYear;
use App\Livewire\Admin\SchoolYear\EditSchoolYear;
use App\Livewire\Admin\SchoolYear\ViewSchoolYear;

use App\Livewire\Admin\Semester\AddSemester;
use App\Livewire\Admin\Semester\EditSemester;
use App\Livewire\Admin\Semester\ViewSemester;

use App\Livewire\Admin\Student\AddStudent;
use App\Livewire\Admin\Student\EditStudent;
use App\Livewire\Admin\Student\ViewStudent;

use App\Livewire\Admin\Subjects\AddSubject;
use App\Livewire\Admin\Subjects\EditSubject;
use App\Livewire\Admin\Subjects\ViewSubject;

use App\Livewire\Admin\YearLevel\AddYearLevel;
use App\Livewire\Admin\YearLevel\EditYearLevel;
use App\Livewire\Admin\YearLevel\ViewYearLevel;

Route::get('/', function () {
    return view('welcome');
});
