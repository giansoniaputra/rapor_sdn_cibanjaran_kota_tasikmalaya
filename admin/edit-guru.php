<?PHP include '../config/session.php';
    include '../config/view.php';
    $id = $_GET['id'];

        //query data mahasiswa berdasar ID
        $query = query("SELECT * FROM guru WHERE NPK = $id")[0];

        if (isset($_POST["submit"])) {
            if (ubah_guru($_POST) > 0) {
                echo "
                <script>
                    alert('Data Berhasil Diubah')
                    document.location.href= 'input-guru.php'
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('Data Gagal Diubah')
                    document.location.href= 'input-guru.php'
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
                                            <h4 class="header-title">Edit Guru</h4>

                                            <form action="" method="post" class="parsley-examples">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_guru" parsley-trigger="change" class="form-control" id="userName" value="<?= $query["id_guru"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                
                                                    <input type="hidden" name="NPK" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="NPK" value="<?= $query["NPK"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pass1" class="form-label">Nama Guru<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_lengkap" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="nama_lengkap" value="<?= $query["nama_lengkap"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pass1" class="form-label">Alamat<span class="text-danger">*</span></label>
                                                    <input type="text" name="alamat" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="alamat" value="<?= $query["alamat"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="pass1" class="form-label">Telepon<span class="text-danger">*</span></label>
                                                    <input type="number" name="telepon" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="telepon" value="<?= $query["telepon"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="wali_kelas" class="form-label">Wali Kelas<span class="text-danger">*</span></label>
                                                    <input type="number" name="wali_kelas" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="wali_kelas" value="<?= $query["wali_kelas"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <input type="hidden" name="level" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="level" value="<?= $query["level"]; ?>" />
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
