@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-plus"></i> Create New Vaccination Record
                </div>
                <div class="card-body">
                    <form action="{{ route('vaccination_records.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="patient_id" class="form-label">
                                    <i class="fas fa-user"></i> Patient
                                </label>
                                <select class="form-control" id="patient_id" name="patient_id" required>
                                    <option value="">Select Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->patient_id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="vaccine_id" class="form-label">
                                    <i class="fas fa-vial"></i> Vaccine
                                </label>
                                <select class="form-control" id="vaccine_id" name="vaccine_id" required>
                                    <option value="">Select Vaccine</option>
                                    @foreach($vaccines as $vaccine)
                                        <option value="{{ $vaccine->vaccine_id }}">{{ $vaccine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="batch_id" class="form-label">
                                    <i class="fas fa-boxes"></i> Batch
                                </label>
                                <select class="form-control" id="batch_id" name="batch_id" required>
                                    <option value="">Select Batch</option>
                                    @foreach($batches as $batch)
                                        <option value="{{ $batch->batch_id }}">{{ $batch->batch_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="worker_id" class="form-label">
                                    <i class="fas fa-user-md"></i> Health Worker
                                </label>
                                <select class="form-control" id="worker_id" name="worker_id" required>
                                    <option value="">Select Health Worker</option>
                                    @foreach($healthWorkers as $worker)
                                        <option value="{{ $worker->worker_id }}">{{ $worker->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dose_number" class="form-label">
                                    <i class="fas fa-hashtag"></i> Dose Number
                                </label>
                                <input type="number" class="form-control" id="dose_number" name="dose_number" min="1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_given" class="form-label">
                                    <i class="fas fa-calendar-check"></i> Date Given
                                </label>
                                <input type="date" class="form-control" id="date_given" name="date_given" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">
                                    <i class="fas fa-info-circle"></i> Status
                                </label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">
                                <i class="fas fa-sticky-note"></i> Remarks
                            </label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('vaccination_records.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection