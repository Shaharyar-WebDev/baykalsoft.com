@props([
    'headers' => [],
    'route' => '',
    'perPage' => 5,
    'perPageOptions' => ['5', '10', '25', '50'],
    'emptyMessage' => __('messages.no_records'),
    'tableId' => '',
    'locale' => app()->getLocale(),
    'updateRoute' => null,
    'deleteRoute' => null,
    'actions' => false,
])

<div class="card" id="{{ $tableId }}" x-data="productTable($el)" data-route="{{ $route }}"
    data-perpage="{{ $perPage }}" data-locale="{{ $locale }}" data-headers="{{ json_encode($headers) }}"
    data-emptymessage="{{ $emptyMessage }}" x-init="init()" data-updateroute="{{ $updateRoute }}"
    data-deleteroute="{{ $deleteRoute }}" data-actions="{{ $actions }}" data-tableid="{{ $tableId }}">
    <div class="card-body">

        <div class="d-flex flex-wrap justify-content-end align-items-stretch gap-2 mb-3">
            <div class="dropdown">
                <button class="btn bg-info-subtle text-info dropdown-toggle d-flex text-center align-items-center gap-2"
                    type="button" data-bs-toggle="dropdown">
                    <iconify-icon icon="solar:hamburger-menu-bold" class="fs-4"></iconify-icon>
                    <span>
                        {{ __('actions.columns') }}
                    </span>
                </button>
                <ul class="dropdown-menu border shadow-md dropdown-menu-animate-up p-2 shadow-lg border-sm"
                    style="min-width: 200px;">
                    <template x-for="[field, header] in Object.entries(headers).sort()" :key="field">
                        <li>
                            <label class="cursor-pointer dropdown-item d-flex align-items-center gap-2">
                                <input type="checkbox" class="form-check-input primary check-light-primary"
                                    :checked="visibleColumns.includes(field)" @change="toggleColumn(field)">
                                <span x-text="header"></span>
                            </label>
                        </li>
                    </template>

                    <li class="cursor-pointer">
                        <button class="dropdown-item text-primary fw-semibold"
                            @click="visibleColumns = Object.keys(headers); saveVisibleColumns();">
                            {{ __('actions.select_all') }}
                        </button>
                    </li>
                    <li class="cursor-pointer">
                        <button class="dropdown-item text-danger" @click="visibleColumns = []; saveVisibleColumns();">
                            {{ __('actions.deselect_all') }}
                        </button>
                    </li>
                </ul>
            </div>

            <div class="input-group" style="max-width: 300px; flex: 1 1 250px;">
                <input type="text" @keydown.enter="fetchData(buildRoute({ page: 1 }))" class="form-control"
                    placeholder="{{ __('actions.search') }}..." aria-label="Search" x-model="search">
                <button :disabled="loading" tabindex="0" role="button" @click="fetchData(buildRoute({ page: 1 }))"
                    class="btn bg-primary-subtle text-primary" type="button">
                    <span x-show="loading" class="spinner-border spinner-border-sm ms-1" role="status"
                        aria-hidden="true"></span>
                    <iconify-icon x-show="!loading" icon="solar:magnifer-linear"></iconify-icon>
                </button>
            </div>
            <button :disabled="loading" class="btn bg-secondary-subtle text-secondary d-flex align-items-center"
                @click="resetTable">
                <span x-show="loading" class="spinner-border spinner-border-sm ms-1" role="status"
                    aria-hidden="true"></span>
                <iconify-icon x-show="!loading" icon="solar:refresh-bold"></iconify-icon>
                <span class="ms-2">
                    {{ __('actions.reset') }}
                </span>
            </button>
        </div>
        <div>
            <div class="table-responsive border shadow-md rounded">

                <div x-show="visibleColumns.length === 0" class="text-center p-5">
                    <iconify-icon icon="solar:eye-closed-line-duotone" style="font-size: 2rem;"></iconify-icon>
                    <p class="mt-3 fs-3"><strong>{{ __('messages.no_columns_selected') }}</strong></p>
                </div>


                <table class="table table-hover">
                    <thead class="bg-inverse text-white sticky-top" style="top: 0; z-index: 1;">
                        <tr>
                            <template x-for="(header, field) in headers" :key="field">
                                <template x-if="visibleColumns.includes(field)">
                                    <th class="fw-semibold cursor-pointer" role="button" tabindex="0"
                                        @click="sort(field)" @keydown.enter="sort(field)"
                                        @keydown.space.prevent="sort(field)" x-transition.opacity.duration.200ms>
                                        <span x-text="header"></span>
                                        <template x-if="sortBy === field">
                                            <iconify-icon
                                                :icon="sortDir === 'asc' ? 'solar:arrow-up-bold' : 'solar:arrow-down-bold'"
                                                class="ms-1">
                                            </iconify-icon>
                                        </template>
                                    </th>
                                </template>
                            </template>
                            @if ($actions)
                                <template x-if="visibleColumns.length !== 0">
                                    <th class="fw-semibold cursor-pointer"  x-show="!loading" role="button" tabindex="0">
                                        {{ __('actions.actions') }}
                                    </th>
                                </template>
                            @endif
                        </tr>
                    </thead>

                    {{-- Skeleton --}}
                    <tbody x-show="loading" x-cloak style="cursor: progress;">
                        <template x-for="i in perPage" :key="i">
                            <tr>
                                <template x-for="(col, idx) in visibleColumns" :key="idx">
                                    <td style="padding-block: 1rem;">
                                        <div class="placeholder-glow">
                                            <span class="placeholder w-100 d-block" style="height: 1rem;"></span>
                                        </div>
                                    </td>
                                </template>
                            </tr>
                        </template>
                    </tbody>

                    {{-- Empty rows --}}
                    <tbody x-show="!loading" x-cloak>
                        <tr x-show="rows.length === 0">
                            <td :colspan="Object.keys(headers).length" class="text-center py-4">
                                <iconify-icon icon="solar:shield-warning-broken" class="fs-4">
                                </iconify-icon>
                                <span class="ms-2" x-text="emptyMessage">
                                </span>
                            </td>
                        </tr>
                        <template x-for="row in rows">
                            <tr tabindex="0" role="button" class="border-bottom border-dark-subtle">
                                <template x-for="(data, col) in row">
                                    <template x-if="visibleColumns.includes(col) && headers[col]">
                                        <td x-text="data" x-transition.opacity.duration.200ms></td>
                                    </template>
                                </template>
                                @if ($actions)
                                    <template x-if="visibleColumns.length !== 0">
                                        <td class="fw-semibold cursor-pointer" style="min-width: 200px;"
                                            role="button" tabindex="0" x-show="!loading">
                                            <a data-bs-toggle="tooltip" title="{{ __('actions.edit') }}" :href='updateRoute.replace("__ID__", row.id)'>
                                                <button type="button"
                                                    class="btn mb-1 btn-primary rounded-circle round d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon class="fs-4"
                                                        icon="solar:gallery-edit-bold"></iconify-icon>
                                                </button>
                                            </a>
                                            <a data-bs-toggle="tooltip" title="{{ __('actions.delete') }}" @click="deleteRow(row)">
                                                <button type="button"
                                                    class="btn mb-1 mx-2 btn-danger rounded-circle round d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon class="fs-4"
                                                        icon="solar:trash-bin-2-bold"></iconify-icon>
                                                </button>
                                            </a>
                                        </td>
                                    </template>
                                @endif
                            </tr>
                        </template>
                    </tbody>

                    <tfoot class="bg-inverse text-white">
                        <tr>
                            <template x-for="(header, field) in headers" :key="field">
                                <template x-if="visibleColumns.includes(field)">
                                    <th class="fw-semibold cursor-pointer" role="button" tabindex="0"
                                        @click="sort(field)" @keydown.enter="sort(field)"
                                        @keydown.space.prevent="sort(field)" x-transition.opacity.duration.200ms>
                                        <span x-text="header"></span>
                                        <template x-if="sortBy === field">
                                            <iconify-icon
                                                :icon="sortDir === 'asc' ? 'solar:arrow-up-bold' :
                                                    'solar:arrow-down-bold'"
                                                class="ms-1">
                                            </iconify-icon>
                                        </template>
                                    </th>
                                </template>
                            </template>
                            @if ($actions)
                                <template x-if="visibleColumns.length !== 0">
                                    <th class="fw-semibold cursor-pointer"  x-show="!loading" role="button" tabindex="0">
                                        {{ __('actions.action') }}
                                    </th>
                                </template>
                            @endif
                        </tr>
                    </tfoot>
                </table>
            </div>
            <nav class="d-flex flex-wrap align-items-center justify-content-between gap-3 py-3">
                <div class="flex-grow-1 text-center text-md-start">
                    <span
                        x-text="paginationMsg
        .replace(':from', paginationInfo.from)
        .replace(':to', paginationInfo.to)
        .replace(':total', paginationInfo.total)">
                    </span>
                </div>

                <div class="d-flex align-items-center gap-2" style="max-width: 320px;">

                    <div class="input-group shadow-sm rounded border overflow-hidden">
                        <input type="number" @keydown.enter="goToPage(page)"
                            class="form-control border-0 bg-transparent rounded-start-pill"
                            placeholder="{{ __('pagination.go_to_page') }}" aria-label="Go To Page" x-model="page">
                        <button :disabled="loading" tabindex="0" role="button" @click="goToPage(page)"
                            class="btn bg-primary-subtle text-primary" type="button">
                            <span x-show="loading" class="spinner-border spinner-border-sm ms-1" role="status"
                                aria-hidden="true"></span>
                            <iconify-icon x-show="!loading" icon="solar:arrow-right-up-bold"></iconify-icon>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <select class="form-select" x-model.number="perPage"
                        @change="fetchData(buildRoute({ perPage: perPage }))">
                        @foreach ($perPageOptions as $option)
                            <option value="{{ $option }}">{{ $option }} {{ __('pagination.per_page') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-grow-1 text-center text-md-end">
                    <ul class="pagination mb-0 justify-content-center justify-content-md-end flex-wrap flex-md-nowrap"
                        role="navigation" x-transition.opacity.duration.200ms>
                        <template x-for="(link, index) in visibleLinks" :key="index">
                            <li class="page-item" :class="{ 'active': link.active, 'disabled': !link.url }">
                                <a class="page-link px-3" style="min-width: 2.5rem; white-space: nowrap;"
                                    href="javascript:void(0)" x-html="link.label"
                                    @click="link.url && fetchData(buildRoute({
                            page : getPageFromUrl(link.url)
                        })); $event.target.blur();"
                                    :class="{ 'rounded-start': index === 0 }"
                                    style="min-width: 2.5rem; white-space: nowrap;">
                                </a>
                            </li>
                        </template>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {

            Alpine.data('productTable', ($el) => ({
                paginationMsg: @json(__('pagination.showing_records')),
                actions: $el.dataset.actions === 'true',
                rows: [],
                headers: JSON.parse($el.dataset.headers),
                paginationInfo: {
                    from: 0,
                    to: 0,
                    total: 0
                },
                windowSize: 3,
                paginationLinks: [],
                visibleColumns: [],
                perPage: parseInt($el.dataset.perpage) || 5,
                sortBy: '',
                sortDir: 'asc',
                route: '',
                lastRoute: '',
                currentRoute: '',
                @if ($actions)
                    updateRoute: route($el.dataset.updateroute, {
                        id: '__ID__'
                    }),
                    deleteRoute: route($el.dataset.deleteroute, {
                        id: '__ID__'
                    }),
                @endif
                search: '',
                loading: true,
                page: '',
                locale: $el.dataset.locale,
                emptyMessage: $el.dataset.emptymessage,
                storageKey: `visibleColumns:${$el.dataset.tableid || $el.dataset.route}`,
                buildRoute(overrides = {}, pushToUrl = true) {

                    const params = {
                        perPage: this.perPage,
                        sortBy: this.sortBy,
                        sortDir: this.sortDir,
                        search: this.search,
                        locale: this.locale,
                        ...overrides
                    };


                    const query = new URLSearchParams(params).toString();
                    let builtRoute = route($el.dataset.route);

                    finalRoute = `${builtRoute}?${query}`;

                    this.currentRoute = finalRoute;

                    console.log('built route : ', builtRoute);

                    console.log('route query : ', params, query);

                    console.log('final route : ', finalRoute, params, query);

                    if (pushToUrl) {
                        const currentUrl = new URL(window.location.href);
                        currentUrl.search = query;
                        window.history.pushState('', {}, currentUrl);
                    }

                    return finalRoute;
                },
                resetTable() {
                    this.search = '';
                    this.sortBy = '';
                    this.sortDir = 'asc';

                    const resetRoute = this.buildRoute({
                        page: 1,
                        search: ''
                    });

                    this.fetchData(resetRoute);
                },
                toggleColumn(col) {
                    if (this.visibleColumns.includes(col)) {
                        this.visibleColumns = this.visibleColumns.filter(c => c !== col);
                    } else {
                        this.visibleColumns.push(col);
                    }
                    this.saveVisibleColumns();
                },
                saveVisibleColumns() {
                    localStorage.setItem(this.storageKey, JSON.stringify(this.visibleColumns));
                },
                loadVisibleColumns() {
                    const saved = localStorage.getItem(this.storageKey);
                    if (saved) {
                        this.visibleColumns = JSON.parse(saved);
                    } else {
                        this.visibleColumns = Object.keys(this.headers);
                    }
                },
                getPageFromUrl(url) {
                    try {
                        if (url) {

                            const parsed = new URL(url, window.location.origin);
                            return parsed.searchParams.get('page') ?? 1;
                        } else {
                            const parsed = new URL(this.currentRoute, window.location.origin);
                            return parsed.searchParams.get('page') ?? 1;
                        }
                    } catch {
                        console.warn('failed to parse url');
                        return 1;
                    }
                },
                goToPage(page) {

                    console.log(typeof(page));
                    const input = String(page).trim();

                    if (input === '' || parseInt(input) === 0 || !/^\d+$/.test(input)) {
                        Swal.fire({
                            icon: 'warning',
                            title: @json(__('pagination.invalid_page')),
                            text: @json(__('pagination.invalid_page_number')),
                            confirmButtonColor: '#3085d6',
                        });

                        this.page = 1;
                        return;
                    }

                    this.fetchData(this.buildRoute({
                        page: parseInt(page)
                    }))
                },
                async fetchData(apiRoute) {
                    console.trace('📡 fetchData() triggered')
                    this.loading = true;
                    BProgress.start();
                    try {

                        console.log('fetching from route : ', apiRoute);
                        console.log('current route : ', this.currentRoute);
                        console.log('current page no', this.getPageFromUrl());

                        const res = await fetch(apiRoute, {
                            headers: {
                                'Accept': 'application/json'
                            }
                        });
                        const json = await res.json();
                        const errorDetails = json?.errors;
                        const errorMsg = json?.message;

                        if (!res.ok) {
                            console.error('API Error', errorDetails);

                            Swal.queue({
                                icon: 'error',
                                title: errorMsg ?? @json(__('messages.errors.sever.title')),
                                text: errorDetails ?
                                    `${JSON.stringify(errorDetails, null, 2)}` :
                                    @json(__('messages.errors.unknown.title')),
                                confirmButtonColor: '#3085d6',
                            });

                            return;
                        }

                        if (!json.success) {

                            Swal.queue({
                                icon: 'error',
                                title: errorMsg ?? @json(__('messages.errors.unknown.title')),
                                text: errorDetails ?
                                    `${JSON.stringify(errorDetails, null, 2)}` :
                                    @json(__('messages.errors.unknown.text')),
                                confirmButtonColor: '#3085d6',
                            });

                            return;

                        }

                        this.rows = json.data?.data ?? [];

                        if (this.rows.length === 0) {
                            Swal.fire({
                                icon: 'info',
                                title: @json(__('messages.no_records')),
                                text: @json(__('messages.empty_table')),
                                confirmButtonColor: '#3085d6',
                            });
                        }

                        this.paginationInfo = {
                            from: json.data?.from,
                            to: json.data?.to,
                            total: json.data?.total
                        };

                        this.paginationLinks = json.data?.links ?? [];

                        console.log(json);
                        console.log(json.data.data);

                        console.log("rows-----", this.rows);

                        this.loading = false;
                        BProgress.done();
                    } catch (e) {

                        console.error(`❌ Error fetching data:\n${e.message}`);
                        this.loading = false;

                        window.alert(`❌ Error fetching data:\n${e.message}`);

                        Swal.fire({
                            icon: 'error',
                            title: @json(__('messages.errors.client.title')),
                            text: @json(__('messages.errors.client.text')).replace(':message', e
                                .message),
                            confirmButtonColor: '#3085d6',
                        });

                    } finally {
                        this.loading = false;
                        BProgress.done();
                    }
                },
                async deleteRow(row) {
                    const confirmed = await Swal.fire({
                        title: '{{ __('messages.confirm_delete') }}',
                        text: '{{ __('messages.delete_warning') }}',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: '{{ __('actions.confirm') }}',
                        cancelButtonText: '{{ __('actions.cancel') }}'
                    });

                    if (confirmed.isConfirmed) {
                        const url = this.deleteRoute.replace('__ID__', row.id);

                        try {
                            const response = await fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').content,
                                    'Accept': 'application/json'
                                }
                            });

                            if (response.ok) {
                                // Optional: Show success toast
                                Swal.fire('Deleted!', 'Your item has been deleted.', 'success');

                                // Remove row from UI
                               this.fetchData(this.buildRoute());
                            } else {
                                const err = await response.json();
                                Swal.fire('Error', err.message || 'Failed to delete.', 'error');
                            }
                        } catch (e) {
                            Swal.fire('Error', e.message, 'error');
                        }
                    }
                },
                get visibleLinks() {
                    const links = this.paginationLinks;
                    const count = links.length;
                    if (count < 3) return links; // Not enough for pagination

                    const output = [];

                    const prev = links[0];
                    const next = links.at(-1);
                    const last = links.at(-2);
                    const first = links[1];

                    const currentIndex = links.findIndex(l => l.active);
                    const win = this.windowSize ?? 2;

                    // Always include 'Previous'
                    output.push(prev);

                    // if (first && first.label !== last.label) {
                    //     output.push(first);
                    // }

                    // // Always show first page
                    if (first) output.push(first);

                    let start = Math.max(currentIndex - win, 2);
                    let end = Math.min(currentIndex + win, count - 3);

                    // Expand window at start
                    if (currentIndex <= 2 + win) {
                        start = 2;
                        end = Math.min(start + win * 2, count - 3);
                    }

                    // Expand window at end
                    if (currentIndex >= count - 3 - win) {
                        end = count - 3;
                        start = Math.max(end - win * 2, 2);
                    }

                    // Ellipsis after first page
                    if (start > 2) {
                        output.push({
                            label: '...',
                            url: null,
                            active: false
                        });
                    }

                    // Page links in window
                    for (let i = start; i <= end; i++) {
                        if (links[i]) output.push(links[i]);
                    }

                    // Ellipsis before last page
                    if (end < count - 3) {
                        output.push({
                            label: '...',
                            url: null,
                            active: false
                        });
                    }

                    if (last && last.label !== first.label) {
                        output.push(last);
                    }

                    // Always show last page
                    // if (last) output.push(last);

                    // Always include 'Next'
                    output.push(next);

                    return output;
                },
                sort(key) {
                    if (this.sortBy === key) {
                        this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
                    } else {
                        this.sortBy = key;
                        this.sortDir = 'asc';
                    }

                    const sortRoute = this.buildRoute({
                        page: this.getPageFromUrl(),
                        perPage: this.perPage,
                        sortBy: this.sortBy,
                        sortDir: this.sortDir
                    });

                    console.log(sortRoute);
                    this.fetchData(sortRoute);
                },
                init() {
                    if (this._initialized) return;
                    console.log($el);
                    console.log('actions dataset:', $el.dataset.actions);

                    this._initialized = true;

                    const urlParams = new URLSearchParams(window.location.search);
                    this.perPage = parseInt(urlParams.get('perPage')) || this.perPage;
                    this.search = urlParams.get('search') ?? this.search;
                    this.sortBy = urlParams.get('sortBy') ?? '';
                    this.sortDir = urlParams.get('sortDir') ?? 'asc';
                    this.page = urlParams.get('page') ?? 1;

                    console.log('Using storageKey:', this.storageKey);
                    this.loadVisibleColumns();
                    console.log('Visible Columns:', this.visibleColumns);
                    console.log('Visible Columns:', this.visibleColumns.length);


                    this.route = this.buildRoute({
                        perPage: this.perPage,
                        sortBy: this.sortBy,
                        sortDir: this.sortDir,
                        page: this.page
                    }, false);
                    this.fetchData(this.route);
                }
            }));

        });
    </script>
@endpush
