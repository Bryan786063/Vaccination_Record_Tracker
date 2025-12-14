@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Batch</h1>
    <form action="{{ route('batches.update', $batch) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="vaccine_id" class="form-label">Vaccine ID</label>
            <input type="number" class="form-control" id="vaccine_id" name="vaccine_id" value="{{ $batch->vaccine_id }}" required>
        </div>
        <div class="mb-3">
            <label for="batch_number" class="form-label">Batch Number</label>
            <input type="text" class="form-control" id="batch_number" name="batch_number" value="{{ $batch->batch_number }}">
        </div>
        <div class="mb-3">
            <label for="expiry_date" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $batch->expiry_date }}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $batch->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="received_date" class="form-label">Received Date</label>
            <input type="date" class="form-control" id="received_date" name="received_date" value="{{ $batch->received_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection