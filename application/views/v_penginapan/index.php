        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-bed"></i> <?= $title; ?></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penginapan</h6>
                </div>

                <div class="row mt-2 ml-md-2 text-center">
                    <div class="col-md-1">

                    </div>
                    <div class="col-sm-10">
                        <?= form_error('image', '<div class="error">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('c_penginapan/tambah_data'); ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text" data-toggle="modal" data-target="#exampleModal">Tambah Data Penginapan</span>
                    </a>

                    <div class="btn-group mb-3 mr-5 ml-3 mt-1 shadow">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-file"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_penginapan/pdf' ?>">PDF</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_penginapan/word' ?>">Word</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_penginapan/Excel' ?>">Excel</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penginapan</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Orang</th>
                                    <th>Fasilitas</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($penginapan as $a) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $a['nama_penginapan']; ?></td>
                                        <td><?= $a['alamat_penginapan']; ?></td>
                                        <td><?= $a['jumlah_orang']; ?></td>
                                        <td><?= $a['fasilitas_penginapan']; ?></td>
                                        <td>
                                            <img src="<?php echo base_url(); ?>assets/img/penginapan/<?= $a['foto_penginapan']; ?>" width="100" height="100">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('c_penginapan/edit_data/'); ?><?= $a['id_penginapan']; ?>" class="badge badge-success">
                                                <i class="fas fa-edit"></i>
                                                edit</a>
                                            <a onclick="deleteConfirm('<?= base_url('c_penginapan/hapus_data/' . $a['id_penginapan']) ?>')" href="#!" class="badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- Modal Tambah Data-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Penginapan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('c_penginapan/tambah_data'); ?>
                        <div class="form-group">
                            <label>Nama Penginapan</label>
                            <input type="text" name="nama_penginapan" placeholder="Contoh : Hotel Abadi" style="font-style:italic" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat_penginapan" class="form-control" placeholder="Contoh : Jalan Mangga No.40, Madiun, Jawa Timur" style="font-style:italic" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Orang</label>
                            <input type="text" name="jumlah_orang" class="form-control" placeholder="Contoh : 2 orang" style="font-style:italic" required>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <input type="text" name="fasilitas_penginapan" class="form-control" placeholder="Contoh : Kolam renang, free wifi, play ground" style="font-style:italic" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Penginapan</label>
                            <input type="file" name="foto_penginapan" class="form-control" required>
                        </div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Main Content -->
        <!-- Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus Data Penginapan?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function deleteConfirm(url) {
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>