@extends('layouts.app')

@section('title', 'Edit een curus | ' . config('app.name'))

@section('content')

    <h1>Edit cursus</h1>
    <h2>Edit {{ $cursus->name }}</h2>

    <form method="POST" action="{{ route('cursusen.update', $cursus->id) }}">

        @csrf
        @method('PUT')

        <div>
            <ul>
                <li>
                    Name:
                    <input type="text" name="name" id="name">
                </li>
                <li>
                    Location:
                    <select name="location" id="location">
                        <option value="lake" @selected($cursus->location)>Lake</option>
                        <option value="ocean" @selected($cursus->location)>Ocean</option>
                        <option value="puddle" @selected($cursus->location)>Puddle</option>
                    </select>
                </li>
            </ul>

            <button type="submit">Submit</button>
        </div>

    </form>
@endsection
