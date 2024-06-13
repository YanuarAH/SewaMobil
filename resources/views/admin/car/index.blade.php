<!-- resources/views/cars/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Available Cars</h1>
<ul>
    @foreach($cars as $car)
        <li>{{ $car->name }} ({{ $car->brand }}) - <a href="{{ route('cars.show', $car) }}">Details</a></li>
    @endforeach
</ul>
@endsection