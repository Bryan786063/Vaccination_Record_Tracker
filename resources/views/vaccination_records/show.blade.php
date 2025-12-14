@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-clipboard-list"></i> Vaccination Record Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Record Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Record ID:</th>
                                    <td>{{ $vaccinationRecord->record_id }}</td>
                                </tr>
                                <tr>
                                    <th>Patient:</th>
                                    <td>{{ $vaccinationRecord->patient->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Vaccine:</th>
                                    <td>{{ $vaccinationRecord->vaccine->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Batch:</th>
                                    <td>{{ $vaccinationRecord->batch->batch_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Health Worker:</th>
                                    <td>{{ $vaccinationRecord->worker->name ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Vaccination Details</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Dose Number:</th>
                                    <td>{{ $vaccinationRecord->dose_number }}</td>
                                </tr>
                                <tr>
                                    <th>Date Given:</th>
                                    <td>{{ $vaccinationRecord->date_given }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td>
                                        <span class="badge bg-{{ $vaccinationRecord->status == 'completed' ? 'success' : ($vaccinationRecord->status == 'pending' ? 'warning' : 'secondary') }}">
                                            {{ ucfirst($vaccinationRecord->status) }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <div class="mb-3">
                                <strong>Remarks:</strong>
                                <p>{{ $vaccinationRecord->remarks ?: 'No remarks' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Created:</strong>
                                <p>{{ $vaccinationRecord->created_at->format('M d, Y H:i') }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Last Updated:</strong>
                                <p>{{ $vaccinationRecord->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('vaccination_records.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Records
                        </a>
                        <div>
                            <a href="{{ route('vaccination_records.edit', $vaccinationRecord) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection