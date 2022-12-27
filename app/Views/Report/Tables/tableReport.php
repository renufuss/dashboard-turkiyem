<!-- begin :: DataTable CSS -->
<link href="<?= base_url(); ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
    type="text/css" />
<!-- end :: DataTable CSS -->

<table class="table align-middle gs-0 gy-4" id="reportDataTable">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bold text-muted bg-light">
            <th class="rounded-start ps-4 min-w-200px">Tanggal</th>
            <th class="ps-4 min-w-200px">Nama Barang</th>
            <th class="min-w-200px ps-4">Stok</th>
            <th class="ps-4 min-w-200px">Keterangan</th>
            <th class="min-w-200px text-center rounded-end">Pengguna</th>
        </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
        <?php foreach ($logs as $log) : ?>
        <tr>
            <td class="ps-4"><?= $log->logDate; ?></td>
            <td class="ps-4"><?= $log->itemName; ?></td>
            <?php $isPlus = ($log->logStatus == 1); ?>
            <td class="ps-4" style="color: <?= ($isPlus) ? 'green' : 'red'; ?>;"><?= ($isPlus) ? '+' : '-'; ?>
                <?= $log->logStock; ?></td>
            <td class="ps-4" style="word-break: break-all;">
               <?= $log->description; ?></td>
            <td class="text-center"><?= $log->first_name; ?> <?= $log->last_name; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <!--end::Table body-->
</table>

<!-- begin :: DataTable Js -->
<script src="<?= base_url(); ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!-- end :: End DataTable Js -->

<script>
    const table = $('#reportDataTable').DataTable({
        "aaSorting": [],
        "scrollX": true
    });

    $('#search').on('keyup', function () {
        table.search(this.value).draw();
    });

    $('#status').on('change', function () {
        showTable();
    });
</script>