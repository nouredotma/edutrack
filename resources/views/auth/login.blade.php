@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:480px; box-shadow:none">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#6600AA">EduTrack</h2>
            <p class="text-muted small mb-0">Student Management System</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success border rounded" role="alert">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control rounded @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control rounded @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input id="remember_me" type="checkbox" class="form-check-input rounded" name="remember">
                <label class="form-check-label text-muted" for="remember_me">Remember me</label>
            </div>

            <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                @if (Route::has('password.request'))
                    <a class="small" style="color:#6600AA" href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a class="btn btn-outline-primary-custom rounded" href="{{ route('register') }}">Register</a>
                    <button type="submit" class="btn btn-primary-custom rounded">Log in</button>
                </div>
            </div>
        </form>
    </div>
@endsection
