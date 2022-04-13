@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="row">
            @foreach($plants ?? [] as $plant)
                <div class="card col-4">
                    <img class="card-img-top" src="{{ $plant->imgUrl }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant->name }}</h5>
                            <p>{{ $plant->latinName }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-sun-fill"></i> {{ $plant->position }}</li>
                        <li class="list-group-item"><i class="fas fa-leaf"></i> {{ $plant->soil }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-hand-holding-droplet"></i> {{ $plant->watering }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-droplet"></i> {{ $plant->humidity }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Dodaj do listy</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
