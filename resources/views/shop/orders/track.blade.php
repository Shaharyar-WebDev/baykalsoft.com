@section('title', 'Home')

@extends('layout.shop')

@section('content')

    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card ml-md-3 mr-md-3">
                        <div class="card-body card-body--padding--2">
                            <h1 class="card-title card-title--lg">Track Order</h1>
                            <p class="mb-4">
                                Enter the order ID and email address that was used to create the order, and then click the
                                track button.
                            </p>
                            <form>
                                <div class="form-group">
                                    <label for="track-order-id">Order ID</label>
                                    <input id="track-order-id" type="text" class="form-control" placeholder="Order ID">
                                </div>
                                <div class="form-group">
                                    <label for="track-email">Email address</label>
                                    <input id="track-email" type="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group pt-4 mb-1">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Track</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>

@endsection
