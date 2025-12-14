@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-vial"></i> Vaccine Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Vaccine Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th>ID:</th>
                                    <td>{{ $vaccine->vaccine_id }}</td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $vaccine->name }}</td>
                                </tr>
                                <tr>
                                    <th>Manufacturer:</th>
                                    <td>{{ $vaccine->manufacturer }}</td>
                                </tr>
                                <tr>
                                    <th>Doses Required:</th>
                                    <td>{{ $vaccine->doses_required }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Additional Information</h5>
                            <div class="mb-3">
                                <strong>Notes:</strong>
                                <p>{{ $vaccine->notes ?: 'No notes available' }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Created:</strong>
                                <p>{{ $vaccine->created_at->format('M d, Y H:i') }}</p>
                            </div>
                            <div class="mb-3">
                                <strong>Last Updated:</strong>
                                <p>{{ $vaccine->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('vaccines.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Vaccines
                        </a>
                        <div>
                            <a href="{{ route('vaccines.edit', $vaccine) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection