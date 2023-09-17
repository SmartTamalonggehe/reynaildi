@extends('layouts.simple')

@section('css')
    <style>
        #intro {
            background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
            height: 100vh;
        }
    </style>
@endsection

@section('content')
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container">
                <div>
                    <h3 class="text-white text-center">Website Dinas Perumahan Rakyat dan Kawasan Permukimann Kab. Tambrauw</h3>
                    <h4 class="text-white text-center">Silahkan melakukan login</h4>
                </div>
                {{-- form --}}
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong p-5 js-validation-signin"
                            action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="login_email">Email</label>
                                <input required type="email" id="login_email" name="email" class="form-control" />
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="login_password">Password</label>
                                <input required type="password" id="login_password" name="password" class="form-control" />
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
@endsection
