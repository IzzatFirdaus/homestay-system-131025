<div class="card" wire:key="import-data-form">
    <div class="card-header bg-white">
        <h5 class="card-title mb-0" id="import-form-title">{{ __('import.title') }}</h5>
        <small class="text-muted d-block mt-1">{{ __('import.subtitle') }}</small>
    </div>

    <div class="card-body">
        {{-- Accessibility: Live region for screen reader announcements
             WCAG Pattern: Use aria-live="polite" for non-urgent updates
             - Polite: Allows screen reader to finish current sentence before announcing
             - Atomic: Announces entire region content, not just changes
             - Hidden: Invisible to sighted users (aria announcements only)
        --}}
        <div
            id="import-status"
            aria-live="polite"
            aria-atomic="true"
            class="visually-hidden"
            role="status"
        >
            @if ($showSuccess)
                {{ __('common.messages.success') }}: {{ $successMessage }}
            @elseif ($showError)
                {{ __('common.messages.error') }}: {{ $errorMessage }}
            @elseif ($isUploading)
                {{ __('imports.messages.uploading') }}
            @endif
        </div>

        {{-- Success Alert: Visible notification with role="alert" for sighted users --}}
        @if ($showSuccess)
            <x-alert
                type="success"
                dismissible
                title="{{ __('common.messages.success') }}"
                icon="bi-check-circle-fill"
                wire:click="dismissSuccess"
                role="alert"
            >
                {{ $successMessage }}
            </x-alert>
        @endif

        {{-- Error Alert: Visible notification with role="alert" for sighted users --}}
        @if ($showError)
            <x-alert
                type="danger"
                dismissible
                title="{{ __('common.messages.error') }}"
                icon="bi-x-circle-fill"
                wire:click="dismissError"
                role="alert"
            >
                {{ $errorMessage }}
            </x-alert>
        @endif

        <form
            wire:submit="submitForm"
            id="import-form"
            class="needs-validation"
            novalidate
            aria-describedby="import-form-title"
        >
            <div class="row">
                {{-- Import Type Select
                     WCAG Pattern: Accessible select with aria attributes
                     - aria-required: Indicates field is mandatory
                     - aria-describedby: Links to help text and error message
                     - wire:change: Trigger validation on change for immediate feedback
                     - is-invalid: Bootstrap class for invalid state styling
                --}}
                <div class="col-12 col-md-6 mb-3">
                    <label for="import-type" class="form-label">
                        {{ __('import.labels.type') }}
                        <span class="text-danger" aria-label="{{ __('validation.required') }}">*</span>
                    </label>
                    <select
                        id="import-type"
                        class="form-select @error('importType') is-invalid @enderror"
                        wire:model="importType"
                        wire:change="$validate('importType')"
                        required
                        aria-required="true"
                        @error('importType') aria-invalid="true" @enderror
                        aria-describedby="import-type-help @error('importType') import-type-error @enderror"
                    >
                        <option value="">{{ __('common.please_select') }}</option>
                        <option value="homestay">{{ __('import.types.homestay') }}</option>
                        <option value="performance">{{ __('import.types.performance') }}</option>
                    </select>
                    <div id="import-type-help" class="form-text">
                        {{ __('import.help.type') }}
                    </div>
                    @error('importType')
                        <div id="import-type-error" class="invalid-feedback d-block" role="alert">
                            <i class="bi bi-exclamation-circle me-1" aria-hidden="true"></i>{{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- File Upload Input
                     WCAG Pattern: File inputs with proper labeling and error linking
                     - aria-required: Indicates field is mandatory
                     - aria-describedby: Links to help text AND error message
                     - accept: Constrains file selection (UX enhancement, not security)
                     - @error: Shows validation error with role="alert" semantics
                --}}
                <div class="col-12 col-md-6 mb-3">
                    <label for="file-upload" class="form-label">
                        {{ __('import.labels.file') }}
                        <span class="text-danger" aria-label="{{ __('validation.required') }}">*</span>
                    </label>
                    <input
                        id="file-upload"
                        type="file"
                        class="form-control @error('file') is-invalid @enderror"
                        wire:model="file"
                        accept=".xlsx,.xls,.csv"
                        required
                        aria-required="true"
                        @error('file') aria-invalid="true" @enderror
                        aria-describedby="file-help @error('file') file-error @enderror"
                    />
                    <div id="file-help" class="form-text">
                        {{ __('import.help.file') }}
                    </div>
                    @error('file')
                        <div id="file-error" class="invalid-feedback d-block" role="alert">
                            <i class="bi bi-exclamation-circle me-1" aria-hidden="true"></i>{{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- Progress Bar (hidden until uploading)
                 WCAG Pattern: Progress indicator with aria-label and aria-valuetext
                 - role="progressbar": Semantic role for progress feedback
                 - aria-valuenow: Current progress percentage (0-100)
                 - aria-valuemin/max: Define range boundaries
                 - aria-label: Descriptive label for screen readers
            --}}
            @if ($isUploading)
                <div class="mb-3">
                    <label for="upload-progress" class="form-label">{{ __('import.labels.progress') }}</label>
                    <div
                        id="upload-progress"
                        class="progress"
                        role="progressbar"
                        aria-valuenow="{{ intval($uploadProgress) }}"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        aria-label="{{ __('import.labels.progress') }} {{ intval($uploadProgress) }}%"
                    >
                        <div
                            class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                            style="width: {{ $uploadProgress }}%"
                            aria-hidden="true"
                        ></div>
                    </div>
                    <small class="text-muted d-block mt-1">
                        {{ __('import.messages.uploading') }} ({{ intval($uploadProgress) }}%)
                    </small>
                </div>
            @endif

            {{-- Form Actions --}}
            <div class="d-flex gap-2 mt-4">
                <button
                    type="submit"
                    class="btn btn-primary"
                    wire:loading.attr="disabled"
                    :disabled="isUploading"
                    aria-busy="{{ $isUploading ? 'true' : 'false' }}"
                >
                    <span wire:loading.remove>
                        <i class="bi bi-cloud-upload me-2" aria-hidden="true"></i>{{ __('import.buttons.upload') }}
                    </span>
                    <span wire:loading class="d-inline-flex gap-1 align-items-center">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        {{ __('common.general.processing') }}
                    </span>
                </button>

                <button
                    type="button"
                    class="btn btn-secondary"
                    wire:click="resetForm"
                    wire:loading.attr="disabled"
                    :disabled="isUploading"
                >
                    <i class="bi bi-arrow-counterclockwise me-2" aria-hidden="true"></i>{{ __('common.buttons.reset') }}
                </button>
            </div>
        </form>
    </div>

    {{-- Footer with file format and size information
         WCAG Pattern: Informational text with icon (aria-hidden)
         - aria-hidden="true": Icon is decorative, not content
         - Small font for supplementary info
    --}}
    <div class="card-footer bg-light">
        <small class="text-muted d-block">
            <i class="bi bi-info-circle me-1" aria-hidden="true"></i>
            <strong>{{ __('import.info.formats') }}:</strong> XLSX, XLS, CSV &bull;
            <strong>{{ __('import.info.max_size') }}:</strong> 50 MB
        </small>
    </div>
</div>
