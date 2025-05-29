<div>
    <div class="container-fluid d-flex justify-content-center shadow text-dark">
        <span class="fs-2 fw-bold h1 m-0 brand-color"> Add {{ $title }}</span>
    </div>
    <div class="container-fluid">
        <div class="table-header">
            <livewire:admin.BreadCrumb.BreadCrumb/>
        </div>
        <div class="d-flex justify-content-between my-2 gap-2 row">
        </div>

        <form wire:submit.prevent="save()">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" wire:model.defer="detail.email" placeholder="Email" class="form-control @error('detail.email') is-invalid @enderror">
                    @error('detail.email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="code" class="form-label">ID</label>
                    <input type="text" id="code" wire:model.defer="detail.code" placeholder="ID" class="form-control @error('detail.code') is-invalid @enderror">
                    @error('detail.code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="year_level_id" class="form-label">Year Level</label>
                    <select name="year_level_id" id="year_level_id" wire:model="detail.year_level_id" class="form-select @error('detail.year_level_id') is-invalid @enderror">  
                        <option value="">Select Year Level</option>
                        @foreach ($year_levels as $key => $value )
                            <option value="{{ $value->id }}" >{{ $value->year_level }}</option>
                        @endforeach
                    </select>
                    @error('detail.year_level_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="college_id" class="form-label">College</label>
                    <select name="college_id" id="college_id" wire:model.live="detail.college_id" class="form-select @error('detail.college_id') is-invalid @enderror">  
                        <option value="">Select College</option>
                        @foreach ($colleges as $key => $value )
                            <option value="{{ $value->id }}" >{{ $value->code.' - '.$value->name }}</option>
                        @endforeach
                    </select>
                    @error('detail.college_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
                <div class="col-md-6 mb-3">
                    <label for="department_id" class="form-label">Department</label>
                    <select name="department_id" id="department_id" @if(intval($detail['college_id']) == 0){{ 'disabled' }} @endif wire:model="detail.department_id" class="form-select @error('detail.department_id') is-invalid @enderror">  
                        <option value="">Select Department</option>
                        @foreach ($departments as $key => $value )
                            @if(intval($detail['college_id']) == $value->college_id)
                                <option value="{{ $value->id }}" >{{ $value->code.' - '.$value->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('detail.department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror  
                </div>
            </div>          
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First name</label>
                    <input type="text" id="first_name" wire:model.defer="detail.first_name" placeholder="First name" class="form-control @error('detail.first_name') is-invalid @enderror">
                    @error('detail.first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="middle_name" class="form-label">Middle name</label>
                    <input type="text" id="middle_name" wire:model.defer="detail.middle_name" placeholder="Middle name" class="form-control @error('detail.middle_name') is-invalid @enderror">
                    @error('detail.middle_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last name</label>
                    <input type="text" id="last_name" wire:model.defer="detail.last_name" placeholder="Last name" class="form-control @error('detail.last_name') is-invalid @enderror">
                    @error('detail.last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="suffix" class="form-label">Suffix </label>
                    <input type="text" id="suffix" wire:model.defer="detail.suffix" placeholder="Suffix" class="form-control @error('detail.suffix') is-invalid @enderror">
                    @error('detail.suffix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 d-flex justify-content-center">
                    <div class="p-2">
                        <button class="btn btn-primary" type="submit">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


