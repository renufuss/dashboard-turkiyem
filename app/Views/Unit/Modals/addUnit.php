<div class="modal fade" id="addUnitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addUnitModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addUnitModalLabel">Tambah Satuan</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<!-- end modalheader -->
			<div class="modal-body">
				<!--begin::Input group-->
				<div class="row g-9 mb-8">
					<!-- begin::col -->
					<div class="col-md-12 fv-row">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-semibold mb-2">
							<span class="required">Nama Satuan</span>
						</label>
						<!--end::Label-->
						<input type="text" class="form-control form-control-solid" name="name" id="name" autocomplete="off" />
						<div class="invalid-feedback" id="name-feedback"></div>
					</div>
					<!-- end::col -->
				</div>
				<!--end::Input group-->

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
		saveUnit();
	});
</script>