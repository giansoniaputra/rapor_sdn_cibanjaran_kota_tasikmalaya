<?php include '../config/session.php';
    include '../config/view.php';
    $query = query("SELECT * FROM siswa");

    if(isset($_POST["submit"])){
        if (input_siswa($_POST) > 0){
            echo "
            <script>
                alert('Data Siswa Berhasil Ditambahkan')
                document.location.href= 'input-siswa.php'
		    </script>
		";
    }else {
		echo "
		    <script>
		    	alert('Data Gagal Ditambahkan')
		    	document.location.href= 'input-siswa.php'
		    </script>
            ";
        }
    }
?>
<?php include 'tamplate/header.php';?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Data Siswa</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NISN</th>
                                                <th>NIS</th>
                                                <th>Nama Lengkap</th>
                                                <th>Pendidikan Sebelumnya</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["NISN"]; ?></td>
                                                <td><?= $row["NIS"]; ?></td>
                                                <td><?= $row["nama_lengkap"]; ?></td>
                                                <td><?= $row["PS"]; ?></td>
                                                <td>
                                                <div class="button-list">
                                                    <a href="detail-siswa.php?id=<?= $row["id_siswa"] ?>"><button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-search"></i></button></a>
                                                    <a href="edit-siswa.php?id=<?= $row["NIS"] ?>"><button type="button" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                                    <a href="hapus-siswa.php?id=<?= $row["NIS"] ?>"><button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></button></a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <div class="mt-3 mt-md-0">
                                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Tambah Data </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<?php include 'tamplate/footer.php';?> 
<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Tambah Data Siswa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="NISN" class="form-label">NISN</label>
                                <input type="number" class="form-control" id="NISN" placeholder="Enter name" name="NISN" required>
                            </div>

                            <div class="mb-3">
                                <label for="NIS" class="form-label">NIS</label>
                                <input type="number" class="form-control" id="NIS" placeholder="Enter name" name="NIS" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Enter name" name="nama_lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Enter name" name="tempat_lahir" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Enter name" name="tanggal_lahir" required>
                            </div>

                            <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="jenis_kelamin" id="jenis_kelamin" required> 
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="LAKI-LAKI">LAKI-LAKI</option>
                                    <option value="PEREMPUAN">PEREMPUAN</option>
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="agama" id="agama" required> 
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
                                <label for="PS" class="form-label">Pendidikan Sebelumnya</label>
                                <input type="text" class="form-control" id="PS" placeholder="Enter name" name="PS" required>
                            </div>

                            <div class="mb-3">
                                <label for="kelas" class="form-label">Diterima Dikelas</label>
                                <input type="number" class="form-control" id="kelas" placeholder="Enter name" name="kelas" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
                                <textarea type="text" class="form-control" id="alamat_siswa" placeholder="Enter name" name="alamat_siswa" required> </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" placeholder="Enter name" name="nama_ayah" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" placeholder="Enter name" name="nama_ibu" required>
                            </div>

                            <div class="mb-3">
                                <label for="kerja_ayah" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="kerja_ayah" placeholder="Enter name" name="kerja_ayah" required>
                            </div>

                            <div class="mb-3">
                                <label for="kerja_ibu" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="kerja_ibu" placeholder="Enter name" name="kerja_ibu" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat_ortu" class="form-label">Alamat Orang Tua</label>
                                <textarea type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" required> </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="nama_wali" class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" id="nama_wali" name="nama_wali">
                            </div>

                            <div class="mb-3">
                                <label for="kerja_wali" class="form-label">Pekerjaan Wali</label>
                                <input type="text" class="form-control" id="kerja_wali" name="kerja_wali">
                            </div>

                            <div class="mb-3">
                                <label for="alamat_wali" class="form-label">Alamat Wali</label>
                                <textarea type="text" class="form-control" id="alamat_wali" name="alamat_wali"> </textarea>
                            </div>

                                <input type="hidden" name="level" value="siswa">

                        
        
                                <button type="submit" class="btn btn-light waves-effect waves-light" name="submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->