@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>
    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="{{ $patient->dob }}">
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $patient->contact }}">
        </div>
        <div class="mb-3">
            <label for="eligibility_status" class="form-label">Eligibility Status</label>
            <input type="text" class="form-control" id="eligibility_status" name="eligibility_status" value="{{ $patient->eligibility_status }}">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes">{{ $patient->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection