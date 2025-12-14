@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-vial text-primary"></i> Vaccines</h1>
        <a href="{{ route('vaccines.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Vaccine
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list"></i> All Vaccines
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Manufacturer</th>
                            <th>Doses Required</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vaccines as $vaccine)
                        <tr>
                            <td>{{ $vaccine->vaccine_id }}</td>
                            <td>{{ $vaccine->name }}</td>
                            <td>{{ $vaccine->manufacturer }}</td>
                            <td>{{ $vaccine->doses_required }}</td>
                            <td>{{ $vaccine->notes }}</td>
                            <td>
                                <a href="{{ route('vaccines.show', $vaccine) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('vaccines.edit', $vaccine) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('vaccines.destroy', $vaccine) }}" method="POST" style="display:inline;">
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