{{--
    Accessible Form Input Component

    Props:
    - name: input name attribute (required)
    - label: input label text (optional)
    - type: input type (default: 'text')
    - required: boolean (default: false)
    - disabled: boolean (default: false)
    - readonly: boolean (default: false)
    - error: error message string (optional)
    - placeholder: placeholder text (optional)
    - helpText: help text below input (optional)
    - value: input value (optional)
    - maxlength: maximum character length (optional)
    - pattern: regex pattern for validation (optional)
    - autocomplete: autocomplete attribute (optional)
    - inputClass: additional classes for input element

    Usage:
    <x-form-input
        name="email"
        label="Email Address"
        type="email"
        required
        :error="$errors->first('email')"
        placeholder="user@example.com"
        helpText="We'll never share your email."
    />
--}}

@props([
    'name' => null,
    'label' => null,
    'type' => 'text',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => null,
    'placeholder' => null,
    'helpText' => null,
    'value' => null,
    'maxlength' => null,
    'pattern' => null,
    'autocomplete' => null,
    'inputClass' => '',
])

@php
    if (!$name) {
        throw new \Exception('Form input component requires a "name" prop');
    }

    $inputId = $attributes->get('id', $name);
    $helpTextId = $helpText ? "{$inputId}-help" : null;
    $errorId = $error ? "{$inputId}-error" : null;

    $inputClasses = 'form-control';
    if ($error) {
        $inputClasses .= ' is-invalid';
    }
    if ($inputClass) {
        $inputClasses .= ' ' . $inputClass;
    }

    $describedBy = '';
    if ($helpTextId) {
        $describedBy .= $helpTextId;
    }
    if ($errorId) {
        $describedBy .= ($describedBy ? ' ' : '') . $errorId;
    }
@endphp

<div class="mb-3">
    {{-- Label --}}
    @if($label)
        <label for="{{ $inputId }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger" aria-label="{{ __('validation.required') }}">*</span>
            @endif
        </label>
    @endif

    {{-- Input Field --}}
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $inputId }}"
        class="{{ $inputClasses }}"
        @if($value !== null) value="{{ $value }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required aria-required="true" @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
        @if($maxlength) maxlength="{{ $maxlength }}" @endif
        @if($pattern) pattern="{{ $pattern }}" @endif
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if($describedBy) aria-describedby="{{ $describedBy }}" @endif
        @if($error) aria-invalid="true" @endif
        {{ $attributes->except(['id', 'class']) }}
    />

    {{-- Help Text --}}
    @if($helpText && !$error)
        <div id="{{ $helpTextId }}" class="form-text">
            {{ $helpText }}
        </div>
    @endif

    {{-- Error Message --}}
    @if($error)
        <div id="{{ $errorId }}" class="invalid-feedback d-block" role="alert">
            <i class="bi bi-exclamation-circle me-1" aria-hidden="true"></i>
            {{ $error }}
        </div>
    @endif
</div>
