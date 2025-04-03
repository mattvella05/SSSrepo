@csrf

<div class="mb-3">
    <label for="name" class="form-label">College Name</label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $college->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" id="address" class="form-control"
           value="{{ old('address', $college->address ?? '') }}" required>
</div>
