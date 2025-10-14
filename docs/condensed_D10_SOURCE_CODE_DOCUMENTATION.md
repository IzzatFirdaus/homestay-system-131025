# Ringkasan Dokumentasi Kod Sumber

**Sistem:** Sistem Pengurusan & Analitik Homestay Malaysia  
**Pemilik:** MOTAC, Tourism Malaysia  
**Versi:** 1.0  
**Tarikh:** 14 Oktober 2025

---

## 1. Tujuan & Skop

Dokumen ini memberi panduan ringkas struktur, organisasi, dan amalan utama dokumentasi kod sumber sistem Homestay Malaysia. Ia membantu pembangun, pentadbir, dan auditor menyelenggara serta menambah baik kod secara konsisten, patuh piawaian MOTAC.

---

## 2. Struktur Repositori

```text
homestay-system/
├── app/                # Kod aplikasi (Model, Controller, Service, Policy)
├── database/           # Migrasi, seeder, factory
├── resources/          # Blade, Livewire, lang
├── routes/             # Definisi laluan web/api
├── tests/              # Ujian unit/feature
├── config/             # Konfigurasi Laravel
└── public/             # Aset boleh diakses umum
```

---

## 3. Piawaian Penamaan & Gaya Kod

- **Model**: PascalCase, singular (cth: `Homestay.php`)
- **Controller**: PascalCase + Controller (cth: `HomestayController.php`)
- **Service**: PascalCase + Service (cth: `ImportService.php`)
- **Migration**: snake_case + tarikh (cth: `2025_10_11_create_homestays_table.php`)
- **Seeder/Factory/Test**: PascalCase, jelas

- **Gaya Kod**: PSR-12, 4 ruang, docblock untuk kelas & fungsi utama, komentar ringkas pada logik kompleks.

---

## 4. Dokumentasi Kelas & Fungsi

Setiap kelas dan fungsi penting WAJIB ada docblock.

```php
/**
 * Model untuk entiti Homestay.
 * @property int $id
 * @property string $nama
 * @property string $negeri
 * @property int $kapasiti
 */
class Homestay extends Model {...}
```

---

## 5. Dokumentasi Laluan

Semua laluan Wajib bernama & gunakan grouping konsisten:

```php
Route::middleware(['auth'])->group(function () {
    Route::get('/homestay', [HomestayController::class, 'index'])->name('homestay.index');
    // ...
});
```

---

## 6. Model & Hubungan Eloquent

```php
class Homestay extends Model {
    public function koperasi() { return $this->belongsTo(Cooperative::class, 'id_koperasi'); }
    public function performances() { return $this->hasMany(Performance::class); }
}
```

---

## 7. Dokumentasi Proses Import

- Modul import (cth: `HomestayImportService`) mesti ada docblock input, proses, hasil.
- Nyatakan format fail diterima (Excel/CSV), medan wajib, serta cara pengendalian ralat.

---

## 8. Seeders & Factories

- Setiap seeder/factory: jelas tujuan, variasi data, dan contoh.
- Data dummy mesti realistik (negeri, kapasiti, status).

---

## 9. Ujian (Testing)

- Ujian unit/feature dalam `/tests/`, nama fail jelas (`HomestayTest.php`).
- Setiap fungsi ujian didokumenkan tujuan & jangkaan hasil.

---

## 10. Dokumentasi Frontend (Blade & Livewire)

- Fail Blade perlu ada komen ringkas di bahagian atas (tujuan view).
- Guna komponen/partials untuk kod berulang dan dokumenkan.

---

## 11. Amalan Dokumentasi Lain

- Semua konfigurasi khas dalam `.env.example` WAJIB ada komen.
- README projek: arahan pemasangan, penggunaan, nota pembangunan.
- Semua modul utama (Service, Import, Report) wajib dokumen fungsi utama, parameter, dan contoh penggunaan.

---

## 12. Contoh Docblock Service

```php
/**
 * Service untuk import data Homestay dari Excel.
 * @param UploadedFile $file Fail Excel
 * @param int $userId ID pengguna import
 * @return array{success: bool, message: string, imported_count: int, errors: array}
 */
public function importHomestaysFromExcel(UploadedFile $file, int $userId): array {...}
```

---

## 13. Rujukan Standard

- **PSR-12**: <https://www.php-fig.org/psr/psr-12/>
- **Laravel Docs**: <https://laravel.com/docs>
- **Livewire**: <https://livewire.laravel.com/docs>

---

## Akhir Ringkasan Dokumentasi Kod Sumber**
