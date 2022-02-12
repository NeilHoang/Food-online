<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Login</title>
    <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js')}}" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="text-danger">{{$error}}</p>
                                    @endforeach
                                @endif
                                @if(session()->has('msg'))
                                    <div class="text-danger">
                                        {{ session()->get('msg') }}
                                        @endif
                                        <form method="POST" action="{{route('admin.login')}}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="username" />
                                                <label for="inputName">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" name="password"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            {{--                                    <div class="form-check mb-3">--}}
                                            {{--                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />--}}
                                            {{--                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>--}}
                                            {{--                                    </div>--}}
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-outline-primary"> Login </button>
                                            </div>
                                        </form>
                                    </div>
                                    {{--                            <div class="card-footer text-center py-3">--}}
                                    {{--                                <div class="small"><a href="register.html">Need an account? Sign up!</a></div>--}}
                                    {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('admin/js/scripts.js')}}"></script>
</body>
</html>
