
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
{{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(Session::has('message-error'))
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        {{ Session::get('message-error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
