<!DOCTYPE html>
@if (session()->get('locale') == 'ar')
    <html lang="ar" dir="rtl">
@else
    <html lang="en">
@endif
<html lang="en">

@include('layouts.store.storeparts.head')

<body class="bg-light" style="margin: 0%">
    @include('layouts.store.storeparts.nav')
    @yield('slider')
    <div class="content">
        @yield('content')
        <button onclick="topFunction()" id="myTOPBtn" title="Go to top">
            <i class="fa-solid fa-arrow-up"></i>
            {{ __('Top') }}
        </button>
    </div>
    @include('layouts.store.storeparts.footer')
    @include('layouts.store.storeparts.store-js')
    @yield('scripts')

</body>

</html>
