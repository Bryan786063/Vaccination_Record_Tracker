@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Vaccination System Dashboard</h2>

    <p>Welcome, {{ auth()->user()->name ?? 'Admin User' }}!</p>

    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="/patients" class="btn btn-primary w-100">Patients</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/vaccines" class="btn btn-success w-100">Vaccines</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/batches" class="btn btn-warning w-100">Batches</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/health-workers" class="btn btn-info w-100">Health Workers</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/schedules" class="btn btn-secondary w-100">Schedules</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="/vaccination-records" class="btn btn-dark w-100">Records</a>
        </div>
    </div>
</div>
@endsection
