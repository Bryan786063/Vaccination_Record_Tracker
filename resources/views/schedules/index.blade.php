@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-calendar-alt text-primary"></i> Schedules</h1>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Schedule
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list"></i> All Schedules
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Patient ID</th>
                            <th>Vaccine ID</th>
                            <th>Dose Number</th>
                            <th>Scheduled Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->schedule_id }}</td>
                            <td>{{ $schedule->patient_id }}</td>
                            <td>{{ $schedule->vaccine_id }}</td>
                            <td>{{ $schedule->dose_number }}</td>
                            <td>{{ $schedule->scheduled_date }}</td>
                            <td>{{ $schedule->status }}</td>
                            <td>
                                <a href="{{ route('schedules.show', $schedule) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display:inline;">
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