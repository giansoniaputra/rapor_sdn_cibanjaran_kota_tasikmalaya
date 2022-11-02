
<?php 
    include '../config/session-guru.php';
    include '../config/view.php';
        //ambil data pelajaran
    $id = $_GET["id"];
    $now = mysqli_query($conn,"SELECT * FROM mapel WHERE nama_mapel = '$id'");
    $data = mysqli_fetch_assoc($now);
    $id_mapel = $data["id_mapel"];
    
            //query nilai berdasarkan mata pelajaran
        $query = query("SELECT * FROM nilai_pengetahuan 
        LEFT JOIN mapel ON nilai_pengetahuan.id_mapel = mapel.id_mapel 
        LEFT JOIN siswa ON nilai_pengetahuan.id_siswa = siswa.id_siswa
        WHERE nama_mapel = '$id' AND kelas = '$_SESSION[guru]'");
        //query data siswa
    $siswa = query("SELECT * FROM siswa WHERE kelas = '$_SESSION[guru]'");
    $mapel = query("SELECT * FROM mapel ORDER BY nama_mapel ASC");
    
        //action input nilai
    if(isset($_POST["submit"])){
        if (tambah_nilai($_POST) > 0){
            echo "
            <script>
                alert('Data Mata Pelajaran Berhasil Ditambahkan')
                document.location.href= 'nilai-pengetahuan.php?id=$data[nama_mapel]'
		    </script>
		";
    }else {
		echo "
		    <script>
		    	alert('Data Gagal Ditambahkan')
		    	document.location.href= 'nilai-pengetahuan.php?id=$data[nama_mapel]'
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

                    <br>
                   
                        <div class="row">
                            <div class="mt-3 mt-md-0">
                            <?php foreach($mapel as $row): ?>
                                    <a href="nilai-pengetahuan.php?id=<?= $row["nama_mapel"] ?>"><button type="button" class="btn btn-success width-md waves-effect waves-light"><?= $row["nama_mapel"]; ?></button></a>
                            <?php endforeach; ?> 
                            </div>
                        </div>
                        
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Data Nilai Pengetahuan <?= $data["nama_mapel"] ?></h4>
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NISN</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
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
                                                <th>PRS</th>
                                                <th>Deskripsi</th>
                                                
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach( $query as $row ) : ?>
                                                
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $row["NISN"]; ?></td>
                                                <td><?= $row["nama_lengkap"]; ?></td>
                                                <td><?= $row["jenis_kelamin"]; ?></td>
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
                                                <td><?= $row["PRE"]; ?></td>
                                                <td><?= $row["deskripsi"]; ?></td>

                                                
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


<!-- Modal -->
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Tambah Nilai Siswa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        
                            

                        <form action="" method="post">    
                        <div class="mb-3">
                           
                                <input type="hidden" name="id_mapel" id="id_mapel" value="<?= $id_mapel ?>">
                            <label for="id_siswa" class="form-label">Nama Siswa</label>
                                <select class="form-control" data-toggle="select2" data-width="100%" name="id_siswa" id="id_siswa" onchange="autofill()"> 
                                    <option value="">Nama Siswa</option>
                                        <?php foreach( $siswa as $row ) : ?>
                                            <option value="<?= $row["id_siswa"] ?>"><?= $row["nama_lengkap"] ?></option>
                                        <?php endforeach; ?>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="H1" class="form-label">Harian 1</label>
                                <input type="number" class="form-control" id="H1"  name="H1" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H2" class="form-label">Harian 2</label>
                                <input type="number" class="form-control" id="H2"  name="H2" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H3" class="form-label">Harian 3</label>
                                <input type="number" class="form-control" id="H3"  name="H3" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H4" class="form-label">Harian 4</label>
                                <input type="number" class="form-control" id="H4"  name="H4" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H5" class="form-label">Harian 5</label>
                                <input type="number" class="form-control" id="H5"  name="H5" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H6" class="form-label">Harian 6</label>
                                <input type="number" class="form-control" id="H6"  name="H6" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H7" class="form-label">Harian 7</label>
                                <input type="number" class="form-control" id="H7"  name="H7" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="H8" class="form-label">Harian 8</label>
                                <input type="number" class="form-control" id="H8"  name="H8" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="PTS" class="form-label">PTS</label>
                                <input type="number" class="form-control" id="PTS"  name="PTS" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="PAS" class="form-label">PAS</label>
                                <input type="number" class="form-control" id="PAS"  name="PAS" value="0">
                            </div>
                                <button type="submit" class="btn btn-light waves-effect waves-light" name="submit">Save</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

<!-- Footer Start -->
<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Adminto theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">

            <div data-simplebar class="H100">

                <div class="rightbar-title">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close"></i>
                    </a>
                    <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
                </div>
        
                <!-- Tab panes -->
                <div class="tab-content pt-0">  

                    <div class="tab-pane active" id="settings-tab" role="tabpanel">

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, Layout, etc.
                            </div>

                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-color" value="light"
                                    id="light-mode-check" checked />
                                <label class="form-check-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-color" value="dark"
                                    id="dark-mode-check" />
                                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-size" value="fluid" id="fluid" checked />
                                <label class="form-check-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="layout-size" value="boxed" id="boxed" />
                                <label class="form-check-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Menu positions -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-position" value="fixed" id="fixed-check"
                                    checked />
                                <label class="form-check-label" for="fixed-check">Fixed</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-position" value="scrollable"
                                    id="scrollable-check" />
                                <label class="form-check-label" for="scrollable-check">Scrollable</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="light" id="light" />
                                <label class="form-check-label" for="light-check">Light</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="dark" id="dark" checked/>
                                <label class="form-check-label" for="dark-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="brand" id="brand" />
                                <label class="form-check-label" for="brand-check">Brand</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="leftbar-color" value="gradient" id="gradient" />
                                <label class="form-check-label" for="gradient-check">Gradient</label>
                            </div>

                            <!-- size -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="default"
                                    id="default-size-check" checked />
                                <label class="form-check-label" for="default-size-check">Default</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="condensed"
                                    id="condensed-check" />
                                <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftbar-size" value="compact"
                                    id="compact-check" />
                                <label class="form-check-label" for="compact-check">Compact <small>(Small size)</small></label>
                            </div>

                            <!-- User info -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="sidebar-user" value="true" id="sidebaruser-check" />
                                <label class="form-check-label" for="sidebaruser-check">Enable</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check"
                                    checked />
                                <label class="form-check-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="form-check-label" for="lighttopbar-check">Light</label>
                            </div>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                                <a href="https://1.envato.market/admintoadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                            </div>

                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function autofill(){
                var id_siswa = $("#id_siswa").val();
                var id_mapel = $("#id_mapel").val();
                $.ajax({
                    url : 'autofill-ajax.php',
                    data : {'id_siswa':id_siswa,'id_mapel':id_mapel},
                }).success(function(data){
                    var json = data,
                    obj =JSON.parse(json);
                    $("#H1").val(obj.h1);
                    $("#H2").val(obj.h2);
                    $("#H3").val(obj.h3);
                    $("#H4").val(obj.h4);
                    $("#H5").val(obj.h5);
                    $("#H6").val(obj.h6);
                    $("#H7").val(obj.h7);
                    $("#H8").val(obj.h8);
                    $("#PTS").val(obj.pts);
                    $("#PAS").val(obj.pas);
                });
            }
        
        </script>
        <!-- third party js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>