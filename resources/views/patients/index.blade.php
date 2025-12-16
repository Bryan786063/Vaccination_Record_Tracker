@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Create Patient</a>
    <div class="my-3">
        <label for="totalPatients" class="form-label">Total Patients</label>
        <input id="totalPatients" type="text" class="form-control w-auto" value="{{ $totalPatients ?? 0 }}" readonly>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Contact</th>
                <th>Eligibility Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->patient_id }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->dob }}</td>
                <td>{{ $patient->contact }}</td>
                <td>{{ $patient->eligibility_status }}</td>
                <td>
                    <a href="{{ route('patients.show', $patient) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection