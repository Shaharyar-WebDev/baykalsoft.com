@section('title', 'Home')

@extends('layout.shop')

@section('content')

    <x-shop.layouts.account-dashboard>

        <x-shop.dashboard-sidebar />

        <div class="col-12 col-lg-9 mt-4 mt-lg-0">
            <div class="dashboard">
                <div class="dashboard__profile card profile-card">
                    <div class="card-body profile-card__body">
                        <div class="profile-card__avatar">
                            {{-- <img loading="lazy"
 src="images/avatars/avatar-4.jpg" alt=""> --}}
                        </div>
                        <div class="profile-card__name">Helena Garcia</div>
                        <div class="profile-card__email">red-parts@example.com</div>
                        <div class="profile-card__edit">
                            <a href="account-profile.html" class="btn btn-secondary btn-sm">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="dashboard__address card address-card address-card--featured">
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
                            <a href="">Edit Address</a>
                        </div>
                    </div>
                </div>
                <div class="dashboard__orders card">
                    <div class="card-header">
                        <h5>Recent Orders</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-table">
                        <div class="table-responsive-sm">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="account-order-details.html">#8132</a></td>
                                        <td>02 April, 2019</td>
                                        <td>Pending</td>
                                        <td>$2,719.00 for 5 item(s)</td>
                                    </tr>
                                    <tr>
                                        <td><a href="account-order-details.html">#7592</a></td>
                                        <td>28 March, 2019</td>
                                        <td>Pending</td>
                                        <td>$374.00 for 3 item(s)</td>
                                    </tr>
                                    <tr>
                                        <td><a href="account-order-details.html">#7192</a></td>
                                        <td>15 March, 2019</td>
                                        <td>Shipped</td>
                                        <td>$791.00 for 4 item(s)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-shop.layouts.account-dashboard>

@endsection
