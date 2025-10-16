<div class="card h-100" role="group" aria-label="{{ $title }}">
    <div class="card-body d-flex align-items-center">
        @if($icon)
            <div class="me-3">
                <i class="bi {{ $icon }} fs-3" aria-hidden="true"></i>
            </div>
        @endif

        <div class="flex-grow-1">
            <div class="small text-muted">{{ $title }}</div>
            <div class="d-flex align-items-baseline">
                <div class="h4 mb-0 me-2">{{ $value }}</div>
                @if($unit)
                    <div class="small text-muted">{{ $unit }}</div>
                @endif
            </div>
            @if($trend)
                <div class="small mt-1">
                    <span class="text-{{ $status === 'good' ? 'success' : ($status === 'warn' ? 'warning' : ($status === 'bad' ? 'danger' : 'muted')) }}">{{ $trend }}</span>
                </div>
            @endif
        </div>
    </div>
</div>
