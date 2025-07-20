@section('title', __('pages.pages.add.title'))

@extends('layout.admin')

@section('content')

    <x-admin.dashboard.breadcrumb label="{{ __('pages.pages.index.title') }}" :breadcrumbs="[
        [
            'label' => __('pages.pages.index.title'),
            'url' => route('admin.pages.index'),
        ],
    ]" />

    <x-admin.ui.table :actions="true" updateRoute="admin.pages.edit" deleteRoute="admin.pages.destroy" tableId="table_pages" route="admin.pages.index" perPage="5" :headers="[
        'slug' => __('table.pages.slug'),
        'title' => __('table.pages.title'),
        'content' => __('table.pages.content'),
        'meta_title' => __('table.pages.meta_title'),
        'meta_description' => __('table.pages.meta_desc'),
        'status' => __('table.pages.status'),
        'created_at' => __('table.pages.created_at'),
    ]" />

@endsection
