@props([
    'label' => 'Breadcrumb',
    'breadcrumbs' => [
        // Example:
        // ['label' => 'Settings', 'url' => route('admin.settings')],
        // ['label' => 'General']
    ],
])

<div class="card card-body py-3">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="d-sm-flex align-items-center justify-space-between">
                <h4 class="mb-4 mb-sm-0 card-title">{{ $label }}</h4>
                <nav aria-label="breadcrumb" class="ms-auto">
                    <ol class="breadcrumb mb-0 d-flex justify-content-center align-items-center gap-2">
                        <li class="breadcrumb-item d-flex align-items-center">
                            <a class="text-muted text-decoration-none d-flex" href="{{ route('admin.dashboard') }}">
                                <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                            </a>
                        </li>
                        @foreach ($breadcrumbs as $index => $crumb)
                            <li class="breadcrumb-item d-flex align-items-center {{ $loop->last ? 'active' : '' }}"
                                {{ $loop->last ? 'aria-current=page' : '' }}>
                                @if (!empty($crumb['url']) && !$loop->last)
                                    <a href="{{ $crumb['url'] }}" class="text-decoration-none text-muted">
                                        {{ $crumb['label'] }}
                                    </a>
                                @else
                                    <span class="badge fw-medium bg-primary-subtle text-primary">
                                        {{ $crumb['label'] }}
                                    </span>
                                @endif
                            </li>
                        @endforeach

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
