<div class="position-fixed top-0-0 end-0-0 p-0 m-0 toast" style="z-index: 11;background-color:green">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="{{ asset('images/icons8-check-mark-48.png') }}" width="15%" class="rounded me-2" alt="...">
            <strong class="me-auto">{{ __('Done') }}</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ __('Cart Has Been Updated !') }}
        </div>
    </div>
</div>
