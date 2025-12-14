@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-plus"></i> Create New Schedule
                </div>
                <div class="card-body">
                    <form action="{{ route('schedules.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="patient_id" class="form-label">
                                    <i class="fas fa-user"></i> Patient ID
                                </label>
                                <input type="number" class="form-control" id="patient_id" name="patient_id" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="vaccine_id" class="form-label">
                                    <i class="fas fa-vial"></i> Vaccine ID
                                </label>
                                <input type="number" class="form-control" id="vaccine_id" name="vaccine_id" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dose_number" class="form-label">
                                    <i class="fas fa-hashtag"></i> Dose Number
                                </label>
                                <input type="number" class="form-control" id="dose_number" name="dose_number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="scheduled_date" class="form-label">
                                    <i class="fas fa-calendar"></i> Scheduled Date
                                </label>
                                <input type="date" class="form-control" id="scheduled_date" name="scheduled_date">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">
                                <i class="fas fa-info-circle"></i> Status
                            </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">
                                <i class="fas fa-sticky-note"></i> Notes
                            </label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Schedule
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection