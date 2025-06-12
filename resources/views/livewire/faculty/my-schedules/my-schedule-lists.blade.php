<div>
    <div class="container-fluid position-relative shadow" style="min-height: 110px;">
        <!-- Centered Title -->
        <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
            <span class="fs-2 fw-bold h1 m-0 brand-color"> {{ $title }}s</span>
        </div>

        <!-- Top Right Filters -->
        <div class="position-absolute top-0 end-0 p-2 d-flex flex-column gap-2">
          
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
            <div class="d-flex col justify-content-end gap-2">
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
                <a class="btn btn-primary" wire:click="add('AddSubjectModal')">
                    <svg  viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" fill-rule="evenodd" d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"></path> </g></svg>
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="table-responsive">
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
                            <th scope="col" class="px-4 ">Subject ID</th>
                            <th scope="col" class="px-4 ">Room</th>
                            <th scope="col" class="px-4 ">Start period</th>
                            <th scope="col" class="px-4 ">End period</th>
                            <th scope="col" class="px-4 ">Type</th>
                            <th scope="col" class="px-4 ">Days</th>
                            <th scope="col" class="text-center px-4 ">Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($table_data as $key =>$value)
                            <tr class="align-middle">
                                <th scope="row" class="px-4">{{($table_data->currentPage()-1)*$table_data->perPage()+$key+1 }}</th>
                                    <td class="px-4">
                                        <a href="{{route('my-subject-view',$value->subject_id)  }}" target="_blank">
                                            {{$value->subject}}
                                        </a>
                                    </td>
                                    <td class="px-4">
                                        <a href="{{route('my-room-view',$value->room_id)  }}" target="_blank">
                                            {{$value->room_code}}
                                        </a>
                                    </td>
                                    <td class="px-4">{{$value->schedule_from}}</td>
                                    <td class="px-4">{{$value->schedule_to}}</td>
                                    <td class="px-4">
                                        {{ ($value->is_lec? "LECTURE": "LABORATORY") }}
                                    </td>
                                    <td class="px-4">{{implode(', ', json_decode($value->day, true))}}</td>
                                    <td class="px-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('my-enrolled-students',$value->id) }}" class="btn btn-outline-secondary d-flex justify-content-center items-center" wire:wire:navigate>
                                                <svg fill="currentColor" viewBox="0 -64 640 640"  width="20px"  xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></g></svg>
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
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            {{ $table_data->links('pagination::bootstrap-5') }}
        </div>
    </div>

    
</div>
