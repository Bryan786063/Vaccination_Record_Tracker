@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-clipboard-list text-primary"></i> Vaccination Records</h1>
        <a href="{{ route('vaccination_records.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Record
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list"></i> All Vaccination Records
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Vaccine</th>
                            <th>Batch</th>
                            <th>Health Worker</th>
                            <th>Dose</th>
                            <th>Date Given</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vaccinationRecords as $record)
                        <tr>
                            <td>{{ $record->record_id }}</td>
                            <td>{{ $record->patient->name ?? 'N/A' }}</td>
                            <td>{{ $record->vaccine->name ?? 'N/A' }}</td>
                            <td>{{ $record->batch->batch_number ?? 'N/A' }}</td>
                            <td>{{ $record->worker->name ?? 'N/A' }}</td>
                            <td>{{ $record->dose_number }}</td>
                            <td>{{ $record->date_given }}</td>
                            <td>
                                <span class="badge bg-{{ $record->status == 'completed' ? 'success' : ($record->status == 'pending' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($record->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('vaccination_records.show', $record) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('vaccination_records.edit', $record) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('vaccination_records.destroy', $record) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection