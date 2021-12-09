@extends('layout')
@section('title','Register Page')
@section('style')
    <style>
        .login-title{
            margin-bottom: 2vh;
        }

        .form{
            background-color: rgb(248, 249, 250);
        }

        .mb-3{
            width: 60vw;
            height: 7vh;
        }

        .gender-form{
            margin: 0 2vw 0 0;
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
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column m-4 p-4 form">
            <h2 class="login-title">Join With Us</h2>
            <form method="POST" action="/register" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input name="fullname" placeholder="Full Name" type="text" id="floatingFullName" class="form-control" value="{{old('fullname')}}">
                    <label for="floatingFullName">Full Name</label>
                    <div class="errorLabel">
                        @error('fullname')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <span>Gender</span>
                <div class="mb-3 form-check d-flex">
                    <div class="gender-form">
                        <input type="radio" name="gender" class="form-check-input" id="exampleCheck1" value="Male" @if(old('gender') == 'Male') checked @endif>
                        <label class="form-check-label" for="exampleCheck1">Male</label>
                    </div>
                    <div class="gender-form">
                        <input type="radio" name="gender" class="form-check-input" id="exampleCheck1" value="Female" @if(old('gender') == 'Female') checked @endif>
                        <label class="form-check-label" for="exampleCheck1">Female</label>
                    </div>
                    <div class="errorLabel">
                        @error('gender')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="address" placeholder="Address" class="form-control" id="floatingAddress" rows="5">{{old('address')}}</textarea>
                    <label for="floatingAddress">Address</label>
                    <div class="errorLabel">
                        @error('address')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="registerEmail" placeholder="Email" type="email" class="form-control" id="floatingEmail" aria-describedby="emailHelp" value="{{old('registerEmail')}}">
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
                    <input name="password" placeholder="Password" type="password" class="form-control" id="floatingPassword" value="{{old('password')}}">
                    <label for="floatingPassword">Password</label>
                    <div class="errorLabel">
                        @error('password')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="confirm-password" placeholder="Confirm Password" type="password" class="form-control" id="floatingConfirmPassword" value="{{old('confirm-password')}}">
                    <label for="floatingConfirmPassword">Confirm Password</label>
                    <div class="errorLabel">
                        @error('confirm-password')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input name="agree" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I agree with terms & conditions</label>
                    <div class="errorLabel">
                        @error('agree')
                            <span>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-warning">Register Now</button>
                </div>
            </form>
        </div>
    </div>

@endsection
