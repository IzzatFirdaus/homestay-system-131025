@props(['class' => ''])

<livewire:language-switcher
	:key="'language-switcher-' . app()->getLocale()"
	:extra-class="$class"
	{{ $attributes }}
/>
