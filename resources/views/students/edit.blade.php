@extends('layouts.app')

@section('title', 'Edit '.$student->name)

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:700px; box-shadow:none">
        <h2 class="fw-bold mb-4">Edit {{ $student->name }}</h2>

        <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input id="name" type="text" name="name" class="form-control rounded @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" name="email" class="form-control rounded @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input id="phone" type="text" name="phone" class="form-control rounded @error('phone') is-invalid @enderror" value="{{ old('phone', $student->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input id="city" type="text" name="city" class="form-control rounded @error('city') is-invalid @enderror" value="{{ old('city', $student->city) }}" placeholder="Tétouan">
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select id="level" name="level" class="form-select rounded @error('level') is-invalid @enderror" required>
                    <option value="">Select level</option>
                    @foreach (['Beginner', 'Intermediate', 'Advanced'] as $lvl)
                        <option value="{{ $lvl }}" {{ old('level', $student->level) == $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                    @endforeach
                </select>
                @error('level')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                @if ($student->photo)
                    <label class="form-label d-block">Current photo</label>
                    <img src="{{ asset('storage/'.$student->photo) }}" alt="{{ $student->name }}" class="rounded border mb-3" style="max-height:100px;object-fit:cover">
                @endif
                <label for="photo" class="form-label">{{ $student->photo ? 'Upload new photo to replace' : 'Profile Photo (optional)' }}</label>
                <input id="photo" type="file" name="photo" accept="image/*" class="form-control rounded @error('photo') is-invalid @enderror">
                <img id="photo-preview" alt="Photo preview" class="rounded border mt-2" style="max-height:100px;display:none">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary-custom rounded">Update Student</button>
                <a href="{{ route('students.show', $student) }}" class="btn btn-outline-secondary rounded">Cancel</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelector('[name=photo]').addEventListener('change', function (event) {
            if (!event.target.files.length) {
                return;
            }

            var reader = new FileReader();
            reader.onload = function (readerEvent) {
                var img = document.getElementById('photo-preview');
                img.src = readerEvent.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endpush
