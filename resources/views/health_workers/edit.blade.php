@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Health Worker</h1>
    <form action="{{ route('health_workers.update', $healthWorker) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $healthWorker->first_name }}" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $healthWorker->last_name }}" required>
        </div>
        <div class="mb-3">
            <label for="license_no" class="form-label">License No</label>
            <input type="text" class="form-control" id="license_no" name="license_no" value="{{ $healthWorker->license_no }}">
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="{{ $healthWorker->contact }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $healthWorker->role }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection