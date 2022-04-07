<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href=""><img src="{{ asset("backend-access/img/logo.png") }}" alt=""></a>
        <a class="small_logo" href=""><img src="{{ asset("backend-access/img/mini_logo.png") }}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li>
            <a href="{" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/dashboard.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>

        <h4 class="menu-text"><span>Danh mục</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/16.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Danh mục điện thoại</span>
                </div>
            </a>
            <ul>
                <li><a href=" {{ route('admin.categories') }} ">Danh sách</a></li>

            </ul>
        </li>

        <h4 class="menu-text"><span>Product Data</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li class="">
            <a  class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset("backend-access/") }}/img/menu-icon/4.svg" alt="">
                </div>
                <div class="nav_title">
                    <span>Product</span>
                </div>
            </a>
            <ul>
                <li><a href="">Product Data</a></li>
            </ul>
        </li>
    </ul>
</nav>