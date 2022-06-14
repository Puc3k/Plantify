@extends('layouts.main')
@section('content')
    <div class="row">
        <img class="card-img-top" src="{{ $plant->imgUrl }}" alt="Card image cap">
    </div>

    @foreach($notes as $note)
        {{$note->title}}
    @endforeach


    <div class="row">
        <div class="col-lg-4">
            <div class="card card-margin border-success">
                <div class="card-header no-border">
                    <h5 class="card-title">{{ $plant->name }}</h5>
                    <h6 class="text-muted d-block"> {{ $plant->latinName }}</h6>
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
        <div class="col-lg-4">
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">MOM</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                            <div class="widget-49-date-warning">
                                <span class="widget-49-date-day">13</span>
                                <span class="widget-49-date-month">apr</span>
                            </div>
                            <div class="widget-49-meeting-info">
                                <span class="widget-49-pro-title">PRO-08235 Lexa Corp.</span>
                                <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                            </div>
                        </div>
                        <ol class="widget-49-meeting-points">
                            <li class="widget-49-meeting-item"><span>Scheming module is removed</span></li>
                            <li class="widget-49-meeting-item"><span>App design contract confirmed</span></li>
                            <li class="widget-49-meeting-item"><span>Client request to send invoice</span></li>
                        </ol>
                        <div class="widget-49-meeting-action">
                            <a href="#" class="btn btn-sm btn-flash-border-warning">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-margin">
                <div class="card-header no-border">
                    <h5 class="card-title">MOM</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="widget-49">
                        <div class="widget-49-title-wrapper">
                            <div class="widget-49-date-success">
                                <span class="widget-49-date-day">22</span>
                                <span class="widget-49-date-month">apr</span>
                            </div>
                            <div class="widget-49-meeting-info">
                                <span class="widget-49-pro-title">PRO-027865 Opera module</span>
                                <span class="widget-49-meeting-time">12:00 to 13.30 Hrs</span>
                            </div>
                        </div>
                        <ol class="widget-49-meeting-points">
                            <li class="widget-49-meeting-item"><span>Scope is revised and updated</span></li>
                            <li class="widget-49-meeting-item"><span>Time-line has been changed</span></li>
                            <li class="widget-49-meeting-item"><span>Received approval to start wire-frame</span></li>
                        </ol>
                        <div class="widget-49-meeting-action">
                            <a href="{{route('user.plant.note',['plantId'=>$plant->id])}}"
                               class="btn btn-sm btn-flash-border-success">Edytuj</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
