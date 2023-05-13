<!DOCTYPE html>
<html lang="en">
@include('layouts.merchant.merchparts.head')

<body>
    <div class="wrapper">
        @include('layouts.merchant.merchparts.sidebar')
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>
        @include('layouts.merchant.merchparts.nav')
    </div>
    @include('layouts.merchant.merchparts.fixed-plugin')
    @include('layouts.merchant.merchparts.js-dash-files')
    @include('layouts.merchant.related-items-counter-js')
    @yield('scripts')
</body>

</html>
