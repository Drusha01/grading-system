<div>
    <div class="container-fluid d-flex justify-content-center shadow">
        <span class="fs-2 fw-bold h1 m-0 brand-color">  {{ $title }}s</span>
    </div>
    <div class="container-fluid">
        <div class="table-header">
            <livewire:admin.BreadCrumb.BreadCrumb/>
        </div>
        <div class="d-flex justify-content-between my-2 row">
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
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-3">
                @forelse($table_data as $key =>$value)
                    <div class="col">
                        <a class="course d-flex align-items-center justify-content-start brand-bg-color fs-5 h-100 rounded position-relative" 
                            href="/admin/curriculums/{{ $school_year }}/{{ $college }}/{{ $value->code }}">
                            <div class="d-flex justify-content-between  p-3 rounded " style="min-width:200px;">
                                <div class="d-flex justify-content-end">
                                    <div class="">
                                        <p>{{ $value->name }}</p>
                                        <span class="fs-5"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
        </div>
        <div class="row mx-5 d-flex justify-content-end">
            {{ $table_data->links('pagination::bootstrap-5') }}
        </div>  
    </div>
</div>
