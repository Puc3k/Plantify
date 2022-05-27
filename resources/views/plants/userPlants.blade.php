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
                        <a href="{{ route('user.plant.show',['plantId'=>$plant->id]) }}" class="btn btn-primary mr-3 ml-1 mb-2">
                            Dodaj notatkę
                        </a>

                            <form action="{{ route('user.plant.remove') }}" method="post" class="float-right m-0">
                                @method('delete')
                                @csrf
                                <div class="form-row">
                                    <input type="hidden" name="plantId" value="{{ $plant->id }}">
                                    <button type="submit" class="btn btn-danger mb-2">Usuń z listy</button>
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
