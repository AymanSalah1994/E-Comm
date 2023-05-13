<div class="sidebar" data-color="green" data-background-color="white" data-image="">
    <div class="logo">
        <a href="{{ route('store.index') }}" class="simple-text logo-normal">
            Dokkan ElMansoura
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">


            <li class="nav-item {{ Request::is('dealer/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.home') }}">
                    <i class="material-icons">home</i>
                    <p>Home</p>
                </a>
            </li>


            <li class="nav-item {{ Request::is('dealer/view/checked-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.checked.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Checked Orders
                        <span class="badge badge-pill bg-danger checked_cound" style="font-size: 1.1em;"></span>
                    </p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('dealer/view/prepared-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.prepared.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Prepared Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('dealer/view/done-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dealer.panel.view.done.orders') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Done Orders</p>
                </a>
            </li>
        </ul>
    </div>
</div>
