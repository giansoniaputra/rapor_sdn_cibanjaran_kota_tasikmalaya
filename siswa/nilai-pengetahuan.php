<?php 
    include '../config/session-siswa.php';
    include '../config/view.php';

    $query = query("SELECT * FROM nilai_pengetahuan RIGHT JOIN mapel ON nilai_pengetahuan.id_mapel = mapel.id_mapel WHERE id_siswa = '$_SESSION[siswa]'");
   

?>

<?php include 'tamplate/header.php'; ?>

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Data Nilai Pengetahuan</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Mata Pelajaran</th>
                                                <th>H1</th>
                                                <th>H2</th>
                                                <th>H3</th>
                                                <th>H4</th>
                                                <th>H5</th>
                                                <th>H6</th>
                                                <th>H7</th>
                                                <th>H8</th>
                                                <th>RPH</th>
                                                <th>PTS</th>
                                                <th>PAS</th>
                                                <th>HPA</th>
                                                
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["nama_mapel"]; ?></td>
                                                <td><?= $row["H1"]; ?></td>
                                                <td><?= $row["H2"]; ?></td>
                                                <td><?= $row["H3"]; ?></td>
                                                <td><?= $row["H4"]; ?></td>
                                                <td><?= $row["H5"]; ?></td>
                                                <td><?= $row["H6"]; ?></td>
                                                <td><?= $row["H7"]; ?></td>
                                                <td><?= $row["H8"]; ?></td>
                                                <td><?= $row["RPH"]; ?></td>
                                                <td><?= $row["PTS"]; ?></td>
                                                <td><?= $row["PAS"]; ?></td>
                                                <td><?= $row["HPA"]; ?></td>
                                                

                                                
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


<?php include 'tamplate/footer.php'; ?>