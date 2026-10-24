@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="card card-form">
        <h1>Add Student</h1>
        <p class="muted">All fields are required.</p>

        <form method="POST" action="{{ route('students.store') }}" novalidate>
            @csrf

            @include('students._form')

            <div class="form-actions">
                <a href="{{ route('students.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </form>
    </div>
@endsection
