@section('title', 'Home')

@extends('layout.shop')

@section('content')


    <div class="block-space block-space--layout--spaceship-ledge-height"></div>
     <div class="block">
        <div class="container">
            <div class="not-found">
                <div class="not-found__404">
                     Uh-oh! Error 500
                </div>
                <div class="not-found__content">
                    <h1 class="not-found__title">Internal Server Error</h1>
                    <p class="not-found__text">
                        Something went wrong on our end.<br>
                     We're working to fix it as soon as possible.
                    </p>
                    <form class="not-found__search">
                        <input type="text" class="not-found__search-input form-control" placeholder="Search Query...">
                        <button type="submit" class="not-found__search-button btn btn-primary">Search</button>
                    </form>
                    <p class="not-found__text">
                        You can try refreshing the page or come back later.
                    </p>
                    <a class="btn btn-secondary btn-sm" href="index.html">Go To Home Page</a>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>

    @endsection

