@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="card card-form">
        <h1>Edit Student</h1>
        <p class="muted">Update the details of {{ $student->name }}.</p>

        <form method="POST" action="{{ route('students.update', $student) }}" novalidate>
            @csrf
            @method('PUT')

            @include('students._form')

            <div class="form-actions">
                <a href="{{ route('students.show', $student) }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
    </div>
@endsection
