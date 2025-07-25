@section('title', 'Dashboard')

@extends('layout.admin')

@section('content')

    <div class="row">
        <div class="col-lg-5">
            <!-- -------------------------------------------- -->
            <!-- Welcome Card -->
            <!-- -------------------------------------------- -->
            <div class="card text-bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex flex-column h-100">
                                <div class="hstack gap-3">
                                    <span
                                        class="d-flex align-items-center justify-content-center round-48 bg-white rounded flex-shrink-0">
                                        <iconify-icon icon="solar:course-up-outline" class="fs-7 text-muted"></iconify-icon>
                                    </span>
                                    <h5 class="text-white fs-6 mb-0 text-nowrap">Welcome Back
                                        <br />David
                                    </h5>
                                </div>
                                <div class="mt-4 mt-sm-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="opacity-75">Budget</span>
                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-bolder">
                                                $98,450</h4>
                                        </div>
                                        <div class="col-6 border-start border-light" style="--bs-border-opacity: .15;">
                                            <span class="opacity-75">Expense</span>
                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-bolder">
                                                $2,440</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-md-end">
                            <img src="{{ asset('images/admin/backgrounds/welcome-bg.png') }}" alt="welcome"
                                class="img-fluid mb-n7 mt-2" width="180" loading="lazy">
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <!-- -------------------------------------------- -->
                <!-- Customers -->
                <!-- -------------------------------------------- -->
                <div class="col-md-6">
                    <div class="card bg-secondary-subtle overflow-hidden shadow-none">
                        <div class="card-body p-4">
                            <span class="text-dark-light">Customers</span>
                            <div class="hstack gap-6">
                                <h5 class="mb-0 fs-7">36,358</h5>
                                <span class="fs-11 text-dark-light fw-semibold">-12%</span>
                            </div>
                        </div>
                        <div id="customers"></div>
                    </div>
                </div>
                <!-- -------------------------------------------- -->
                <!-- Projects -->
                <!-- -------------------------------------------- -->
                <div class="col-md-6">
                    <div class="card bg-danger-subtle overflow-hidden shadow-none">
                        <div class="card-body p-4">
                            <span class="text-dark-light">Projects</span>
                            <div class="hstack gap-6 mb-4">
                                <h5 class="mb-0 fs-7">78,298</h5>
                                <span class="fs-11 text-dark-light fw-semibold">+31.8%</span>
                            </div>
                            <div class="mx-n1">
                                <div id="projects"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <!-- -------------------------------------------- -->
            <!-- Revenue Forecast -->
            <!-- -------------------------------------------- -->
            <div class="card">
                <div class="card-body pb-4">
                    <div class="d-md-flex align-items-center justify-content-between mb-4">
                        <div class="hstack align-items-center gap-3">
                            <span
                                class="d-flex align-items-center justify-content-center round-48 bg-primary-subtle rounded flex-shrink-0">
                                <iconify-icon icon="solar:layers-linear" class="fs-7 text-primary"></iconify-icon>
                            </span>
                            <div>
                                <h5 class="card-title">Revenue Forecast</h5>
                                <p class="card-subtitle mb-0">Overview of Profit</p>
                            </div>
                        </div>

                        <div class="hstack gap-9 mt-4 mt-md-0">
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-block flex-shrink-0 round-8 bg-primary rounded-circle"></span>
                                <span class="text-nowrap text-muted">2024</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-block flex-shrink-0 round-8 bg-danger rounded-circle"></span>
                                <span class="text-nowrap text-muted">2023</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="d-block flex-shrink-0 round-8 bg-secondary rounded-circle"></span>
                                <span class="text-nowrap text-muted">2022</span>
                            </div>
                        </div>
                    </div>
                    <style>
                        .apexcharts-inner{
                            overflow : hidden;
                        }
                    </style>
                    <div style="height: 285px;" class="me-n7">
                        <div id="revenue-forecast"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <!-- -------------------------------------------- -->
            <!-- Your Performance -->
            <!-- -------------------------------------------- -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Your Performance</h5>
                    <p class="card-subtitle mb-0 lh-base">Last check on 25 february</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="vstack gap-9 mt-2">
                                <div class="hstack align-items-center gap-3">
                                    <div
                                        class="d-flex align-items-center justify-content-center round-48 rounded bg-primary-subtle flex-shrink-0">
                                        <iconify-icon icon="solar:shop-2-linear" class="fs-7 text-primary"></iconify-icon>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">64 new orders</h6>
                                        <span>Processing</span>
                                    </div>

                                </div>
                                <div class="hstack align-items-center gap-3">
                                    <div
                                        class="d-flex align-items-center justify-content-center round-48 rounded bg-danger-subtle">
                                        <iconify-icon icon="solar:filters-outline" class="fs-7 text-danger"></iconify-icon>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">4 orders</h6>
                                        <span>On hold</span>
                                    </div>

                                </div>
                                <div class="hstack align-items-center gap-3">
                                    <div
                                        class="d-flex align-items-center justify-content-center round-48 rounded bg-secondary-subtle">
                                        <iconify-icon icon="solar:pills-3-linear"
                                            class="fs-7 text-secondary"></iconify-icon>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">12 orders</h6>
                                        <span>Delivered</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center mt-sm-n7">
                                <div id="your-preformance"></div>
                                <h2 class="fs-8">275</h2>
                                <p class="mb-0">
                                    Learn insigs how to manage all aspects of your
                                    startup.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row">
                <div class="col-md-6">
                    <!-- -------------------------------------------- -->
                    <!-- Customers -->
                    <!-- -------------------------------------------- -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <h5 class="card-title fw-semibold">Customers</h5>
                                    <p class="card-subtitle mb-0">Last 7 days</p>
                                </div>
                                <span class="fs-11 text-success fw-semibold lh-lg">+26.5%</span>
                            </div>
                            <div class="py-4 my-1">
                                <div id="customers-area"></div>
                            </div>
                            <div class="d-flex flex-column align-items-center gap-2 w-100 mt-3">
                                <div class="d-flex align-items-center gap-2 w-100">
                                    <span class="d-block flex-shrink-0 round-8 bg-primary rounded-circle"></span>
                                    <h6 class="fs-3 fw-normal text-muted mb-0">April 07 - April 14</h6>
                                    <h6 class="fs-3 fw-normal mb-0 ms-auto text-muted">6,380</h6>
                                </div>
                                <div class="d-flex align-items-center gap-2 w-100">
                                    <span class="d-block flex-shrink-0 round-8 bg-light rounded-circle"></span>
                                    <h6 class="fs-3 fw-normal text-muted mb-0">Last Week</h6>
                                    <h6 class="fs-3 fw-normal mb-0 ms-auto text-muted">4,298</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- -------------------------------------------- -->
                    <!-- Sales Overview -->
                    <!-- -------------------------------------------- -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Sales Overview</h5>
                            <p class="card-subtitle mb-1">Last 7 days</p>

                            <div class="position-relative labels-chart">
                                <span class="fs-11 label-1">0%</span>
                                <span class="fs-11 label-2">25%</span>
                                <span class="fs-11 label-3">50%</span>
                                <span class="fs-11 label-4">75%</span>
                                <div id="sales-overview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8">
            <!-- -------------------------------------------- -->
            <!-- Revenue by Product -->
            <!-- -------------------------------------------- -->
            <div class="card mb-lg-0">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-3 mb-9 justify-content-between align-items-center">
                        <h5 class="card-title fw-semibold mb-0">Revenue by Product</h5>
                        <select class="form-select w-auto fw-semibold">
                            <option value="1">Sep 2024</option>
                            <option value="2">Oct 2024</option>
                            <option value="3">Nov 2024</option>
                        </select>
                    </div>

                    <div class="table-responsive">
                        <ul class="nav nav-tabs theme-tab gap-3 flex-nowrap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="index.html#app" role="tab">
                                    <div class="hstack gap-2">
                                        <iconify-icon icon="solar:widget-linear" class="fs-4"></iconify-icon>
                                        <span>App</span>
                                    </div>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="index.html#mobile" role="tab">
                                    <div class="hstack gap-2">
                                        <iconify-icon icon="solar:smartphone-line-duotone" class="fs-4"></iconify-icon>
                                        <span>Mobile</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="index.html#saas" role="tab">
                                    <div class="hstack gap-2">
                                        <iconify-icon icon="solar:calculator-linear" class="fs-4"></iconify-icon>
                                        <span>SaaS</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="index.html#other" role="tab">
                                    <div class="hstack gap-2">
                                        <iconify-icon icon="solar:folder-open-outline" class="fs-4"></iconify-icon>
                                        <span>Others</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content mb-n3">
                        <div class="tab-pane active" id="app" role="tabpanel">
                            <div class="table-responsive" data-simplebar>
                                <table class="table text-nowrap align-middle table-custom mb-0 last-items-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-normal ps-0">Assigned
                                            </th>
                                            <th scope="col" class="fw-normal">Progress</th>
                                            <th scope="col" class="fw-normal">Priority</th>
                                            <th scope="col" class="fw-normal">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-1.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Minecraf App</h6>
                                                        <span>Jason Roy</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Low</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-2.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Web App Project</h6>
                                                        <span>Mathew Flintoff</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">Medium</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-3.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Modernize Dashboard</h6>
                                                        <span>Anil Kumar</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-subtle text-secondary">Very
                                                    High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-4.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Dashboard Co</h6>
                                                        <span>George Cruize</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger-subtle text-danger">High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="mobile" role="tabpanel">
                            <div class="table-responsive" data-simplebar>
                                <table class="table text-nowrap align-middle table-custom mb-0 last-items-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-normal ps-0">Assigned
                                            </th>
                                            <th scope="col" class="fw-normal">Progress</th>
                                            <th scope="col" class="fw-normal">Priority</th>
                                            <th scope="col" class="fw-normal">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-2.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Web App Project</h6>
                                                        <span>Mathew Flintoff</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">Medium</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-3.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Modernize Dashboard</h6>
                                                        <span>Anil Kumar</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-subtle text-secondary">Very
                                                    High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-1.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Minecraf App</h6>
                                                        <span>Jason Roy</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Low</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-4.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Dashboard Co</h6>
                                                        <span>George Cruize</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger-subtle text-danger">High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="saas" role="tabpanel">
                            <div class="table-responsive" data-simplebar>
                                <table class="table text-nowrap align-middle table-custom mb-0 last-items-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-normal ps-0">Assigned
                                            </th>
                                            <th scope="col" class="fw-normal">Progress</th>
                                            <th scope="col" class="fw-normal">Priority</th>
                                            <th scope="col" class="fw-normal">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-2.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Web App Project</h6>
                                                        <span>Mathew Flintoff</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">Medium</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-1.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Minecraf App</h6>
                                                        <span>Jason Roy</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Low</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-3.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Modernize Dashboard</h6>
                                                        <span>Anil Kumar</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-subtle text-secondary">Very
                                                    High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-4.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Dashboard Co</h6>
                                                        <span>George Cruize</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger-subtle text-danger">High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="other" role="tabpanel">
                            <div class="table-responsive" data-simplebar>
                                <table class="table text-nowrap align-middle table-custom mb-0 last-items-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-normal ps-0">Assigned
                                            </th>
                                            <th scope="col" class="fw-normal">Progress</th>
                                            <th scope="col" class="fw-normal">Priority</th>
                                            <th scope="col" class="fw-normal">Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-1.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Minecraf App</h6>
                                                        <span>Jason Roy</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-success-subtle text-success">Low</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-3.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Modernize Dashboard</h6>
                                                        <span>Anil Kumar</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-subtle text-secondary">Very
                                                    High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-2.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Web App Project</h6>
                                                        <span>Mathew Flintoff</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning-subtle text-warning">Medium</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="ps-0">
                                                <div class="d-flex align-items-center gap-6">
                                                    <img src="{{ asset('images/admin/products/dash-prd-4.jpg') }}"
                                                        alt="prd1" width="48" class="rounded" loading="lazy">
                                                    <div>
                                                        <h6 class="mb-0">Dashboard Co</h6>
                                                        <span>George Cruize</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span>73.2%</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger-subtle text-danger">High</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-light">$3.5k</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- -------------------------------------------- -->
            <!-- Total settlements -->
            <!-- -------------------------------------------- -->
            <div class="card bg-primary-subtle mb-0">
                <div class="card-body">
                    <div class="hstack align-items-center gap-3 mb-4">
                        <span
                            class="d-flex align-items-center justify-content-center round-48 bg-white rounded flex-shrink-0">
                            <iconify-icon icon="solar:box-linear" class="fs-7 text-primary"></iconify-icon>
                        </span>
                        <div>
                            <p class="mb-1 text-dark-light">Total settlements</p>
                            <h4 class="mb-0 fw-bolder">$122,580</h5>
                        </div>
                    </div>
                    <div style="height: 278px;">
                        <div id="settlements"></div>
                    </div>
                    <div class="row mt-4 mb-2">
                        <div class="col-md-6 text-center">
                            <p class="mb-1 text-dark-light lh-lg">Total balance</p>
                            <h4 class="mb-0 text-nowrap">$122,580</h4>
                        </div>
                        <div class="col-md-6 text-center mt-3 mt-md-0">
                            <p class="mb-1 text-dark-light lh-lg">Withdrawals</p>
                            <h4 class="mb-0">$31,640</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin/dashboards/dashboard1.js') }}" ></script>
@endpush
