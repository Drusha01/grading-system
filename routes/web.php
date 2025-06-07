<?php


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// Middleware
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsFaculty;
use App\Http\Middleware\IsUnauthenticated;
use App\Http\Middleware\IsValid;

// authentication
use App\Livewire\Authentication\Login;
use App\Livewire\Authentication\Logout;
use App\Livewire\Authentication\Signup;
use App\Livewire\Authentication\Deactivated;



// admins
use App\Livewire\Admin\Dashboard\Dashboard;

use App\Livewire\Admin\College\AddCollege;
use App\Livewire\Admin\College\EditCollege;
use App\Livewire\Admin\College\ViewCollege;
use App\Livewire\Admin\College\DeleteCollege;
use App\Livewire\Admin\College\ActivateCollege;
use App\Livewire\Admin\College\CollegeLists;


use App\Livewire\Admin\Department\AddDepartment;
use App\Livewire\Admin\Department\EditDepartment;
use App\Livewire\Admin\Department\ViewDepartment;
use App\Livewire\Admin\Department\DeleteDepartment;
use App\Livewire\Admin\Department\ActivateDepartment;
use App\Livewire\Admin\Department\DepartmentLists;

use App\Livewire\Admin\Faculty\AddFaculty;
use App\Livewire\Admin\Faculty\EditFaculty;
use App\Livewire\Admin\Faculty\ViewFaculty;
use App\Livewire\Admin\Faculty\DeleteFaculty;
use App\Livewire\Admin\Faculty\ActivateFaculty;
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
use App\Livewire\Admin\Semester\ActivateSemester;
use App\Livewire\Admin\Semester\SemesterLists;


use App\Livewire\Admin\Student\AddStudent;
use App\Livewire\Admin\Student\EditStudent;
use App\Livewire\Admin\Student\ViewStudent;
use App\Livewire\Admin\Student\DeleteStudent;
use App\Livewire\Admin\Student\ActivateStudent;
use App\Livewire\Admin\Student\StudentLists;

use App\Livewire\Admin\Subjects\AddSubject;
use App\Livewire\Admin\Subjects\EditSubject;
use App\Livewire\Admin\Subjects\ViewSubject;
use App\Livewire\Admin\Subjects\DeleteSubject;
use App\Livewire\Admin\Subjects\ActivateSubject;
use App\Livewire\Admin\Subjects\SubjectLists;

use App\Livewire\Admin\YearLevel\AddYearLevel;
use App\Livewire\Admin\YearLevel\EditYearLevel;
use App\Livewire\Admin\YearLevel\ViewYearLevel;
use App\Livewire\Admin\YearLevel\DeleteYearLevel;
use App\Livewire\Admin\YearLevel\ActivateYearLevel;
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
use App\Livewire\Admin\Room\ActivateRoom;
use App\Livewire\Admin\Room\RoomLists;

use App\Livewire\Admin\FacultyType\AddFacultyType;
use App\Livewire\Admin\FacultyType\EditFacultyType;
use App\Livewire\Admin\FacultyType\ViewFacultyType;
use App\Livewire\Admin\FacultyType\DeleteFacultyType;
use App\Livewire\Admin\FacultyType\ActivateFacultyType;
use App\Livewire\Admin\FacultyType\FacultyTypeLists;

use App\Livewire\Admin\Designation\AddDesignation;
use App\Livewire\Admin\Designation\EditDesignation;
use App\Livewire\Admin\Designation\ViewDesignation;
use App\Livewire\Admin\Designation\DeleteDesignation;
use App\Livewire\Admin\Designation\ActivateDesignation;
use App\Livewire\Admin\Designation\DesignationLists;

use App\Livewire\Admin\Rank\AddRank;
use App\Livewire\Admin\Rank\EditRank;
use App\Livewire\Admin\Rank\ViewRank;
use App\Livewire\Admin\Rank\DeleteRank;
use App\Livewire\Admin\Rank\ActivateRank;
use App\Livewire\Admin\Rank\RankLists;

use App\Livewire\Admin\Curriculum\AddCurriculum;
use App\Livewire\Admin\Curriculum\EditCurriculum;
use App\Livewire\Admin\Curriculum\ViewCurriculum;
use App\Livewire\Admin\Curriculum\DeleteCurriculum;
use App\Livewire\Admin\Curriculum\ActivateCurriculum;
use App\Livewire\Admin\Curriculum\CurriculumLists;
use App\Livewire\Admin\Curriculum\CurriculumColleges;
use App\Livewire\Admin\Curriculum\CurriculumDepartments;
use App\Livewire\Admin\Curriculum\CurriculumEnrolled;
use App\Livewire\Admin\Curriculum\CurriculumSubjects;


use App\Livewire\Admin\Schedule\AddSchedule;
use App\Livewire\Admin\Schedule\EditSchedule;
use App\Livewire\Admin\Schedule\ViewSchedule;
use App\Livewire\Admin\Schedule\DeleteSchedule;
use App\Livewire\Admin\Schedule\ActivateSchedule;
use App\Livewire\Admin\Schedule\ScheduleLists;


use App\Livewire\Admin\EnrolledStudent\AddEnrolledStudent;
use App\Livewire\Admin\EnrolledStudent\EditEnrolledStudent;
use App\Livewire\Admin\EnrolledStudent\ViewEnrolledStudent;
use App\Livewire\Admin\EnrolledStudent\DeleteEnrolledStudent;
use App\Livewire\Admin\EnrolledStudent\ActivateEnrolledStudent;
use App\Livewire\Admin\EnrolledStudent\EnrolledStudentLists;

use App\Livewire\Admin\Evaluation\EvaluationLists;


use App\Livewire\Admin\Profile\Profile;

// faculty
use App\Livewire\Faculty\EnrolledStudent\EnrolledStudentLists as FacultyEnrolledStudentLists;
use App\Livewire\Faculty\MySchedules\MyScheduleLists;

// admin routes
Route::middleware([IsUnauthenticated::class])->group(function () {
    Route::get('/', function () {
       return redirect(route('login'));
    });
    Route::get('/login',Login::class)->name('login');
    Route::get('/signup',Signup::class)->name('signup');

});



Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('/account-deactivated',Deactivated::class)->name('deactivated');
    Route::get('/logout',Logout::class)->name('logout');
});


// admin routes
Route::middleware([IsAuthenticated::class,IsValid::class])->group(function () {
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
            Route::get('/activate-{id}',ActivateCollege::class)->name('college-activate');
            Route::get('/view-{id}',ViewCollege::class)->name('college-view');
        });
        Route::get('departments-{id?}', DepartmentLists::class)->name('department-lists-college');
        Route::prefix('departments')->group(function () {
            Route::get('/', DepartmentLists::class)->name('department-lists');
            Route::get('/add',AddDepartment::class)->name('department-add');
            Route::get('/edit-{id}',EditDepartment::class)->name('department-edit');
            Route::get('/delete-{id}',DeleteDepartment::class)->name('department-delete');
            Route::get('/activate-{id}',ActivateDepartment::class)->name('department-activate');
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
            Route::get('/activate-{id}',ActivateSemester::class)->name('semester-activate');
            Route::get('/view-{id}',ViewSemester::class)->name('semester-view');
        });
        
        Route::prefix('year-levels')->group(function () {
            Route::get('/',YearLevelLists::class)->name('year-level-lists');
            Route::get('/add',AddYearLevel::class)->name('year-level-add');
            Route::get('/edit-{id}',EditYearLevel::class)->name('year-level-edit');
            Route::get('/delete-{id}',DeleteYearLevel::class)->name('year-level-delete');
            Route::get('/activate-{id}',ActivateYearLevel::class)->name('year-level-activate');
            Route::get('/view-{id}',ViewYearLevel::class)->name('year-level-view');
        });

        Route::prefix('subjects')->group(function () {
            Route::get('/',SubjectLists::class)->name('subject-lists');
            Route::get('/add',AddSubject::class)->name('subject-add');
            Route::get('/edit-{id}',EditSubject::class)->name('subject-edit');
            Route::get('/delete-{id}',DeleteSubject::class)->name('subject-delete');
            Route::get('/activate-{id}',ActivateSubject::class)->name('subject-activate');
            Route::get('/view-{id}',ViewSubject::class)->name('subject-view');
        });

        Route::prefix('students')->group(function () {
            Route::get('/',StudentLists::class)->name('student-lists');
            Route::get('/add',AddStudent::class)->name('student-add');  
            Route::get('/edit-{id}',EditStudent::class)->name('student-edit');
            Route::get('/delete-{id}',DeleteStudent::class)->name('student-delete');
            Route::get('/activate-{id}',ActivateStudent::class)->name('student-activate');
            Route::get('/view-{id}',ViewStudent::class)->name('student-view');
        });

        Route::prefix('rooms')->group(function () {
            Route::get('/',RoomLists::class)->name('room-lists');
            Route::get('/add',AddRoom::class)->name('room-add');
            Route::get('/edit-{id}',EditRoom::class)->name('room-edit');
            Route::get('/delete-{id}',DeleteRoom::class)->name('room-delete');
            Route::get('/activate-{id}',ActivateRoom::class)->name('room-activate');
            Route::get('/view-{id}',ViewRoom::class)->name('room-view');
        });
        
        Route::prefix('admins')->group(function () {
            Route::get('/',AdminLists::class)->name('admin-lists');
            Route::get('/add',AddAdmin::class)->name('admin-add');
            Route::get('/edit-{id}',EditAdmin::class)->name('admin-edit');
            Route::get('/delete-{id}',DeleteAdmin::class)->name('admin-delete');
            Route::get('/view-{id}',ViewAdmin::class)->name('admin-view');
        });
        Route::prefix('academic')->group(function () {
            Route::prefix('faculty')->group(function () {
                Route::get('/',FacultyLists::class)->name('faculty-lists');
                Route::get('/add',AddFaculty::class)->name('faculty-add');
                Route::get('/edit-{id}',EditFaculty::class)->name('faculty-edit');
                Route::get('/delete-{id}',DeleteFaculty::class)->name('faculty-delete');
                Route::get('/activate-{id}',ActivateFaculty::class)->name('faculty-activate');
                Route::get('/view-{id}',ViewFaculty::class)->name('faculty-view');
            });
            Route::prefix('faculty-types')->group(function () {
                Route::get('/',FacultyTypeLists::class)->name('faculty-type-lists');
                Route::get('/add',AddFacultyType::class)->name('faculty-type-add');
                Route::get('/edit-{id}',EditFacultyType::class)->name('faculty-type-edit');
                Route::get('/delete-{id}',DeleteFacultyType::class)->name('faculty-type-delete');
                Route::get('/activate-{id}',ActivateFacultyType::class)->name('faculty-type-activate');
                Route::get('/view-{id}',ViewFacultyType::class)->name('faculty-type-view');
            });
            Route::prefix('ranks')->group(function () {
                Route::get('/',RankLists::class)->name('rank-lists');
                Route::get('/add',AddRank::class)->name('rank-add');
                Route::get('/edit-{id}',EditRank::class)->name('rank-edit');
                Route::get('/delete-{id}',DeleteRank::class)->name('rank-delete');
                Route::get('/activate-{id}',ActivateRank::class)->name('rank-activate');
                Route::get('/view-{id}',ViewRank::class)->name('rank-view');
            });
            Route::prefix('designations')->group(function () {
                Route::get('/',DesignationLists::class)->name('designation-lists');
                Route::get('/add',AddDesignation::class)->name('designation-add');
                Route::get('/edit-{id}',EditDesignation::class)->name('designation-edit');
                Route::get('/delete-{id}',DeleteDesignation::class)->name('designation-delete');
                Route::get('/activate-{id}',ActivateDesignation::class)->name('designation-activate');
                Route::get('/view-{id}',ViewDesignation::class)->name('designation-view');
            });
        });

        Route::prefix('curriculums')->group(function () {
            Route::get('/',CurriculumLists::class)->name('curriculum-lists');

            Route::get('/evaluation-{curriculum_id}',EvaluationLists::class)->name('evaluation-lists');
            Route::get('/enrolled-{curriculum_id}',EnrolledStudentLists::class)->name('enrolled-student-lists');
            Route::get('/enrolled-{curriculum_id}/add',AddEnrolledStudent::class)->name('enrolled-student-add');
            Route::get('/enrolled-{curriculum_id}/edit-{id}',EditEnrolledStudent::class)->name('enrolled-student-edit');
            Route::get('/enrolled-{curriculum_id}/delete-{id}',DeleteEnrolledStudent::class)->name('enrolled-student-delete');
            Route::get('/enrolled-{curriculum_id}/activate-{id}',ActivateEnrolledStudent::class)->name('enrolled-student-activate');
            Route::get('/enrolled-{curriculum_id}/view-{id}',ViewEnrolledStudent::class)->name('enrolled-student-view');

            Route::get('/{school_year}/{college}/{department}/{year_level}/{semester}/',CurriculumSubjects::class)->name('curriculum-subjects-list');
            Route::get('/{school_year}/{college}/{department}',CurriculumEnrolled::class)->name('curriculum-lists-enrolled');
            Route::get('/{school_year}/{college}',CurriculumDepartments::class)->name('curriculum-lists-departments');
            Route::get('/{school_year}',CurriculumColleges::class)->name('curriculum-lists-college');
            
        });
        
        Route::prefix('enrolled')->group(function () {
           

            // Route::get('/add',AddCurriculum::class)->name('curriculum-add');
            // Route::get('/edit-{id}',EditCurriculum::class)->name('curriculum-edit');
            // Route::get('/delete-{id}',DeleteCurriculum::class)->name('curriculum-delete');
            // Route::get('/activate-{id}',ActivateCurriculum::class)->name('curriculum-activate');
            // Route::get('/view-{id}',ViewCurriculum::class)->name('curriculum-view');
        });
         Route::prefix('schedules')->group(function () {
            Route::get('/',ScheduleLists::class)->name('schedule-lists');
            Route::get('/add',AddSchedule::class)->name('schedule-add');
            Route::get('/edit-{id}',EditSchedule::class)->name('schedule-edit');
            Route::get('/delete-{id}',DeleteSchedule::class)->name('schedule-delete');
            Route::get('/activate-{id}',ActivateSchedule::class)->name('schedule-activate');
            Route::get('/view-{id}',ViewSchedule::class)->name('schedule-view');
        });
        
    });


    Route::prefix('faculty')->middleware([IsFaculty::class])->group(function () {
        Route::get('/',function (){return redirect (route('my-schedule-lists'));})->name('my-schedule-default');
        Route::get('/my-schedules',MyScheduleLists::class)->name('my-schedule-lists');
        Route::get('/enrolled-students-{curriculum_id}',FacultyEnrolledStudentLists::class)->name('my-enrolled-students');

        Route::get('rooms/view-{id}',ViewRoom::class)->name('my-room-view');
        Route::get('subjects/view-{id}',ViewSubject::class)->name('my-subject-view');
        Route::get('year-levels/view-{id}',ViewYearLevel::class)->name('my-year-level-view');
        Route::get('semesters/view-{id}',ViewSemester::class)->name('my-semester-view');
        Route::get('school-years/view-{id}',ViewSchoolYear::class)->name('my-school-year-view');
        Route::get('departments/view-{id}',ViewDepartment::class)->name('my-department-view');
        Route::get('colleges/view-{id}',ViewCollege::class)->name('my-college-view');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/',Profile::class)->name('admin-profile');
    });
});