<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<?php
    echo session()->getFlashdata('info');
?>

<h1> INSERT DATA </h1>

<form action="<?= base_url() ?>/admin/kategori/insert" method="post">
    Kategori : <input type="text" name="kategori" required id="">
    <br>
    Keterangan : <input type="text" name="keterangan" required id="">
    <br>
    <input type="submit" name="simpan" value="SIMPAN" id="">
</form>

<?= $this->endSection() ?>