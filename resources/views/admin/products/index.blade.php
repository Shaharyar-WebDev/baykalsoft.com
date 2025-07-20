@section('title', 'Admin - Products')

@section('breadcrumb', 'Admin - Products')

@extends('layout.admin')

@section('content')

    <x-admin.dashboard.breadcrumb label="{{ __('pages.products.title') }}" :breadcrumbs="[
        [
            'label' => __('pages.products.title'),
            'url' => route('admin.products'),
        ],
    ]" />

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

    {{-- <x-admin.ui.table route="admin.ele" perPage="10" :headers="[
        'id' => 'Id',
        'name' => 'Name',
        'category' => 'Category',
        'price' => 'Price',
        'stock' => 'Stock',
    ]" /> --}}

    {{-- <x-admin.ui.table route="admin.orders" tableId="table_orders" perPage="10" :headers="[
        'id' => 'ID',
        'sku' => 'SKU',
        'name' => 'Name',
        // 'category' => 'Category',
        'price' => 'Price',
        // 'stock' => 'Stock',
        'rating' => 'Rating',
        // 'status' => 'Status',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ]" /> --}}


@endsection

@push('scripts-hp')
    <script src="{{ asset('js/admin/vendor.min.js') }}"></script>
@endpush
