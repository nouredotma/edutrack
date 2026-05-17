@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:520px; box-shadow:none">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#6600AA">EduTrack</h2>
            <p class="text-muted small mb-0">Student Management System</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control rounded @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control rounded @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-control rounded @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary-custom rounded">Reset Password</button>
        </form>
    </div>
@endsection
