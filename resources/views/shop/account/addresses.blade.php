@section('title', 'Home')

@extends('layout.shop')

@section('content')

    <x-shop.layouts.account-dashboard>

        <x-shop.dashboard-sidebar />

          <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="addresses-list">
                                <a href="" class="addresses-list__item addresses-list__item--new">
                                    <div class="addresses-list__plus"></div>
                                    <div class="btn btn-secondary btn-sm">Add New</div>
                                </a>
                                <div class="addresses-list__divider"></div>
                                <div class="addresses-list__item card address-card">
                                    <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                                    <div class="address-card__body">
                                        <div class="address-card__name">Helena Garcia</div>
                                        <div class="address-card__row">
                                            Random Federation<br>
                                            115302, Moscow<br>
                                            ul. Varshavskaya, 15-2-178
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content">38 972 588-42-36</div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content">helena@example.com</div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="">Edit</a>&nbsp;&nbsp;
                                            <a href="">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="addresses-list__divider"></div>
                                <div class="addresses-list__item card address-card">
                                    <div class="address-card__body">
                                        <div class="address-card__name">Jupiter Saturnov</div>
                                        <div class="address-card__row">
                                            RandomLand<br>
                                            4b4f53, MarsGrad<br>
                                            Sun Orbit, 43.3241-85.239
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Phone Number</div>
                                            <div class="address-card__row-content">ZX 971 972-57-26</div>
                                        </div>
                                        <div class="address-card__row">
                                            <div class="address-card__row-title">Email Address</div>
                                            <div class="address-card__row-content">jupiter@example.com</div>
                                        </div>
                                        <div class="address-card__footer">
                                            <a href="">Edit</a>&nbsp;&nbsp;
                                            <a href="">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="addresses-list__divider"></div>
                            </div>
                        </div>

    </x-shop.layouts.account-dashboard>

@endsection
