<?php 
    include '../config/session-guru.php';
    include '../config/view.php';

    $query = query("SELECT * FROM prestasi INNER JOIN siswa ON prestasi.id_siswa = siswa.id_siswa");

    $siswa = query("SELECT * FROM siswa");

    if(isset($_POST["submit"])){
        if (input_prestasi($_POST) > 0){
            echo "
            <script>
                alert('Data Berhasil Ditambahkan')
                document.location.href= 'prestasi.php'
		    </script>
		";
    }else {
		echo "
		    <script>
		    	alert('Data Gagal Ditambahkan')
		    	document.location.href= 'prestasi.php'
		    </script>
            ";
        }
    }



?>

<?php include 'tamplate/header.php'?>

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <br>
                   
                        <div class="mt-3 mt-md-0">
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Tambah Data </button>
                        </div>
                        
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Data Prestasi Siswa</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jenis Prestasi</th>
                                                <th>Tingkat</th>
                                                <th>OPSI</th>
                                                
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama_lengkap"]; ?></td>
                                                <td><?= $row["kelas"]; ?></td>
                                                <td><?= $row["jenis_prestasi"]; ?></td>
                                                <td><?= $row["tingkat"]; ?></td>
                                                <td>
                                                    <div class="button-list">
                                                        <a href="edit-prestasi.php?id=<?= $row["id_prestasi"] ?>"><button type="button" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                                        <a href="hapus-prestasi.php?id=<?= $row["id_prestasi"] ?>"><button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php include 'tamplate/footer.php'?>
<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Tambah Prestasi Siswa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post">    
                        <div class="mb-3">
                            <label for="id_siswa" class="form-label">Nama Siswa</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="id_siswa" id="id_siswa" required> 
                                    <option value="">Nama Siswa</option>
                                        <?php foreach( $siswa as $row ) : ?>
                                            <option value="<?= $row["id_siswa"] ?>"><?= $row["nama_lengkap"] ?></option>
                                        <?php endforeach; ?>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_prestasi" class="form-label">Jenis Prestasi</label>
                                <textarea type="text" class="form-control" id="jenis_prestasi"  name="jenis_prestasi" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tingkat" class="form-label">Tingkat</label>
                                <input type="text" class="form-control" id="tingkat"  name="tingkat">
                            </div>
                                <button type="submit" class="btn btn-light waves-effect waves-light" name="submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->