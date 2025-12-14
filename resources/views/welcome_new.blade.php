@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Vaccination Record Tracker') }}</div>

                <div class="card-body">
                    @if (Route::has('login'))
                        <div class="text-center">
                            @auth
                                <p class="mb-4">You are logged in as {{ auth()->user()->name }}!</p>
                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                            @else
                                <p class="mb-4">Please log in to access the vaccination record tracker.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary me-2">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection