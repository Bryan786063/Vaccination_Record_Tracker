@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Batch Details</h1>
    <p><strong>ID:</strong> {{ $batch->batch_id }}</p>
    <p><strong>Vaccine ID:</strong> {{ $batch->vaccine_id }}</p>
    <p><strong>Batch Number:</strong> {{ $batch->batch_number }}</p>
    <p><strong>Expiry Date:</strong> {{ $batch->expiry_date }}</p>
    <p><strong>Quantity:</strong> {{ $batch->quantity }}</p>
    <p><strong>Received Date:</strong> {{ $batch->received_date }}</p>
    <a href="{{ route('batches.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection