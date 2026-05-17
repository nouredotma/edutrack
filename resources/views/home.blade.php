@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="py-5 text-center">
        <h1 class="fw-bold mb-2">Welcome to EduTrack</h1>
        <p class="text-muted mb-4">Student Management System &mdash; Sup'ISI</p>
        @auth
            <a href="{{ route('students.index') }}" class="btn btn-primary-custom px-4 rounded">Manage Students</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary-custom px-4 rounded">Login to Get Started</a>
        @endauth
    </div>

    <div class="row g-4 mt-2">
        <div class="col-6 col-md-3">
            <div class="card border rounded h-100" style="border-left:4px solid #6600AA !important; box-shadow:none">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Total Students</p>
                            <h3 class="fw-bold mb-0">{{ $totalStudents }}</h3>
                        </div>
                        <i class="bi bi-people-fill fs-2" style="color:#6600AA"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border rounded h-100" style="border-left:4px solid #0d6efd !important; box-shadow:none">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Beginners</p>
                            <h3 class="fw-bold mb-0">{{ $beginners }}</h3>
                        </div>
                        <i class="bi bi-mortarboard fs-2" style="color:#0d6efd"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border rounded h-100" style="border-left:4px solid #fd7e14 !important; box-shadow:none">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Intermediate</p>
                            <h3 class="fw-bold mb-0">{{ $intermediates }}</h3>
                        </div>
                        <i class="bi bi-bar-chart-fill fs-2" style="color:#fd7e14"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border rounded h-100" style="border-left:4px solid #198754 !important; box-shadow:none">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted small mb-1">Advanced</p>
                            <h3 class="fw-bold mb-0">{{ $advanced }}</h3>
                        </div>
                        <i class="bi bi-trophy-fill fs-2" style="color:#198754"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
