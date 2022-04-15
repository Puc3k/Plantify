@extends('layouts.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            @foreach($plants ?? [] as $plant)
                <div class="col col-sm-12 col-md-6 col-xl-4">
                <div class="card justify-content-between border-success mb-3 p-2 w-90">
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
                    <div class="card-body justify-content-around">
                        <form action="{{ route('plants.store') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Dodaj do listy</button>
                        </form>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
