@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-boxes text-primary"></i> Batches</h1>
        <a href="{{ route('batches.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Batch
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-list"></i> All Batches
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Vaccine ID</th>
                            <th>Batch Number</th>
                            <th>Expiry Date</th>
                            <th>Quantity</th>
                            <th>Received Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $batch)
                        <tr>
                            <td>{{ $batch->batch_id }}</td>
                            <td>{{ $batch->vaccine_id }}</td>
                            <td>{{ $batch->batch_number }}</td>
                            <td>{{ $batch->expiry_date }}</td>
                            <td>{{ $batch->quantity }}</td>
                            <td>{{ $batch->received_date }}</td>
                            <td>
                                <a href="{{ route('batches.show', $batch) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('batches.edit', $batch) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('batches.destroy', $batch) }}" method="POST" style="display:inline;">
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