<div class="sidebar">
    <div class="sidebar-wrapper">
        <ul class="nav">


            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-bar-32"></i>
                    <p>Dashboard</p>
                </a>
            </li>
           @if (auth()->user()->role->name ==='admin')
           <li>
            <a data-toggle="collapse" href="#users" {{ $section == 'users' ? 'aria-expanded=true' : '' }}>
                <i class="tim-icons icon-badge" ></i>
                <span class="nav-link-text">User Management</span>
                <b class="caret mt-1"></b>
            </a>

            <div class="collapse {{ $section == 'users' ? 'aria-expanded=true' : '' }}" id="users">
                <ul class="nav pl-4">
                    <li @if ($pageSlug == 'profile') class="active " @endif>
                        <a href="{{ route('profile.edit')  }}">
                            <i class="tim-icons icon-badge"></i>
                            <p>My profile</p>
                        </a>
                    </li>
                    <li @if ($pageSlug == 'users-list') class="active " @endif>
                        <a href="{{ route('users.index')  }}">
                            <i class="tim-icons icon-notes"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>

                    <li @if ($pageSlug == 'users-create') class="active " @endif>
                        <a href="{{ route('users.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                            <p>New user</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
           @endif

            <li>
                <a data-toggle="collapse" href="#transactions" {{ $section == 'transactions' ? 'aria-expanded=true' : '' }}>
                    <i class="tim-icons icon-bank" ></i>
                    <span class="nav-link-text">Products</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse {{ $section == 'transactions' ? 'show' : '' }}" id="transactions">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'tstats') class="active " @endif>
                            <a href="{{ route('reject.index') }}">
                                <i class="tim-icons icon-chart-pie-36"></i>
                                <p>Reject Products</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'transactions') class="active " @endif>
                            <a href="{{ route('stock.index') }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Stock Product</p>
                            </a>
                        </li>
                        {{-- <li @if ($pageSlug == 'sales') class="active " @endif>
                            <a href="#">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>Sales</p>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </li>
         


            <li @if ($pageSlug == 'farmers') class="active " @endif>
                <a href="{{ url('/price') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>Price</p>
                </a>
            </li> 

            <li @if ($pageSlug == 'Settings') class="active " @endif>
                <a href="{{ route('settings.index') }}">
                    <i class="tim-icons icon-delivery-fast"></i>
                    <p>Classification </p>
                </a>
            </li>

            <li @if ($pageSlug == 'report') class="active " @endif>
                <a href="{{ route('report.index') }}">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>Reports</p>
                </a>
            </li>
            <li @if ($pageSlug == 'report') class="active " @endif>
                <a href="{{ url('/barcode') }}">
                    <i class="tim-icons icon-wallet-43"></i>
                    <p>Add Product</p>
                </a>
            </li>

        </ul>
    </div>
</div>
