@section('title', 'Home')

@extends('layout.shop')

@section('content')

    <div class="block-space block-space--layout--spaceship-ledge-height"></div>
    <div class="block">
        <div class="container">
            <div class="document">
                <div class="document__header">
                    {{ app()->getLocale() }}
                    <h1 class="document__title">{{ $page->getTranslation('title', app()->getLocale()) }}</h1>
                    <div class="document__subtitle">{{ $page->created_at->format('M d, Y') }}</div>
                </div>
                <div class="document__content card" width="700px">
                    {!! $page->getTranslation('content', app()->getLocale()) !!}
                </div>
                @php
                    $meta = $page->getTranslation('meta', app()->getLocale());
                @endphp

                @if ($meta)
                    <div class="mt-5">
                        <h5>Meta Info</h5>
                        <p><strong>Title:</strong> {{ $meta['title'] ?? '-' }}</p>
                        <p><strong>Description:</strong> {{ $meta['description'] ?? '-' }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>

@endsection
