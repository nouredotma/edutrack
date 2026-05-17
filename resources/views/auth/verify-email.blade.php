@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:620px; box-shadow:none">
        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color:#6600AA">EduTrack</h2>
            <p class="text-muted small mb-0">Student Management System</p>
        </div>

        <p class="text-muted">
            Thanks for signing up. Please verify your email address by clicking the link we sent you.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success border rounded" role="alert">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mt-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary-custom rounded">Resend Verification Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-secondary rounded">Log Out</button>
            </form>
        </div>
    </div>
@endsection
