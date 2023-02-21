@include('layouts.include.head')

<body>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control form-control-lg"
                                        value="{{ old('username') }}" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        value="{{ old('username') }}" />
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
