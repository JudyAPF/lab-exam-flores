<div class="form-group">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name"
           value="{{ old('name', $student->name ?? '') }}"
           class="@error('name') is-invalid @enderror">
    @error('name')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email"
           value="{{ old('email', $student->email ?? '') }}"
           class="@error('email') is-invalid @enderror">
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="course_id">Course</label>
    <select id="course_id" name="course_id" class="@error('course_id') is-invalid @enderror">
        <option value="">-- Select a course --</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" @selected(old('course_id', $student->course_id ?? '') == $course->id)>
                {{ $course->name }}
            </option>
        @endforeach
    </select>
    @error('course_id')
        <p class="error">{{ $message }}</p>
    @enderror
</div>
