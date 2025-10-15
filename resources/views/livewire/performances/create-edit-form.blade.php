<form wire:submit.prevent="save">
    <x-card>
        <div class="row">
            <div class="col-md-6">
                <x-select for="bulan" wire:model.live="bulan">
                    <x-slot name="options">
                        <option value="">-- {{ __('Pilih Bulan') }} --</option>
                        @foreach($bulans as $key => $b)
                            <option value="{{ $key }}">{{ $b }}</option>
                        @endforeach
                    </x-slot>
                    {{ __('Bulan') }}
                </x-select>
            </div>
            <div class="col-md-6">
                <x-select for="tahun" wire:model.live="tahun">
                    <x-slot name="options">
                        <option value="">-- {{ __('Pilih Tahun') }} --</option>
                        @foreach($tahuns as $t)
                            <option value="{{ $t }}">{{ $t }}</option>
                        @endforeach
                    </x-slot>
                    {{ __('Tahun') }}
                </x-select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-input type="number" for="pelawat_domestik" wire:model.live="pelawat_domestik">{{ __('Pelawat Domestik') }}</x-input>
            </div>
            <div class="col-md-6">
                <x-input type="number" for="pelawat_asing" wire:model.live="pelawat_asing">{{ __('Pelawat Asing') }}</x-input>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <x-input type="number" for="jumlah_bilik" wire:model.live="jumlah_bilik">{{ __('Jumlah Bilik') }}</x-input>
            </div>
            <div class="col-md-4">
                <x-input type="number" for="jumlah_bilik_diduduki" wire:model.live="jumlah_bilik_diduduki">{{ __('Bilik Diduduki') }}</x-input>
            </div>
            <div class="col-md-4">
                <x-input type="number" for="jumlah_hari_beroperasi" wire:model.live="jumlah_hari_beroperasi">{{ __('Hari Beroperasi') }}</x-input>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-input type="number" step="0.01" for="pendapatan" wire:model.live="pendapatan">{{ __('Pendapatan (RM)') }}</x-input>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
            <a href="{{ route('homestays.show', $homestay) }}" class="btn btn-secondary">{{ __('Batal') }}</a>
        </div>
    </x-card>
</form>
