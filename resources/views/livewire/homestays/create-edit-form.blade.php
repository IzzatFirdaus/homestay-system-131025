<div>
    <x-card :title="$homestay ? __('Kemaskini Homestay') : __('Tambah Homestay')">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-md-6">
                    <x-input wire:model="nama" for="nama">{{ __('Nama Homestay') }}</x-input>
                </div>
                <div class="col-md-6">
                    <x-select wire:model="negeri" for="negeri">
                        <option value="">{{ __('Pilih Negeri') }}</option>
                        @foreach($negeriOptions as $code => $name)
                            <option value="{{ $code }}">{{ $name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="mt-3">
                <x-textarea wire:model="alamat" for="alamat">{{ __('Alamat') }}</x-textarea>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <x-select wire:model.live="model_pengurusan" for="model_pengurusan">
                        <option value="individu">{{ __('Individu') }}</option>
                        <option value="koperasi">{{ __('Koperasi') }}</option>
                    </x-select>
                </div>
                @if($model_pengurusan === 'koperasi')
                    <div class="col-md-6">
                        <x-select wire:model="cooperative_id" for="cooperative_id">
                            <option value="">{{ __('Pilih Koperasi') }}</option>
                            @foreach($cooperatives as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                @endif
            </div>

            <div class="mt-3">
                <x-select wire:model="status" for="status">
                    <option value="Aktif">{{ __('Aktif') }}</option>
                    <option value="Tidak Aktif">{{ __('Tidak Aktif') }}</option>
                </x-select>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('homestays.index') }}" class="btn btn-secondary me-2">{{ __('Batal') }}</a>
                <x-primary-button type="submit">
                    <div wire:loading wire:target="save" class="spinner-border spinner-border-sm me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    {{ $homestay ? __('Kemaskini') : __('Simpan') }}
                </x-primary-button>
            </div>
        </form>
    </x-card>
</div>
