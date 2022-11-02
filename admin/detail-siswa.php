<?php include '../config/session.php'; ?>
<?php 
include '../config/view.php';



//Ambil Data Siswa
$id = $_GET["id"];
$query = query("SELECT * FROM siswa WHERE id_siswa = '$id'")[0];

?>
<?php include 'tamplate/header.php'; ?>

<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2> Detail Siswa</h2>
                                        <hr><br>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                            <tbody>

                                            <tr>
                                                <td style="width: 30px"><h4>NISN</h4></td>
                                                <td><h4><?= $query["NISN"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>NIS</h4></td>
                                                <td><h4><?= $query["NIS"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Nama Lengkap</h4></td>
                                                <td><h4><?= $query["nama_lengkap"]; ?></h4></td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="width: 30px"><h4>Tempat Lahir</h4></td>
                                                <td><h4><?= $query["tempat_lahir"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Tanggal Lahir</h4></td>
                                                <td><h4><?= $query["tanggal_lahir"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Jenis Kelamin</h4></td>
                                                <td><h4><?= $query["jenis_kelamin"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Pendidikan Sebelumnya</h4></td>
                                                <td><h4><?= $query["PS"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Diteima Dikelas</h4></td>
                                                <td><h4><?= $query["kelas"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Alamat Siswa</h4></td>
                                                <td><h4><?= $query["alamat_siswa"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Nama Ayah</h4></td>
                                                <td><h4><?= $query["nama_ayah"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Nama Ibu</h4></td>
                                                <td><h4><?= $query["nama_ibu"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Pekerjaan Ayah</h4></td>
                                                <td><h4><?= $query["kerja_ayah"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Pekerjaan Ibu</h4></td>
                                                <td><h4><?= $query["kerja_ibu"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Alamat Orang Tua</h4></td>
                                                <td><h4><?= $query["alamat_ortu"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Nama Wali</h4></td>
                                                <td><h4><?= $query["nama_wali"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Pekerjaan Wali</h4></td>
                                                <td><h4><?= $query["kerja_wali"]; ?></h4></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 30px"><h4>Alamat Wali</h4></td>
                                                <td><h4><?= $query["alamat_wali"]; ?></h4></td>
                                            </tr>

                                           

                                            </tbody>
                                        </table>
                                        <div class="mt-3 mt-md-0">
                                            <a href="edit.php?id=<?= $row["id_siswa"] ?>"><button type="button" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                            <a href="input-siswa.php"><button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-arrow-left"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div> <!-- end row -->

<?php include 'tamplate/footer.php'; ?>