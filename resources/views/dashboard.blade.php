@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Vaccination System Dashboard</h2>

    <p>You are logged in as {{ auth()->user()->name ?? 'Admin User' }}</p>

    <div class="list-group">
        <a href="/patients" class="list-group-item list-group-item-action">
            Patients
        </a>
        <a href="/vaccines" class="list-group-item list-group-item-action">
            Vaccines
        </a>
        <a href="/batches" class="list-group-item list-group-item-action">
            Batches
        </a>
        <a href="/health-workers" class="list-group-item list-group-item-action">
            Health Workers
        </a>
        <a href="/schedules" class="list-group-item list-group-item-action">
            Schedules
        </a>
        <a href="/vaccination-records" class="list-group-item list-group-item-action">
            Vaccination Records
        </a>
    </div>
</div>
@endsection
