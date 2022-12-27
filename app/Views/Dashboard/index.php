<?= $this->extend('Layout/index'); ?>


<?= $this->section('content'); ?>
<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-xl-10">
    <!--begin::Col-->
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
        <!--begin::Card widget 4-->
        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?= $totalIn; ?></span>
                        <!--end::Amount-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                                        transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--></span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Transaksi Barang Masuk</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center w-100">
                    <a class="btn btn-success" href="">Lihat Selengkapnya</a>
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 4-->
        <!--begin::Card widget 5-->
        <div class="card card-flush h-md-50 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?= $totalItem; ?></span>
                        <!--end::Amount-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Barang</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center w-100">
                    <a class="btn btn-warning" href="">Lihat Selengkapnya</a>
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 5-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
        <!--begin::Card widget 6-->
        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Info-->
                    <div class="d-flex align-items-center">
                        <!--begin::Amount-->
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?= $totalOut; ?></span>
                        <!--end::Amount-->
                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                            <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1"
                                        transform="rotate(-90 11 18)" fill="currentColor" />
                                    <path
                                        d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon--></span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Transaksi Barang Keluar</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center w-100">
                    <a class="btn btn-danger" href="">Lihat Selengkapnya</a>
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 6-->
        <!--begin::Card widget 7-->
        <div class="card card-flush h-md-50 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <div class="card-title d-flex flex-column">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">6.3k</span>
                    <!--end::Amount-->
                    <!--begin::Subtitle-->
                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Pengguna</span>
                    <!--end::Subtitle-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body pt-2 pb-4 d-flex align-items-center">
                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center w-100">
                    <a class="btn btn-primary" href="">Lihat Selengkapnya</a>
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 7-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
        <!--begin::Chart widget 3-->
        <div class="card card-flush overflow-hidden h-md-100">
            <!--begin::Header-->
            <div class="card-header py-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">Barang</span>
                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Barang yang hampir habis</span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <div class="card-body d-flex justify-content-between flex-column">
                <table class="table align-middle gs-0 gy-4" id="itemDataTable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted bg-light">
                            <th class="rounded-start rounded-start ps-4">Nama</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center rounded-end">Satuan</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Chart widget 3-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<?= $this->endSection(); ?>