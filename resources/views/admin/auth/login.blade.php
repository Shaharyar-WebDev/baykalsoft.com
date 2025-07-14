@section('title', 'Login')

@extends('layout.admin-auth')

@section('content')

    <div class="position-relative overflow-hidden auth-bg min-vh-100 w-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100 my-5 my-xl-0">
                <div class="col-md-6 col-lg-4 d-flex flex-column justify-content-center">
                    <div class="card mb-0 bg-body auth-login m-auto w-100">
                        <div class="row gx-0">
                            <div>
                                <div class="row justify-content-center py-4">
                                    <div class="col-lg-11">
                                        <div class="card-body">
                                            <div class="text-center mb-4">
                                                <img src="{{ asset('images/admin/logos/favicon.png') }}" width="200px"
                                                    alt="">
                                            </div>
                                            <div class="position-relative text-center my-4">
                                                <span
                                                    class="w-100 position-absolute top-50 start-50 translate-middle"></span>
                                            </div>
                                            <form action="{{ route('admin.login') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1"
                                                        class="form-label">{{ __('auth.email_label') }}</label>
                                                    <input type="email" name="email" class="form-control mb-2"
                                                        value="{{ old('email') }}" id="exampleInputEmail1"
                                                        placeholder="{{ __('auth.email_placeholder') }}"
                                                        aria-describedby="emailHelp" required>
                                                    {{-- @error('email')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                                <div class="mb-4">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <label for="exampleInputPassword1"
                                                            class="form-label">{{ __('auth.password_label') }}</label>
                                                        {{-- <a class="text-primary link-dark fs-2"
                                                            href="authentication-forgot-password2.html">Forgot
                                                            Password ?</a> --}}
                                                    </div>
                                                    <input type="password" name="password" class="form-control mb-2"
                                                        id="exampleInputPassword1"
                                                        placeholder="{{ __('auth.password_placeholder') }}" required>
                                                    {{-- @error('password')
                                                        <span class="text-danger">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <div class="form-check">
                                                        <input name="remember_me" class="form-check-input primary"
                                                            type="checkbox" id="flexCheckChecked"
                                                            {{ old('remember_me') ? 'checked' : '' }}>
                                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                                            {{ __('auth.remember_me_label') }}
                                                        </label>
                                                        {{-- @error('remember_me')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror --}}
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-dark w-100 py-8 mb-4 rounded-1">{{ __('auth.login_button') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @push('scripts')
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    @foreach ($errors->all() as $error)
                        toastr.error("{{ $error }}", "Error", {
                            closeButton: true,
                        });
                    @endforeach
                });
            </script>
        @endif
    @endpush
