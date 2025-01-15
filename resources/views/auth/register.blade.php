@extends('homepage.template.apphomepage')

@section('title', 'TrackMyShipment - Register')

@section('content')

<main id="main">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 " data-aos="fade-right" data-aos-delay="100">
                    <img src="https://images2.imgbox.com/a3/f3/O4XHeASX_o.jpg" class="img-fluid" alt="Sample image" width="100%" height="100%">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 " data-aos="fade-left" data-aos-delay="110">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Fullname input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="form-outline mb-4">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-outline mb-4">
                            <input id="password-confirm" placeholder="confirm Password" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                          <div class="form-check">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="TermService">
                              I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                            </label>
                          </div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                {{ __('Register') }}
                            </button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Have already an account? <a href="{{url('login')}}" class="link-danger"><u>Login here</u></a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection