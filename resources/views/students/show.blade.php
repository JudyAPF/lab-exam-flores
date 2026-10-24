@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <div class="card mx-auto max-w-2xl">
        <div class="accent-bar"></div>

        <div class="flex items-center gap-5 p-6 sm:p-8">
            <span class="grid size-16 shrink-0 place-items-center rounded-2xl bg-ship-cove text-2xl font-bold text-white" aria-hidden="true">
                {{ Str::upper(Str::substr($student->name, 0, 1)) }}
            </span>
            <div class="min-w-0">
                <p class="text-xs font-bold tracking-widest text-ship-cove uppercase">Student #{{ $student->id }}</p>
                <h1 class="mt-1 text-2xl font-bold tracking-tight break-words">{{ $student->name }}</h1>
            </div>
        </div>

        <dl class="grid gap-px border-y border-mystic bg-mystic sm:grid-cols-2">
            <div class="bg-white px-6 py-4 sm:px-8">
                <dt class="text-xs font-semibold tracking-wider text-lucky-point/70 uppercase">Email</dt>
                <dd class="mt-1 break-all">{{ $student->email }}</dd>
            </div>
            <div class="bg-white px-6 py-4 sm:px-8">
                <dt class="text-xs font-semibold tracking-wider text-lucky-point/70 uppercase">Course</dt>
                <dd class="mt-1">{{ $student->course->name }}</dd>
            </div>
            <div class="bg-white px-6 py-4 sm:px-8">
                <dt class="text-xs font-semibold tracking-wider text-lucky-point/70 uppercase">Added by</dt>
                <dd class="mt-1">{{ $student->user->name }}</dd>
            </div>
            <div class="bg-white px-6 py-4 sm:px-8">
                <dt class="text-xs font-semibold tracking-wider text-lucky-point/70 uppercase">Date added</dt>
                <dd class="mt-1">{{ $student->created_at->format('F j, Y g:i A') }}</dd>
            </div>
        </dl>

        <div class="flex flex-wrap items-center justify-between gap-3 bg-mystic/40 px-6 py-4 sm:px-8">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">&larr; Back to list</a>

            <div class="flex flex-wrap gap-2">
                @can('update', $student)
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-accent">Edit</a>
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
    </div>
@endsection
