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
            </div>
        </div>
        <div class="row ">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle position-relative" >
                    <thead style="background:#952323;color:white;">
                        <tr class="">
                            <th scope="col" class="px-4">#</th>
                            <th scope="col" class="px-4 text-start">Subject</th>
                            <th scope="col" class="px-4 ">School Year</th>
                            <th scope="col" class="px-4 ">Semester</th>
                            <th scope="col" class="text-center px-4 ">Grade</th> 
                            <th scope="col" class="text-center px-4 ">Grade Equivalent</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($table_data as $key =>$value)
                            <tr class="">
                                <th scope="row" class="px-4">{{ intval($key)+1 }}</th>
                                <td class="px-4 text-start">
                                        {{$value->subject_id}} - {{$value->subject_code}}
                                </td>
                                <th scope="row" class="px-4">{{ $value->school_year}}</th>
                                <th scope="row" class="px-4">{{ $value->semester}}</th>
                                <td class="px-4">
                                    @php
                                        $lab = floatval($value->lab_calculated_grade);
                                        $lec = floatval($value->lec_calculated_grade);
                                        $weight = 0;

                                        if ($lab > 0) $weight += 1;
                                        if ($lec > 0) $weight += 1;

                                        $grade = $weight > 0
                                            ? (($lab * 0.5) + ($lec * 0.5)) 
                                            : NULL;
                                    @endphp
                                    @if($grade)
                                    {{ number_format($grade, 2, '.', '') }}
                                    @endif
                                </td>
                                <td class="px-4">
                                    @if($grade)
                                        @php
                                            $set = false;
                                        @endphp
                                        @foreach ($equivalent_grade as $eg_key =>$eg_value)
                                            @if(floatval($grade) >= floatval($eg_value->minimum) && floatval($grade) < floatval($eg_value->maximum + 1))
                                                {{ $eg_value->grade }}
                                                @php
                                                    $set = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if(!$set)
                                            No grade equivalent
                                        @endif
                                    @else 
                                        
                                    @endif
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
