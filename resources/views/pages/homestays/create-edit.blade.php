<?php

use App\Data\HomestayData;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public ?Homestay $homestay = null;
    public string $nama = '';
    public string $alamat = '';
    public string $negeri = '';
    public string $model_pengurusan = 'individu';
    public ?int $cooperative_id = null;
    public string $status = 'Aktif';

    public function mount(?Homestay $homestay = null): void
    {
        if ($homestay) {
            $this->homestay = $homestay;
            $this->nama = $homestay->nama;
            $this->alamat = $homestay->alamat ?? '';
            $this->negeri = $homestay->negeri;
            $this->model_pengurusan = $homestay->model_pengurusan;
            $this->cooperative_id = $homestay->cooperative_id;
            $this->status = $homestay->status;
        }
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'negeri' => ['required', 'string', Rule::in(array_keys(config('app.negeri')))],
            'model_pengurusan' => ['required', 'string', Rule::in(['individu', 'koperasi'])],
            'cooperative_id' => 'nullable|required_if:model_pengurusan,koperasi|exists:cooperatives,id',
            'status' => ['required', 'string', Rule::in(['Aktif', 'Tidak Aktif'])],
        ];
    }

    public function with(): array
    {
        return [
            'cooperatives' => Cooperative::pluck('nama', 'id'),
            'negeriOptions' => config('app.negeri'),
        ];
    }

    public function save(HomestayService $homestayService)
    {
        $validatedData = $this->validate();

        $validatedData['cooperative_id'] = $this->model_pengurusan === 'koperasi' ? $this->cooperative_id : null;

        $homestayData = HomestayData::from($validatedData);

        if ($this->homestay) {
            $this->authorize('update', $this->homestay);
            $homestayService->updateHomestay($this->homestay, $homestayData);
            session()->flash('success', __('Homestay berjaya dikemaskini.'));
        } else {
            $this->authorize('create', Homestay::class);
            $homestayService->createHomestay($homestayData);
            session()->flash('success', __('Homestay berjaya dicipta.'));
        }

        return $this->redirect(route('homestays.volt.index'));
    }
};

?>

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
                        @foreach($this->negeriOptions as $code => $name)
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
                            @foreach($this->cooperatives as $id => $name)
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
                <a href="{{ route('homestays.volt.index') }}" class="btn btn-secondary me-2">{{ __('Batal') }}</a>
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
