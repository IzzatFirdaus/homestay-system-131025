@props(['for'])

<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $slot }}</label>
    <textarea {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $for }}" name="{{ $for }}">{{ $slot }}</textarea>
    @error($for)
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
