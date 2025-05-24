<?php


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Middleware
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsFaculty;
use App\Http\Middleware\IsUnauthenticated;

// authentication
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Signup;



// admins
use App\Livewire\Admin\Dashboard\Dashboard;

use App\Livewire\Admin\College\AddCollege;
use App\Livewire\Admin\College\EditCollege;
use App\Livewire\Admin\College\ViewCollege;
use App\Livewire\Admin\College\DeleteCollege;
use App\Livewire\Admin\College\CollegeLists;


use App\Livewire\Admin\Department\AddDepartment;
use App\Livewire\Admin\Department\EditDepartment;
use App\Livewire\Admin\Department\ViewDepartment;
use App\Livewire\Admin\Department\DeleteDepartment;
use App\Livewire\Admin\Department\DepartmentLists;

use App\Livewire\Admin\Faculty\AddFaculty;
use App\Livewire\Admin\Faculty\EditFaculty;
use App\Livewire\Admin\Faculty\ViewFaculty;
use App\Livewire\Admin\Faculty\DeleteFaculty;
use App\Livewire\Admin\Faculty\FacultyLists;

use App\Livewire\Admin\SchoolYear\AddSchoolYear;
use App\Livewire\Admin\SchoolYear\EditSchoolYear;
use App\Livewire\Admin\SchoolYear\ViewSchoolYear;
use App\Livewire\Admin\SchoolYear\DeleteSchoolYear;
use App\Livewire\Admin\SchoolYear\SchoolYearLists;


use App\Livewire\Admin\Semester\AddSemester;
use App\Livewire\Admin\Semester\EditSemester;
use App\Livewire\Admin\Semester\ViewSemester;
use App\Livewire\Admin\Semester\DeleteSemester;
use App\Livewire\Admin\Semester\SemesterLists;


use App\Livewire\Admin\Student\AddStudent;
use App\Livewire\Admin\Student\EditStudent;
use App\Livewire\Admin\Student\ViewStudent;
use App\Livewire\Admin\Student\DeleteStudent;
use App\Livewire\Admin\Student\StudentLists;

use App\Livewire\Admin\Subjects\AddSubject;
use App\Livewire\Admin\Subjects\EditSubject;
use App\Livewire\Admin\Subjects\ViewSubject;
use App\Livewire\Admin\Subjects\DeleteSubject;
use App\Livewire\Admin\Subjects\SubjectLists;

use App\Livewire\Admin\YearLevel\AddYearLevel;
use App\Livewire\Admin\YearLevel\EditYearLevel;
use App\Livewire\Admin\YearLevel\ViewYearLevel;
use App\Livewire\Admin\YearLevel\DeleteYearLevel;
use App\Livewire\Admin\YearLevel\YearLevelLists;

use App\Livewire\Admin\Admin\AddAdmin;
use App\Livewire\Admin\Admin\EditAdmin;
use App\Livewire\Admin\Admin\ViewAdmin;
use App\Livewire\Admin\Admin\DeleteAdmin;
use App\Livewire\Admin\Admin\AdminLists;

use App\Livewire\Admin\Room\AddRoom;
use App\Livewire\Admin\Room\EditRoom;
use App\Livewire\Admin\Room\ViewRoom;
use App\Livewire\Admin\Room\DeleteRoom;
use App\Livewire\Admin\Room\RoomLists;

use App\Livewire\Admin\Profile\Profile;


// admin routes
Route::middleware([IsUnauthenticated::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login',Login::class)->name('login');
    Route::get('/signup',Signup::class)->name('signup');

});



// admin routes
Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('/logout',function(){

    })->name('logout');
    Route::prefix('admin')->middleware([IsAdmin::class])->group(function () {
        Route::get('/',function (){
            return redirect (route('dashboard'));
        })->name('admin-dashboard');
        Route::prefix('dashboard')->group(function () {
           Route::get('/',Dashboard::class)->name('dashboard');
        });
        Route::prefix('colleges')->group(function () {
            Route::get('/',CollegeLists::class)->name('college-lists');
            Route::get('/add',AddCollege::class)->name('college-add');
            Route::get('/edit-{id}',EditCollege::class)->name('college-edit');
            Route::get('/delete-{id}',DeleteCollege::class)->name('college-delete');
            Route::get('/view-{id}',ViewCollege::class)->name('college-view');
        });
        Route::prefix('departments')->group(function () {
            Route::get('/',DepartmentLists::class)->name('department-lists');
            Route::get('/add',AddDepartment::class)->name('department-add');
            Route::get('/edit-{id}',EditDepartment::class)->name('department-edit');
            Route::get('/delete-{id}',DeleteDepartment::class)->name('department-delete');
            Route::get('/view-{id}',ViewDepartment::class)->name('department-view');
        });

        Route::prefix('school-years')->group(function () {
            Route::get('/',SchoolYearLists::class)->name('school-year-lists');
            Route::get('/add',AddSchoolYear::class)->name('school-year-add');
            Route::get('/edit-{id}',EditSchoolYear::class)->name('school-year-edit');
            Route::get('/delete-{id}',DeleteSchoolYear::class)->name('school-year-delete');
            Route::get('/view-{id}',ViewSchoolYear::class)->name('school-year-view');
        });

        Route::prefix('semesters')->group(function () {
            Route::get('/',SemesterLists::class)->name('semester-lists');
            Route::get('/add',AddSemester::class)->name('semester-add');
            Route::get('/edit-{id}',EditSemester::class)->name('semester-edit');
            Route::get('/delete-{id}',DeleteSemester::class)->name('semester-delete');
            Route::get('/view-{id}',ViewSemester::class)->name('semester-view');
        });
        
        Route::prefix('year-levels')->group(function () {
            Route::get('/',YearLevelLists::class)->name('year-level-lists');
            Route::get('/add',AddYearLevel::class)->name('year-level-add');
            Route::get('/edit-{id}',EditYearLevel::class)->name('year-level-edit');
            Route::get('/delete-{id}',DeleteYearLevel::class)->name('year-level-delete');
            Route::get('/view-{id}',ViewYearLevel::class)->name('year-level-view');
        });

        Route::prefix('subjects')->group(function () {
            Route::get('/',SubjectLists::class)->name('subject-lists');
            Route::get('/add',AddSubject::class)->name('subject-add');
            Route::get('/edit-{id}',EditSubject::class)->name('subject-edit');
            Route::get('/delete-{id}',DeleteSubject::class)->name('subject-delete');
            Route::get('/view-{id}',ViewSubject::class)->name('subject-view');
        });

        Route::prefix('students')->group(function () {
            Route::get('/',StudentLists::class)->name('student-lists');
            Route::get('/add',AddStudent::class)->name('student-add');
            Route::get('/edit-{id}',EditStudent::class)->name('student-edit');
            Route::get('/delete-{id}',DeleteStudent::class)->name('student-delete');
            Route::get('/view-{id}',ViewStudent::class)->name('student-view');
        });

        Route::prefix('rooms')->group(function () {
            Route::get('/',RoomLists::class)->name('room-lists');
            Route::get('/add',AddRoom::class)->name('room-add');
            Route::get('/edit-{id}',EditRoom::class)->name('room-edit');
            Route::get('/delete-{id}',DeleteRoom::class)->name('room-delete');
            Route::get('/view-{id}',ViewRoom::class)->name('room-view');
        });
        
        Route::prefix('faculty')->group(function () {
            Route::get('/',FacultyLists::class)->name('faculty-lists');
            Route::get('/add',AddFaculty::class)->name('faculty-add');
            Route::get('/edit-{id}',EditFaculty::class)->name('faculty-edit');
            Route::get('/delete-{id}',DeleteFaculty::class)->name('faculty-delete');
            Route::get('/view-{id}',ViewFaculty::class)->name('faculty-view');
        });
        

        Route::prefix('admins')->group(function () {
            Route::get('/',AdminLists::class)->name('admin-lists');
            Route::get('/add',AddAdmin::class)->name('admin-add');
            Route::get('/edit-{id}',EditAdmin::class)->name('admin-edit');
            Route::get('/delete-{id}',DeleteAdmin::class)->name('admin-delete');
            Route::get('/view-{id}',ViewAdmin::class)->name('admin-view');
        });
        Route::prefix('profile')->group(function () {
            Route::get('/',Profile::class)->name('admin-profile');
        });

    });


    Route::prefix('faculty')->middleware([IsFaculty::class])->group(function () {
        Route::get('/',AdminLists::class)->name('Admin-listsss');
    });
});