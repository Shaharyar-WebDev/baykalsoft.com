@section('title', 'Home')

@extends('layout.shop')

@section('content')


    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <a href="index.html" class="breadcrumb__item-link">Home</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--parent">
                            <a href="" class="breadcrumb__item-link">Breadcrumb</a>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">Current Page</span>
                        </li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <h1 class="block-header__title">Checkout</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="alert alert-lg alert-primary">Returning customer? <a href="">Click here to login</a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Billing details</h3>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-first-name">First Name</label>
                                    <input type="text" class="form-control" id="checkout-first-name"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-last-name">Last Name</label>
                                    <input type="text" class="form-control" id="checkout-last-name"
                                        placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Company Name <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="checkout-company-name"
                                    placeholder="Company Name">
                            </div>
                            <div class="form-group">
                                <label for="checkout-country">Country</label>
                                <select id="checkout-country" class="form-control form-control-select2">
                                    <option>Select a country...</option>
                                    <option>United States</option>
                                    <option>Russia</option>
                                    <option>Italy</option>
                                    <option>France</option>
                                    <option>Ukraine</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="checkout-street-address">Street Address</label>
                                <input type="text" class="form-control" id="checkout-street-address"
                                    placeholder="Street Address">
                            </div>
                            <div class="form-group">
                                <label for="checkout-address">Apartment, suite, unit etc. <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="checkout-address">
                            </div>
                            <div class="form-group">
                                <label for="checkout-city">Town / City</label>
                                <input type="text" class="form-control" id="checkout-city">
                            </div>
                            <div class="form-group">
                                <label for="checkout-state">State / County</label>
                                <input type="text" class="form-control" id="checkout-state">
                            </div>
                            <div class="form-group">
                                <label for="checkout-postcode">Postcode / ZIP</label>
                                <input type="text" class="form-control" id="checkout-postcode">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="checkout-email">Email address</label>
                                    <input type="email" class="form-control" id="checkout-email"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="checkout-phone">Phone</label>
                                    <input type="text" class="form-control" id="checkout-phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <span class="input-check form-check-input">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="checkout-create-account">
                                            <span class="input-check__box"></span>
                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-create-account">Create an
                                        account?</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Shipping Details</h3>
                            <div class="form-group">
                                <div class="form-check">
                                    <span class="input-check form-check-input">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox"
                                                id="checkout-different-address">
                                            <span class="input-check__box"></span>
                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-different-address">Ship to a different
                                        address?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="checkout-comment">Order notes <span
                                        class="text-muted">(Optional)</span></label>
                                <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Your Order</h3>
                            <table class="checkout__totals">
                                <thead class="checkout__totals-header">
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="checkout__totals-products">
                                    <tr>
                                        <td>Glossy Gray 19" Aluminium Wheel AR-19 × 2</td>
                                        <td>$1398.00</td>
                                    </tr>
                                    <tr>
                                        <td>Brandix Brake Kit BDX-750Z370-S × 1</td>
                                        <td>$849.00</td>
                                    </tr>
                                    <tr>
                                        <td>Twin Exhaust Pipe From Brandix Z54 × 3</td>
                                        <td>$3630.00</td>
                                    </tr>
                                </tbody>
                                <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>$5877.00</td>
                                    </tr>
                                    <tr>
                                        <th>Store Credit</th>
                                        <td>$-20.00</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>$25.00</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td>$5882.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                    <li class="payment-methods__item payment-methods__item--active">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method"
                                                        type="radio" checked>
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">Direct bank transfer</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Make your payment directly into our bank account. Please use your Order ID
                                                as the payment
                                                reference. Your order will not be shipped until the funds have cleared in
                                                our account.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method"
                                                        type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">Check payments</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Please send a check to Store Name, Store Street, Store Town, Store State /
                                                County, Store Postcode.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method"
                                                        type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">Cash on delivery</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Pay with cash upon delivery.
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method"
                                                        type="radio">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">PayPal</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                                account.
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__agree form-group">
                                <div class="form-check">
                                    <span class="input-check form-check-input">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="checkout-terms">
                                            <span class="input-check__box"></span>
                                            <span class="input-check__icon"><svg width="9px" height="7px">
                                                    <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                    <label class="form-check-label" for="checkout-terms">
                                        I have read and agree to the website <a target="_blank" href="terms.html">terms
                                            and conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>

@endsection
