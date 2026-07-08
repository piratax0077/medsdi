@if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>⚠️ Advertencia:</strong> {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
