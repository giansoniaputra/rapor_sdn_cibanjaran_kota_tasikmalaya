<?PHP include '../config/session.php';
    include '../config/view.php';
    $id = $_GET['id'];

        //query data mahasiswa berdasar ID
        $query = query("SELECT * FROM siswa WHERE NIS = $id")[0];

        if (isset($_POST["submit"])) {
            if (ubah_siswa($_POST) > 0) {
                echo "
                <script>
                    alert('Data Berhasil Diubah')
                    document.location.href= 'input-siswa.php'
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('Data Gagal Diubah')
                    document.location.href= 'input-siswa.php'
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
                                            <h4 class="header-title">Edit Siswa</h4>

                                            <form action="" method="post" class="parsley-examples">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id_siswa" parsley-trigger="change" class="form-control" id="id_siswa" value="<?= $query["id_siswa"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                
                                                    <input type="hidden" name="NISN" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="NISN" value="<?= $query["NISN"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                <input type="hidden" name="NIS" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="NIS" value="<?= $query["NIS"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_lengkap" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="nama_lengkap" value="<?= $query["nama_lengkap"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tempat_lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                                                    <input type="text" name="tempat_lahir" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="tempat_lahir"  value="<?= $query["tempat_lahir"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                                                    <input type="date" name="tanggal_lahir" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="tanggal_lahir" value="<?= $query["tanggal_lahir"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                        <select class="form-control" data-toggle="select2" data-width="100%" name="jenis_kelamin" id="jenis_kelamin" onchange="autofill()"> 
                                                            <option value="<?= $query["jenis_kelamin"]; ?>"><?= $query["jenis_kelamin"]; ?></option>
                                                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                                                            <option value="PEREMPUAN">PEREMPUAN</option>
                                                        </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="agama" class="form-label">Agama</label>
                                                        <select class="form-control" data-toggle="select2" data-width="100%" name="agama" id="agama" onchange="autofill()"> 
                                                            <option value="<?= $query["agama"]; ?>"><?= $query["agama"]; ?></option>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="ISLAM">ISLAM</option>
                                                            <option value="PROTESTAN">PROTESTAN</option>
                                                            <option value="BUDDHA">BUDDHA</option>
                                                            <option value="HINDU">HINDU</option>
                                                            <option value="KATOLIK">KATOLIK</option>
                                                            <option value="KHONGHUCU">KHONGHUCU</option>
                                                        </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="PS" class="form-label">Pendidikan Sebelumnya<span class="text-danger">*</span></label>
                                                    <input type="text" name="PS" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="PS"  value="<?= $query["PS"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kelas" class="form-label">Diterima Dikelas<span class="text-danger">*</span></label>
                                                    <input type="text" name="kelas" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="kelas"  value="<?= $query["kelas"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat_siswa" class="form-label">Alamat Siswa<span class="text-danger">*</span></label>
                                                    <input type="text" name="alamat_siswa" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="alamat_siswa"  value="<?= $query["alamat_siswa"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_ayah" class="form-label">Nama Ayah<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_ayah" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="nama_ayah" value="<?= $query["nama_ayah"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_ibu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_ibu" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="nama_ibu"  value="<?= $query["nama_ibu"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kerja_ayah" class="form-label">Pekerjaan Ayah<span class="text-danger">*</span></label>
                                                    <input type="text" name="kerja_ayah" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="kerja_ayah"  value="<?= $query["kerja_ayah"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kerja_ibu" class="form-label">Pekerjaan Ibu<span class="text-danger">*</span></label>
                                                    <input type="text" name="kerja_ibu" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="kerja_ibu"  value="<?= $query["kerja_ibu"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat_ortu" class="form-label">Alamat Orang Tua<span class="text-danger">*</span></label>
                                                    <input type="text" name="alamat_ortu" parsley-trigger="change" required placeholder="Enter user name" class="form-control" id="alamat_ortu"  value="<?= $query["alamat_ortu"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_wali" class="form-label">Nama Wali<span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_wali" parsley-trigger="change" placeholder="Enter user name" class="form-control" id="nama_wali"  value="<?= $query["nama_wali"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="kerja_wali" class="form-label">Pekerjaan Wali<span class="text-danger">*</span></label>
                                                    <input type="text" name="kerja_wali" parsley-trigger="change" placeholder="Enter user name" class="form-control" id="kerja_wali"  value="<?= $query["kerja_wali"]; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat_wali" class="form-label">Alamat Wali<span class="text-danger">*</span></label>
                                                    <input type="text" name="alamat_wali" parsley-trigger="change"  placeholder="Enter user name" class="form-control" id="alamat_wali"  value="<?= $query["alamat_wali"]; ?>" />
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
