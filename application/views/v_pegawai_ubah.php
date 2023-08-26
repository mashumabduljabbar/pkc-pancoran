<div class="container mt-5 text-left">
    <div class="row">
            <div class="col">
                <h1>Ubah Data Pegawai</h1>
            </div>
    </div>
</div>
<div class="container mt-3">
<?php if ($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
    <form action="<?php echo base_url('pegawai/ubah_aksi'); ?>" method="post" onsubmit="return confirmSubmit();">
    <input type="hidden" name="id_pegawai" value="<?php echo $pegawai->id_pegawai; ?>">
    <div class="mb-3">
        <label for="nip" class="form-label">NIP <sup style="color:red;">*</sup></label>
        <input type="text" class="form-control" name="nip" id="nip" aria-describedby="nipHelp" value="<?php echo $pegawai->nip; ?>" required>
        <div id="nipHelp" class="form-text">NIP Wajib dimasukkan.</div>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $pegawai->nama; ?>" placeholder="Masukkan Nama Pegawai">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat"><?php echo $pegawai->alamat; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="hp" class="form-label">HP</label>
        <input type="text" class="form-control" name="hp" id="hp" placeholder="Masukkan No HP" value="<?php echo $pegawai->hp; ?>">
    </div>
    <div class="mb-3">
        <label for="id_jabatan" class="form-label">Jabatan</label>
        <select name="id_jabatan" id="id_jabatan" class="form-select" aria-label="Default select example">
        <option value="<?php echo $jabatan_select->id_jabatan; ?>"><?php echo $jabatan_select->nama_jabatan; ?></option>
        <?php foreach ($jabatan as $jabatan_item): ?>
            <option value="<?php echo $jabatan_item->id_jabatan; ?>"><?php echo $jabatan_item->nama_jabatan; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_lokasi_kerja" class="form-label">Lokasi Kerja</label>
        <select name="id_lokasi_kerja" id="id_lokasi_kerja" class="form-select" aria-label="Default select example">
        <option value="<?php echo $lokasi_select->id_lokasi; ?>"><?php echo $lokasi_select->nama_lokasi; ?></option>
        <?php foreach ($lokasi as $lokasi_item): ?>
            <option value="<?php echo $lokasi_item->id_lokasi; ?>"><?php echo $lokasi_item->nama_lokasi; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('pegawai'); ?>" class="btn btn-warning">Kembali</a>
            </div>
    </div>
    </form>
</div>

<script>
function confirmSubmit() {
    return confirm("Apakah Anda yakin ingin mengubah data?");
}
</script>