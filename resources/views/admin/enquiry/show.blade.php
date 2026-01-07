@extends('layouts.admin.master')
@php
    $title = 'Enquiries';
    $name = 'enquiry';
    $app = 'application';
    $result = 'result';
@endphp

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Student Enquiry</h5>
            <small class="text-muted float-end">
                <a href="{{ route($name . '.index') }}"
                    class="btn btn-sm btn-primary d-flex justify-content-between align-items-center gap-2">
                    <i class='ri-arrow-left-line ri-lg'></i>
                    Back
                </a>
            </small>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">General Information</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Information</th>
                            </tr>
                            </thead>
                            
                            <tbody class="table-border-bottom-0">
                            
                            {{-- Step 1: Personal Information --}}
                            <tr>
                                <td>First Name</td>
                                <td>{{ $appointment->first_name ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $appointment->last_name ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Email</td>
                                <td>
                                    @if($appointment->email)
                                        <a href="mailto:{{ $appointment->email }}">{{ $appointment->email }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Phone</td>
                                <td>
                                    @if($appointment->phone)
                                        <a href="tel:{{ $appointment->phone }}">{{ $appointment->phone }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ optional($appointment->dob)->format('d M Y') ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Patient Type</td>
                                <td>{{ $appointment->patient_type ?? '-' }}</td>
                            </tr>
                            
                            {{-- Step 2: Appointment Details --}}
                            <tr>
                                <td>Service Type</td>
                                <td>{{ $appointment->service_type ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Preferred Doctor</td>
                                <td>{{ $appointment->doctor ?? 'No Preference' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Appointment Date</td>
                                <td>{{ optional($appointment->appointment_date)->format('d M Y') ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Appointment Time</td>
                                <td>{{ $appointment->appointment_time ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Reason for Visit</td>
                                <td>{{ $appointment->reason_visit ?? '-' }}</td>
                            </tr>
                            
                            {{-- Step 3: Insurance --}}
                            <tr>
                                <td>Dental Insurance</td>
                                <td>{{ $appointment->insurance ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Insurance Provider</td>
                                <td>{{ $appointment->insurance_provider ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Policy Number</td>
                                <td>{{ $appointment->policy_number ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Group Number</td>
                                <td>{{ $appointment->group_number ?? '-' }}</td>
                            </tr>
                            
                            {{-- Step 4: Medical History --}}
                            <tr>
                                <td>Medical Conditions</td>
                                <td>
                                    @if(!empty($appointment->medical_conditions))
                                        <ul class="mb-0">
                                            @foreach($appointment->medical_conditions as $condition)
                                                <li>{{ ucwords(str_replace('_', ' ', $condition)) }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Current Medications</td>
                                <td>{{ $appointment->medication ?? '-' }}</td>
                            </tr>
                            
                            <tr>
                                <td>Known Allergies</td>
                                <td>{{ $appointment->allergies ?? '-' }}</td>
                            </tr>
                            
                            {{-- Step 5: Communication Preferences --}}
                            <tr>
                                <td>Appointment Reminders</td>
                                <td>
                                    @if(!empty($appointment->appointment_reminders))
                                        {{ collect($appointment->appointment_reminders)
                                            ->map(fn($i) => ucwords(str_replace('_', ' ', $i)))
                                            ->implode(', ') }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            
                            </tbody>



                                <!-- Status -->
                                {{-- <tr>
                                    <td>Status</td>
                                    <td>{{ ${$name}->status ?? '-' }}</td>
                                </tr> --}}


                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4"> --}}
            {{-- <div class="card"> --}}
                {{-- <div class="card-body"> --}}
                    {{-- <label for="name" class="form-label">Choose Status</label> --}}
                    {{-- Main Status Form --}}
                    {{-- CSRF token for AJAX --}}
                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

                    {{-- STATUS DROPDOWN FORM --}}
                    {{-- <form action="{{ route('application.update', ${$app}->id) }}" method="POST" id="statusForm">
                        @csrf
                        @method('PUT')

                        <select name="status" class="form-select form-select-sm" id="statusSelect">
                            <option value="" disabled selected>Choose Status</option>
                            <option value="forward" {{ ${$app}->status == 'forward' ? 'selected' : '' }}>
                                Forward
                            </option>
                            <option value="wait" {{ ${$app}->status == 'wait' ? 'selected' : '' }}>Wait</option>
                            <option value="cancel" {{ ${$app}->status == 'cancel' ? 'selected' : '' }}>Cancel</option>

                        </select>

                        <button type="submit" class="btn btn-primary mt-2" id="statusSubmitBtn">Submit Status</button>
                    </form> --}}

                    {{-- CLASS ENROLLMENT FORM --}}
                    {{-- <div id="classEnrollForm" style="display: none;" class="mt-3">
                        <form id="classEnrollRealForm" action="{{ route('application.classupdate', ${$app}->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="classenroll">

                            <div class="mb-3">
                                <label for="class_name" class="form-label">Class Name</label>
                                <input type="text" class="form-control" id="class_name" name="name"
                                    value="{{ old('name', ${$app}->classEnrolls->name ?? '') }}" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="class_date" class="form-label">Class Date</label>
                                <input type="date" class="form-control" id="class_date" name="date"
                                    value="{{ old('date', ${$app}->classEnrolls->date ?? '') }}">
                                @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="class_shift" class="form-label">Select Shift</label>
                                <select name="shift" id="class_shift" class="form-select" required>
                                    <option value="">Choose</option>
                                    <option value="Morning" {{ old('shift', ${$app}->classEnrolls->shift ?? '') == 'Morning' ? 'selected' : '' }}>
                                        Morning</option>
                                    <option value="Day" {{ old('shift', ${$app}->classEnrolls->shift ?? '') == 'Day' ? 'selected' : '' }}>
                                        Day
                                    </option>
                                </select>
                                @error('shift')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="document" class="form-label">Document Link</label>
                                <input type="text" class="form-control" id="document" name="link"
                                    value="{{ old('link', ${$app}->documentLink->link ?? '') }}" required>
                                @error('link')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if (!empty(${$app}->documentLink->link))

                                    <a class="mb-4" target="_blank" href="{{ ${$app}->documentLink->link }}">View Document
                                        Link</a><br>
                                @endif
                            </div>

                            <button type="button" class="btn btn-success" onclick="submitWithStatus('classenroll')">
                                <i class="ri-check-line"></i> Update Class
                            </button>
                            @if (!empty(${$app}->documentLink->link))
                                <a href="#visadetail" class="btn btn-primary">Visa Details</a><br>

                            @endif
                            {{-- <button type="button" class="btn">Visa Details</button> 
                        </form>
                    </div> --}}


                {{-- </div> --}}
            {{-- </div> --}}

            {{-- <div class="card mt-4">
                <h5 class="card-header">Guardian Information</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <!-- Guardian Info -->
                                <tr>
                                    <td>Name</td>
                                    <td>{{ ${$name}->parents_name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Address</td>
                                    <td>{{ ${$name}->g_address ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <td>Mobile</td>
                                    <td>
                                        @if (${$name}->g_mobile)
                                            <a href="tel:{{ ${$name}->g_mobile }}">{{ ${$name}->g_mobile }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td>
                                        @if (${$name}->g_email)
                                            <a href="mailto:{{ ${$name}->g_email }}">{{ ${$name}->g_email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="card mt-4">
            <h5 class="card-header">Academic Qualification</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Degree</th>
                                <th>School / Collage Name</th>
                                <th>GPA Obtained</th>
                                <th>Passed Year</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            

                            @if (!empty(${$name}->see_school_name) || !empty(${$name}->see_gpa) || !empty(${$name}->see_passed_year))
                                <tr>
                                    <td>SEE</td>
                                    <td>{{ ${$name}->see_school_name ?? '-' }}</td>
                                    <td>{{ ${$name}->see_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->see_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->plus_two_college_name) || !empty(${$name}->plus_two_gpa) || !empty(${$name}->plus_two_passed_year))
                                <tr>
                                    <td>+2</td>
                                    <td>{{ ${$name}->plus_two_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->plus_two_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->plus_two_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->bachelor_college_name) || !empty(${$name}->bachelor_gpa) || !empty(${$name}->bachelor_passed_year))
                                <tr>
                                    <td>Bachelor's Degree</td>
                                    <td>{{ ${$name}->bachelor_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->bachelor_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->bachelor_passed_year ?? '-' }}</td>
                                </tr>
                            @endif

                            @if (!empty(${$name}->master_college_name) || !empty(${$name}->master_gpa) || !empty(${$name}->master_passed_year))
                                <tr>
                                    <td>Master's Degree</td>
                                    <td>{{ ${$name}->master_college_name ?? '-' }}</td>
                                    <td>{{ ${$name}->master_gpa ?? '-' }}</td>
                                    <td>{{ ${$name}->master_passed_year ?? '-' }}</td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        {{-- @if (!empty(${$app}->documentLink->link))
                <div class="card mt-4">
                    <h5 class="card-header" id="visadetail">Visa Details</h5>
                    <div class="card-body">
                        <label for="name" class="form-label">Select Status</label>

                        <form action="{{ route('result.update', ${$app}->result->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-form w-100">
                                <select name="status" class="form-select"
                                    onchange="toggleRemarks(this, {{ ${$app}->result->id }});">
                                    <option value="" disabled selected>Choose Status</option>
                                    <option value="refused" {{ ${$app}->result->status == 'refused' ? 'selected' : '' }}>
                                        Refused
                                    </option>
                                    <option value="withdraw" {{ ${$app}->result->status == 'withdraw' ? 'selected' : '' }}>
                                        Withdraw
                                    </option>
                                    <option value="grant" {{ ${$app}->result->status == 'grant' ? 'selected' : '' }}>
                                        Visa Granted
                                    </option>
                                </select>
                            </div>
                            <div id="remarks-{{ ${$app}->result->id }}"
                                style="{{ ${$app}->result->status == 'refused' ? '' : 'display:none;' }}">
                                <input type="text" name="remarks" class="form-control mt-2" placeholder="Enter remarks"
                                    value="{{ ${$app}->result->remarks ?? '' }}">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                    </form>

                </div>
            </div>
        @endif --}}


    </div>


@endsection

@section('js')
    <script>
        $('.delete_contactinquiry').click(function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest("form").submit();
                }
            });

        });

    </script>

@endsection