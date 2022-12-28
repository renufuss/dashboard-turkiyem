<?= $this->extend('Layout/index'); ?>


<?= $this->section('content'); ?>

<!--begin::Card-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Card Header-->
    <div class="card-header border-0 pt-5">
        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Satuan" id="search">
        </div>
        <?php if(in_groups('Super Admin') || in_groups('Gudang')) : ?>
        <div class="card-toolbar">
            <!-- begin::Tambah Item -->
            <button class="btn btn-sm btn-light-primary m-3" id="btnAddItem">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Tambah Barang
            </button>
            <!-- end::Tambah Item -->
        </div>
        <?php endif; ?>
    </div>
    <!--end::Card Header-->
    <!--begin::Card Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive" id="tableItem"></div>
        <!--end::Table container-->
    </div>
    <!--end::Card Body-->
</div>
<!--end::Card-->

<!-- ModalItem -->
<div class="itemModal"></div>

<script>
    function showTable() {
        $.ajax({
            type: "post",
            url: "/barang/table",
            data: "",
            dataType: "json",
            beforeSend: function() {
                $("#tableItem").html(`
                <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
	                <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
	                <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
	                <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
	                <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                </svg>
                `);
            },
            success: function(response) {
                $('#tableItem').html(response.tableItem);
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }

    $(document).ready(function() {
        showTable();
    });

    function showModal(itemId = null) {
        $.ajax({
            type: "post",
            url: "/barang/modal",
            data: {
                itemId
            },
            dataType: "json",
            success: function(response) {
                if (response.addModal) {
                    $('.itemModal').html(response.addModal);
                    $('#addItemModal').modal("show");
                }
                if (response.editModal) {
                    $('.itemModal').html(response.editModal);
                    $('#editItemModal').modal("show");
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }

    $('#btnAddItem').click(function(e) {
        e.preventDefault();
        showModal();
    });

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

    function deleteItem(itemId) {
        $.ajax({
            type: "POST",
            url: "/barang/delete",
            data: {
                itemId
            },
            dataType: "json",
            success: function(response) {
                toastOptions();
                if (response.error) {
                    toastr.error(response.error, "Error");
                }

                if (response.success) {
                    toastr.success(response.success, "Sukses");
                    showTable();
                }
            }
        });
    }

    function confirmDelete(itemId) {
        $.ajax({
            type: "POST",
            url: "/barang/confirm",
            data: {
                itemId
            },
            dataType: "json",
            success: function(response) {
                if (!response.error) {
                    Swal.fire({
                        html: `Apakah kamu yakin ingin menghapus ${response.name} ?`,
                        icon: "warning",
                        buttonsStyling: false,
                        showCancelButton: true,
                        confirmButtonText: "Iya, Hapus",
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: 'btn btn-danger'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteItem(itemId);
                        }
                    });
                } else {
                    toastOptions();
                    toastr.error(response.error, "Error");
                }
            }
        });
    }

    function clearModal(){
        $('#unit').val('a');
        $('#name').val('');
        $('#alert').val('');
    }

    function saveItem() {
        $.ajax({
            type: "POST",
            url: "/barang/save",
            data: {
                item_id: $('#item_id').val(),
                unit_id: $('#unit').val(),
                name: $('#name').val(),
                alert: $('#alert').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $("#btnSimpan").html(`
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
                    name,
                    unit
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
                    clearModal();
                    toastr.success(response.success, "Sukses");
                    showTable();

                    if(response.edit){
                        setTimeout(function(){
                            location.reload();
                        }, 500);
                    }
                }

                $("#btnSimpan").html(`Simpan`);
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }
</script>

<?= $this->endSection(); ?>