@extends('layouts.main')
@section('content')
    <div class="row">
        <img class="card-img-top" src="{{ $plant->imgUrl }}" alt="Card image cap">
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-margin border-success">
                <div class="card-header no-border">
                    <h5 class="card-title">{{ $plant->name }} </h5>
                    <h6 class="text-muted d-block pl-1">{{ $plant->latinName }}</h6>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-sun-fill"></i><strong>
                                Stanowisko: </strong> {{ $plant->position }}</li>
                        <li class="list-group-item"><i class="fas fa-leaf"></i><strong>
                                Gleba: </strong> {{ $plant->soil }}</li>
                        <li class="list-group-item"><i class="fa-solid fa-hand-holding-droplet"></i><strong>
                                Poldewanie: </strong> {{ $plant->watering }}</li>
                    </ul>
                </div>
            </div>
        </div>

        @if($notes->isEmpty())
            <div class="col-lg-4 col-md-12">
                <div class="card card-margin add-note-card bg-success text-white h-100">
                    <div
                        class="card-header no-border flex-grow-1  text-center align-content-center justify-content-center">
                        <h3 class="card-title">Dodaj notatkę</h3>
                    </div>
                    <div class="card-body pt-0 fa-3x align-self-center">
                        <a href="{{ route('user.note.create',['plantId'=>$plant->id]) }}" class="btn btn-light"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
            </div>
        @endif

        @foreach($notes ?? [] as $note)
            <div class="col-lg-4">
                <div class="card card-margin h-100">
                    <div class="card-body mt-4 pt-0">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-warning">
                                    <span class="widget-49-date-day">{{ date('d', strtotime($note->date)) }}</span>
                                    <span class="widget-49-date-month">{{ date('M', strtotime($note->date)) }}</span>
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title">  <h5
                                            class="card-title">{{$note->title}}</h5></span>
                                    <span class="widget-49-meeting-time"></span>
                                </div>
                            </div>
                            <div class="widget-49-meeting-points mt-4">
                                {{$note->description}}
                            </div>
                            <div class="widget-49-meeting-action">
                                <a href="{{route('user.plant.show',['plantId'=>$plant->id])}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ route('user.note.edit',['plantId'=>$plant->id]) }}"
                           class="btn btn-primary mr-3 ml-1 mb-2">
                            Edytuj
                        </a>

                        <form action="{{ route('user.note.remove') }}" method="post" class="float-right m-0">
                            @method('delete')
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="plantId" value="{{ $plant->id }}">
                                <button type="submit" class="btn btn-danger mb-2">Usuń</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
    @endforeach
@endsection
