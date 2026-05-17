@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="card border rounded p-4 mx-auto" style="max-width:700px; box-shadow:none">
        <h2 class="fw-bold mb-3" style="color:#6600AA">EduTrack</h2>
        <p class="text-muted">
            EduTrack is a Student Management System built for Sup'ISI to make student records easier to create,
            search, update, recover, export, and audit from one clean dashboard.
        </p>

        <h5 class="fw-semibold mt-4 mb-3">Tech Stack</h5>
        <div class="border rounded overflow-hidden">
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

        <h5 class="fw-semibold mt-4 mb-3">Project Context</h5>
        <p class="text-muted mb-0">
            This project modernizes student administration workflows for Sup'ISI in Tétouan with a practical
            Laravel application that supports daily CRUD operations, authenticated management, soft deletion,
            export, and traceable activity history.
        </p>
    </div>
@endsection
