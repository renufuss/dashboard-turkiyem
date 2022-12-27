<!-- begin :: DataTable CSS -->
<link href="<?= base_url(); ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!-- end :: DataTable CSS -->

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
        <?php foreach ($items as $item) : ?>
        <?php if($item->stock <= $item->alert): ?>
        <tr>
            <td class="ps-4"><?= $item->itemName; ?></td>
            <td class="text-center" style="color:red"><?= $item->stock; ?></td>
            <td class="text-center"><?= $item->unitName; ?></td>
        </tr>
        <?php endif; ?>
        <?php endforeach ?>
    </tbody>
    <!--end::Table body-->
</table>

<!-- begin :: DataTable Js -->
<script src="<?= base_url(); ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!-- end :: End DataTable Js -->


<script>
    $(document).ready(function() {
        const table = $('#itemDataTable').DataTable({
            "aaSorting": [],
            "scrollX": true
        });
    });
</script>