@isset($merchant)
    <div class="col-md-3 gy-3 d-flex justify-content-center">
        <div class="card merchant">
            <div class="box">
                <div class="img">
                    <img src="{{ $merchant->profile_picture }}">
                </div>
                <h2><a href="{{ route('merchant.details', $merchant->slug) }}">{{ $merchant->first_name }}
                    </a>
                    <br><span>{{ $merchant->products->count() }} : {{ __('Products') }}</span>
                </h2>
                @if ($merchant->fb_link)
                    <span>
                        <ul>
                            <li><a href="{{ $merchant->fb_link }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endisset
