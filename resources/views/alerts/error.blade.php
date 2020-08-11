@if (session($key ?? 'error'))
    <div class="alert alert-danger" role="alert">
        {!! session($key ?? 'error') !!}
    </div>
@endif
