<form wire:submit.prevent="upload">
    <x-card>
        <div class="mb-3">
            <label for="importType" class="form-label">{{ __('Jenis Import') }}</label>
            <select id="importType" class="form-select" wire:model="importType">
                <option value="">-- {{ __('Pilih Jenis Import') }} --</option>
                <option value="homestay">{{ __('Data Homestay') }}</option>
                <option value="performance">{{ __('Data Prestasi') }}</option>
            </select>
            @error('importType') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">{{ __('Pilih Fail (XLSX/CSV)') }}</label>
            <input type="file" id="file" class="form-control" wire:model="file">
            @error('file') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div wire:loading wire:target="file">
            {{ __('Memuat naik...') }}
        </div>

        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
            {{ __('Muat Naik & Proses') }}
        </button>
    </x-card>
</form>
