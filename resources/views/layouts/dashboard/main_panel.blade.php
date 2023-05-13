<!DOCTYPE html>
<html lang="en">
@include('layouts.dashboard.dashparts.head')

<body>
    <div class="wrapper">
        @include('layouts.dashboard.dashparts.sidebar')
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>
        @include('layouts.dashboard.dashparts.nav')
    </div>
    @include('layouts.dashboard.dashparts.fixed-plugin')
    @include('layouts.dashboard.dashparts.js-dash-files')
    @include('layouts.dashboard.checked-orders-counter-js')
    @yield('scripts')
</body>

</html>
