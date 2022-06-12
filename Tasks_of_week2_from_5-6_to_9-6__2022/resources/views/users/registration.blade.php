@extends('common_file.layout')
@section('content')
    <section class="vh-100" style="background-color: #eee;">
        @if (Session::get('success'))
        <div class="alert alert-success text-center fw-bolder" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('failure'))
        <div class="alert alert-danger text-center fw-bolder" role="alert">
            {{ Session::get('failure') }}
        </div>
        @endif
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                                <input type="text" name='name' value="{{ old('name') }}" id="form3Example1c" class="form-control" />
                                                @error('name')
                                                    <div class="text-danger fw-bolder">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                <input type="email" name="email" id="form3Example3c" value="{{ old('email') }}"class="form-control" />
                                                @error('email')
                                                <div class="text-danger fw-bolder">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <input type="password" name="password" id="form3Example4c" class="form-control" />
                                                @error('password')
                                                <div class="text-danger fw-bolder">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Repeat your
                                                    password</label>
                                                <input type="password" name="password_confirmation" id="form3Example4cd" class="form-control" />
                                                @error('password_confirmation')
                                                <div class="text-danger fw-bolder">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="text-center text-lg-start mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{ url('/loginUser') }}"
                                                class="link-danger">Login</a></p>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
