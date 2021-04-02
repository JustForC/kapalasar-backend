<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item mb-5"><a class="c-sidebar-nav-link" style="cursor: pointer;" onclick="homePage()"></a>
    <img src="{{ asset('image/homeDashboard.png') }}" style="cursor: pointer;" onclick="homePage()" style="cursor: pointer;" alt="" class="logoKapalasar">
    </li>
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link"  style="cursor: pointer;" onclick="homePage()">
    <img src="{{ asset('image/home-page.png') }}" class="mr-1" alt=""> Dashboard</a>
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
        window.location.href = "{{ URL::to('/admin/home') }}";
    }
    function productPage(){
        window.location.href = "{{ URL::to('/admin/product') }}";
    }
    function voucherPage(){
        window.location.href = "{{ URL::to('/admin/voucher') }}";
    }
</script>