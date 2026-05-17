<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->string('search')->toString();

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        $students = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'unique:students,email'],
            'phone' => ['nullable', 'max:20'],
            'city' => ['nullable', 'max:100'],
            'level' => ['required', 'in:Beginner,Intermediate,Advanced'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student = Student::create($validated);
        $this->logActivity('created', "Student #{$student->id} ({$student->name})");

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} added successfully!");
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'unique:students,email,'.$student->id],
            'phone' => ['nullable', 'max:20'],
            'city' => ['nullable', 'max:100'],
            'level' => ['required', 'in:Beginner,Intermediate,Advanced'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($validated);
        $this->logActivity('updated', "Student #{$student->id} ({$student->name})");

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} updated successfully!");
    }

    public function destroy(Student $student): RedirectResponse
    {
        $name = $student->name;
        $id = $student->id;

        $student->delete();
        $this->logActivity('deleted', "Student #{$id} ({$name})");

        return redirect()
            ->route('students.index')
            ->with('success', "{$name} has been moved to trash.");
    }

    public function trash(): View
    {
        $students = Student::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);

        return view('students.trash', compact('students'));
    }

    public function restore($id): RedirectResponse
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();
        $this->logActivity('restored', "Student #{$student->id} ({$student->name})");

        return redirect()
            ->route('students.trash')
            ->with('success', "{$student->name} has been restored.");
    }

    public function forceDelete($id): RedirectResponse
    {
        $student = Student::withTrashed()->findOrFail($id);

        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $name = $student->name;
        $sid = $student->id;

        $student->forceDelete();
        $this->logActivity('force_deleted', "Student #{$sid} ({$name})");

        return redirect()
            ->route('students.trash')
            ->with('success', "{$name} permanently deleted.");
    }

    public function exportCsv(): StreamedResponse
    {
        $students = Student::orderBy('name')->get();
        $filename = 'students_export_'.date('Y-m-d').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ];

        $this->logActivity('exported', 'Students list exported to CSV');

        return response()->stream(function () use ($students) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'City', 'Level', 'Created At']);

            foreach ($students as $student) {
                fputcsv($handle, [
                    $student->id,
                    $student->name,
                    $student->email,
                    $student->phone,
                    $student->city,
                    $student->level,
                    $student->created_at->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
    }

    private function logActivity(string $action, string $target): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'target' => $target,
        ]);
    }
}
