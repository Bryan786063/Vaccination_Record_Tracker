@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <i class="fas fa-edit"></i> Edit Vaccine
                </div>
                <div class="card-body">
                    <form action="{{ route('vaccines.update', $vaccine) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-vial"></i> Vaccine Name
                                </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $vaccine->name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="manufacturer" class="form-label">
                                    <i class="fas fa-building"></i> Manufacturer
                                </label>
                                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $vaccine->manufacturer }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="doses_required" class="form-label">
                                    <i class="fas fa-syringe"></i> Doses Required
                                </label>
                                <input type="number" class="form-control" id="doses_required" name="doses_required" value="{{ $vaccine->doses_required }}" min="1" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">
                                <i class="fas fa-sticky-note"></i> Notes
                            </label>
                            <textarea class="form-control" id="notes" name="notes" rows="3">{{ $vaccine->notes }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('vaccines.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Update Vaccine
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection