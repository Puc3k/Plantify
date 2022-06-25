@extends('layouts.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">Edycja notatki</h5>
        <div class="card-body">
            <form action="{{ route('user.note.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- X-XSRF-TOKEN -->
                <input type="hidden" name="plantId" value="{{ $plant->id }}">
                <input type="hidden" name="userId" value="{{ $user->id }}">

                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title"
                        value="@if($note->title) {{ old('title', $note->title) }} @endif"
                        placeholder="Tytuł notatki"
                    />
                    @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        rows="3"
                        placeholder="Treść notatki..."
                    >@if(old('description',$note->description)!==null){{ old('description',$note->description)}}@endif</textarea>

                    @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Data</label>
                    <input
                        type="date"
                        class="form-control @error('date') is-invalid @enderror"
                        id="date"
                        name="date"
                        min="{{ $currentDate }}"
                        value="@if($note->date!==null){{ old('date,',date('Y-m-d', strtotime($note->date))) }}@else{{ $currentDate }}@endif">
                    @error('date')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('user.plant.show',['plantId'=>$plant->id]) }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>
@endsection
