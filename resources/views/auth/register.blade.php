@extends('layouts.app')

@section('title', 'Register | ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form method="POST" action="{{ route('register.create') }}">
                    @csrf
                    <div class="card" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                firstname:
                                <input type="text" id="first_name" name="first_name" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                lastname:
                                <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                email:
                                <input type="text" id="email" name="email" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Postal Code:
                                <input type="text" id="postalcode" name="postalcode" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Street Name:
                                <input type="text" id="street_name" name="street_name" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                House Number:
                                <input type="text" id="house_number" name="house_number" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Phone Number:
                                <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Experience Level:
                                <select name="experience" id="experience" class="form-control">
                                    <option value="beginner">Beginner</option>
                                    <option value="intermediate">Intermediate</option>
                                    <option value="expert">Expert</option>
                                    <option value="master">Master</option>
                                </select>
                            </li>
                            <li class="list-group-item">
                                Comment (optional):
                                <input type="text" id="comment" name="comment" class="form-control">
                            </li>
                            <li class="list-group-item">
                                Password:
                                <input type="password" id="password" name="password" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Confirm Password:
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                    required>
                            </li>
                            <li class="list-group-item text-center">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
