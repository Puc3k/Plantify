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
                        <li class="list-group-item"><i class="bi bi-sun-fill"></i><strong> Stanowisko: </strong> {{ $plant->position }}</li>
                        <li class="list-group-item"><i class="fas fa-leaf"></i><strong> Gleba: </strong> {{ $plant->soil }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-hand-holding-droplet"></i><strong> Poldewanie: </strong> {{ $plant->watering }}</li>
                    </ul>
                    <div class="card-body ">
                        <div class="row">

                        <form action="{{ route('plants.store') }}" method="post" class="mr-3 ml-1">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edytuj</button>
                        </form>
                        <form action="{{ route('plants.destroy', $plant->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                            <form action="{{ route('user.plant.remove') }}" method="post" class="float-right m-0">
                                @method('delete')
                                @csrf
                                <div class="form-row">
                                    <input type="hidden" name="plantId" value="{{ $plant->id }}">
                                    <button type="submit" class="btn btn-primary mb-2">Usuń z listy</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
