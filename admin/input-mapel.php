<?php 
    include '../config/session.php';
    include '../config/view.php';
    $query = query("SELECT * FROM mapel");

    if(isset($_POST["submit"])){
        if (input_mapel($_POST) > 0){
            echo "
            <script>
                alert('Data Mata Pelajaran Berhasil Ditambahkan')
                document.location.href= 'input-mapel.php'
		    </script>
		";
    }else {
		echo "
		    <script>
		    	alert('Data Gagal Ditambahkan')
		    	document.location.href= 'input-mapel.php'
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
                                        <h4 class="mt-0 header-title">Data Mata Pelajaran</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Nama Mata Pelajaran</th>
                                                <th>Opsi</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama_mapel"]; ?></td>
                                                <td>
                                                <div class="button-list">
                                                    <a href="edit-mapel.php?id=<?= $row["id_mapel"] ?>"><button type="button" class="btn btn-warning waves-effect waves-light"><i class="fe-edit"></i></button></a>
                                                    <a href="hapus-mapel.php?id=<?= $row["id_mapel"] ?>"><button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></button></a>
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
                        <h4 class="modal-title" id="myCenterModalLabel">Tambah Data Mata Pelajaran</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="NPK" placeholder="Enter name" name="nama_mapel" required>
                            </div>
                                <button type="submit" class="btn btn-light waves-effect waves-light" name="submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->