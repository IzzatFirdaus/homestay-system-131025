<div>
    <x-card>
        <h5 class="card-title">{{ __('Pratonton Import') }} - {{ ucfirst($import->type) }}</h5>
        <p>{{ __('Fail') }}: {{ $import->original_filename }}</p>
        <p>{{ __('Jumlah Baris') }}: {{ $import->total_rows }}</p>

        @if (!empty($validationErrors))
            <div class="alert alert-warning">
                <h6>{{ __('Amaran Pengesahan') }}</h6>
                <ul>
                    @foreach ($validationErrors as $error)
                        <li>{{ __('Baris') }} {{ $error->row }}: {{ $error->message }} ({{ __('Lajur') }}: {{ $error->column }})</li>
                    @endforeach
                </ul>
                <p>{{ __('Sila ambil perhatian tentang ralat ini. Anda masih boleh meneruskan import, tetapi baris yang mempunyai ralat akan dilangkau.') }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        @foreach ($headers as $header)
                            <th>{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            @foreach ($row as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <button wire:click="processImport" class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Sahkan & Proses Import') }}</span>
                <span wire:loading>{{ __('Memproses...') }}</span>
            </button>
            <a href="{{ route('imports.index') }}" class="btn btn-secondary">{{ __('Batal') }}</a>
        </div>
    </x-card>
</div>
