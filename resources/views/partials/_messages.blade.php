@if(Session::has('success'))

    <div class="col-md-12">
        <div class="alert alert-success" role="alert">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    </div>

@endif