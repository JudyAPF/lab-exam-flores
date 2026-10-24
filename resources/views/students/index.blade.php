@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="page-header">
        <div>
            <h1>Students</h1>
            <p class="muted">{{ $students->count() }} student(s) registered</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    <div class="card table-card">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>
                            {{ $student->name }}
                            @if ($student->user_id === Auth::id())
                                <span class="badge">Yours</span>
                            @endif
                        </td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course->name }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-secondary btn-sm">View</a>

                                @can('update', $student)
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-outline btn-sm">Edit</a>
                                @endcan

                                @can('delete', $student)
                                    <form method="POST" action="{{ route('students.destroy', $student) }}"
                                        onsubmit="return confirm('Delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty">No students yet. Click "+ Add Student" to create one.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
