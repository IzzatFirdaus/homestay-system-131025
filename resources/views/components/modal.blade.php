{{--
    Accessible Bootstrap Modal Component

    Props:
    - id: unique modal identifier (required)
    - title: modal title (optional)
    - size: 'sm', 'md', 'lg', 'xl' (default: 'md')
    - centered: boolean (default: false) - Vertically center modal
    - scrollable: boolean (default: false) - Scrollable modal body
    - static: boolean (default: false) - Static backdrop (prevent dismiss on click outside)
    - closeButton: boolean (default: true) - Show close button in header

    Slots:
    - header: custom header content (overrides title)
    - default: modal body content
    - footer: modal footer content

    Usage:
    <x-modal id="deleteModal" title="Confirm Delete" size="sm" centered>
        <p>Are you sure you want to delete this item?</p>
        <x-slot:footer>
            <x-button variant="secondary" data-bs-dismiss="modal">Cancel</x-button>
            <x-button variant="danger">Delete</x-button>
        </x-slot:footer>
    </x-modal>

    Trigger:
    <button data-bs-toggle="modal" data-bs-target="#deleteModal">Open Modal</button>
--}}

@props([
    'id' => null,
    'title' => null,
    'size' => 'md',
    'centered' => false,
    'scrollable' => false,
    'static' => false,
    'closeButton' => true,
])

@php
    if (!$id) {
        throw new \Exception('Modal component requires an "id" prop');
    }

    $modalDialogClasses = 'modal-dialog';

    if ($size !== 'md') {
        $modalDialogClasses .= " modal-{$size}";
    }

    if ($centered) {
        $modalDialogClasses .= ' modal-dialog-centered';
    }

    if ($scrollable) {
        $modalDialogClasses .= ' modal-dialog-scrollable';
    }
@endphp

<div
    class="modal fade"
    id="{{ $id }}"
    tabindex="-1"
    aria-labelledby="{{ $id }}Label"
    aria-hidden="true"
    @if($static) data-bs-backdrop="static" data-bs-keyboard="false" @endif
    {{ $attributes }}
>
    <div class="{{ $modalDialogClasses }}">
        <div class="modal-content">
            {{-- Modal Header --}}
            @if(isset($header) || $title || $closeButton)
                <div class="modal-header">
                    @if(isset($header))
                        {{ $header }}
                    @else
                        @if($title)
                            <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                        @endif
                    @endif

                    @if($closeButton)
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="{{ __('common.general.close') }}"
                        ></button>
                    @endif
                </div>
            @endif

            {{-- Modal Body --}}
            <div class="modal-body">
                {{ $slot }}
            </div>

            {{-- Modal Footer (Optional) --}}
            @if(isset($footer))
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>

