@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="py-4 py-lg-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <p class="text-muted small mb-2">Sup'ISI Student Management System</p>
                <h2 class="fw-bold mb-3">Welcome to EduTrack</h2>
                <p class="text-muted mb-4" style="max-width:760px">
                    Manage student records, levels, recovery, exports, and activity history from a focused Laravel dashboard.
                    EduTrack helps modernize student administration for Sup'ISI in Tétouan.
                </p>
                @auth
                    <a href="{{ route('students.index') }}" class="btn btn-primary-custom px-4 rounded">Manage Students</a>
                @else
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('login') }}" class="btn btn-primary-custom px-4 rounded">Login to Get Started</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary-custom px-4 rounded">Create Account</a>
                    </div>
                @endauth
            </div>
            <div class="col-lg-4">
                <div class="card border rounded h-100" style="border-left:4px solid #6600AA !important; box-shadow:none">
                    <div class="card-body">
                        <p class="text-muted small mb-2">Project Context</p>
                        <h5 class="fw-bold mb-3">Built for daily academic operations</h5>
                        <p class="text-muted small mb-0">
                            EduTrack keeps student management simple: authenticated access, searchable records,
                            clean forms, soft-delete recovery, CSV export, and a readable activity trail.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="row g-4 mt-4">
        <div class="col-lg-7">
            <div class="card border rounded h-100" style="box-shadow:none">
                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-3" style="color:#6600AA">About EduTrack</h3>
                    <p class="text-muted">
                        EduTrack is a Student Management System built for Sup'ISI to make student records easier to create,
                        search, update, recover, export, and audit from one clean dashboard.
                    </p>
                    <p class="text-muted mb-0">
                        It is a practical Laravel application for student administration workflows, with secure access
                        for managers and a consistent Bootstrap interface designed for repeated daily use.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="border rounded overflow-hidden bg-white h-100">
                <table class="table table-bordered rounded mb-0">
                    <tbody>
                        <tr>
                            <th class="table-light w-50">Framework</th>
                            <td>Laravel 12</td>
                        </tr>
                        <tr>
                            <th class="table-light">PHP</th>
                            <td>PHP 8.2+</td>
                        </tr>
                        <tr>
                            <th class="table-light">Database</th>
                            <td>MySQL</td>
                        </tr>
                        <tr>
                            <th class="table-light">Frontend</th>
                            <td>Bootstrap 5.3 via CDN</td>
                        </tr>
                        <tr>
                            <th class="table-light">Authentication</th>
                            <td>Laravel Breeze</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
