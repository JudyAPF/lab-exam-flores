<div class="space-y-5">
    <div>
        <label for="name" class="form-label">Full Name</label>
        <input type="text" id="name" name="name"
               value="{{ old('name', $student->name ?? '') }}"
               placeholder="e.g. Juan Dela Cruz"
               class="form-input @error('name') is-invalid @enderror">
        @error('name')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email"
               value="{{ old('email', $student->email ?? '') }}"
               placeholder="e.g. jdelacruz@example.com"
               class="form-input @error('email') is-invalid @enderror">
        @error('email')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="course_id" class="form-label">Course</label>
        <div class="relative">
            <select id="course_id" name="course_id" class="form-input appearance-none pr-10 @error('course_id') is-invalid @enderror">
                <option value="">-- Select a course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected(old('course_id', $student->course_id ?? '') == $course->id)>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <svg class="pointer-events-none absolute top-1/2 right-3 size-5 -translate-y-1/2 text-ship-cove" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </div>
        @error('course_id')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>
</div>
