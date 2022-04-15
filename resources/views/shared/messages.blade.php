
    @if (session()->has('message'))
{{$message = session()->get('prevAction')}}
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
    {{ $message }}
Pomyślnie dodano roślinę do Twojej kolekcji!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    @endif
