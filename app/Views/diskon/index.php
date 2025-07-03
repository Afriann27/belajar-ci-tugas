<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success text-center">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
  <div class="alert alert-danger text-center">
    <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>

<button class="btn btn-primary" onclick="showModal()">Tambah Data</button>

<div style="margin-top: 20px;">
    <!-- form filter dan search -->
</div>

<div class="d-flex justify-content-between mb-2">
  
    <!-- Form Entries per Page -->
    <form method="get" class="d-flex align-items-center">
        <label for="perPage" class="me-2"></label>
        <select name="perPage" id="perPage" onchange="this.form.submit()" class="form-select me-2" style="width: auto;">
            <option value="5" <?= (request()->getGet('perPage') == 5) ? 'selected' : '' ?>>5</option>
            <option value="10" <?= (request()->getGet('perPage') == 10) ? 'selected' : '' ?>>10</option>
            <option value="25" <?= (request()->getGet('perPage') == 25) ? 'selected' : '' ?>>25</option>
            <option value="50" <?= (request()->getGet('perPage') == 50) ? 'selected' : '' ?>>50</option>
        </select> entries page
    </form>

    <!-- Form Search -->
    <form method="get" class="d-flex">
        <input type="hidden" name="perPage" value="<?= request()->getGet('perPage') ?? 10 ?>">
        <input type="text" name="keyword" class="form-control me-2" placeholder="Search..." value="<?= request()->getGet('keyword') ?>">
    </form>
</div>

<table class="table mt-3">

    <thead>
        <tr>
            <th>#</th><th>Tanggal</th><th>Nominal</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($diskon as $i => $d): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $d['tanggal'] ?></td>
            <td><?= number_format($d['nominal']) ?></td>
            <td>
                <button class="btn btn-success" onclick="showModal(<?= $d['id'] ?>)">Ubah</button>
                <a href="/diskon/delete/<?= $d['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal kosong -->
<div class="modal fade" id="diskonModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content" id="modalContent">
      <!-- Konten AJAX akan masuk sini -->
    </div>
  </div>
</div>

<script>
function showModal(id = null) {
    let url = id ? `/diskon/form/${id}` : `/diskon/form`;
    fetch(url)
      .then(res => res.text())
      .then(html => {
        document.getElementById('modalContent').innerHTML = html;
        new bootstrap.Modal(document.getElementById('diskonModal')).show();
      });
}
</script>

<?= $this->endSection(); ?>
