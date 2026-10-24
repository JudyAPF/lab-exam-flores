@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <div class="card card-form">
        <p class="eyebrow">Student #{{ $student->id }}</p>
        <h1>{{ $student->name }}</h1>

        <dl class="details">
            <dt>Email</dt>
            <dd>{{ $student->email }}</dd>

            <dt>Course</dt>
            <dd>{{ $student->course->name }}</dd>

            <dt>Added by</dt>
            <dd>{{ $student->user->name }}</dd>

            <dt>Date added</dt>
            <dd>{{ $student->created_at->format('F j, Y g:i A') }}</dd>
        </dl>

        <div class="form-actions">
            <a href="{{ route('students.index') }}" class="btn btn-outline">&larr; Back to list</a>

            @can('update', $student)
                <a href="{{ route('students.edit', $student) }}" class="btn btn-secondary">Edit</a>
            @endcan

            @can('delete', $student)
                <form method="POST" action="{{ route('students.destroy', $student) }}"
                    onsubmit="return confirm('Delete this student?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    </div>
@endsection
