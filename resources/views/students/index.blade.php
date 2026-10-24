@extends('layouts.app')

@section('title', 'Students')

@section('content')
    <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
        <div>
            <p class="text-xs font-bold tracking-widest text-ship-cove uppercase">SITE Directory</p>
            <h1 class="mt-1 text-3xl font-bold tracking-tight">Students</h1>
            <p class="mt-1 text-sm text-lucky-point/70">{{ $students->count() }} student(s) registered</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    <div class="card">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-ship-cove/20 bg-ship-cove/10 text-xs tracking-wider text-lucky-point/70 uppercase">
                    <tr>
                        <th class="px-4 py-3 font-semibold sm:px-5">Name</th>
                        <th class="hidden px-5 py-3 font-semibold lg:table-cell">Email</th>
                        <th class="hidden px-5 py-3 font-semibold sm:table-cell">Course</th>
                        <th class="px-4 py-3 text-right font-semibold sm:px-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-mystic">
                    @forelse ($students as $student)
                        <tr class="transition hover:bg-mystic/50">
                            <td class="px-4 py-4 sm:px-5">
                                <div class="flex items-center gap-3">
                                    <span class="hidden size-9 shrink-0 place-items-center rounded-full bg-ship-cove text-sm font-bold text-white sm:grid" aria-hidden="true">
                                        {{ Str::upper(Str::substr($student->name, 0, 1)) }}
                                    </span>
                                    <div class="min-w-0">
                                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                                            <span class="font-semibold">{{ $student->name }}</span>
                                            @if ($student->user_id === Auth::id())
                                                <span class="rounded-full bg-cornflower px-2 py-0.5 text-[0.6875rem] font-bold tracking-wide uppercase">Yours</span>
                                            @endif
                                        </div>
                                        {{-- On small screens the email and course move under the name --}}
                                        <p class="truncate text-xs text-lucky-point/70 lg:hidden">{{ $student->email }}</p>
                                        <span class="mt-1.5 inline-flex rounded-full bg-cornflower/25 px-2.5 py-1 text-xs font-semibold sm:hidden">{{ $student->course->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden px-5 py-4 text-lucky-point/80 lg:table-cell">{{ $student->email }}</td>
                            <td class="hidden px-5 py-4 sm:table-cell">
                                <span class="inline-flex rounded-full bg-cornflower/25 px-2.5 py-1 text-xs font-semibold whitespace-nowrap">{{ $student->course->name }}</span>
                            </td>
                            <td class="px-4 py-4 sm:px-5">
                                <div class="flex flex-col gap-2 md:flex-row md:justify-end">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-secondary">View</a>

                                    @can('update', $student)
                                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-accent">Edit</a>
                                    @endcan

                                    @can('delete', $student)
                                        <form method="POST" action="{{ route('students.destroy', $student) }}"
                                            onsubmit="return confirm('Delete this student?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-14 text-center">
                                <p class="font-semibold">No students yet.</p>
                                <p class="mt-1 text-sm text-lucky-point/70">Click "+ Add Student" to create one.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
