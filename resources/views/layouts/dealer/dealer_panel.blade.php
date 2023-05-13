<!DOCTYPE html>
<html lang="en">
@include('layouts.dealer.dealerparts.head')

<body>
    <div class="wrapper">
        @include('layouts.dealer.dealerparts.sidebar')
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>
        @include('layouts.dealer.dealerparts.nav')
    </div>
    @include('layouts.dealer.dealerparts.fixed-plugin')
    @include('layouts.dealer.dealerparts.js-dash-files')
    @include('layouts.dealer.checked-orders-counter-js')
    @yield('scripts')
</body>

</html>
