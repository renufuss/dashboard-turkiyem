<div class="modal fade" id="exportModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalLabel">Export To Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <!-- end modalheader -->
            <form action="<?= base_url(); ?>/laporan/export" method="POST">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <!-- begin::col -->
                    <div class="col-md-12 fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Tanggal Awal</span>
                        </label>
                        <!--end::Label-->
                        <input type="date" class="form-control form-control-solid" name="startDate" id="startDate"
                            autocomplete="off" max="<?= date('Y-m-d'); ?>" />
                        <div class="invalid-feedback" id="startDate-feedback"></div>
                    </div>
                    <!-- end::col -->
                    <!-- begin::col -->
                    <div class="col-md-12 fv-row mb-8">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Tanggal Akhir</span>
                        </label>
                        <!--end::Label-->
                        <input type="date" class="form-control form-control-solid" name="endDate" id="endDate"
                            autocomplete="off" />
                        <div class="invalid-feedback" id="endDate-feedback"></div>
                    </div>
                    <!-- end::col -->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Status</label>
                        <select class="form-select form-select-solid" style="cursor: pointer;" name="statusExport"
                            id="statusExport" data-control="select2" data-hide-search="true">
                            <option value="">Semua Status</option>
                            <option value="1">Barang Masuk</option>
                            <option value="2">Barang Keluar</option>
                        </select>
                        <div class="invalid-feedback" id="statusExport-feedback"></div>
                    </div>
                    <!-- end::Input group -->
                </div>
                <!-- end modalbody -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnExport"><i class="fa fa-print"></i> Export To
                        Excel</button>
                </div>
            </form>
            <!-- end modalfooter -->
        </div>
    </div>
</div>
<?php $isError = (session()->getFlashData('error') || session()->getFlashData('errorStartDate') || session()->getFlashData('errorEndDate')); ?>
<?php if ($isError) : ?>
<script>
    $(document).ready(function () {
        $('#exportModal').modal("show");
        <?php if (session()->getFlashData('error')) : ?>
        $(`#startDate`).addClass('is-invalid');
        $(`#endDate`).addClass('is-invalid');
        $(`#startDate-feedback`).html('<?= session()->getFlashData('error'); ?>');
        $(`#endDate-feedback`).html('<?= session()->getFlashData('error'); ?>');
        <?php elseif (session()->getFlashData('errorStartDate')) : ?>
        $(`#startDate`).addClass('is-invalid');
        $(`#startDate-feedback`).html('<?= session()->getFlashData('errorStartDate'); ?>');
        <?php elseif (session()->getFlashData('errorEndDate')) : ?>
        $(`#endDate`).addClass('is-invalid');
        $(`#endDate-feedback`).html('<?= session()->getFlashData('errorEndDate'); ?>');
        <?php endif; ?>
    });
</script>
<?php endif; ?>