<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
                                    
                                    <ul class="c-sidebar-nav">
                                        <li class="c-sidebar-nav-item mb-5"><a class="c-sidebar-nav-link" style="cursor: pointer;" onclick="homePage()"></a>
    <img src="{{ asset('image/homeDashboard.png') }}" style="cursor: pointer;" onclick="homePage()" style="cursor: pointer;" alt="" class="logoKapalasar">
    </li>
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"  style="cursor: pointer;" onclick="homePage()">
    <img src="{{ asset('image/home-page.png') }}" class="mr-1" alt=""> Dashboard</a>
    </li>
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"  style="cursor: pointer;" onclick="adminPage()">
    <img src="{{ asset('image/admin.png') }}" class="mr-1" alt=""> Admin</a>
    </li>
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"  style="cursor: pointer;" onclick="merchantPage()">
    <img src="{{ asset('image/merchant.png') }}" class="mr-1" alt=""> Merchant</a>
    </li>
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"  style="cursor: pointer;" onclick="userPage()">
    <img src="{{ asset('image/user.png') }}" class="mr-1" alt=""> User</a>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" style="cursor: pointer;" onclick="productPage()">
            <img src="{{ asset('image/product.png') }}"class="mr-1" alt=""> Produk
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" style="cursor: pointer;" onclick="voucherPage();">
            <img src="{{ asset('image/voucher.png') }}"class="mr-1" alt=""> Voucher
            </a>
        </li>
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>

<script>
   
   function homePage(){
        window.location.href = "{{ URL::to('/superadmin/home') }}";
    }
    function productPage(){
        window.location.href = "{{ URL::to('/superadmin/product') }}";
    }
    function voucherPage(){
        window.location.href = "{{ URL::to('/superadmin/voucher') }}";
    } 
    function adminPage(){
        window.location.href = "{{ URL::to('/superadmin/admin') }}";
    }
    function merchantPage(){
        window.location.href = "{{ URL::to('/superadmin/merchant') }}";
    }
    function userPage(){
        window.location.href = "{{ URL::to('/superadmin/user') }}";
    }
</script>