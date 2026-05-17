@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:520px; box-shadow:none">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#6600AA">EduTrack</h2>
            <p class="text-muted small mb-0">Student Management System</p>
        </div>

        <p class="text-muted small">Enter your email address and we will send a password reset link.</p>

        @if (session('status'))
            <div class="alert alert-success border rounded" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control rounded @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary-custom rounded">Email Password Reset Link</button>
        </form>
    </div>
@endsection
