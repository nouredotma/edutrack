@extends('layouts.app')

@section('title', 'Trash')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 gap-3 flex-wrap">
        <h2 class="fw-bold mb-0"><i class="bi bi-trash me-2"></i>Trash</h2>
        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary rounded">Back to Students</a>
    </div>

    <div class="border rounded overflow-hidden" style="box-shadow:none">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Level</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $student->name }}</td>
                            <td><span class="text-muted small">{{ $student->email }}</span></td>
                            <td>{{ $student->city }}</td>
                            <td><span class="badge rounded-pill badge-{{ strtolower($student->level) }} px-2 py-1">{{ $student->level }}</span></td>
                            <td>{{ $student->deleted_at->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1 flex-wrap justify-content-end">
                                    <form action="{{ route('students.restore', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm rounded">Restore</button>
                                    </form>
                                    <form action="{{ route('students.force-delete', $student->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded" onclick="return confirm('Permanently delete? This cannot be undone.')">Delete Forever</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Trash is empty.</td>
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
