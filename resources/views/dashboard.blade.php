@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card border rounded p-4" style="box-shadow:none">
        <h2 class="fw-bold mb-2">Dashboard</h2>
        <p class="text-muted mb-4">You are logged in to EduTrack.</p>
        <a href="{{ route('students.index') }}" class="btn btn-primary-custom rounded">Manage Students</a>
    </div>
@endsection
