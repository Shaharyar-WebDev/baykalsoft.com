@section('title', __('pages.pages.add.title'))

@extends('layout.admin')

@section('content')

    <x-admin.dashboard.breadcrumb label="{{ __('pages.pages.add.title') }}" :breadcrumbs="[
        [
            'label' => __('pages.pages.add.title'),
            'url' => route('admin.pages.create'),
        ],
    ]" />

    <form action="{{ route('admin.pages.update', ['page' => $page->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            @if (session('success'))
                {{ session('success') }}
            @endif
            <!-- Tab Navigation -->
            <ul class="nav user-profile-tab border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-general" data-bs-toggle="pill" data-bs-target="#general-tab"
                        type="button" role="tab" aria-controls="general-tab" aria-selected="true">
                        General
                    </button>
                </li>
                @foreach (config('locale.locale_labels') as $locale => $label)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tab-{{ $locale }}" data-bs-toggle="pill"
                            data-bs-target="#{{ $locale }}-tab" type="button" role="tab"
                            aria-controls="{{ $locale }}-tab" aria-selected="false">
                            {{ $label }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab Content -->
            <div class="card-body p-4">
                <div class="tab-content" id="pills-tabContent">
                    <!-- General Tab -->
                    <div class="tab-pane fade show active" id="general-tab" role="tabpanel" aria-labelledby="tab-general">
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Publish Page?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('is_published') is-invalid @enderror"
                                        type="checkbox" name="is_published" value="1" id="publishSwitch"
                                        {{ old('is_published', isset($page) && $page->is_published ? 'checked' : '') }}>
                                    <label class="form-check-label" for="publishSwitch">Yes</label>

                                    @error('is_published')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    name="slug" value="{{ old('slug', $page->slug ?? '') }}" placeholder="page-slug">
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Language Tabs -->
                    @foreach (config('locale.locale_labels') as $locale => $label)
                        <div class="tab-pane fade" id="{{ $locale }}-tab" role="tabpanel"
                            aria-labelledby="tab-{{ $locale }}">
                            <div class="row">
                                {{-- Title --}}
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Title ({{ $label }})</label>
                                    <input type="text" class="form-control @error("title.$locale") is-invalid @enderror"
                                        name="title[{{ $locale }}]"
                                        value="{{ old("title.$locale", $page->getTranslation('title', $locale) ?? '') }}"
                                        placeholder="Page Title in {{ $label }}">
                                    @error("title.$locale")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Content --}}
                                <div class="col-12 mb-4">
                                    <label class="form-label">Content ({{ $label }})</label>
                                    <textarea class="form-control ckeditor @error("content.$locale") is-invalid @enderror"
                                        name="content[{{ $locale }}]" rows="5" placeholder="Write content...">{{ old("content.$locale", $page->getTranslation('content', $locale) ?? '') }}</textarea>
                                    @error("content.$locale")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Meta Title --}}
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Meta Title ({{ $label }})</label>
                                    <input type="text"
                                        class="form-control @error("meta.$locale.title") is-invalid @enderror"
                                        name="meta[{{ $locale }}][title]"
                                        value="{{ old("meta.$locale.title", $page->getTranslation('meta', $locale)['title'] ?? '') }}">
                                    @error("meta.$locale.title")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Meta Description --}}
                                <div class="col-lg-6 mb-4">
                                    <label class="form-label">Meta Description ({{ $label }})</label>
                                    <input type="text"
                                        class="form-control @error("meta.$locale.description") is-invalid @enderror"
                                        name="meta[{{ $locale }}][description]"
                                        value="{{ old("meta.$locale.description", $page->getTranslation('meta', $locale)['description'] ?? '') }}">
                                    @error("meta.$locale.description")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Buttons -->
            <div class="card-footer d-flex justify-content-end gap-3">
                <button class="btn btn-primary" type="submit">Save Page</button>
                <a href="{{ route('admin.pages.index') }}" class="btn bg-danger-subtle text-danger">Cancel</a>
            </div>
        </div>
    </form>

@endsection

@push('scripts-hp')
    <script src="{{ asset('js/admin/vendor.min.js') }}"></script>
@endpush

@push('scripts')
    @if (session('response'))
        <script>
            Swal.queue({
                icon: '{{ session('response')['status'] }}',
                title: '{{ session('response')['message'] }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabTriggers = document.querySelectorAll('[data-bs-toggle="pill"]');

            tabTriggers.forEach(trigger => {
                trigger.addEventListener('shown.bs.tab', function(e) {
                    const target = document.querySelector(e.target.getAttribute('data-bs-target'));
                    if (!target) return;

                    const editors = target.querySelectorAll('textarea.ckeditor');
                    editors.forEach(textarea => {
                        if (!textarea.classList.contains('ckeditor-initialized')) {
                            ClassicEditor.create(textarea)
                                .then(editor => {
                                    textarea.classList.add('ckeditor-initialized');
                                    editor.editing.view.change(writer => {
                                        const root = editor.editing.view
                                            .document.getRoot();

                                        // Set minimum height
                                        writer.setStyle('height', '400px',
                                            root);

                                        // Set background color
                                        writer.setStyle('background-color',
                                            'transparent', root);

                                        writer.setStyle('color',
                                            'black', root);

                                        // Optional: padding for better UX
                                        writer.setStyle('padding', '15px',
                                            root);
                                    });
                                })
                                .catch(error => console.error(error));
                        }
                    });
                });
            });
        });
    </script>
@endpush
