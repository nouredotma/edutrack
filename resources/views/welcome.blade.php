@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="text-center py-5">
        <h1 class="fw-bold mb-2">EduTrack</h1>
        <p class="text-muted mb-4">Student Management System</p>
        <a href="{{ route('home') }}" class="btn btn-primary-custom rounded">Go to Home</a>
    </div>
@endsection
