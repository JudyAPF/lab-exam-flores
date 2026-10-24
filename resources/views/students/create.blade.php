@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="card mx-auto max-w-xl">
        <div class="accent-bar"></div>

        <div class="p-6 sm:p-8">
            <h1 class="text-2xl font-bold tracking-tight">Add Student</h1>
            <p class="mt-1 text-sm text-lucky-point/70">All fields are required.</p>

            <form method="POST" action="{{ route('students.store') }}" class="mt-8" novalidate>
                @csrf

                @include('students._form')

                <div class="mt-8 flex flex-wrap justify-end gap-3 border-t border-mystic pt-6">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Student</button>
                </div>
            </form>
        </div>
    </div>
@endsection
