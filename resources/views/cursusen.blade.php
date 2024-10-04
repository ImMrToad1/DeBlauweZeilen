@extends('layouts.app')

@section('title', 'Cursus | ' . config('app.name'))

@section('content')

    <div class="row">
        @foreach ($cursusus as $cursus)
            <div class="col-sm-3 mb-3 mb-sm-3">
                <div class="card">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $cursus->name }}</h5>
                        <p class="card-text">{{ $cursus->location }}</p>
                        <form method="POST" action="{{ route('cursusen.delete', $cursus->id) }}">
                            @csrf
                            @method('DELETE') <!-- Spoofing DELETE method -->
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        <form action="{{ route('cursusen.edit', $cursus) }}" method="GET">
                            <button type="submit" class="btn btn-info">Edit</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>


    @auth
        <form method="POST" action="{{ route('cursusen.create') }}">

            @csrf

            <div>
                <ul>
                    <li>

                        Name:
                        <input type="text" name="name" id="name">
                    </li>
                    <li>
                        Location:
                        <select name="location" id="location">
                            <option value="lake">Lake</option>
                            <option value="ocean">Ocean</option>
                            <option value="puddle">Puddle</option>
                        </select>
                    </li>
                </ul>

                <button type="submit">Submit</button>
            </div>

        </form>
    @endauth


@endsection
