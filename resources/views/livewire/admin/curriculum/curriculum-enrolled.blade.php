<div>
    <div class="container-fluid d-flex justify-content-center shadow">
        <span class="fs-2 fw-bold h1 m-0 brand-color">  {{ $title }}s</span>
    </div>
    <div class="container-fluid">
        <div class="table-header">
            <livewire:admin.BreadCrumb.BreadCrumb/>
        </div>
        <div class="d-flex justify-content-between my-2 gap-2 row">
            <div class="col-4">
                <input type="search" wire:model.live="filters.search" name="" id="" placeholder="Search ... " class="form-control">
            </div>
            <div class="d-flex col-7 justify-content-end gap-2">
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
                <a class="btn btn-primary" wire:wire:navigate href="{{ route('enrolled-student-add') }}">
                    <svg  viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" fill-rule="evenodd" d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"></path> </g></svg>
                </a>
            </div>
        </div>
        <table class="table table-striped border position-relative" >
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
                    <th scope="col" class="px-4 ">Code</th>
                    <th scope="col" class="px-4 ">College</th>
                    <th scope="col" class="px-4 ">Departments</th>
                    <th scope="col" class="text-center px-4 ">Actions</th> 
                </tr>
            </thead>
            <tbody>
                 @forelse($table_data as $key =>$value)
                    <tr class="align-middle">
                        <th scope="row" class="px-4">{{($table_data->currentPage()-1)*$table_data->perPage()+$key+1 }}</th>
                            <td class="px-4">{{$value->code}}</td>
                            <td class="px-4">{{$value->name}}</td>
                            <td class="px-4">
                                <a class="btn btn-outline-primary" wire:wire:navigate href="{{ route('department-lists-college',$value->id) }}">
                                    Departments
                                </a>
                            </td>
                            <td class="px-4">
                                <div class="d-flex justify-content-center gap-2">
                                   
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
