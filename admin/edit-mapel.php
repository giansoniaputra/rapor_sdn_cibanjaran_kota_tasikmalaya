<?PHP include '../config/session.php';
    include '../config/view.php';
    $id = $_GET['id'];

        //query data mahasiswa berdasar ID
        $query = query("SELECT * FROM mapel WHERE id_mapel = $id")[0];

        if (isset($_POST["submit"])) {
            if (ubah_mapel($_POST) > 0) {
                echo "
                <script>
                    alert('Data Berhasil Diubah')
                    document.location.href= 'input-mapel.php'
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('Data Gagal Diubah')
                    document.location.href= 'input-mapel.php'
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
                                            <h4 class="header-title">Edit Mata Pelajaran</h4>

                                            <form action="" method="post" class="parsley-examples">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_mapel" parsley-trigger="change" class="form-control" id="userName" value="<?= $query["id_mapel"]; ?>" />
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="pass1" class="form-label">Nama Mata Pelajaran<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_mapel" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="nama_mapel" value="<?= $query["nama_mapel"]; ?>" />
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
