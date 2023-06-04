  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Golongan Darah</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/goldar/updateGoldar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['goldar']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kategori Golongan Darah</label>
                    <select class="form-control" name="kategori_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['kategori'] as $row) :?>
                        <option value="<?= $row['id']; ?>" <?php if($data['goldar']['kategori_id'] == $row['id']) { echo "selected"; } ?>><?= $row['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Total Masyarakat</label>
                    <input type="text" class="form-control" placeholder="Masukkan jumlah total masyarakat..." name="jumlah_total" value="<?= $data['goldar']['jumlah_total'];?>">
                  </div>
                  <div class="form-group">
                    <label>Persentasi Total Keseluruhan</label>
                    <input type="text" class="form-control" placeholder="Masukkan presentasi jumlah masyarakat..." name="persen_total" value="<?= $data['goldar']['persen_total'];?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Laki-Laki</label>
                    <input type="text" class="form-control" placeholder="Masukkan jumlah laki-laki..." name="jumlah_laki" value="<?= $data['goldar']['jumlah_laki'];?>">
                  </div>
                  <div class="form-group">
                    <label>Persentasi Jumlah Laki-Laki</label>
                    <input type="text" class="form-control" placeholder="Masukkan presentasi jumlah laki-laki..." name="persen_laki" value="<?= $data['goldar']['persen_laki'];?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Perempuan</label>
                    <input type="text" class="form-control" placeholder="Masukkan jumlah perempuan..." name="jumlah_perempuan" value="<?= $data['goldar']['jumlah_perempuan'];?>">
                  </div>
                  <div class="form-group">
                    <label>Persentasi Jumlah Perempuan</label>
                    <input type="text" class="form-control" placeholder="Masukkan presentasi jumlah perempuan..." name="persen_perempuan" value="<?= $data['goldar']['persen_perempuan'];?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->