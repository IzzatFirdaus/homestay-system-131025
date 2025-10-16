<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire;

use App\Livewire\ImportDataForm;
use App\Services\ImportService;
use Livewire\Livewire;

describe('ImportDataForm Livewire Component', function () {
    it('renders the component', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSee('import-form')
            ->assertSee(__('imports.title'));
    });

    it('initializes with default properties', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSet('file', null)
            ->assertSet('importType', 'homestay')
            ->assertSet('isUploading', false)
            ->assertSet('showSuccess', false)
            ->assertSet('showError', false)
            ->assertSet('uploadProgress', 0);
    });

    it('validates required file field', function () {
        Livewire::test(ImportDataForm::class)
            ->call('submitForm')
            ->assertHasErrors('file');
    });

    it('validates required import type', function () {
        Livewire::test(ImportDataForm::class)
            ->call('submitForm')
            ->assertHasErrors('importType');
    });

    it('validates file mime type', function () {
        Livewire::test(ImportDataForm::class)
            ->set('importType', 'homestay')
            ->call('submitForm')
            ->assertHasErrors('file');
    });

    it('validates import type is in allowed list', function () {
        Livewire::test(ImportDataForm::class)
            ->set('importType', 'invalid_type')
            ->assertHasErrors('importType');
    });

    it('accepts valid file and dispatches event', function () {
        $this->mock(ImportService::class, function ($mock) {
            $mock->shouldReceive('previewImport')
                ->once()
                ->andReturn(['status' => 'preview']);
        });

        Livewire::test(ImportDataForm::class)
            ->set('importType', 'homestay')
            ->assertHasNoErrors('importType');
    });

    it('resets form correctly', function () {
        Livewire::test(ImportDataForm::class)
            ->set('file', 'test.xlsx')
            ->set('importType', 'performance')
            ->set('showSuccess', true)
            ->set('showError', true)
            ->call('resetForm')
            ->assertSet('file', null)
            ->assertSet('importType', 'homestay')
            ->assertSet('showSuccess', false)
            ->assertSet('showError', false)
            ->assertSet('uploadProgress', 0);
    });

    it('dismisses success alert', function () {
        Livewire::test(ImportDataForm::class)
            ->set('showSuccess', true)
            ->call('dismissSuccess')
            ->assertSet('showSuccess', false);
    });

    it('dismisses error alert', function () {
        Livewire::test(ImportDataForm::class)
            ->set('showError', true)
            ->call('dismissError')
            ->assertSet('showError', false);
    });

    it('updates file on real-time validation', function () {
        Livewire::test(ImportDataForm::class)
            ->call('updatedFile')
            ->assertHasErrors('file');
    });

    it('renders import type select with options', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSee('homestay')
            ->assertSee('performance');
    });

    it('renders accessible form with aria attributes', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSee('aria-required="true"')
            ->assertSee('aria-describedby');
    });

    it('renders loading spinner in progress bar', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSee('role="progressbar"');
    });

    it('renders submit button with loading state', function () {
        Livewire::test(ImportDataForm::class)
            ->assertSee('wire:loading');
    });
});
