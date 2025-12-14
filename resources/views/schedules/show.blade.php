@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-calendar-alt"></i> Schedule Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-id-badge"></i> Schedule ID:</strong> {{ $schedule->schedule_id }}</p>
                            <p><strong><i class="fas fa-user"></i> Patient ID:</strong> {{ $schedule->patient_id }}</p>
                            <p><strong><i class="fas fa-vial"></i> Vaccine ID:</strong> {{ $schedule->vaccine_id }}</p>
                            <p><strong><i class="fas fa-hashtag"></i> Dose Number:</strong> {{ $schedule->dose_number }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-calendar"></i> Scheduled Date:</strong> {{ $schedule->scheduled_date }}</p>
                            <p><strong><i class="fas fa-info-circle"></i> Status:</strong> 
                                <span class="badge bg-{{ $schedule->status == 'Completed' ? 'success' : ($schedule->status == 'Pending' ? 'warning' : 'primary') }}">
                                    {{ $schedule->status }}
                                </span>
                            </p>
                            <p><strong><i class="fas fa-sticky-note"></i> Notes:</strong> {{ $schedule->notes }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Schedules
                        </a>
                        <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Schedule
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection