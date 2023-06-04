<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
{{--        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
             style="opacity: .8">
        <span class="brand-text font-weight-light">Fiola</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                        <p>
                            الرئيسية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <p>
                            المستخدمين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('manufacturers.index') }}" class="nav-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <p>
                            الشركات المصنعة
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <p>
                            التصنيفات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fa-brands fa-product-hunt"></i>
                        <p>
                            المنتجات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>
                            المشتريات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a href="{{ route('sales.index') }}" class="nav-link">--}}
                        <i class="fa-solid fa-cart-plus"></i>
                        <p>
                            مبيعات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoices.index') }}" class="nav-link">
                        <i class="fa-solid fa-cart-plus"></i>
                        <p>
                            الفواتير
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('invoices.index') }}" class="nav-link">
                        <i class="fa-solid fa-cart-plus"></i>
                        <p>
                            اصناف الفواتير
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pos.index') }}" class="nav-link">
                        <i class="fa-solid fa-box-open"></i>
                        <p>
                            مخازن او نقاط بيع
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fa-solid fa-file"></i>
                        <p>
                            تقارير
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('colors.index') }}" class="nav-link">
                        <i class="fa-solid fa-file"></i>
                        <p>
                            الالوان
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('suppliers.index') }}" class="nav-link">
                        <i class="fa-solid fa-user-tie"></i>
                        <p>
                            موردين
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        <i class="fa-solid fa-person"></i>
                        <p>
                            زبائن
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('delivery.index') }}" class="nav-link">
                        <i class="fa-solid fa-truck"></i>
                        <p>
                            شركات توصيل
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item has-treeview menu-open">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="fa-solid fa-user"></i>--}}
{{--                        <p>--}}
{{--                            تصنيف المنتجات--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('users.index') }}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>ادارة تصنيف المنتجات</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
                <li>
                    <div class="btn btn-danger form-control">
                        <a class="text-white" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('تسجيل الخروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
