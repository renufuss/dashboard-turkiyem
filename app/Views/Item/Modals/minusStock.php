<div class="modal fade" id="minusStockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="minusStockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="minusStockModalLabel">Kurangi Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <!-- end modalheader -->
            <div class="modal-body">
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">Item</label>
                    <select class="form-select form-select-solid" style="cursor: pointer;" name="item" id="item" data-control="select2" data-hide-search="true" data-placeholder="Pilih barang...">
                        <option value="">Pilih Barang...</option>
                        <?php foreach ($items as $item) : ?>
                            <option value="<?= $item->item_id; ?>"><?= $item->itemName; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback" id="item-feedback"></div>
                </div>
                <!-- end::Input group -->

                <!-- begin::col -->
                <div class="col-md-12 fv-row mb-8">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Stok</span>
                    </label>
                    <!--end::Label-->
                    <input type="number" class="form-control form-control-solid" name="stock" id="stock" autocomplete="off" />
                    <div class="invalid-feedback" id="stock-feedback"></div>
                </div>
                <!-- end::col -->

                 <!-- begin::col -->
                 <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Keterangan</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control form-control-solid mb-2" name="description" id="description" autocomplete="off" />
                    <div class="invalid-feedback" id="description-feedback"></div>
                </div>
                <!-- end::col -->

                <span>Jumlah stok saat ini : <span id="currentStock"></span></span>
            </div>
            <!-- end modalbody -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="btnSimpanStock">Kurangi Stok</button>
            </div>
            <!-- end modalfooter -->
        </div>
    </div>
</div>

<script>
    function toastOptions() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

    function removeFeedback(form) {
        Object.entries(form).forEach(entry => {
            const [key, value] = entry;
            $(`#${key}`).removeClass('is-invalid');
            $(`#${key}-feedback`).html('');
        });

        return true;
    }


    function minusStock() {
        $.ajax({
            type: "POST",
            url: "/stock/minus",
            data: {
                item_id: $('#item').val(),
                stock: $('#stock').val(),
                description: $('#description').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $("#btnSimpanStock").html(`
                <div class="loader">
    			<span class="bar"></span>
    			<span class="bar"></span>
    			<span class="bar"></span>
				</div>
                `);
            },
            success: function(response) {
                toastOptions();

                // Remove Feedback
                form = {
                    item,
                    stock
                };
                removeFeedback(form);

                if (response.error) {
                    // Add Feedback
                    Object.entries(response.error).forEach(entry => {
                        const [key, value] = entry;
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}-feedback`).html(value);
                    });

                    toastr.error(response.errorMsg, "Error");
                }

                if (response.success) {
                    $('#item').val('');
                    $('#description').val('');
                    $('#stock').val('');
                    showCurrentStock();
                    toastr.success(response.success, "Sukses");
                }

                $("#btnSimpanStock").html(`Simpan`);
            }
        });
    }

    $('#item').on('change', function() {
        showCurrentStock();
    });

    $('#btnSimpanStock').click(function(e) {
        e.preventDefault();
        minusStock();
    });

    $('#minusStockModal').on('hidden.bs.modal', function() {
        $('.modalStock').html('');
        location.reload();
    })
</script>