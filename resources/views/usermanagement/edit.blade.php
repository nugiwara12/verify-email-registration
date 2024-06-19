@extends('layouts.app1')

@section('title', 'Edit Users')

@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/edituser.css') }}">
</head>

<body>

    <form action="{{ route('usermanagement.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group form-column">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $users->name }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $users->email }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="telephone">Telephone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $users->telephone }}"
                    required>
                @error('telephone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address1">Address 1</label>
                <input type="text" name="address1" id="address1" class="form-control" value="{{ $users->address1 }}"
                    required>
                @error('address1')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address2">Address 2</label>
                <input type="text" name="address1" id="address1" class="form-control" value="{{ $users->address2 }}"
                    required>
                @error('address2')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address2">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ $users->city }}" required>
                @error('city')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address2">State/Province</label>
                <input type="text" name="state" id="state" class="form-control" value="{{ $users->state }}" required>
                @error('state')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address2">Zip/Post Code</label>
                <input type="text" name="zip" id="zip" class="form-control" value="{{ $users->zip }}" required>
                @error('zip')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-column">
                <label for="address2">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $users->username }}"
                    required>
                @error('username')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Other input fields -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('usermanagement') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>

</body>

</html>
<hr />

@endsection