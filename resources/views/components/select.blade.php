@props(['for'])

<div class="mb-3">
    <label for="{{ $for }}" class="form-label">{{ $slot }}</label>
    <select {{ $attributes->merge(['class' => 'form-select']) }} id="{{ $for }}" name="{{ $for }}">
        {{ $slot }}
    </select>
    @error($for)
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>
