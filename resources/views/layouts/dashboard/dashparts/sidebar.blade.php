<div class="sidebar" data-color="green" data-background-color="white" data-image="">
    <div class="logo">
        <a href="{{ route('store.index') }}" class="simple-text logo-normal">
            Mansoura Shop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                {{-- nav-item active --}}
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- ELELMENT 2 --}}
            <li class="nav-item {{ Request::is('dashboard/categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="material-icons">add_circle</i>
                    <p>Categories</p>
                </a>
            </li>
            {{-- Element 3 --}}
            <li class="nav-item {{ Request::is('dashboard/products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('products.index') }}">
                    <i class="material-icons">favorite</i>
                    <p>Products</p>
                </a>
            </li>
            {{-- Element 4 --}}
            <li class="nav-item {{ Request::is('dashboard/all-orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.orders.all') }}">
                    <i class="material-icons">add_shopping_cart</i>
                    <p>All Orders</p>
                </a>
                <ul style="list-style-type: none; ">
                    <li class="nav-item {{ Request::is('dashboard/checked-orders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.orders.checked') }}">
                            <i class="material-icons">add_shopping_cart</i>
                            <p>Checked Orders
                                <span class="badge badge-pill bg-danger checked_count_admin" style="font-size: 1.1em;"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/in-preparation-orders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.orders.prepared') }}">
                            <i class="material-icons">add_shopping_cart</i>
                            <p>In Preparation Orders</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/all-done-orders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.orders.done') }}">
                            <i class="material-icons">add_shopping_cart</i>
                            <p>All Done Orders</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/all-refunded-orders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.orders.refunded') }}">
                            <i class="material-icons">add_shopping_cart</i>
                            <p>Refunded Orders</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Element 5 --}}
            <li class="nav-item {{ Request::is('dashboard/all-users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.all') }}">
                    <i class="material-icons">child_care</i>
                    <p>All Users</p>
                </a>
                <ul style="list-style-type: none; ">
                    <li class="nav-item {{ Request::is('dashboard/all-customers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.users.customers') }}">
                            <i class="material-icons">child_care</i>
                            <p>All Customers</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/all-merchants') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.users.merchants') }}">
                            <i class="material-icons">child_care</i>
                            <p>All Merchants</p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('dashboard/all-dealers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.users.dealers') }}">
                            <i class="material-icons">child_care</i>
                            <p>All Dealers</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
