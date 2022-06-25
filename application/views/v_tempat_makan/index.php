        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-utensils"></i> <?= $title; ?></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tempat Makan</h6>
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
                    <a href="<?= base_url('c_tempat_makan/tambah_data'); ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus-circle"></i>
                        </span>
                        <span class="text" data-toggle="modal" data-target="#exampleModal">Tambah Data Tempat Makan</span>
                    </a>

                    <div class="btn-group mb-3 mr-5 ml-3 mt-1 shadow">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-file"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_tempat_makan/pdf' ?>">PDF</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_tempat_makan/word' ?>">Word</a>
                            <a class="dropdown-item" href="<?php echo base_url() . 'c_tempat_makan/Excel' ?>">Excel</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tempat Makan</th>
                                    <th>Alamat</th>
                                    <th>Menu Favorite</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tempat_makan as $t) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $t['nama_tempat_makan']; ?></td>
                                        <td><?= $t['alamat_tempat_makan']; ?></td>
                                        <td><?= $t['menu_favorite']; ?></td>
                                        <td>
                                            <img src="<?php echo base_url(); ?>assets/img/tempat_makan/<?= $t['foto_tempat_makan']; ?>" width="100" height="100">
                                        </td>
                                        <td>
                                            <a href="<?= base_url('c_tempat_makan/edit_data/'); ?><?= $t['id_tempat_makan']; ?>" class="badge badge-success">
                                                <i class="fas fa-edit"></i>
                                                edit</a>
                                            <a onclick="deleteConfirm('<?= base_url('c_tempat_makan/hapus_data/' . $t['id_tempat_makan']) ?>')" href="#!" class="badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>
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
        <!-- End of Main Content -->
        <!-- Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus Data Tempat Makan?</h5>
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