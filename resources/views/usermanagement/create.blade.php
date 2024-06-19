@extends('layouts.app1')

@section('title', 'Create Users Account')

@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/css/adduser.css') }}">

</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="title-tag">Register</h2>

            <div class="error-container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <form action="{{ route('usermanagement.store') }}" method="POST" class="user">
                @csrf
                <div class="form-row">
                    <div class="form-group form-column">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                            required>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="telephone">Telephone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control"
                            value="{{ old('telephone') }}" required>
                        @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="address1">Address 1</label>
                        <input type="text" name="address1" id="address1" class="form-control"
                            value="{{ old('address1') }}" required>
                        @if ($errors->has('address1'))
                        <span class="text-danger">{{ $errors->first('address1') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group form-column">
                        <label for="address2">Address 2</label>
                        <input type="text" name="address2" id="address2" class="form-control"
                            value="{{ old('address2') }}" required>
                        @if ($errors->has('address2'))
                        <span class="text-danger">{{ $errors->first('address2') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}"
                            required>
                        @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group form-column">
                        <label for="state">State/Province</label>
                        <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}"
                            required>
                        @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="zip">Zip/Post Code</label>
                        <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}" required>
                        @if ($errors->has('zip'))
                        <span class="text-danger">{{ $errors->first('zip') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group form-column">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                        <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group form-column">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group form-column">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection