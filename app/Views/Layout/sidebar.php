<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
        data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
            data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link <?= (uri_string() == 'dashboard') ? 'active' : ''; ?>"
                    href="<?= base_url('dashboard'); ?>">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: C:/wamp64/www/keenthemes/core/html/src/media/icons/duotune/abstract/abs044.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="-3 -3 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M8 2V16H2V8.60001C2 8.20001 2.2 7.8 2.5 7.5L8 2ZM16 8V22L21.5 16.5C21.8 16.2 22 15.8 22 15.4V8H16Z"
                                    fill="currentColor" />
                                <path
                                    d="M22 8H8V2H15.4C15.8 2 16.2 2.2 16.5 2.5L22 8ZM2 16L7.5 21.5C7.8 21.8 8.20001 22 8.60001 22H16V16H2Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <?php $isBarang = (uri_string() == 'barang' || uri_string() == 'satuan'); ?>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion <?= ($isBarang) ? 'here show' : ''; ?>">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: C:/wamp64/www/keenthemes/core/html/src/media/icons/duotune/abstract/abs026.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="-3 -3 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z"
                                    fill="currentColor" />
                                <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Barang</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link <?= (uri_string() == 'barang') ? 'active' : ''; ?>"
                            href="<?= base_url('barang'); ?>" href="<?= base_url('barang'); ?>">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Barang</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link <?= (uri_string() == 'satuan') ? 'active' : ''; ?>"
                            href="<?= base_url('satuan'); ?>">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Satuan</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: C:/wamp64/www/keenthemes/core/html/src/media/icons/duotune/ecommerce/ecm009.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="-3 -3 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                    fill="currentColor" />
                                <path d="M7 16H6C5.4 16 5 15.6 5 15V13H8V15C8 15.6 7.6 16 7 16Z" fill="currentColor" />
                                <path opacity="0.3"
                                    d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                    fill="currentColor" />
                                <path d="M18 16H17C16.4 16 16 15.6 16 15V13H19V15C19 15.6 18.6 16 18 16Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                    fill="currentColor" />
                                <path d="M7 5H6C5.4 5 5 4.6 5 4V2H8V4C8 4.6 7.6 5 7 5Z" fill="currentColor" />
                                <path opacity="0.3"
                                    d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                    fill="currentColor" />
                                <path d="M18 5H17C16.4 5 16 4.6 16 4V2H19V4C19 4.6 18.6 5 18 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Stok</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link <?= (uri_string() == 'stock/tambah') ? 'active' : ''; ?>" id="addStock">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Tambah Stok</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link <?= (uri_string() == 'stock/kurang') ? 'active' : ''; ?>" id="minusStock">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Kurangi Stok</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                </div>
                <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link  <?= (uri_string() == 'laporan') ? 'active' : ''; ?>"
                    href="<?= base_url('laporan'); ?>">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: C:/wamp64/www/keenthemes/core/html/src/media/icons/duotune/graphs/gra008.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24"
                                viewBox="-3 -3 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Laporan</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->

    </div>
    <!--end::Menu wrapper-->
</div>



<script>
    function showModalAddStock() {
        $.ajax({
            type: "get",
            url: "/stock/tambah",
            dataType: "json",
            success: function (response) {

                if (response.addStockModal) {
                    $('.modalStock').html(response.addStockModal);
                    $('#addStockModal').modal("show");
                }
            },
            error: function (xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }

    function showModalMinusStock() {
        $.ajax({
            type: "get",
            url: "/stock/kurang",
            dataType: "json",
            success: function (response) {
                if (response.minusStockModal) {
                    $('.modalStock').html(response.minusStockModal);
                    $('#minusStockModal').modal("show");
                }

            },
            error: function (xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }

    function showCurrentStock() {
        $.ajax({
            type: "POST",
            url: "/stock/current",
            data: {
                itemId: $('#item').val(),
            },
            dataType: "json",
            beforeSend: function () {
                $("#currentStock").html(`
                <div class="loader">
    			<span class="bar"></span>
    			<span class="bar"></span>
    			<span class="bar"></span>
				</div>
                `);
            },
            success: function (response) {
                $('#currentStock').html('0');
                $('#currentStock').html(response);
            }
        });
    }



    $('#addStock').click(function (e) {
        e.preventDefault();
        showModalAddStock();
    });

    $('#minusStock').click(function (e) {
        e.preventDefault();
        showModalMinusStock();
    });
</script>