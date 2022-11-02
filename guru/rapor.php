    <?php 
        include '../config/session-guru.php';
        include '../config/view.php';

        $siswa = query("SELECT * FROM siswa WHERE kelas = $_SESSION[guru]");



    ?>

    <?php include 'tamplate/header.php'; ?>

                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">

                        <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <form action="cetak-raport.php" method="post" style="display:inline;">
                                                    <div class="row">

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
                                                            <label for="semester" class="form-label">Nilai Social</label>
                                                            <select class="form-control" data-toggle="select2" data-width="100%" name="semester" id="semester" required> 
                                                                <option value="">Semester...</option>
                                                                <option value="1 (Satu)">Semester I</option>
                                                                <option value="2 (Dua)">Semester II</option>
                                                                
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Periode Ajaran</label>
                                                            <input type="date" class="form-control" id="tanggal_awal"  name="tanggal_awal" required>
                                                            <br>
                                                            <input type="date" class="form-control" id="tanggal_akhir"  name="tanggal_akhir" required>
                                                        </div>

                                                        

                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-success waves-effect waves-light" style="top:6px">Cetak</button>
                                                        </div>
                                                    </div> <!-- end row -->
                                                        
                                                    </form>
                                            </div> <!-- end row -->

                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> 
                            <!-- end row-->

                        </div>
                    </div>
                </div>

    <?php include 'tamplate/footer.php'; ?>