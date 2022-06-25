        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"> <i class="far fa-newspaper"></i> <?= $title; ?> Berita</h1>


                 <!-- Basic Card Example -->
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Detail Berita</h6>
                    </div>
                    <div class="card-body">

                    <input type="hidden" name="id" value="<?= $berita['id']; ?>">
                    <h3><?= $berita['judul']; ?></h3>         
                    <p><i class="fas fa-calendar-alt"></i> <?= format_indo(date($berita['tanggal'])); ?> Wita</p>
                    <center><img src="<?= base_url('assets/img/berita/'); ?><?= $berita['gambar']; ?>" class="img-thumbnail" width="700px"></center>
                    <p><?= $berita['isi']; ?></p>     
                    <hr> 
                     
                    <p><i class="far fa-list-alt"></i> <?= $berita['kategori']; ?></p> 
                    
                    <p>
                    <?php $cek = 'publish'; ?>
                        <?php if ($berita['status'] == $cek) : ?>

                            <i class="fas fa-check-circle"></i>
                            publish
                        <?php else : ?>
                            <i class="fas fa-times-circle"></i>
                           draff
                        <?php endif; ?>
                    </p>   
                    <p><i class="fas fa-user"></i> <?= $berita['user']; ?> </p>   
                    



                </div>
                </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->