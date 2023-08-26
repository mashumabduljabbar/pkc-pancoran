<div class="container mt-5 text-left">
    <div class="row">
            <div class="col">
                <h1>Data Pegawai</h1>
            </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row" style="text-align: right;">
            <div class="col">
                <a href="<?php echo base_url("/pegawai/tambah");?>"><button class="btn btn-success">Tambah Pegawai</button></a>
            </div>
    </div>
</div>
<div class="container mt-3">    
<?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
        <table id="example" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>HP</th>
                    <th>Jabatan</th>
                    <th>Lokasi Kerja</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pegawai as $pegawai_item): ?>
            <tr>
                    <td><?php echo $pegawai_item->id_pegawai; ?></td>
                    <td><?php echo $pegawai_item->nip; ?></td>
                    <td><?php echo $pegawai_item->nama; ?></td>
                    <td><?php echo $pegawai_item->alamat; ?></td>
                    <td><?php echo $pegawai_item->hp; ?></td>
                    <td><?php echo $pegawai_item->nama_jabatan; ?></td>
                    <td><?php echo $pegawai_item->nama_lokasi; ?></td>
                    <td>
                    <a href="<?php echo base_url('pegawai/ubah/'.$pegawai_item->id_pegawai); ?>" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" onclick="deleteConfirm(<?php echo $pegawai_item->id_pegawai; ?>)">Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </+>
        </table>
</div>
<script>
    function deleteConfirm(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "<?php echo base_url('pegawai/hapus/'); ?>" + id;
        }
    }
</script>