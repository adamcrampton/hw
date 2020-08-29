<div class="row">
    <div class="col-lg-12">
        @if (session('error'))
            <div class="alert alert-danger">{!! session('error') !!}</div>
        @elseif (session('success'))
            <div class="alert alert-success">{!! session('success') !!}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if (session('csrf_error'))
            <div class="alert alert-danger">{{ session('csrf_error') }}</div>
        @endif
    </div>
</div>
