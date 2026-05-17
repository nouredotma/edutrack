@extends('layouts.app')

@section('title', 'Confirm Password')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:520px; box-shadow:none">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#6600AA">EduTrack</h2>
            <p class="text-muted small mb-0">Student Management System</p>
        </div>

        <p class="text-muted small">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control rounded @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary-custom rounded">Confirm</button>
        </form>
    </div>
@endsection
