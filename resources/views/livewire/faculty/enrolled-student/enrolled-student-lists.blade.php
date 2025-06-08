<div>
    <div class="container-fluid position-relative shadow" style="min-height: 110px;">
        <!-- Centered Title -->
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            <span class="fs-2 fw-bold h1 m-0 brand-color">{{ $title }}s</span>
        </div>

        <!-- Top Right Filters -->
        <div class="position-absolute top-0 end-0 p-2 d-flex flex-column gap-2">
            <button class="btn btn-info">
                View Details
            </button>
            
        </div>
    </div>



    <div class="container-fluid">
        <div class="table-header">
            <livewire:admin.BreadCrumb.BreadCrumb/>
        </div>
        <div class="d-flex justify-content-between my-2 gap-2 row">
            <div class="col-4">
                <input type="search" wire:model.live="filters.search" name="" id="" placeholder="Search ... " class="form-control">
            </div>
            <div class="col d-flex justify-items-start gap-1">
             
            </div>
            <div class="d-flex col justify-content-end gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg viewBox="0 0 24 24" width="15px" class="mx-1" fill="none"  xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 14L11.6464 14.3536L12 14.7071L12.3536 14.3536L12 14ZM12.5 5C12.5 4.72386 12.2761 4.5 12 4.5C11.7239 4.5 11.5 4.72386 11.5 5L12.5 5ZM6.64645 9.35355L11.6464 14.3536L12.3536 13.6464L7.35355 8.64645L6.64645 9.35355ZM12.3536 14.3536L17.3536 9.35355L16.6464 8.64645L11.6464 13.6464L12.3536 14.3536ZM12.5 14L12.5 5L11.5 5L11.5 14L12.5 14Z" fill="currentColor"></path> <path d="M5 16L5 17C5 18.1046 5.89543 19 7 19L17 19C18.1046 19 19 18.1046 19 17V16" stroke="currentColor"></path> </g></svg>
                        Import 
                    </button>
                    <ul class="dropdown-menu" style="">
                        <li>
                            <a class="dropdown-item waves-effect" wire:click="export('Csv','exportModal')">
                                <span><i class="ti ti-file-text me-1"></i>Import Data</span>
                            </a>
                            <a class="dropdown-item waves-effect" wire:click="export('Csv','exportModal')">
                                <span><i class="ti ti-file-text me-1"></i>Download Template</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn btn-outline-primary dropdown-toggle waves-effect"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg viewBox="0 0 24 24" width="15px" class="mx-1" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 5L11.6464 4.64645L12 4.29289L12.3536 4.64645L12 5ZM12.5 14C12.5 14.2761 12.2761 14.5 12 14.5C11.7239 14.5 11.5 14.2761 11.5 14L12.5 14ZM6.64645 9.64645L11.6464 4.64645L12.3536 5.35355L7.35355 10.3536L6.64645 9.64645ZM12.3536 4.64645L17.3536 9.64645L16.6464 10.3536L11.6464 5.35355L12.3536 4.64645ZM12.5 5L12.5 14L11.5 14L11.5 5L12.5 5Z" fill="currentColor"></path> <path d="M5 16L5 17C5 18.1046 5.89543 19 7 19L17 19C18.1046 19 19 18.1046 19 17V16" stroke="currentColor"></path> </g></svg>
                        Export
                    </button>
                    <ul class="dropdown-menu" style="">
                        <li>
                            <a class="dropdown-item waves-effect" wire:click="export('Csv','exportModal')">
                                <span><i class="ti ti-file-text me-1"></i>Csv</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item waves-effect" wire:click="export('Excel','exportModal')">
                                <span><i class="ti ti-file-spreadsheet me-1"></i>Excel</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item waves-effect" wire:click="export('Pdf','exportModal')">
                                <span><i class="ti ti-file-description me-1"></i>Pdf</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- <a class="btn btn-primary" wire:click="add('AddModal')">
                    <svg  viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" fill-rule="evenodd" d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"></path> </g></svg>
                </a> -->
            </div>
        </div>
        <table class="table table-striped table-bordered position-relative" >
            <div wire:target="filters.search perPage, nextPage, previousPage, gotoPage"
                    wire:loading.flex>
                    <div class="form-loader">
                        Loading...
                        <div class="sk-wave sk-primary mt-4">
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                            <div class="sk-wave-rect"></div>
                        </div>
                    </div>

                </div>
            <thead style="background:#952323;color:white;">
                <tr class="align-middle">
                    <th scope="col" class="px-4">#</th>
                     <th scope="col" class="px-4 ">ID</th>
                    <th scope="col" class="px-4 ">FullName</th>
                    <th scope="col" class="px-4 ">College</th>
                    <th scope="col" class="px-4 ">Department</th>
                    <th scope="col" class="px-4 ">Email</th>
                    <th scope="col" class="text-center px-4 ">Actions</th> 
                </tr>
            </thead>
            <tbody>
                 @forelse($table_data as $key =>$value)
                    <tr class="align-middle">
                        <th scope="row" class="px-4">{{($table_data->currentPage()-1)*$table_data->perPage()+$key+1 }}</th>
                             <td class="px-4">
                                <a href="/admin/students/view-{{ $value->id }}" target="_blank">
                                    {{$value->code}}
                                </a>
                            </td>
                            <td class="px-4">
                                {{$value->fullname}}
                            </td>
                            <td class="px-4">
                                <a href="/admin/colleges/view-{{ $value->college_id }}" target="_blank">
                                    {{$value->college_code}}
                                </a>
                            </td>
                            <td class="px-4">
                                <a href="/admin/departments/view-{{ $value->department_id }}"  target="_blank">
                                    {{$value->department_code}}
                                </a>
                            </td>
                            <td class="px-4">{{$value->email}}</td>
                            <td class="px-4">
                                <div class="d-flex justify-content-center gap-2">
                                    <a wire:click="deleteStudent({{ $value->id }},'deleteModal')" type="button" wire:navigate  class="btn btn-outline-danger d-flex justify-content-center items-center">
                                        <svg fill="currentColor" width="20px"  viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="Icons" x="-64" y="-64" width="1280" height="800" style="fill:none;"></rect> <g id="Icons1" serif:id="Icons"> <g id="Strike"> </g> <g id="H1"> </g> <g id="H2"> </g> <g id="H3"> </g> <g id="list-ul"> </g> <g id="hamburger-1"> </g> <g id="hamburger-2"> </g> <g id="list-ol"> </g> <g id="list-task"> </g> <g id="trash"> <path d="M19.186,16.493l0,-1.992c0.043,-3.346 2.865,-6.296 6.277,-6.427c3.072,-0.04 10.144,-0.04 13.216,0c3.346,0.129 6.233,3.012 6.277,6.427l0,1.992l9.106,0l0,4l-4.442,0l0,29.11c-0.043,3.348 -2.865,6.296 -6.278,6.428c-7.462,0.095 -14.926,0.002 -22.39,0.002c-3.396,-0.044 -6.385,-2.96 -6.429,-6.43l0,-29.11l-4.443,0l0,-4l9.106,0Zm26.434,4l-27.099,0c-0.014,9.72 -0.122,19.441 0.002,29.16c0.049,1.25 1.125,2.33 2.379,2.379c7.446,0.095 14.893,0.095 22.338,0c1.273,-0.049 2.363,-1.163 2.38,-2.455l0,-29.084Zm-4.701,-4c-0.014,-0.83 0,-1.973 0,-1.973c0,0 -0.059,-2.418 -2.343,-2.447c-3.003,-0.039 -10.007,-0.039 -13.01,0c-1.273,0.049 -2.363,1.162 -2.38,2.454l0,1.966l17.733,0Z" style="fill-rule:nonzero;"></path> <rect x="22.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="30.571" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="38.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> </g> <g id="vertical-menu"> </g> <g id="horizontal-menu"> </g> <g id="sidebar-2"> </g> <g id="Pen"> </g> <g id="Pen1" serif:id="Pen"> </g> <g id="clock"> </g> <g id="external-link"> </g> <g id="hr"> </g> <g id="info"> </g> <g id="warning"> </g> <g id="plus-circle"> </g> <g id="minus-circle"> </g> <g id="vue"> </g> <g id="cog"> </g> <g id="logo"> </g> <g id="radio-check"> </g> <g id="eye-slash"> </g> <g id="eye"> </g> <g id="toggle-off"> </g> <g id="shredder"> </g> <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"> </g> <g id="react"> </g> <g id="check-selected"> </g> <g id="turn-off"> </g> <g id="code-block"> </g> <g id="user"> </g> <g id="coffee-bean"> </g> <g id="coffee-beans"> <g id="coffee-bean1" serif:id="coffee-bean"> </g> </g> <g id="coffee-bean-filled"> </g> <g id="coffee-beans-filled"> <g id="coffee-bean2" serif:id="coffee-bean"> </g> </g> <g id="clipboard"> </g> <g id="clipboard-paste"> </g> <g id="clipboard-copy"> </g> <g id="Layer1"> </g> </g> </g></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="align-middle">
                            <td colspan="42">
                                <div class="alert alert-danger d-flex justify-content-center">No records found!</div>
                            </td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
        <div class="row d-flex justify-content-end">
            {{ $table_data->links('pagination::bootstrap-5') }}
        </div>
    </div>


</div>
