<div class="modal fade" id="addItemModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Tambah Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- end modalheader -->
            <div class="modal-body">
                <!-- begin::col -->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Nama Item</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid" name="name" id="name" autocomplete="off" />
                    <div class="invalid-feedback" id="name-feedback"></div>
                </div>
                <!-- end::col -->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">Satuan</label>
                    <select class="form-select form-select-solid" style="cursor: pointer;" name="unit" id="unit" data-control="select2" data-hide-search="true" data-placeholder="Pilih Satuan...">
                        <option value="">Pilih Satuan...</option>
                        <?php foreach ($units as $unit) : ?>
                            <option value="<?= $unit->unit_id; ?>"><?= $unit->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback" id="unit-feedback"></div>
                </div>
                <!-- end::Input group -->
            </div>
            <!-- end modalbody -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
            </div>
            <!-- end modalfooter -->
        </div>
    </div>
</div>

<script>
    $('#btnSimpan').click(function(e) {
        e.preventDefault();
        saveItem();
    });
</script>