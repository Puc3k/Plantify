@extends('layouts.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            @foreach($plants ?? [] as $plant)
                <div class="card-group col col-sm-12 col-md-6 col-xl-4">
                <div class="card justify-content-between border-success mb-3 p-2 w-90">
                    <img class="card-img-top" src="{{ $plant->imgUrl }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $plant->name }}</h5>
                            <p>{{ $plant->latinName }}</p>
                    </div>
                    <ul class="list-group list-group-flush d-flex justify-content-around">
                        <li class="list-group-item"><i class="bi bi-sun-fill"></i><strong> Stanowisko: </strong> {{ $plant->position }}</li>
                        <li class="list-group-item"><i class="fas fa-leaf"></i><strong> Gleba: </strong> {{ $plant->soil }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-hand-holding-droplet"></i><strong> Poldewanie: </strong> {{ $plant->watering }}</li>
                    </ul>
                    <div class="card-footer justify-content-center align-content-center">

                        <form action="{{ route('plants.store') }}" class="card-add-form" method="post">
                            @csrf
                            <input name="plant_id" type="hidden" value="{{ $plant->id }} " />
                            <button type="submit" class="btn btn-success">Dodaj do kolekcji </button>
                        </form>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
