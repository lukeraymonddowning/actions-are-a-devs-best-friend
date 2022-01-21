@props(['textColor', 'backgroundColor'])
<span class="{{ $textColor }} drop-shadow relative"><span class="{{ $backgroundColor }} absolute inset-2 blur-lg"></span>{{ $slot }}</span>
