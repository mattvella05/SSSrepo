@csrf

<div class="mb-3">
    <label for="name" class="form-label">Student Name</label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $student->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control"
           value="{{ old('email', $student->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control"
           value="{{ old('phone', $student->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="date" name="dob" id="dob" class="form-control"
           value="{{ old('dob', isset($student->dob) ? \Illuminate\Support\Carbon::parse($student->dob)->format('Y-m-d') : '') }}" required>
</div>

<div class="mb-3">
    <label for="college_id" class="form-label">College</label>
    <select name="college_id" id="college_id" class="form-select" required>
        <option value="">Select a college</option>
        @foreach($colleges as $college)
            <option value="{{ $college->id }}"
                {{ (old('college_id', $student->college_id ?? '') == $college->id) ? 'selected' : '' }}>
                {{ $college->name }}
            </option>
        @endforeach
    </select>
</div>
