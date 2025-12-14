@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Health Workers</h1>
    <a href="{{ route('health_workers.create') }}" class="btn btn-primary">Create Health Worker</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>License No</th>
                <th>Contact</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($healthWorkers as $worker)
            <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->first_name }}</td>
                <td>{{ $worker->last_name }}</td>
                <td>{{ $worker->license_no }}</td>
                <td>{{ $worker->contact }}</td>
                <td>{{ $worker->role }}</td>
                <td>
                    <a href="{{ route('health_workers.show', $worker) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('health_workers.edit', $worker) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('health_workers.destroy', $worker) }}" method="POST" style="display:inline;">
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