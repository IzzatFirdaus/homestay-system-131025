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
                                        <button class="btn btn-sm btn-danger" wire:click="confirmDeleteHomestay({{ $homestay->id }})">{{ __('Padam') }}</button>
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

    <x-modal name="deleteHomestayModal" :show="$showDeleteModal" focusable>
        <h3 class="text-lg font-medium text-gray-900">{{ __('Padam Homestay') }}</h3>
        <p class="mt-2 text-sm text-gray-500">{{ __('Adakah anda pasti ingin memadam homestay ini?') }}</p>

        <x-slot name="footer">
            <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" wire:click="deleteHomestay">{{ __('Padam') }}</button>
            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" x-on:click="$dispatch('close')">{{ __('Batal') }}</button>
        </x-slot>
    </x-modal>
</div>
