@foreach ($items as $index => $item)
    <li class="breadcrumb-item text-sm {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current=page' : '' }}>
        @if (!empty($item['route']))
            <a href="{{ $item['route'] }}" class="text-dark {{ $loop->last ? '' : 'opacity-5' }}">{{ $item['label'] }}</a>
        @else
            {{ $item['label'] }}
        @endif
    </li>
@endforeach
