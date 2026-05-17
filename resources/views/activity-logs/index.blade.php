@extends('layouts.app')

@section('title', 'Activity Log')

@section('content')
    <h2 class="fw-bold mb-4"><i class="bi bi-clock-history me-2"></i>Activity Log</h2>

    <div class="border rounded overflow-hidden" style="box-shadow:none">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Target</th>
                        <th>By</th>
                        <th>Date &amp; Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($logs as $log)
                        @php
                            $badgeClass = match ($log->action) {
                                'created' => 'badge border rounded text-success bg-success bg-opacity-10 border-success',
                                'updated' => 'badge border rounded text-primary bg-primary bg-opacity-10 border-primary',
                                'deleted' => 'badge border rounded text-danger bg-danger bg-opacity-10 border-danger',
                                'restored' => 'badge border rounded text-warning bg-warning bg-opacity-10 border-warning',
                                'force_deleted' => 'badge border rounded text-secondary bg-secondary bg-opacity-10 border-secondary',
                                'exported' => 'badge border rounded text-purple bg-light',
                                default => 'badge border rounded text-muted bg-light',
                            };
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="{{ $badgeClass }}">{{ ucwords(str_replace('_', ' ', $log->action)) }}</span></td>
                            <td>{{ $log->target }}</td>
                            <td>{{ $log->user ? $log->user->name : 'System' }}</td>
                            <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No activity logged yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $logs->links() }}
    </div>
@endsection
