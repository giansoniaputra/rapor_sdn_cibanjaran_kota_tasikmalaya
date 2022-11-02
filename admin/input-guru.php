<?php include '../config/session.php';
    include '../config/view.php';
    $query = query("SELECT * FROM guru");

    if(isset($_POST["submit"])){
        if (input_guru($_POST) > 0){
            echo "
            <script>
                alert('Data Guru Berhasil Ditambahkan')
                document.location.href= 'input-guru.php'
		    </script>
		";
    }else {
		echo "
		    <script>
		    	alert('Data Gagal Ditambahkan')
		    	document.location.href= 'input-guru.php'
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
                                        <h4 class="mt-0 header-title">Data Guru</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NPK</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Wali Kelas</th>
                                                <th>Opsi</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["NPK"]; ?></td>
                                                <td><?= $row["nama_lengkap"]; ?></td>
                                                <td><?= $row["alamat"]; ?></td>
                                                <td><?= $row["telepon"]; ?></td>
                                                <td><?= $row["wali_kelas"]; ?></td>
                                                <td>
                                                <div class="button-list">
                                                    <a href="edit-guru.php?id=<?= $row["NPK"] ?>"><button type="button" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                                    <a href="hapus-guru.php?id=<?= $row["NPK"] ?>"><button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></button></a>
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
                        <h4 class="modal-title" id="myCenterModalLabel">Tambah Data Guru</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="NPK" class="form-label">NPK</label>
                                <input type="number" class="form-control" id="NPK" placeholder="Enter name" name="NPK" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="nama_lengkap" placeholder="Enter name" name="nama_lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat" required> </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">telepon</label>
                                <input type="number" class="form-control" id="telepon" name="telepon" required>
                            </div>

                            <div class="mb-3">
                                <label for="wali_kelas" class="form-label">Wali Kelas</label>
                                <input type="number" class="form-control" id="teleponwali_kelas" name="wali_kelas" required>
                            </div>

                                <input type="hidden" name="level" value="guru">

                        
        
                                <button type="submit" class="btn btn-light waves-effect waves-light" name="submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->