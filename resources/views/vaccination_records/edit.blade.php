@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <i class="fas fa-edit"></i> Edit Vaccination Record
                </div>
                <div class="card-body">
                    <form action="{{ route('vaccination_records.update', $vaccinationRecord) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="patient_id" class="form-label">
                                    <i class="fas fa-user"></i> Patient
                                </label>
                                <select class="form-control" id="patient_id" name="patient_id" required>
                                    <option value="">Select Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->patient_id }}" {{ $vaccinationRecord->patient_id == $patient->patient_id ? 'selected' : '' }}>{{ $patient->name }}</option>
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
                                        <option value="{{ $vaccine->vaccine_id }}" {{ $vaccinationRecord->vaccine_id == $vaccine->vaccine_id ? 'selected' : '' }}>{{ $vaccine->name }}</option>
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
                                        <option value="{{ $batch->batch_id }}" {{ $vaccinationRecord->batch_id == $batch->batch_id ? 'selected' : '' }}>{{ $batch->batch_number }}</option>
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
                                        <option value="{{ $worker->worker_id }}" {{ $vaccinationRecord->worker_id == $worker->worker_id ? 'selected' : '' }}>{{ $worker->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dose_number" class="form-label">
                                    <i class="fas fa-hashtag"></i> Dose Number
                                </label>
                                <input type="number" class="form-control" id="dose_number" name="dose_number" value="{{ $vaccinationRecord->dose_number }}" min="1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_given" class="form-label">
                                    <i class="fas fa-calendar-check"></i> Date Given
                                </label>
                                <input type="date" class="form-control" id="date_given" name="date_given" value="{{ $vaccinationRecord->date_given }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">
                                    <i class="fas fa-info-circle"></i> Status
                                </label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="pending" {{ $vaccinationRecord->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $vaccinationRecord->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $vaccinationRecord->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">
                                <i class="fas fa-sticky-note"></i> Remarks
                            </label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3">{{ $vaccinationRecord->remarks }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('vaccination_records.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update Record
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection