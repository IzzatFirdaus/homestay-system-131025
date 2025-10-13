<?php

declare(strict_types=1);

namespace App\Services;

use App\Data\HomestayData;
use App\Data\HomestayFilter;
use App\Exceptions\BusinessRuleException;
use App\Exceptions\ValidationException;
use App\Models\Homestay;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Encapsulates homestay domain operations and business rules.
 */
final class HomestayService
{
    private const ALLOWED_STATUS = ['Aktif', 'Tidak Aktif'];

    private const ALLOWED_MODELS = ['koperasi', 'individu'];

    public function __construct(
        private readonly DatabaseManager $database,
        private readonly Homestay $homestayModel,
    ) {}

    /**
     * Create a new homestay record.
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     */
    public function createHomestay(HomestayData $data): Homestay
    {
        $this->validateData($data);

        return $this->database->transaction(function () use ($data): Homestay {
            $this->assertUniqueActive($data);

            $homestay = $this->homestayModel->newInstance($this->mapToAttributes($data));
            $homestay->save();

            return $homestay->refresh();
        });
    }

    /**
     * Update an existing homestay record.
     *
     * @throws ValidationException
     * @throws BusinessRuleException
     */
    public function updateHomestay(Homestay $homestay, HomestayData $data): Homestay
    {
        $this->validateData($data);

        return $this->database->transaction(function () use ($homestay, $data): Homestay {
            $this->assertUniqueActive($data, $homestay->id);

            $homestay->fill($this->mapToAttributes($data));
            $homestay->save();

            return $homestay->refresh();
        });
    }

    /**
     * Soft delete a homestay and cascade any domain side effects.
     */
    public function deleteHomestay(Homestay $homestay): void
    {
        $this->database->transaction(static function () use ($homestay): void {
            $homestay->delete();
        });
    }

    /**
     * Retrieve homestays matching provided filters.
     *
     * @return Collection<int, Homestay>
     */
    public function getHomestaysByFilter(HomestayFilter $filter): Collection
    {
        $query = $this->homestayModel->newQuery();

        if ($filter->negeri !== null) {
            $query->where('negeri', $filter->negeri);
        }

        if ($filter->status !== null) {
            $query->where('status', $filter->status);
        }

        if ($filter->cooperativeId !== null) {
            $query->where('id_koperasi', $filter->cooperativeId);
        }

        if ($filter->clusterId !== null) {
            $query->where('cluster_id', $filter->clusterId);
        }

        if ($filter->modelPengurusan !== null) {
            $query->where('model_pengurusan', $filter->modelPengurusan);
        }

        if ($filter->searchTerm !== null) {
            $term = '%'.Str::lower($filter->searchTerm).'%';
            $query->where(function ($query) use ($term): void {
                $query->whereRaw('LOWER(nama) like ?', [$term])
                    ->orWhereRaw('LOWER(negeri) like ?', [$term]);
            });
        }

        /** @var EloquentCollection<int, Homestay> $result */
        $result = $query->orderBy('nama')->get();

        return $result->toBase();
    }

    /**
     * Ensure incoming data meets domain constraints.
     */
    private function validateData(HomestayData $data): void
    {
        if ($data->kapasiti < 0) {
            throw new ValidationException('Kapasiti tidak boleh kurang daripada sifar.', ['kapasiti' => $data->kapasiti]);
        }

        if (! in_array($data->status, self::ALLOWED_STATUS, true)) {
            throw new ValidationException('Status homestay tidak sah.', ['status' => $data->status]);
        }

        if (! in_array($data->modelPengurusan, self::ALLOWED_MODELS, true)) {
            throw new ValidationException('Model pengurusan tidak sah.', ['model_pengurusan' => $data->modelPengurusan]);
        }
    }

    /**
     * Guard against multiple active homestays per name/negeri combination.
     */
    private function assertUniqueActive(HomestayData $data, ?int $ignoreId = null): void
    {
        if ($data->status !== 'Aktif') {
            return;
        }

        $query = $this->homestayModel->newQuery()
            ->where('nama', $data->nama)
            ->where('negeri', $data->negeri)
            ->where('status', 'Aktif');

        if ($ignoreId !== null) {
            $query->whereKeyNot($ignoreId);
        }

        if ($query->exists()) {
            throw new BusinessRuleException('Hanya satu homestay aktif dibenarkan bagi kombinasi nama dan negeri yang sama.');
        }
    }

    /**
     * Map DTO fields to database attributes.
     *
     * @return array<string, mixed>
     */
    private function mapToAttributes(HomestayData $data): array
    {
        return [
            'nama' => $data->nama,
            'negeri' => $data->negeri,
            'alamat' => $data->alamat,
            'kapasiti' => $data->kapasiti,
            'fasiliti' => $data->fasiliti,
            'model_pengurusan' => $data->modelPengurusan,
            'id_koperasi' => $data->cooperativeId,
            'status' => $data->status,
            'cluster_id' => $data->clusterId,
        ];
    }
}
