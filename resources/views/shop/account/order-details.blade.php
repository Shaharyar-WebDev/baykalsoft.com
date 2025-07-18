@section('title', 'Home')

@extends('layout.shop')

@section('content')

    <x-shop.layouts.account-dashboard>

        <x-shop.dashboard-sidebar />

         <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                            <div class="card">
                                <div class="order-header">
                                    <div class="order-header__actions">
                                        <a href="account-orders.html" class="btn btn-xs btn-secondary">Back to list</a>
                                    </div>
                                    <h5 class="order-header__title">Order #9478</h5>
                                    <div class="order-header__subtitle">
                                        Was placed on <mark>Oct 19, 2020</mark> and is currently <mark>Pending</mark>.
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <td>Brandix Spark Plug Kit ASR-400 × 2</td>
                                                    <td>$38.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Brandix Brake Kit BDX-750Z370-S × 1</td>
                                                    <td>$224.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Left Headlight Of Brandix Z54 × 3</td>
                                                    <td>$1047.00</td>
                                                </tr>
                                            </tbody>
                                            <tbody class="card-table__body card-table__body--merge-rows">
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>$1309.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$25.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>$262.00</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>$1596.00</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 no-gutters mx-n2">
                                <div class="col-sm-6 col-12 px-2">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Shipping Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">Ryan Ford</div>
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
                                                <div class="address-card__row-content">stroyka@example.com</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 px-2 mt-sm-0 mt-3">
                                    <div class="card address-card address-card--featured">
                                        <div class="address-card__badge tag-badge tag-badge--theme">
                                            Billing Address
                                        </div>
                                        <div class="address-card__body">
                                            <div class="address-card__name">Ryan Ford</div>
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
                                                <div class="address-card__row-content">stroyka@example.com</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    </x-shop.layouts.account-dashboard>

@endsection
