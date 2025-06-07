<div>
    <div class="container-fluid position-relative shadow" style="min-height: 110px;">
        <!-- Centered Title -->
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            <span class="fs-2 fw-bold h1 m-0 brand-color">{{ $title }}s</span>
        </div>

        <!-- Top Right Filters -->
        <div class="position-absolute top-0 end-0 p-2 d-flex flex-column gap-2">
            <button class="btn btn-info" wire:click="viewDetails()">
                View Details
            </button>
            <button class="btn btn-info" wire:click="viewDetails()">
                Attendance
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
            <div class="col-2 d-flex justify-items-start gap-1 ">
                <label for="" class="">Term</label>
                <select name="" id="" class="form-control" wire:model.live="detail.term_id">
                    @foreach ($terms as $key =>$value )
                        <option value="{{ $value->id }}">{{ $value->term_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex col justify-content-end gap-2">
                <!-- <div class="dropdown">
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
                </div> -->
                <!-- <div class="btn-group">
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
                </div> -->
                <button class="btn btn-outline-primary" wire:click="open_school_work_modal('addSchoolWorkModal')">
                    <svg height="20px" width="20px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="currentCoolor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:currentColor;} </style> <g> <polygon class="st0" points="374.107,448.835 34.01,448.835 34.01,194.102 164.947,194.102 164.947,63.165 374.107,63.165 374.107,96.698 408.117,64.049 408.117,29.155 164.947,29.155 34.01,160.092 0,194.102 0,482.845 408.117,482.845 408.117,282.596 374.107,318.034 "></polygon> <path class="st0" d="M508.609,118.774l-51.325-51.325c-4.521-4.522-11.852-4.522-16.372,0L224.216,275.561 c-1.344,1.344-2.336,2.998-2.889,4.815l-26.21,86.117c-2.697,8.861,5.586,17.144,14.447,14.447l88.886-27.052l210.159-218.741 C513.13,130.626,513.13,123.295,508.609,118.774z M243.986,349.323l-16.877-18.447l11.698-38.447l29.139,15.678l15.682,29.145 L243.986,349.323z M476.036,110.577L291.414,296.372l-11.728-11.728l185.804-184.631l10.547,10.546 C476.036,110.567,476.036,110.571,476.036,110.577z"></path> </g> </g></svg>
                </button>
                <a href="{{ route('enrolled-student-lists',$detail['curriculum_id']) }}" class="btn btn-outline-secondary d-flex justify-content-center items-center" wire:wire:navigate>
                    <svg fill="currentColor" viewBox="0 -64 640 640"  width="20px"  xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></g></svg>
                </a>
                <a class="btn btn-primary" wire:click="open_school_work_types_modal('addSchoolWorkTypeModal')">
                    <svg fill="currentColor" width="20px" viewBox="-8 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>paper</title> <path d="M13.52 5.72h-7.4c-0.36 0-0.56 0.2-0.6 0.24l-5.28 5.28c-0.040 0.040-0.24 0.24-0.24 0.56v12.2c0 1.24 1 2.24 2.24 2.24h11.24c1.24 0 2.24-1 2.24-2.24v-16.040c0.040-1.24-0.96-2.24-2.2-2.24zM5.28 8.56v1.8c0 0.32-0.24 0.56-0.56 0.56h-1.84l2.4-2.36zM14.080 24.040c0 0.32-0.28 0.56-0.56 0.56h-11.28c-0.32 0-0.56-0.28-0.56-0.56v-11.36h3.040c1.24 0 2.24-1 2.24-2.24v-3.040h6.52c0.32 0 0.56 0.24 0.56 0.56l0.040 16.080z"></path> </g></svg>
                </a>
            </div>
        </div>
        <div class="row mx-1" style="min-width:800px;">
            <table class="table table-striped table-bordered text-center align-middle " >
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
                        <th class="sticky-col"></th>
                        <th class="sticky-col"></th>
                        @forelse ($school_work_types as $key => $value )
                            @php
                                $school_works_var = DB::table('school_works')
                                    ->select(DB::raw('count(*) as total'))
                                    ->where('school_work_type_id','=',$value->id)
                                    ->first();
                            @endphp
                            <th colspan="{{ ( $school_works_var->total >0 ? intval($school_works_var->total) + 1: 1) }}" class="text-center">{{$value->school_work_type}} {{ $value->weight }}%</th>
                        @empty
                            <th colspan="1" class="text-center">No School Work Type</th>
                        @endforelse
                        <th class="">Total</th>
                        <th class="">Weighted Grade</th>
                    </tr>
                    <tr class="align-middle">
                        <th scope="col" class="sticky-col">#</th>
                        <th scope="col" class="sticky-col-2">Student</th>
                         @forelse ($school_work_types as $key => $value )
                            @php
                                $school_works_var = DB::table('school_works')
                                    ->where('school_work_type_id','=',$value->id)
                                    ->get()
                                    ->toArray();
                            @endphp
                            @if(count($school_works_var))
                                @foreach ($school_works_var as $v_key => $v_value )
                                    <th class="text-center">{{ $v_value->school_work_name }}</th>
                                @endforeach
                                <th class="text-center">Avg - Percent</th>
                                <!-- <th class="text-center"></th> -->
                            @else 
                                <th class="text-center">No Data</th>
                            @endif
                        @empty
                            <th colspan="1" class="text-center">No School Work Type</th>
                        @endforelse
                        <th scope="col" class=""></th>
                        <th scope="col" class=""></th>
                    </tr>
                </thead>
                <tbody>
                     @forelse($table_data as $key =>$value)
                            <tr class="align-middle">
                                <th scope="row" class="px-4">{{($table_data->currentPage()-1)*$table_data->perPage()+$key+1 }}</th>
                                <td class="text-start">
                                    <a href="/admin/students/view-{{ $value->id }}" target="_blank">
                                        <span>
                                            {{$value->code.' - '.$value->fullname}}
                                        </span>
                                    </a>
                                </td>
                                @php
                                    $score_key = NULL;
                                @endphp
                                @foreach ($student_scores[$key] as $v_key =>$v_value )
                                    @if ($score_key != $v_value['key'])
                                        @php
                                            $score_key = $v_value['key'];
                                        @endphp
                                        <td class="">
                                            %
                                        </td>
                                    @endif
                                    <td class="">
                                        <div class="d-flex align-middle">
                                            @if($v_value['school_work_id'])
                                                <input type="number" name="" id="" class="form-control" 
                                                    wire:change="updateScore(
                                                        {{ ($v_value['score_id'] ? $v_value['score_id'] : 0) }},
                                                        {{ $v_value['curriculum_id'] }},
                                                        {{ $v_value['student_id'] }},
                                                        {{ $v_value['term_id'] }},
                                                        {{ $v_value['school_work_id']}},
                                                        $event.target.value,
                                                        {{ $v_value['max_score'] }})">
                                                <span class="d-flex align-middle text-center">
                                                    /{{ $v_value['max_score'] }}
                                                </span>
                                            
                                            @endif
                                        </div>
                                    </td>
                                @endforeach
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
        </div>
        <div class="row d-flex justify-content-end">
            {{ $table_data->links('pagination::bootstrap-5') }}
        </div>
        
        <div class="modal fade" id="addSchoolWorkTypeModal" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <form wire:submit.prevent="add_school_work_type({{ $detail['curriculum_id'] }},'addSchoolWorkTypeModal')" class="w-100">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addSchoolWorkTypeModalTitle">Add School Work Types</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="addSchoolWorkTypeModalclose" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-md-6 mb-3">
                                <label for="school_work_type" class="form-label">School Work Type</label>
                                <input type="text" id="school_work_type" wire:model.defer="school_work_type.school_work_type" placeholder="School work type" class="form-control @error('school_work_type.school_work_type') is-invalid @enderror">
                                @error('school_work_type.school_work_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="weight" class="form-label">School Work Weight</label>
                                <input type="weight" min="0.0" step="0.1" id="weight" wire:model.defer="school_work_type.weight" class="form-control @error('school_work_type.weight') is-invalid @enderror">
                                @error('school_work_type.weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col align-bottom">
                                <label for="weight" class="form-label text-white">asd</label>
                                <button class="btn btn-primary ">
                                    Add
                                </button>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center align-middle position-relative" >
                                    <thead style="background:#952323;color:white;">
                                        <tr class="align-middle">
                                            <th scope="col" class="px-4">#</th>
                                            <th scope="col" class="px-4 ">School Work Type</th>
                                            <th scope="col" class="text-center px-4 ">Weight</th> 
                                            <th scope="col" class="text-center px-4 ">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_weight = 0;
                                        @endphp
                                        @forelse($school_work_types as $key =>$value)
                                            <tr class="align-middle">
                                                <th scope="row" class="px-4">{{ intval($key)+1 }}</th>
                                                <td class="px-4">
                                                    {{ $value->school_work_type }}
                                                </td>
                                                <td class="px-4">
                                                    <input type="number" name="" id="" value="{{ $value->weight }}" wire:model="school_work_type_value.{{ $key }}.val" wire:change="updateSchoolWorktype('{{$value->id }}', $event.target.value)" class="form-control" placeholder="weight" min="0.0" step="0.1" >
                                                </td>
                                                @if($value->school_work_type != 'Attendance')
                                                    <td class="d-flex justify-content-center text-center">
                                                        <button wire:click="deleteSchoolWorkType({{$value->id }})" type="button" wire:wire:navigate  class="btn btn-outline-danger d-flex justify-content-center items-center">
                                                            <svg fill="currentColor" width="20px"  viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="Icons" x="-64" y="-64" width="1280" height="800" style="fill:none;"></rect> <g id="Icons1" serif:id="Icons"> <g id="Strike"> </g> <g id="H1"> </g> <g id="H2"> </g> <g id="H3"> </g> <g id="list-ul"> </g> <g id="hamburger-1"> </g> <g id="hamburger-2"> </g> <g id="list-ol"> </g> <g id="list-task"> </g> <g id="trash"> <path d="M19.186,16.493l0,-1.992c0.043,-3.346 2.865,-6.296 6.277,-6.427c3.072,-0.04 10.144,-0.04 13.216,0c3.346,0.129 6.233,3.012 6.277,6.427l0,1.992l9.106,0l0,4l-4.442,0l0,29.11c-0.043,3.348 -2.865,6.296 -6.278,6.428c-7.462,0.095 -14.926,0.002 -22.39,0.002c-3.396,-0.044 -6.385,-2.96 -6.429,-6.43l0,-29.11l-4.443,0l0,-4l9.106,0Zm26.434,4l-27.099,0c-0.014,9.72 -0.122,19.441 0.002,29.16c0.049,1.25 1.125,2.33 2.379,2.379c7.446,0.095 14.893,0.095 22.338,0c1.273,-0.049 2.363,-1.163 2.38,-2.455l0,-29.084Zm-4.701,-4c-0.014,-0.83 0,-1.973 0,-1.973c0,0 -0.059,-2.418 -2.343,-2.447c-3.003,-0.039 -10.007,-0.039 -13.01,0c-1.273,0.049 -2.363,1.162 -2.38,2.454l0,1.966l17.733,0Z" style="fill-rule:nonzero;"></path> <rect x="22.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="30.571" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="38.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> </g> <g id="vertical-menu"> </g> <g id="horizontal-menu"> </g> <g id="sidebar-2"> </g> <g id="Pen"> </g> <g id="Pen1" serif:id="Pen"> </g> <g id="clock"> </g> <g id="external-link"> </g> <g id="hr"> </g> <g id="info"> </g> <g id="warning"> </g> <g id="plus-circle"> </g> <g id="minus-circle"> </g> <g id="vue"> </g> <g id="cog"> </g> <g id="logo"> </g> <g id="radio-check"> </g> <g id="eye-slash"> </g> <g id="eye"> </g> <g id="toggle-off"> </g> <g id="shredder"> </g> <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"> </g> <g id="react"> </g> <g id="check-selected"> </g> <g id="turn-off"> </g> <g id="code-block"> </g> <g id="user"> </g> <g id="coffee-bean"> </g> <g id="coffee-beans"> <g id="coffee-bean1" serif:id="coffee-bean"> </g> </g> <g id="coffee-bean-filled"> </g> <g id="coffee-beans-filled"> <g id="coffee-bean2" serif:id="coffee-bean"> </g> </g> <g id="clipboard"> </g> <g id="clipboard-paste"> </g> <g id="clipboard-copy"> </g> <g id="Layer1"> </g> </g> </g></svg>
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                            @php
                                                $total_weight +=$value->weight;
                                            @endphp
                                        @empty
                                            <tr class="align-middle">
                                                <td colspan="42">
                                                    <div class="alert alert-danger d-flex justify-content-center">No records found!</div>
                                                </td>
                                            </tr>
                                        @endforelse
                                        <tr class="align-middle">
                                            <td colspan="2" class="text-end">Total :</td>
                                            <td colspan="">
                                                <div class="">{{ $total_weight }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

         <div class="modal fade" id="addSchoolWorkModal" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <form wire:submit.prevent="add_school_work('addSchoolWorkModal')" class="w-100">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addSchoolWorkModalTitle">Add School Work</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" id="addSchoolWorkModalclose" aria-label="Close"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-6 mb-3">
                                <label for="school_work_type_id" class="form-label">School work type</label>
                                <select name="school_work_type_id" id="school_work_type_id" class="form-control @error('school_work.school_work_type_id') is-invalid @enderror" wire:model.live="school_work.school_work_type_id">
                                    @forelse($school_work_types as $key =>$value)
                                        @if($key == 0)
                                             <option value="">Select school work type</option>
                                        @endif
                                        <option value="{{ $value->id }}">{{ $value->school_work_type }}</option>
                                    @empty
                                        <option value="">Please add school work type </option>
                                    @endforelse
                                </select>
                                @error('school_work.school_work_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mb-4">
                                <label for="schedule_date" class="form-label">School work date</label>
                                <input type="date" name="schedule_date" id="schedule_date"  wire:model="school_work.schedule_date" class="form-control @error('school_work.schedule_date') is-invalid @enderror">
                                @error('school_work.schedule_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="school_work" class="form-label">School work name</label>
                                <input type="text" id="school_work" wire:model.defer="school_work.school_work_name" placeholder="School work type" class="form-control @error('school_work.school_work_name') is-invalid @enderror">
                                @error('school_work.school_work_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="max_score" class="form-label">School work total score</label>
                                <input type="max_score" min="0.0" step="1" id="max_score" wire:model="school_work.max_score" class="form-control @error('school_work.max_score') is-invalid @enderror">
                                @error('school_work.max_score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col align-bottom">
                                <label for="weight" class="form-label text-white">asd</label>
                                <button class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center align-middle position-relative" >
                                    <thead style="background:#952323;color:white;">
                                        <tr class="align-middle">
                                            <th scope="col" class="px-4">#</th>
                                            <th scope="col" class="px-4 ">School work name</th>
                                            <th scope="col" class="text-center px-4 ">Date</th> 
                                            <th scope="col" class="text-center px-4 ">Score</th> 
                                            <th scope="col" class="text-center px-4 ">Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total_score = 0;
                                        @endphp
                                        @forelse($school_works as $key =>$value)
                                            <tr class="align-middle">
                                                <th scope="row" class="px-4">{{ intval($key)+1 }}</th>
                                                <td class="px-4">
                                                    {{ $value->school_work_name }}
                                                </td>
                                                <td class="px-4">
                                                    {{ \Carbon\Carbon::parse($value->schedule_date)->format('F j, Y') }}
                                                </td>
                                                <td class="px-4">
                                                    {{ $value->max_score }}
                                                </td>
                                                <td class="d-flex justify-content-center text-center">
                                                    <button wire:click="deleteSchoolWork({{$value->id }})" type="button" wire:wire:navigate  class="btn btn-outline-danger d-flex justify-content-center items-center">
                                                        <svg fill="currentColor" width="20px"  viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect id="Icons" x="-64" y="-64" width="1280" height="800" style="fill:none;"></rect> <g id="Icons1" serif:id="Icons"> <g id="Strike"> </g> <g id="H1"> </g> <g id="H2"> </g> <g id="H3"> </g> <g id="list-ul"> </g> <g id="hamburger-1"> </g> <g id="hamburger-2"> </g> <g id="list-ol"> </g> <g id="list-task"> </g> <g id="trash"> <path d="M19.186,16.493l0,-1.992c0.043,-3.346 2.865,-6.296 6.277,-6.427c3.072,-0.04 10.144,-0.04 13.216,0c3.346,0.129 6.233,3.012 6.277,6.427l0,1.992l9.106,0l0,4l-4.442,0l0,29.11c-0.043,3.348 -2.865,6.296 -6.278,6.428c-7.462,0.095 -14.926,0.002 -22.39,0.002c-3.396,-0.044 -6.385,-2.96 -6.429,-6.43l0,-29.11l-4.443,0l0,-4l9.106,0Zm26.434,4l-27.099,0c-0.014,9.72 -0.122,19.441 0.002,29.16c0.049,1.25 1.125,2.33 2.379,2.379c7.446,0.095 14.893,0.095 22.338,0c1.273,-0.049 2.363,-1.163 2.38,-2.455l0,-29.084Zm-4.701,-4c-0.014,-0.83 0,-1.973 0,-1.973c0,0 -0.059,-2.418 -2.343,-2.447c-3.003,-0.039 -10.007,-0.039 -13.01,0c-1.273,0.049 -2.363,1.162 -2.38,2.454l0,1.966l17.733,0Z" style="fill-rule:nonzero;"></path> <rect x="22.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="30.571" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> <rect x="38.58" y="28.099" width="3" height="16.327" style="fill-rule:nonzero;"></rect> </g> <g id="vertical-menu"> </g> <g id="horizontal-menu"> </g> <g id="sidebar-2"> </g> <g id="Pen"> </g> <g id="Pen1" serif:id="Pen"> </g> <g id="clock"> </g> <g id="external-link"> </g> <g id="hr"> </g> <g id="info"> </g> <g id="warning"> </g> <g id="plus-circle"> </g> <g id="minus-circle"> </g> <g id="vue"> </g> <g id="cog"> </g> <g id="logo"> </g> <g id="radio-check"> </g> <g id="eye-slash"> </g> <g id="eye"> </g> <g id="toggle-off"> </g> <g id="shredder"> </g> <g id="spinner--loading--dots-" serif:id="spinner [loading, dots]"> </g> <g id="react"> </g> <g id="check-selected"> </g> <g id="turn-off"> </g> <g id="code-block"> </g> <g id="user"> </g> <g id="coffee-bean"> </g> <g id="coffee-beans"> <g id="coffee-bean1" serif:id="coffee-bean"> </g> </g> <g id="coffee-bean-filled"> </g> <g id="coffee-beans-filled"> <g id="coffee-bean2" serif:id="coffee-bean"> </g> </g> <g id="clipboard"> </g> <g id="clipboard-paste"> </g> <g id="clipboard-copy"> </g> <g id="Layer1"> </g> </g> </g></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                                $total_score +=$value->max_score;
                                            @endphp
                                        @empty
                                            <tr class="align-middle">
                                                <td colspan="42">
                                                    <div class="alert alert-danger d-flex justify-content-center">No records found!</div>
                                                </td>
                                            </tr>
                                        @endforelse
                                        <tr class="align-middle">
                                            <td colspan="3" class="text-end">Total :</td>
                                            <td colspan="">
                                                <div class="">{{ $total_score }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
