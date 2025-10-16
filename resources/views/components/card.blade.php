{{--
    Accessible Card Component

    Props:
    - title: optional card title (string)
    - subtitle: optional card subtitle (string)
    - elevated: boolean (default: false) - Add shadow
    - bordered: boolean (default: true) - Show border
    - headerClass: additional classes for header
    - bodyClass: additional classes for body
    - footerClass: additional classes for footer

    Slots:
    - header: custom header content (overrides title/subtitle)
    - default: card body content
    - footer: card footer content

    Usage:
    <x-card title="Dashboard" subtitle="Overview" elevated>
        <p>Card content here</p>
        <x-slot:footer>
            <x-button>Action</x-button>
        </x-slot:footer>
    </x-card>
--}}

@props([
    'title' => null,
    'subtitle' => null,
    'elevated' => false,
    'bordered' => true,
    'headerClass' => '',
    'bodyClass' => '',
    'footerClass' => '',
])

@php
    $cardClasses = 'card';
    if ($elevated) {
        $cardClasses .= ' shadow-sm';
    }
    if (!$bordered) {
        $cardClasses .= ' border-0';
    }
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    {{-- Custom Header Slot or Title/Subtitle --}}
    @if(isset($header) || $title || $subtitle)
        <div class="card-header {{ $headerClass }}">
            @if(isset($header))
                {{ $header }}
            @else
                @if($title)
                    <h5 class="card-title mb-0">{{ $title }}</h5>
                @endif
                @if($subtitle)
                    <p class="card-subtitle text-muted mt-1 mb-0">{{ $subtitle }}</p>
                @endif
            @endif
        </div>
    @endif

    {{-- Card Body --}}
    <div class="card-body {{ $bodyClass }}">
        {{ $slot }}
    </div>

    {{-- Optional Footer Slot --}}
    @if(isset($footer))
        <div class="card-footer {{ $footerClass }}">
            {{ $footer }}
        </div>
    @endif
</div>
