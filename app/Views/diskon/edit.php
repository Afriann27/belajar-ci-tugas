<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>

<h2>Edit Diskon</h2>

<form action="/diskon/update/<?= $diskon['id'] ?>" method="post">
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" value="<?= $diskon['tanggal'] ?>" readonly>
    </div>
    <div class="form-group mt-2">
        <label>Nominal</label>
        <input type="number" name="nominal" class="form-control" value="<?= $diskon['nominal'] ?>" required>
    </div>
    <button type="submit" class="btn btn-success mt-2">Update</button>
</form>

<?= $this->endSection(); ?>
