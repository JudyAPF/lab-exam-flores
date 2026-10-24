@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="card mx-auto max-w-xl">
        <div class="accent-bar"></div>

        <div class="p-6 sm:p-8">
            <h1 class="text-2xl font-bold tracking-tight">Edit Student</h1>
            <p class="mt-1 text-sm text-lucky-point/70">Update the details of {{ $student->name }}.</p>

            <form method="POST" action="{{ route('students.update', $student) }}" class="mt-8" novalidate>
                @csrf
                @method('PUT')

                @include('students._form')

                <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-mystic pt-6">
                    <a href="{{ route('students.show', $student) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
@endsection
