<div class="sidebar" data-color="green" data-background-color="white" data-image="">
    <div class="logo">
        <a href="{{ route('store.index') }}" class="simple-text logo-normal">
            Dokkan ElMansoura
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('merchant/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('merchant.panel.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('merchant.panel.products') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/product/create/new') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('merchant.panel.product.create') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Create Product</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/related-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('merchant.panel.related.order') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Related Orders <span class="badge badge-pill bg-danger related_count"
                            style="font-size: 1.1em;"></span></p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('merchant/completed-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('merchant.panel.completed.order') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Completed Orders</p>
                </a>
            </li>
        </ul>
    </div>
</div>
