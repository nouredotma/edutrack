@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:700px; box-shadow:none">
        <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
            @if ($student->photo)
                <img src="{{ asset('storage/'.$student->photo) }}" alt="{{ $student->name }}" class="rounded-circle border" style="width:100px;height:100px;object-fit:cover">
            @else
                <div class="rounded-circle border d-flex align-items-center justify-content-center bg-light" style="width:100px;height:100px">
                    <span class="fw-bold text-muted fs-3">{{ strtoupper(substr($student->name, 0, 2)) }}</span>
                </div>
            @endif
            <div>
                <h3 class="fw-bold mb-2">{{ $student->name }}</h3>
                <span class="badge rounded-pill badge-{{ strtolower($student->level) }} px-3 py-2">{{ $student->level }}</span>
            </div>
        </div>

        <div class="border rounded overflow-hidden">
            <table class="table table-bordered rounded mb-0">
                <tbody>
                    <tr>
                        <th class="table-light w-50">Name</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th class="table-light">Email</th>
                        <td>{{ $student->email }}</td>
                    </tr>
                    <tr>
                        <th class="table-light">Phone</th>
                        <td>{{ $student->phone ?? 'Not provided' }}</td>
                    </tr>
                    <tr>
                        <th class="table-light">City</th>
                        <td>{{ $student->city }}</td>
                    </tr>
                    <tr>
                        <th class="table-light">Level</th>
                        <td><span class="badge rounded-pill badge-{{ strtolower($student->level) }} px-2 py-1">{{ $student->level }}</span></td>
                    </tr>
                    <tr>
                        <th class="table-light">Member Since</th>
                        <td>{{ $student->created_at->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th class="table-light">Last Updated</th>
                        <td>{{ $student->updated_at->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex gap-2 mt-4 flex-wrap">
            <a href="{{ route('students.edit', $student) }}" class="btn btn-primary-custom rounded">Edit</a>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary rounded">Back to list</a>
            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger rounded" onclick="return confirm('Move to trash?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
