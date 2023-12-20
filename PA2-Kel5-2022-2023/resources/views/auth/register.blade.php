<x-auth-layout>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center"
                    src="{{ asset('assets/admin/assets/images/login/1.jpg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <form class="theme-form login-form" method="post" action="{{ url('/do_register') }}">
                        @csrf
                        <h4>Create your account</h4>
                        <h6>Enter your personal details to create account</h6>
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                                <input class="form-control @error('name')is-invalid @enderror" type="text"
                                    name="name" id="name" placeholder="Your name" autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control @error('email')is-invalid @enderror" type="email"
                                    id="email" name="email" placeholder="Test@gmail.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nohp">Phone Number</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-phone"></i></span>
                                <input class="form-control @error('nohp')is-invalid @enderror" type="text"
                                    id="nohp" name="nohp" placeholder="628xxxxxxxxxx">
                                @error('nohp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control @error('password')is-invalid @enderror" type="password"
                                    id="password" name="password" name="" placeholder="*********">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="show-hide"><span class="show"> </span></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                        </div>


                        <p>Already have an account?<a class="ms-2" href="{{ url('/login') }}">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</x-auth-layout>
