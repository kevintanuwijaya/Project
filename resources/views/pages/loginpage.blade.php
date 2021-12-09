@extends('layout')
@section('title','Login Page')
@section('style')
    <style>
        .login-page{
            height: 72vh;
        }

        .login-title{
            margin-bottom: 2vh;
        }

        .form{
            background-color: rgb(248, 249, 250);
        }

        .mb-3{
            width: 20vw;
            height: 7vh;
        }

        .form-control{
            height: 5vh;
        }

        .errorLabel{
            color: red;
        }

    </style>
@endsection

@section('main')
    <div class="login-page d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">
            <h2 class="login-title">Welcome Back</h2>

            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input name="email" placeholder="Email" type="email" class="form-control" id="floatingEmail" aria-describedby="emailHelp">
                    <label for="floatingEmail">Email</label>
                    <div class="errorLabel">
                        @error('email')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" placeholder="Password" type="password" class="form-control" id="floatingPassword">
                    <label for="floatingPassword">Password</label>
                    <div class="errorLabel">
                        @error('password')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                @if (session()->has('errorLogin'))
                    <span class="errorLabel">
                        {{ session()->get('errorLogin') }}
                    </span>
                @endif
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
