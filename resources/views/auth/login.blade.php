<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
</head>
<body>
    <div class="login-container">
        <div class="login-sidebar">
            <div class="d-flex justify-content-center mt-5 pt-5 px-4">
                <div class="text-center text-white">
                    <img src="./images/mainlogo.png"
                           alt="logo"
                           style="width: 100px;height: 100px;"
                    />
                    <h3 class="mt-4">
                        Asset Manager
                    </h3>
                    <p class="text-center ">
                        An asset management system.
                    </p>

                </div>
            </div>
        </div>
        <div class="login-main-content">
            <div class="px-4 d-flex justify-content-center mt-5 pt-5">
                <div style="min-width: 300px">
                    <h1 class="text-primary text-center">Asset Manager</h1>
                    <p class="my-4 text-center">
                        Login
                    </p>
                    <form class="mt-8" action="{{ route('login')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label htmlFor="username">Email</label>
                            <input type="text"
                                   class="form-control "
                                   name="email"
                                   placeholder="Enter your Email"/>
                        </div>
                        <div>
                            <label htmlFor="password">Password</label>
                            <input type="password"
                                   class="form-control "
                                   name="password"
                                   placeholder="Password"/>
                        </div>
                        <div class="text-center my-4">
                            <button type="submit" 
                                    class="btn btn-primary
                                                 w-full py-2 text-white rounded-sm"
                                    >   
                                     Sign In
                            </button>
                        </div>
                        <hr class="my-0 py-1"/>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>