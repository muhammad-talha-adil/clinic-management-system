@props([
    'src' => null,        // file name or full URL
    'alt' => '',
    'title' => null,
    'link' => null,
    'target' => '_self',
    'loading' => 'lazy',
    'width' => null,
    'height' => null,
    'class' => '',
    'folder' => 'images', // default folder for local images
])

@php
    $isFullUrl = false;

    if ($src) {
        foreach (['http://', 'https://', '/storage', '/'] as $prefix) {
            if (str_starts_with($src, $prefix)) {
                $isFullUrl = true;
                break;
            }
        }

        if (! $isFullUrl) {
            $src = asset($folder . '/' . ltrim($src, '/'));
        }
    }
@endphp


@php
    $imgTag = '<img src="' . e($src) . '" 
                   alt="' . e($alt) . '" 
                   ' . ($title ? 'title="' . e($title) . '"' : '') . '
                   ' . ($width ? 'width="' . e($width) . '"' : '') . '
                   ' . ($height ? 'height="' . e($height) . '"' : '') . '
                   loading="' . e($loading) . '" 
                   class="max-w-full h-auto ' . e($class) . '" 
                   ' . $attributes->toHtml() . '
               >';
@endphp

@if($link)
    <a href="{{ $link }}" target="{{ $target }}">
        {!! $imgTag !!}
    </a>
@else
    {!! $imgTag !!}
@endif
