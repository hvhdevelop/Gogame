<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading"><b> Mục chính</b></div>
            <a class="nav-link" href="{{ url('/') }}/admin/index">
                <div class="sb-nav-link-icon"></div>
                Admin
            </a>
            <div class="sb-sidenav-menu-heading"><b> Quản lý </b></div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Sản phẩm
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('products.index') }}">Tất cả sản phẩm</a>
                    <a class="nav-link" href="{{ route('systems.index') }}">Cấu hình</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"></div>
                Bảng tin
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('news.index') }}">Tất cả</a>
                    <a class="nav-link" href="{{ route('news.create') }}">Thêm</a>                   
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"></div>
                Người dùng
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                        aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Tài khoản
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('users.index') }}">Tất cả</a>
                            <a class="nav-link" href="password.html">Quên mật khẩu</a>
                            
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Phản hồi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Về chúng tôi</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Trợ giúp</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Điều khoản</a>
                            <a class="nav-link" href="404.html">Khiếu nại</a>
                            <a class="nav-link" href="500.html">Tư vấn</a>
                        </nav>
                    </div>
                </nav>
                
            </div>
            
            <div class="sb-sidenav-menu-heading"><b>Doanh thu</b></div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"></div>
                Tổng doanh thu
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"></div>
                Lịch sử giao dịch
            </a>
        </div>
    </div>
    
</nav>