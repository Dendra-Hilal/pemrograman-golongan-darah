  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Buku</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/goldar/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Buku</a><a href="<?= base_url; ?>/goldar/laporan" class="btn float-right btn-xs btn btn-info">Laporan Buku</a><a href="<?= base_url; ?>/goldar/lihatlaporan" class="btn float-right btn-xs btn btn-warning">Lihat Laporan Buku</a></div>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/goldar/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/goldar" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Golongan Darah</th>
                      <th>Jumlah Total Masyarakat</th>
                      <th>Persentasi Jumlah Masyarakat</th>
                      <th>Jumlah Laki-Laki</th>
                      <th>Persentasi Jumlah Laki-Laki</th>
                      <th>Jumlah Perempuan</th>
                      <th>Persentasi Jumlah Perempuan</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['goldar'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><div class="badge badge-warning"><?= $row['nama_kategori'];?></div></td>
                      <td><?= $row['jumlah_total'];?></td>
                      <td><?= $row['persen_total'];?></td>
                      <td><?= $row['jumlah_laki'];?></td>
                      <td><?= $row['persen_laki'];?></td>
                      <td><?= $row['jumlah_perempuan'];?></td>
                      <td><?= $row['persen_perempuan'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/goldar/edit/<?= $row['id'] ?>" class="badge badge-info">Edit</a> <a href="<?= base_url; ?>/goldar/hapus/<?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

