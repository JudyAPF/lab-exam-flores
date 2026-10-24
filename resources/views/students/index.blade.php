@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>
    <p class="muted">{{ $students->count() }} student(s) registered</p>

    <div class="card table-card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty">No students yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
