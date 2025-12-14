@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Patient Details</h1>
    <p><strong>ID:</strong> {{ $patient->patient_id }}</p>
    <p><strong>Name:</strong> {{ $patient->name }}</p>
    <p><strong>DOB:</strong> {{ $patient->dob }}</p>
    <p><strong>Contact:</strong> {{ $patient->contact }}</p>
    <p><strong>Eligibility Status:</strong> {{ $patient->eligibility_status }}</p>
    <p><strong>Notes:</strong> {{ $patient->notes }}</p>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection