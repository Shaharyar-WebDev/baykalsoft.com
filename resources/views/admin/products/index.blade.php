@section('title', 'Admin - Products')

@extends('layout.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endpush

@section('content')

    <div class="card card-body py-3">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-space-between">
                    <h4 class="mb-4 mb-sm-0 card-title">Datatable Api</h4>
                    <nav aria-label="breadcrumb" class="ms-auto">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item d-flex align-items-center">
                                <a class="text-muted text-decoration-none d-flex" href="index.html">
                                    <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                    Datatable Api
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <x-admin.ui.table tableId="table_products" route="get_products.index" perPage="5" :headers="[
        'Stok Kodu' => 'Stok Kodu',
        'Stok Adı' => 'Stok Adı',
        'Özel Kod' => 'Özel Kod',
        'Şube Kodu' => 'Şube Kodu',
        'Stok Grup Kodu' => 'Stok Grup Kodu',
        'Üretici Kodu' => 'Üretici Kodu',
        'Birim Seti Ref' => 'Birim Seti Ref',
        'Mevcut Adet' => 'Mevcut Adet',
    ]" />

    <x-admin.ui.table route="admin.ele" perPage="10" :headers="[
        'id' => 'Id',
        'name' => 'Name',
        'category' => 'Category',
        'price' => 'Price',
        'stock' => 'Stock',
    ]" />


@endsection

@push('scripts-hp')
    <script src="{{ asset('js/admin/vendor.min.js') }}"></script>
    <script src="{{ asset('libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush
