<?php 
    include '../config/session-siswa.php';
    include '../config/view.php';

    $sum = query("SELECT count(kehadiran) as hadir FROM absen_siswa WHERE kehadiran = 'H' AND id_siswa = '$_SESSION[siswa]'");
    $sum2 = query("SELECT count(kehadiran) as izin FROM absen_siswa WHERE kehadiran = 'I' AND id_siswa = '$_SESSION[siswa]'");
    $sum3 = query("SELECT count(kehadiran) as alfa FROM absen_siswa WHERE kehadiran = 'A' AND id_siswa = '$_SESSION[siswa]'");
   

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
                                        <h4 class="mt-0 header-title">Data Absensi Siswa</h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>Aspek Kehadiran</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                           
                                            <?php foreach( $sum as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= '1'; ?></td>
                                                <td><?= 'Hadir'; ?></td>
                                                <td><?= $row["hadir"]; ?></td>
                                                
                                            </tr>
                                            
                                            <?php endforeach; ?>

                                            <?php foreach( $sum2 as $row ) : ?>
                                                
                                                <tr>
                                                    <td><?= '2'; ?></td>
                                                    <td><?= 'Izin'; ?></td>
                                                    <td><?= $row["izin"]; ?></td>
                                                    
                                                </tr>
                                                
                                                <?php endforeach; ?>

                                                <?php foreach( $sum3 as $row ) : ?>
                                                
                                                <tr>
                                                    <td><?= '3'; ?></td>
                                                    <td><?= 'Alfa'; ?></td>
                                                    <td><?= $row["alfa"]; ?></td>
                                                    
                                                </tr>
                                                
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


<?php include 'tamplate/footer.php'; ?>