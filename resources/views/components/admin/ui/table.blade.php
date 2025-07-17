@props([
    'headers' => [],
    'route' => '',
    'perPage' => 5,
    'emptyMessage' => 'No Records Found',
    'tableId' => '',
])

<div class="card" id="{{ $tableId }}" x-data="productTable($el)" data-route="{{ $route }}"
    data-perpage="{{ $perPage }}" data-headers="{{ json_encode($headers) }}" data-emptymessage="{{ $emptyMessage }}"
    x-init="init()" data-tableid="{{ $tableId }}">
    <div class="card-body">

        <div class="d-flex flex-wrap justify-content-end align-items-stretch gap-2 mb-3">
            <div class="dropdown">
                <button class="btn bg-info-subtle text-info dropdown-toggle d-flex text-center align-items-center gap-2"
                    type="button" data-bs-toggle="dropdown">
                    <iconify-icon icon="solar:hamburger-menu-bold" class="fs-4"></iconify-icon>
                    <span>
                        Columns
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
                            Select All
                        </button>
                    </li>
                    <li class="cursor-pointer">
                        <button class="dropdown-item text-danger" @click="visibleColumns = []; saveVisibleColumns();">
                            Deselect All
                        </button>
                    </li>
                </ul>
            </div>

            <div class="input-group" style="max-width: 300px; flex: 1 1 250px;">
                <input type="text" @keydown.enter="fetchData(buildRoute({ page: 1 }))" class="form-control"
                    placeholder="Search..." aria-label="Search" x-model="search">
                <button tabindex="0" role="button" @click="fetchData(buildRoute({ page: 1 }))"
                    class="btn bg-primary-subtle text-primary" type="button">
                    <iconify-icon icon="solar:magnifer-linear"></iconify-icon>
                </button>
            </div>
            <button class="btn bg-secondary-subtle text-secondary d-flex align-items-center" @click="resetTable">
                <iconify-icon icon="solar:refresh-bold"></iconify-icon>
                <span class="ms-2">
                    Reset
                </span>
            </button>
        </div>
        <div>
            <div class="table-responsive border shadow-md rounded">

                <div x-show="visibleColumns.length === 0" class="text-center p-5" x-transition.opacity.duration.200ms>
                    <iconify-icon icon="solar:eye-closed-line-duotone" style="font-size: 2rem;"></iconify-icon>
                    <p class="mt-3">No columns selected. Please choose at least one from the <strong>Columns</strong>
                        menu.</p>
                </div>


                <table class="table table-hover">
                    <thead class="bg-inverse text-white sticky-top" style="top: 0; z-index: 1;">
                        <tr>
                            <template x-for="(header, field) in headers" :key="field">
                                <template x-if="visibleColumns.includes(field)">
                                    <th class="fw-semibold cursor-pointer" role="button" tabindex="0"
                                        @click="sort(field)" @keydown.enter="sort(field)"
                                        @keydown.space.prevent="sort(field)">
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
                            <tr class="border-bottom border-dark-subtle">
                                <template x-for="(data, col) in row">
                                    <template x-if="visibleColumns.includes(col)">
                                        <td x-text="data"></td>
                                    </template>
                                </template>
                            </tr>
                        </template>
                    </tbody>

                    <tfoot class="bg-inverse text-white">
                        <tr>
                            <template x-for="(header, field) in headers" :key="field">
                                <template x-if="visibleColumns.includes(field)">
                                    <th class="fw-semibold cursor-pointer" role="button" tabindex="0"
                                        @click="sort(field)" @keydown.enter="sort(field)"
                                        @keydown.space.prevent="sort(field)">
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
                        </tr>
                    </tfoot>
                </table>
            </div>
            <nav class="d-flex flex-wrap align-items-center justify-content-between gap-3 py-3">
                <div class="flex-grow-1 text-center text-md-start">
                    <span
                        x-text="`Showing ${paginationInfo.from} to ${paginationInfo.to} of ${paginationInfo.total} records`">
                    </span>
                </div>

                <div class="d-flex align-items-center gap-2" style="max-width: 320px;">

                    <div class="input-group shadow-sm rounded border overflow-hidden">
                        <input type="number" @keydown.enter="goToPage(page)"
                            class="form-control border-0 bg-transparent rounded-start-pill" placeholder="Go to page"
                            aria-label="Go To Page" x-model="page">
                        <button tabindex="0" role="button" @click="goToPage(page)"
                            class="btn bg-primary-subtle text-primary" type="button">
                            <iconify-icon icon="solar:arrow-right-up-bold"></iconify-icon>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <select class="form-select" x-model.number="perPage"
                        @change="fetchData(buildRoute({ perPage: perPage }))">
                        <option value="5">5 per page</option>
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>


                <div class="flex-grow-1 text-center text-md-end">
                    <ul class="pagination mb-0 justify-content-center justify-content-md-end flex-wrap flex-md-nowrap"
                        role="navigation">
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
                search: '',
                loading: true,
                page: '',
                emptyMessage: $el.dataset.emptymessage,
                storageKey: `visibleColumns:${$el.dataset.tableid || $el.dataset.route}`,
                buildRoute(overrides = {}, pushToUrl = true) {

                    const params = {
                        perPage: this.perPage,
                        sortBy: this.sortBy,
                        sortDir: this.sortDir,
                        search: this.search,
                        ...overrides
                    };


                    const query = new URLSearchParams(params).toString();
                    let builtRoute = route($el.dataset.route);

                    finalRoute = `${builtRoute}?${query}`;

                    this.currentRoute = finalRoute;

                    console.log('built route : ', builtRoute);

                    console.log('route query : ', params, query);

                    console.log('final route : ', finalRoute, params, query);

                    if(pushToUrl){
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
                            title: 'Invalid Page',
                            text: 'The page number is invalid',
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

                        const res = await fetch(apiRoute);
                        const json = await res.json();
                        this.rows = json.data?.data ?? [];

                        if (this.rows.length === 0) {
                            Swal.fire({
                                icon: 'info',
                                title: 'No Records Found',
                                text: 'The table is empty.',
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
                            title: 'Application Error',
                            text: 'A client side error has occured : ' + e.message,
                            confirmButtonColor: '#3085d6',
                        });

                    } finally {
                        this.loading = false;
                        BProgress.done();
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
                    this._initialized = true;
                    console.log('Using storageKey:', this.storageKey);
                    this.loadVisibleColumns();
                    console.log('Visible Columns:', this.visibleColumns);
                    console.log('Visible Columns:', this.visibleColumns.length);


                    this.route = this.buildRoute({
                        perPage: this.perPage,
                        sortBy: this.sortBy,
                        sortDir: this.sortDir
                    });
                    this.fetchData(this.route);
                }
            }));

        });
    </script>
@endpush
