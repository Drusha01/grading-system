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
                <a class="btn btn-primary" wire:click="add('AddModal')">
                    <svg  viewBox="0 0 20 20" width="20px" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" fill-rule="evenodd" d="M9 17a1 1 0 102 0v-6h6a1 1 0 100-2h-6V3a1 1 0 10-2 0v6H3a1 1 0 000 2h6v6z"></path> </g></svg>
                </a>
            </div>
        </div>
         <div class="row ">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-3">
                @forelse($table_data as $key =>$value)
                   <div class="col">
                        <a class="course d-flex align-items-center justify-content-start brand-bg-color fs-5 h-100 rounded position-relative" 
                            target="_blank" href="{{ route('curriculum-lists-enrolled',$value->id) }}">
                            <div class="d-flex justify-content-between  p-3 rounded " style="min-width:200px;">
                                <div class="d-flex justify-content-end">
                                    <div class="">
                                        <p>{{ $value->prospectus }}</p>
                                        <span class="fs-5">
                                        {{ $value->year_start.' - '.$value->year_end }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-3 text-center d-flex">
                        No Data
                    </div>
                @endforelse
            </div>
        </div>
        <div class="row d-flex justify-content-end">
            {{ $table_data->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="modal fade" id="deleteCurriculumModal" wire:ignore.self
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable d-flex justify-content-center">
            <form wire:submit.prevent="delete({{ $detail['id'] }},'deleteCurriculumModal')">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteCurriculumModalTitle">Delete Curriculum</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="deleteCurriculumModalclose" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <p class="text-danger">
                            Warning deleting this will make the faculty and scheduling subjects linked to this removed!!!.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="AddModal" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable d-flex justify-content-center">
            <form wire:submit.prevent="saveAdd('AddModal')">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="AddSubjectModalLabel">Add Curriculum</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" id="AddSubjectModalclose" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12 mb-3">
                            <label for="school_year_id" class="form-label">Select School Year </label>
                            <select name="school_year_id" id="school_year_id" wire:model.defer="detail.school_year_id" class="form-select @error('detail.school_year_id') is-invalid @enderror">  
                                <option value="">Select School Year</option>
                                @foreach ($school_years as $key => $value )
                                     <option value="{{ $value->id }}" >{{ $value->year_start.' - '.$value->year_end.' '}}</option>
                                @endforeach
                            </select>
                            @error('detail.school_year_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror  
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prospectus" class="form-label">Prospectus </label>
                            <textarea name="" id="" wire:model="detail.prospectus"
                            class="form-control @error('detail.prospectus') is-invalid @enderror"
                            rows="3" ></textarea>
                            @error('detail.prospectus')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror  
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="effective_date" class="form-label">Effective date </label>
                            <input type="date" name="" id="" wire:model="detail.effective_date" class="form-control @error('detail.effective_date') is-invalid @enderror">
                            @error('detail.effective_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror  
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
