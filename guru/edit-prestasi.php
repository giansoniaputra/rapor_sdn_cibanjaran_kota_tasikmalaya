<?PHP include '../config/session-guru.php';
    include '../config/view.php';
    $id = $_GET['id'];

        //query data mahasiswa berdasar ID
        $query = query("SELECT * FROM prestasi INNER JOIN siswa ON prestasi.id_siswa = siswa.id_siswa WHERE id_prestasi = $id")[0];

        $siswa = query("SELECT * FROM siswa");

        if (isset($_POST["submit"])) {
            if (edit_prestasi($_POST) > 0) {
                echo "
                <script>
                    alert('Data Berhasil Diubah')
                    document.location.href= 'prestasi.php'
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('Data Gagal Diubah')
                    document.location.href= 'prestasi.php'
                </script>
                ";
            }
        }






?>
<?PHP include 'tamplate/header.php'?>
                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">

                        <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Edit Prestasi</h4>

                                            <form action="" method="post" class="parsley-examples">

                                                <div class="mb-3">
                                                    <input type="hidden" name="id_prestasi" parsley-trigger="change" class="form-control" id="id_prestasi" value="<?= $query["id_prestasi"]; ?>" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="id_siswa" class="form-label">Nama Siswa</label>
                                                        <select class="form-control" data-toggle="select2" data-width="100%" name="id_siswa" id="id_siswa" required> 
                                                            <option value="<?= $query["id_siswa"] ?>"><?= $query["nama_lengkap"] ?></option>
                                                                <?php foreach( $siswa as $row ) : ?>
                                                                    <option value="<?= $row["id_siswa"] ?>"><?= $row["nama_lengkap"] ?></option>
                                                                <?php endforeach; ?>
                                                            
                                                        </select>
                                                    </div>
                                                <div class="mb-3">
                                                    <label for="jenis_prestasi" class="form-label">Jenis Prestasi<span class="text-danger">*</span></label>
                                                    <input type="text" name="jenis_prestasi" parsley-trigger="change" required class="form-control" id="jenis_prestasi" value="<?= $query["jenis_prestasi"]; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tingkat" class="form-label">Tingkat<span class="text-danger">*</span></label>
                                                    <input type="text" name="tingkat" parsley-trigger="change" required  class="form-control" id="tingkat" value="<?= $query["tingkat"]; ?>" />
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">Submit</button>
                                                    <button type="reset" class="btn btn-secondary waves-effect"><a href="transaksi.php">Cencel</a></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end card -->
                                </div>
                                <!-- end col -->       
                            
                        </div> <!-- container-fluid -->

                    </div> <!-- content -->


<?PHP include 'tamplate/footer.php'?>
