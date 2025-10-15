<?php

declare(strict_types=1);

namespace App\Livewire\Homestays;

use App\Data\HomestayData;
use App\Models\Cooperative;
use App\Models\Homestay;
use App\Services\HomestayService;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateEditForm extends Component
{
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
            $this->cooperative_id = is_numeric($homestay->cooperative_id) ? (int) $homestay->cooperative_id : null;
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

        return $this->redirect(route('homestays.index'));
    }

    public function render()
    {
        return view('livewire.homestays.create-edit-form', [
            'cooperatives' => Cooperative::pluck('nama', 'id'),
            'negeriOptions' => config('app.negeri'),
        ]);
    }
}
