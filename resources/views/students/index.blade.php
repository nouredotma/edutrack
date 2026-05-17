@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 gap-3 flex-wrap">
        <h2 class="fw-bold mb-0">Students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary-custom rounded">
            <i class="bi bi-plus-lg me-1"></i>Add Student
        </a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="row g-2 mb-4 align-items-end">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control rounded" placeholder="Search by name, email or city..." value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="level" class="form-select rounded">
                <option value="">All Levels</option>
                <option value="Beginner" {{ request('level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ request('level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ request('level') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary-custom rounded">
                <i class="bi bi-search me-1"></i>Search
            </button>
        </div>
        <div class="col-auto">
            <a href="{{ route('students.export.csv') }}" class="btn btn-outline-primary-custom rounded">
                <i class="bi bi-download me-1"></i>Export CSV
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('students.trash') }}" class="btn btn-outline-secondary rounded">
                <i class="bi bi-trash me-1"></i>Trash
            </a>
        </div>
    </form>

    @if (request('search') || request('level'))
        <p class="text-muted small mb-2">Showing {{ $students->total() }} result(s)</p>
    @endif

    <div class="border rounded overflow-hidden" style="box-shadow:none">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Level</th>
                        <th>Joined</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($student->photo)
                                    <img src="{{ asset('storage/'.$student->photo) }}" alt="{{ $student->name }}" class="rounded-circle border" style="width:40px;height:40px;object-fit:cover">
                                @else
                                    <div class="rounded-circle border d-flex align-items-center justify-content-center bg-light" style="width:40px;height:40px">
                                        <span class="fw-bold text-muted small">{{ strtoupper(substr($student->name, 0, 2)) }}</span>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $student->name }}</td>
                            <td><span class="text-muted small">{{ $student->email }}</span></td>
                            <td>{{ $student->city }}</td>
                            <td><span class="badge rounded-pill badge-{{ strtolower($student->level) }} px-2 py-1">{{ $student->level }}</span></td>
                            <td><span class="text-muted small">{{ $student->created_at->format('d/m/Y') }}</span></td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-outline-primary-custom btn-sm rounded" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary-custom btn-sm rounded" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded" title="Delete" onclick="return confirm('Move {{ $student->name }} to trash?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No students found. <a href="{{ route('students.create') }}">Add one</a></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $students->links() }}
    </div>
@endsection
