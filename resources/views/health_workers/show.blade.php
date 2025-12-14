@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Health Worker Details</h1>
    <p><strong>ID:</strong> {{ $healthWorker->id }}</p>
    <p><strong>First Name:</strong> {{ $healthWorker->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $healthWorker->last_name }}</p>
    <p><strong>License No:</strong> {{ $healthWorker->license_no }}</p>
    <p><strong>Contact:</strong> {{ $healthWorker->contact }}</p>
    <p><strong>Role:</strong> {{ $healthWorker->role }}</p>
    <a href="{{ route('health_workers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection