@if(session('fail'))
    <div class="alert alert-success">
        {{ session('fail') }}
    </div>
@endif
