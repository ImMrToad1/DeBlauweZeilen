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
                <form method="POST"
                action="{{ route('login.store') }}"
                >
                    @csrf
                    <div class="card" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                email:
                                <input type="text" id="email" name="email" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Password:
                                <input type="password" id="password" name="password" class="form-control" required>
                            </li>
                            <li class="list-group-item">
                                Confirm Password:
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                            </li>
                            <li class="list-group-item text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
