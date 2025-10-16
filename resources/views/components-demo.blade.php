@extends('layouts.app')

@section('title', 'Component Library - ' . config('app.name'))

@section('content')
<div class="container-fluid px-4 py-4">
    {{-- Page Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-2">Component Library</h1>
            <p class="text-muted">Reusable Bootstrap 5 components with WCAG 2.1 AA compliance</p>
        </div>
    </div>

    {{-- Buttons Section --}}
    <x-card title="Buttons" subtitle="Various button styles and states" elevated class="mb-4">
        <div class="row g-3">
            <div class="col-12">
                <h6 class="text-muted mb-3">Variants</h6>
                <div class="d-flex flex-wrap gap-2">
                    <x-button variant="primary">Primary</x-button>
                    <x-button variant="secondary">Secondary</x-button>
                    <x-button variant="success">Success</x-button>
                    <x-button variant="danger">Danger</x-button>
                    <x-button variant="warning">Warning</x-button>
                    <x-button variant="info">Info</x-button>
                    <x-button variant="light">Light</x-button>
                    <x-button variant="dark">Dark</x-button>
                    <x-button variant="link">Link</x-button>
                </div>
            </div>

            <div class="col-12">
                <h6 class="text-muted mb-3">Outline Variants</h6>
                <div class="d-flex flex-wrap gap-2">
                    <x-button variant="primary" outline>Primary</x-button>
                    <x-button variant="secondary" outline>Secondary</x-button>
                    <x-button variant="success" outline>Success</x-button>
                    <x-button variant="danger" outline>Danger</x-button>
                </div>
            </div>

            <div class="col-12">
                <h6 class="text-muted mb-3">Sizes</h6>
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <x-button size="sm">Small</x-button>
                    <x-button size="md">Medium</x-button>
                    <x-button size="lg">Large</x-button>
                </div>
            </div>

            <div class="col-12">
                <h6 class="text-muted mb-3">With Icons</h6>
                <div class="d-flex flex-wrap gap-2">
                    <x-button icon="bi-plus-circle">Add New</x-button>
                    <x-button variant="success" icon="bi-check-circle">Save</x-button>
                    <x-button variant="danger" icon="bi-trash" iconPosition="end">Delete</x-button>
                    <x-button variant="info" icon="bi-download">Download</x-button>
                </div>
            </div>

            <div class="col-12">
                <h6 class="text-muted mb-3">States</h6>
                <div class="d-flex flex-wrap gap-2">
                    <x-button :loading="true">Loading...</x-button>
                    <x-button :disabled="true">Disabled</x-button>
                </div>
            </div>
        </div>
    </x-card>

    {{-- Cards Section --}}
    <x-card title="Cards" subtitle="Flexible content containers" elevated class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <x-card title="Basic Card">
                    <p class="mb-0">This is a basic card with a title and content.</p>
                </x-card>
            </div>

            <div class="col-md-4">
                <x-card title="With Subtitle" subtitle="Additional context" elevated>
                    <p class="mb-0">This card has both title and subtitle.</p>
                </x-card>
            </div>

            <div class="col-md-4">
                <x-card title="With Footer" elevated>
                    <p class="mb-0">This card includes a footer slot.</p>
                    <x-slot:footer>
                        <x-button size="sm">Action</x-button>
                    </x-slot:footer>
                </x-card>
            </div>
        </div>
    </x-card>

    {{-- Alerts Section --}}
    <x-card title="Alerts" subtitle="Contextual feedback messages" elevated class="mb-4">
        <div class="row g-3">
            <div class="col-12">
                <x-alert type="success" title="Success!" dismissible>
                    Your operation completed successfully.
                </x-alert>
            </div>

            <div class="col-12">
                <x-alert type="danger" title="Error!" dismissible>
                    An error occurred while processing your request.
                </x-alert>
            </div>

            <div class="col-12">
                <x-alert type="warning" title="Warning!" dismissible>
                    Please review your input before proceeding.
                </x-alert>
            </div>

            <div class="col-12">
                <x-alert type="info">
                    This is an informational message without a title.
                </x-alert>
            </div>
        </div>
    </x-card>

    {{-- Form Inputs Section --}}
    <x-card title="Form Inputs" subtitle="Accessible form controls with validation" elevated class="mb-4">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <x-form-input
                        name="name"
                        label="Full Name"
                        placeholder="Enter your full name"
                        required
                    />
                </div>

                <div class="col-md-6">
                    <x-form-input
                        name="email"
                        label="Email Address"
                        type="email"
                        placeholder="user@example.com"
                        helpText="We'll never share your email."
                        required
                    />
                </div>

                <div class="col-md-6">
                    <x-form-input
                        name="password"
                        label="Password"
                        type="password"
                        placeholder="Enter password"
                        required
                        error="Password must be at least 8 characters"
                    />
                </div>

                <div class="col-md-6">
                    <x-form-input
                        name="phone"
                        label="Phone Number"
                        type="tel"
                        placeholder="+60123456789"
                        helpText="Include country code"
                    />
                </div>

                <div class="col-12">
                    <x-button type="submit" variant="primary">Submit Form</x-button>
                    <x-button type="reset" variant="secondary" outline>Reset</x-button>
                </div>
            </div>
        </form>
    </x-card>

    {{-- Data Table Section --}}
    <x-card title="Data Tables" subtitle="Responsive data presentation" elevated class="mb-4">
        @php
            $columns = [
                ['key' => 'name', 'label' => 'Name', 'sortable' => true],
                ['key' => 'email', 'label' => 'Email', 'sortable' => true],
                ['key' => 'role', 'label' => 'Role'],
                ['key' => 'status', 'label' => 'Status'],
            ];

            $rows = [
                ['name' => 'Ahmad bin Abdullah', 'email' => 'ahmad@motac.gov.my', 'role' => 'Admin', 'status' => 'Aktif'],
                ['name' => 'Siti Nurhaliza', 'email' => 'siti@motac.gov.my', 'role' => 'Pegawai Negeri', 'status' => 'Aktif'],
                ['name' => 'Lim Wei Jian', 'email' => 'lim@motac.gov.my', 'role' => 'Pemerhati', 'status' => 'Aktif'],
            ];
        @endphp

        <x-data-table :columns="$columns" :rows="$rows" striped hover sortable>
            <x-slot:actions="{ $row }">
                <div class="btn-group btn-group-sm">
                    <x-button size="sm" variant="primary" icon="bi-eye" title="View"></x-button>
                    <x-button size="sm" variant="secondary" icon="bi-pencil" title="Edit"></x-button>
                    <x-button size="sm" variant="danger" icon="bi-trash" title="Delete"></x-button>
                </div>
            </x-slot:actions>
        </x-data-table>
    </x-card>

    {{-- Modal Section --}}
    <x-card title="Modals" subtitle="Dialog windows for user interactions" elevated class="mb-4">
        <div class="d-flex flex-wrap gap-2">
            <x-button data-bs-toggle="modal" data-bs-target="#basicModal">Basic Modal</x-button>
            <x-button variant="danger" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirm Dialog</x-button>
            <x-button variant="success" data-bs-toggle="modal" data-bs-target="#largeModal">Large Modal</x-button>
        </div>
    </x-card>

    {{-- Toast Demo --}}
    <x-card title="Toast Notifications" subtitle="Lightweight notification messages" elevated class="mb-4">
        <p class="mb-3">Click buttons to trigger toast notifications:</p>
        <div class="d-flex flex-wrap gap-2">
            <x-button
                variant="success"
                @click="window.dispatchEvent(new CustomEvent('toast', { detail: { message: 'Success! Operation completed.', type: 'success' }}))"
            >
                Success Toast
            </x-button>
            <x-button
                variant="danger"
                @click="window.dispatchEvent(new CustomEvent('toast', { detail: { message: 'Error! Something went wrong.', type: 'error' }}))"
            >
                Error Toast
            </x-button>
            <x-button
                variant="warning"
                @click="window.dispatchEvent(new CustomEvent('toast', { detail: { message: 'Warning! Please be careful.', type: 'warning' }}))"
            >
                Warning Toast
            </x-button>
            <x-button
                variant="info"
                @click="window.dispatchEvent(new CustomEvent('toast', { detail: { message: 'Info: Here is some information.', type: 'info' }}))"
            >
                Info Toast
            </x-button>
        </div>
    </x-card>
</div>

{{-- Modal Definitions --}}
<x-modal id="basicModal" title="Basic Modal" size="md" centered>
    <p>This is a basic modal dialog with a title and close button.</p>
    <p class="mb-0">You can include any content here.</p>
    <x-slot:footer>
        <x-button variant="secondary" data-bs-dismiss="modal">Close</x-button>
        <x-button variant="primary">Save Changes</x-button>
    </x-slot:footer>
</x-modal>

<x-modal id="confirmModal" title="Confirm Delete" size="sm" centered static>
    <p class="mb-0">Are you sure you want to delete this item? This action cannot be undone.</p>
    <x-slot:footer>
        <x-button variant="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button variant="danger">Delete</x-button>
    </x-slot:footer>
</x-modal>

<x-modal id="largeModal" title="Large Modal" size="lg">
    <p>This is a large modal with more content space.</p>
    <p>You can use this for forms, detailed information, or complex interactions.</p>
    <div class="alert alert-info mb-0">
        <strong>Tip:</strong> Modals support sm, md, lg, and xl sizes.
    </div>
    <x-slot:footer>
        <x-button variant="secondary" data-bs-dismiss="modal">Close</x-button>
    </x-slot:footer>
</x-modal>

{{-- Toast Component (Global) --}}
<x-toast />
@endsection
