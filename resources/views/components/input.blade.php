@props(['for'])

<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $slot }}</label>
    <input {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $for }}" name="{{ $for }}">
    @error($for)
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
