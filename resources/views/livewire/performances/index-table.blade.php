<div>
    <x-card>
        <div class="row mb-3">
            <div class="col-md-6">
                <x-select for="tahun" wire:model.live="tahun">
                    <x-slot name="options">
                        @foreach($tahuns as $t)
                            <option value="{{ $t }}">{{ $t }}</option>
                        @endforeach
                    </x-slot>
                    {{ __('Tahun') }}
                </x-select>
            </div>
            <div class="col-md-6">
                <x-select for="bulan" wire:model.live="bulan">
                    <x-slot name="options">
                        <option value="">-- {{ __('Semua Bulan') }} --</option>
                        @foreach($bulans as $key => $b)
                            <option value="{{ $key }}">{{ $b }}</option>
                        @endforeach
                    </x-slot>
                    {{ __('Bulan') }}
                </x-select>
            </div>
        </div>

        <div wire:loading class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div wire:loading.remove>
            @if($performances->isEmpty())
                <x-empty-state>{{ __('Tiada data prestasi ditemui.') }}</x-empty-state>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Bulan') }}</th>
                            <th>{{ __('Tahun') }}</th>
                            <th>{{ __('Pelawat Domestik') }}</th>
                            <th>{{ __('Pelawat Asing') }}</th>
                            <th>{{ __('Pendapatan (RM)') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($performances as $performance)
                            <tr>
                                <td>{{ $bulans[$performance->bulan] }}</td>
                                <td>{{ $performance->tahun }}</td>
                                <td>{{ $performance->pelawat_domestik }}</td>
                                <td>{{ $performance->pelawat_asing }}</td>
                                <td>{{ number_format($performance->pendapatan, 2) }}</td>
                                <td>
                                    @can('update', $performance)
                                        <a href="{{ route('homestays.performances.edit', [$homestay, $performance]) }}" class="btn btn-sm btn-primary">{{ __('Kemaskini') }}</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $performances->links() }}
            @endif
        </div>
    </x-card>
</div>
