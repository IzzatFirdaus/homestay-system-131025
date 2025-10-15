<div>
    <x-card>
        <div class="row mb-3">
            <div class="col-md-3">
                <x-input type="text" for="search" wire:model.live.debounce.300ms="search" placeholder="{{ __('Cari Nama Homestay') }}">
                    {{ __('Carian') }}
                </x-input>
            </div>
            <div class="col-md-3">
                <x-select for="negeri" wire:model.live="negeri">
                    <x-slot name="options">
                        <option value="">-- {{ __('Semua Negeri') }} --</option>
                        @foreach($negeris as $n)
                            <option value="{{ $n->id }}">{{ $n->name }}</option>
                        @endforeach
                    </x-slot>
                    {{ __('Negeri') }}
                </x-select>
            </div>
            <div class="col-md-3">
                <x-select for="status" wire:model.live="status">
                    <x-slot name="options">
                        <option value="">-- {{ __('Semua Status') }} --</option>
                        <option value="active">{{ __('Aktif') }}</option>
                        <option value="inactive">{{ __('Tidak Aktif') }}</option>
                    </x-slot>
                    {{ __('Status') }}
                </x-select>
            </div>
            <div class="col-md-3">
                <x-select for="model_pengurusan" wire:model.live="model_pengurusan">
                    <x-slot name="options">
                        <option value="">-- {{ __('Semua Model') }} --</option>
                        <option value="individu">{{ __('Individu') }}</option>
                        <option value="koperasi">{{ __('Koperasi') }}</option>
                    </x-slot>
                    {{ __('Model Pengurusan') }}
                </x-select>
            </div>
        </div>

        <div wire:loading class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">{{ __('common.general.loading') }}</span>
            </div>
        </div>

        <div wire:loading.remove>
            @if($homestays->isEmpty())
                <x-empty-state>{{ __('Tiada data homestay ditemui.') }}</x-empty-state>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Nama') }}</th>
                            <th>{{ __('Negeri') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Model Pengurusan') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($homestays as $homestay)
                            <tr>
                                <td>{{ $homestay->nama }}</td>
                                <td>{{ $homestay->negeri->name }}</td>
                                <td>{{ $homestay->status }}</td>
                                <td>{{ $homestay->model_pengurusan }}</td>
                                <td>
                                    @can('view', $homestay)
                                        <a href="{{ route('homestays.show', $homestay) }}" class="btn btn-sm btn-info">{{ __('Lihat') }}</a>
                                    @endcan
                                    @can('update', $homestay)
                                        <a href="{{ route('homestays.edit', $homestay) }}" class="btn btn-sm btn-primary">{{ __('Kemaskini') }}</a>
                                    @endcan
                                    @can('delete', $homestay)
                                        <button class="btn btn-sm btn-danger" wire:click="$dispatch('show-delete-modal', { id: {{ $homestay->id }} })">{{ __('Padam') }}</button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $homestays->links() }}
            @endif
        </div>
    </x-card>

    <x-modal id="deleteHomestayModal" title="{{ __('Padam Homestay') }}">
        {{ __('Adakah anda pasti ingin memadam homestay ini?') }}
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Batal') }}</button>
            <button type="button" class="btn btn-danger" wire:click="deleteHomestay">{{ __('Padam') }}</button>
        </x-slot>
    </x-modal>
</div>
