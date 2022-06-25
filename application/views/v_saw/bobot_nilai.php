<div class="container-fluid">
   <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message'); ?>
   <?php endif; ?>
   <!-- tempat kriteria -->
   <div class="tab-pane" id="nilai">

     <form method="post" action="<?= base_url() . 'c_penilaian/tambah_data'; ?>">
       <div class="form-group">
         <label>Nama Paket Wisata</label>
         <select name="id_paket_wisata" id="id_paket_wisata" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih Nama Paket wisata dahulu!')" oninput="setCustomValidity('')">
           <option value="">Pilih Nama Paket Wisata</option>
           <?php foreach ($paket_wisata as $pkt) : ?>
             <option value="<?= $pkt['id_paket_wisata']; ?>">[<?= $pkt['nama_paket_wisata']; ?>]-<?= $pkt['nama_paket_wisata']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Durasi(C1)</label>
         <select name="C1" id="C1" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih Durasi dahulu')" oninput="setCustomValidity('')">
           <option value="">Pilih SubKriteria C1</option>
           <?php foreach ($durasi as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Usia(C2)</label>
         <select name="C2" id="C2" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih Usia dahulu')" oninput="setCustomValidity('')">>
           <option value="">Pilih SubKriteria C2</option>
           <?php foreach ($usia as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <div class="form-group">
         <label>Harga Paket(C3)</label>
         <select name="C3" id="C3" class="form-control input-lg" required oninvalid="this.setCustomValidity('Pilih Harga dahulu')" oninput="setCustomValidity('')">>
           <option value="">Pilih SubKriteria C3</option>
           <?php foreach ($harga_paket as $row) : ?>
             <option value="<?= $row['id_subkriteria']; ?>"><?= $row['ket_sub']; ?></option>
           <?php endforeach; ?>
         </select>
       </div>
       <button type="submit" class="btn btn-primary float-right">Simpan</button>
     </form>
     <br><br>
     <hr><br>
     <div class="table-responsive">
       <table id="data" class="table table-bordered table-hover">
         <thead class="table-success">
           <tr>
             <th>No</th>
             <th>Nama Paket Wisata</th>
             <th>Durasi(C1)</th>
             <th>Usia(C2)</th>
             <th>Harga Paket(C3)</th>
             <th style="width: 15%">Opsi</th>
           </tr>
         </thead>
         <tbody>
           <?php
            $no = 1;
            foreach ($nilai as $n) : ?>
             <tr>
               <td width="20px"><?= $no++; ?></td>
               <td><?= $n->nm_ag; ?></td>
               <td><?= $n->nm_sub; ?></td><!-- C1 -->
               <td><?= $n->sub; ?></td><!-- C2 -->
               <td><?= $n->nmsub; ?></td><!-- C3 -->
               <td class="text-center">
                 <a href="<?= base_url(); ?>c_penilaian/edit_data/<?= $n->id_nilai; ?>" class="badge badge-pill badge-warning"><i class="fa fa-edit"></i> Ubah</a>
                 <a onclick="deleteConfirm('<?= base_url('c_penilaian/hapus_data/'); ?><?= $n->id_nilai; ?>')" href="#!" class="badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>
               </td>
             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>
     </div>
   </div>

 </div>
  <!-- Modal tambah kriteria-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title; ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?= base_url() . 'c_kriteria/tambah_data'; ?>">
                <div class="form-group">
                  <label>Kode kriteria</label>
                  <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" placeholder="contoh C1..." required oninvalid="this.setCustomValidity('Kode tidak boleh kosong!')" oninput="setCustomValidity('')">

                </div>
                <div class="form-group">
                  <label>Keterangan kriteria</label>
                  <input type="text" class="form-control" id="ket" name="ket" required oninvalid="this.setCustomValidity('Keterangan tidak boleh kosong!')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>Bobot</label>
                  <input type="number" class="form-control" id="bobot" name="bobot" required oninvalid="this.setCustomValidity('Bobot tidak boleh kosong!')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label>Atribut</label>
                  <select name="attribut" id="attribut" class="form-control input-lg" required oninvalid="this.setCustomValidity('Atribut tidak boleh kosong!')" oninput="setCustomValidity('')">
                    <option value="">Pilih Atribut</option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </form>

                  <input type="number" class="form-control" id="bobot" name="bobot" required oninvalid="this.setCustomValidity('Atribut tidak boleh kosong!')" oninput="setCustomValidity('')">

            </div>
          </div>
        </div>
      </div>
      <!-- end Modal tambah-->
      <!-- Delete Confirmation-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus Data Penilaian?</h5>
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