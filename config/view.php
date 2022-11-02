<?php 
include 'config.php';

//FUNCTION QUERY--------------------------------------------------------------------------------------------------
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows [] = $row;

        }
        return $rows;
    }

//FUNCTION HARI INI---------------------------------------------------------------------------------------------------------


	

//FUNCTION PENDAFTARAN-------------------------------------------------------------------------------------------------
    function registrasi($data){
        global $conn;
        $nama = ucwords(strtolower(htmlspecialchars($data["nama_lengkap"])));
        $user = strtolower(stripslashes($data["username"]));
        $pass = mysqli_real_escape_string($conn,$data["password"]);
        $pass2 = mysqli_real_escape_string($conn,$data["password2"]);
        $level = $data["level"];

            //pengecekan apakah username telah terdaftar
            $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$user'");
                if(mysqli_fetch_assoc($cek)) {
                    echo "
                    <script>
                        alert('Username Sudah Terdafar');
                    </script>
                ";
                return false;
                }
        
        //pengecekan apakah konfirmasi password sama
        if($pass !== $pass2){
            echo "
                <script>
                    alert('Konfirmasi Password Tidak Sama');
                </script>
            ";
            return false;
        }
    
        //enkripsi password
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        
        $input_admin = "INSERT INTO users VALUE ('','$user','$pass','$nama','$level') ";
        mysqli_query($conn,$input_admin);
        return mysqli_affected_rows($conn);

    }

//FUNCTION TAMBAH DATA GURU----------------------------------------------------------------------------------------------------
    function input_guru($data){
        global $conn;

            //Kebutuhan input ke data tabel guru
        $NPK = htmlspecialchars($data["NPK"]);
        $nama_lengkap = htmlspecialchars(ucwords(strtolower($data["nama_lengkap"])));
        $alamat = htmlspecialchars($data["alamat"]);
        $telepon = htmlspecialchars($data["telepon"]);
        $kelas = htmlspecialchars($data["wali_kelas"]);

            //kebutuhan membuat akun guru
        $user = strtolower(stripslashes($data["NPK"]));
        $pass = mysqli_real_escape_string($conn,$data["NPK"]);
        $level = $data["level"];

             //pengecekan apakah username telah terdaftar
             $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$user'");
             if(mysqli_fetch_assoc($cek)) {
                 echo "
                 <script>
                     alert('Data Guru Sudah Terdafar');
                 </script>
             ";
             return false;
            }

             //enkripsi password
            $pass = password_hash($pass, PASSWORD_DEFAULT);


        $input_guru = "INSERT INTO guru VALUE('','$NPK','$nama_lengkap','$alamat','$telepon','$level','$kelas')";
        $akun_guru = "INSERT INTO users VALUE('','$user','$pass','$nama_lengkap','$level')";

        mysqli_query($conn,$input_guru);
        mysqli_query($conn,$akun_guru);
        return mysqli_affected_rows($conn);
            
    }
//FUNCTION HAPUS DATA GURU-----------------------------------------------------------------------------------------------------------
    function hapus_guru($id){
        global $conn;
        $hapus_guru =  "DELETE FROM guru WHERE NPK = $id";
        $hapus_akun =  "DELETE FROM users WHERE username = $id";

            //Menghapus data guru dari tabel GURU
        mysqli_query($conn,$hapus_guru);
        
            //menghapus data akun guru dari tabel id_users
        mysqli_query($conn,$hapus_akun);

            //Action QUERY
        return mysqli_affected_rows($conn);
    }


//FUNCTION UBAH DATA GURU------------------------------------------------------------------------------------------------------------------
    function ubah_guru($data){
        global $conn;
        $NPK = htmlspecialchars($data["NPK"]);
        $id = $data["id_guru"];
        
        $nama_lengkap = htmlspecialchars(ucwords(strtolower($data["nama_lengkap"])));
        $alamat = htmlspecialchars($data["alamat"]);
        $telepon = htmlspecialchars($data["telepon"]);
        $level = $data["level"];
        $kelas = htmlspecialchars($data["wali_kelas"]);
          
        
        $input_guru = "UPDATE guru SET NPK='$NPK', nama_lengkap='$nama_lengkap', alamat='$alamat', telepon='$telepon', level='$level', wali_kelas='$kelas' WHERE id_guru = $id";
       
        mysqli_query($conn,$input_guru);
        return mysqli_affected_rows($conn);



    }

//FUNCTION TAMBAH DATA SISWA--------------------------------------------------------------------------------------------------------------------
    function input_siswa($data){
        global $conn;

            //Kebutuhan input ke data tabel siswa
        $NISN = htmlspecialchars($data["NISN"]);
        $NIS = htmlspecialchars($data["NIS"]);
        $nama_lengkap = htmlspecialchars(ucwords(strtolower($data["nama_lengkap"])));
        $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $agama = htmlspecialchars($data["agama"]);
        $PS = htmlspecialchars($data["PS"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $alamat_siswa = htmlspecialchars($data["alamat_siswa"]);
        $nama_ayah = htmlspecialchars($data["nama_ayah"]);
        $nama_ibu = htmlspecialchars($data["nama_ibu"]);
        $kerja_ayah = htmlspecialchars($data["kerja_ayah"]);
        $kerja_ibu = htmlspecialchars($data["kerja_ibu"]);
        $alamat_ortu = htmlspecialchars($data["alamat_ortu"]);
        $nama_wali = htmlspecialchars($data["nama_wali"]);
        $kerja_wali = htmlspecialchars($data["kerja_wali"]);
        $alamat_wali = htmlspecialchars($data["alamat_wali"]);

            //kebutuhan membuat akun siswa
        $user = strtolower(stripslashes($data["NIS"]));
        $pass = mysqli_real_escape_string($conn,$data["NIS"]);
        $level = $data["level"];

             //pengecekan apakah username telah terdaftar
             $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$user'");
             if(mysqli_fetch_assoc($cek)) {
                 echo "
                 <script>
                     alert('Data Siswa Sudah Terdafar');
                 </script>
             ";
             return false;
            }

             //enkripsi password
            $pass = password_hash($pass, PASSWORD_DEFAULT);


        $input_siswa = "INSERT INTO siswa VALUE('','$NISN','$NIS','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$PS','$kelas','$alamat_siswa','$nama_ayah','$nama_ibu','$kerja_ayah','$kerja_ibu','$alamat_ortu','$nama_wali','$kerja_wali','$alamat_wali','$level')";
        $akun_siswa = "INSERT INTO users VALUE('','$user','$pass','$nama_lengkap','$level')";

        mysqli_query($conn,$input_siswa);
        mysqli_query($conn,$akun_siswa);
        return mysqli_affected_rows($conn);
            
    }

//FUNCTION HAPUS DATA SISWA---------------------------------------------------------------------------------------------------------------------------
    function hapus_siswa($id){
        global $conn;
        $hapus_siswa =  "DELETE FROM siswa WHERE NIS = $id";
        $hapus_akun =  "DELETE FROM users WHERE username = $id";

            //Menghapus data siswa dari tabel SISWA
        mysqli_query($conn,$hapus_siswa);
        
            //menghapus data akun siswa dari tabel id_users
        mysqli_query($conn,$hapus_akun);

            //Action QUERY
        return mysqli_affected_rows($conn);
    }

//FUNCTION UBAH DATA GURU-----------------------------------------------------------------------------------------------------------------------------------
    function ubah_siswa($data){
        global $conn;
        $NIS = htmlspecialchars($data["NIS"]);
        $id = $data["id_siswa"];
        
        $NISN = $data["NISN"];
        $nama_lengkap = htmlspecialchars(ucwords(strtolower($data["nama_lengkap"])));
        $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
        $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $agama = htmlspecialchars($data["agama"]);
        $PS = htmlspecialchars($data["PS"]);
        $kelas = htmlspecialchars($data["kelas"]);
        $alamat_siswa = htmlspecialchars($data["alamat_siswa"]);
        $nama_ayah = htmlspecialchars($data["nama_ayah"]);
        $nama_ibu = htmlspecialchars($data["nama_ibu"]);
        $kerja_ayah = htmlspecialchars($data["kerja_ayah"]);
        $kerja_ibu = htmlspecialchars($data["kerja_ibu"]);
        $alamat_ortu = htmlspecialchars($data["alamat_ortu"]);
        $nama_wali = htmlspecialchars($data["nama_wali"]);
        $kerja_wali = htmlspecialchars($data["kerja_wali"]);
        $alamat_wali = htmlspecialchars($data["alamat_wali"]);
        $level = $data["level"];
          

        $input_siswa = "UPDATE siswa SET NISN='$NISN', NIS='$NIS', nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin',agama='$agama', PS='$PS', kelas='$kelas', alamat_siswa='$alamat_siswa', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', kerja_ayah='$kerja_ayah', kerja_ibu='$kerja_ibu', alamat_ortu='$alamat_ortu', nama_wali='$nama_wali', kerja_wali='$kerja_wali', alamat_wali='$alamat_wali', level='$level' WHERE id_siswa = $id";
       
        mysqli_query($conn,$input_siswa);
        return mysqli_affected_rows($conn);



    }

//FUNCTION TAMBAH DATA MATA PELAJARAN------------------------------------------------------------------------------------------------------------------------------
    function input_mapel($data){
        global $conn;

            //Kebutuhan input ke data tabel mapel
        $nama_mapel = htmlspecialchars(strtoupper($data["nama_mapel"]));

        $input_mapel= "INSERT INTO mapel VALUE('','$nama_mapel')";
        mysqli_query($conn,$input_mapel);
        return mysqli_affected_rows($conn);

    }

//FUNCTION HAPUS DATA MATA PELAJARAN----------------------------------------------------------------------------------------------------------------------------------
    function hapus_mapel($id){
        global $conn;
        $hapus_mapel =  "DELETE FROM mapel WHERE id_mapel = $id";

            //Menghapus data mapel dari tabel mapel
        mysqli_query($conn,$hapus_mapel);
        
            //Action QUERY
        return mysqli_affected_rows($conn);
    }

//FUNCTION UBAH DATA MAPEL-------------------------------------------------------------------------------------------------------------------------------------------------
    function ubah_mapel($data){
        global $conn;
        $nama_mapel = htmlspecialchars(strtoupper($data["nama_mapel"]));
        $id = $data["id_mapel"];
        
        $ubah = "UPDATE mapel SET nama_mapel = '$nama_mapel' WHERE id_mapel = $id";

        //Menghapus data mapel dari tabel mapel
        mysqli_query($conn,$ubah);
        
            //Action QUERY
        return mysqli_affected_rows($conn);

    }
//FUNCTION TAMBAH NILAI PENGETAHUAN SISWA--------------------------------------------------------------------------------------------------------------------------------------------------
function tambah_nilai($data){
    global $conn;
    $id_siswa = $data["id_siswa"];
    $id_mapel = $data["id_mapel"];
    // echo $id_mapel; echo $id_siswa;die;

    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = $id_siswa");
    $query2 = mysqli_query($conn, "SELECT * FROM nilai_pengetahuan WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel");
    $id_mapel_2 = mysqli_query($conn,"SELECT * FROM mapel WHERE id_mapel = $id_mapel");

    
    

    
    //Jika Data Ada
    if(mysqli_num_rows($query2) === 1) {
    $siswa = mysqli_fetch_assoc($query);
    $mapel = mysqli_fetch_assoc($query2);
    $id_nilai = $mapel["id_nilai"];
  

    $NISN = $siswa["NISN"];
    $nama_lengkap = $siswa["nama_lengkap"];
    $jenis_kelamin = $siswa["jenis_kelamin"];
    if($jenis_kelamin == 'PEREMPUAN'){
        $jk = 'P';
    }elseif($jenis_kelamin == 'LAKI-LAKI'){
        $jk = 'L';
    }
    
    $H1 = $data['H1'];
    $H2 = $data["H2"];
    $H3 = $data["H3"];
    $H4 = $data["H4"];
    $H5 = $data["H5"];
    $H6 = $data["H6"];
    $H7 = $data["H7"];
    $H8 = $data["H8"];
    if($H1 !== '0'){
        $count = 1;
        if($H2 !== '0'){
            $count = 2;
            if($H3 !== '0'){
                $count = 3;
                if($H4 !== '0'){
                    $count = 4;
                    if($H5 !== '0'){
                        $count = 5;
                        if($H6 !== '0'){
                            $count = 6;
                            if($H7 !== '0'){
                                $count = 7;
                                if($H8 !== '0'){
                                    $count = 8;
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    $RPH = round(($H1+$H2+$H3+$H4+$H5+$H6+$H7+$H8)/$count);
    $PTS = $data["PTS"];
    $PAS = $data["PAS"];
    $HPA = round((($RPH*2)+($PTS)+($PAS))/4);
    
    if($HPA < 70){
        $PRE = 'D';
    } else if($HPA < 80){
        $PRE = 'C';
    }
    else if($HPA < 90){
        $PRE = 'B';
    }else if($HPA < 100){
        $PRE = 'A';
    }
    

    if($PRE == 'A'){
        $desc = 'Baik Sekali';
    } else if($PRE == 'B'){
        $desc = 'Baik';
    }
    else if($PRE == 'C'){
        $desc = 'Cukup';
    }else if($PRE == 'D'){
        $desc = 'Kurang';
    }

    $ubah_nilai = "UPDATE nilai_pengetahuan SET 
    H1 = '$H1', 
    H2 = '$H2', 
    H3 = '$H3', 
    H4 = '$H4', 
    H5 = '$H5', 
    H6 = '$H6', 
    H7 = '$H7', 
    H8 = '$H8', 
    RPH = '$RPH', 
    PTS = '$PTS', 
    PAS ='$PAS', 
    HPA ='$HPA', 
    PRE = '$PRE', 
    deskripsi = '$desc' WHERE id_nilai = $id_nilai";
    mysqli_query($conn,$ubah_nilai);
    return mysqli_affected_rows($conn);

        //JIKA DATA NULL
    }else if(mysqli_num_rows($query2) === 0){
        $siswa = mysqli_fetch_assoc($query);
        

    $NISN = $siswa["NISN"];
    $nama_lengkap = $siswa["nama_lengkap"];
    $jenis_kelamin = $siswa["jenis_kelamin"];
    if($jenis_kelamin == 'PEREMPUAN'){
        $jk = 'P';
    }elseif($jenis_kelamin == 'LAKI-LAKI'){
        $jk = 'L';
    }
    
    $H1 = $data['H1'];
    $H2 = $data["H2"];
    $H3 = $data["H3"];
    $H4 = $data["H4"];
    $H5 = $data["H5"];
    $H6 = $data["H6"];
    $H7 = $data["H7"];
    $H8 = $data["H8"];
    if($H1 !== '0'){
        $count = 1;
        if($H2 !== '0'){
            $count = 2;
            if($H3 !== '0'){
                $count = 3;
                if($H4 !== '0'){
                    $count = 4;
                    if($H5 !== '0'){
                        $count = 5;
                        if($H6 !== '0'){
                            $count = 6;
                            if($H7 !== '0'){
                                $count = 7;
                                if($H8 !== '0'){
                                    $count = 8;
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    $RPH = round(($H1+$H2+$H3+$H4+$H5+$H6+$H7+$H8)/$count);
    $PTS = $data["PTS"];
    $PAS = $data["PAS"];
    $HPA = round((($RPH*2)+($PTS)+($PAS))/4);
    
    if($HPA < 70){
        $PRE = 'D';
    } else if($HPA < 80){
        $PRE = 'C';
    }
    else if($HPA < 90){
        $PRE = 'B';
    }else if($HPA < 100){
        $PRE = 'A';
    }
    

    if($PRE == 'A'){
        $desc = 'Baik Sekali';
    } else if($PRE == 'B'){
        $desc = 'Baik';
    }
    else if($PRE == 'C'){
        $desc = 'Cukup';
    }else if($PRE == 'D'){
        $desc = 'Kurang';
    }

    
   
    

    $input_niai = "INSERT INTO nilai_pengetahuan VALUES ('','$id_siswa','$id_mapel','$NISN','$nama_lengkap','$jk','$H1','$H2','$H3','$H4','$H5','$H6','$H7','$H8','$RPH','$PTS','$PAS','$HPA','$PRE','$desc')";
    mysqli_query($conn,$input_niai);
    return mysqli_affected_rows($conn);
    }
    
    }


    //FUNCTION TAMBAH NILAI PENGETAHUAN SISWA--------------------------------------------------------------------------------------------------------------------------------------------------
function tambah_nilai_2($data){
    global $conn;
    $id_siswa = $data["id_siswa"];
    $id_mapel = $data["id_mapel"];
    // echo $id_mapel; echo $id_siswa;die;

    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = $id_siswa");
    $query2 = mysqli_query($conn, "SELECT * FROM nilai_keterampilan WHERE id_siswa = $id_siswa AND id_mapel = $id_mapel");
    $id_mapel_2 = mysqli_query($conn,"SELECT * FROM mapel WHERE id_mapel = $id_mapel");

    
    

    
    //Jika Data Ada
    if(mysqli_num_rows($query2) === 1) {
    $siswa = mysqli_fetch_assoc($query);
    $mapel = mysqli_fetch_assoc($query2);
    $id_nilai = $mapel["id_nilai"];
  

    $NISN = $siswa["NISN"];
    $nama_lengkap = $siswa["nama_lengkap"];
    $jenis_kelamin = $siswa["jenis_kelamin"];
    if($jenis_kelamin == 'PEREMPUAN'){
        $jk = 'P';
    }elseif($jenis_kelamin == 'LAKI-LAKI'){
        $jk = 'L';
    }
    
    $H1 = $data['H1'];
    $H2 = $data["H2"];
    $H3 = $data["H3"];
    $H4 = $data["H4"];
    $H5 = $data["H5"];
    $H6 = $data["H6"];
    $H7 = $data["H7"];
    $H8 = $data["H8"];
    if($H1 !== '0'){
        $count = 1;
        if($H2 !== '0'){
            $count = 2;
            if($H3 !== '0'){
                $count = 3;
                if($H4 !== '0'){
                    $count = 4;
                    if($H5 !== '0'){
                        $count = 5;
                        if($H6 !== '0'){
                            $count = 6;
                            if($H7 !== '0'){
                                $count = 7;
                                if($H8 !== '0'){
                                    $count = 8;
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    $RPH = round(($H1+$H2+$H3+$H4+$H5+$H6+$H7+$H8)/$count);
    $PTS = $data["PTS"];
    $PAS = $data["PAS"];
    $HPA = round((($RPH*2)+($PTS)+($PAS))/4);
    
    if($HPA < 70){
        $PRE = 'D';
    } else if($HPA < 80){
        $PRE = 'C';
    }
    else if($HPA < 90){
        $PRE = 'B';
    }else if($HPA < 100){
        $PRE = 'A';
    }
    

    if($PRE == 'A'){
        $desc = 'Baik Sekali';
    } else if($PRE == 'B'){
        $desc = 'Baik';
    }
    else if($PRE == 'C'){
        $desc = 'Cukup';
    }else if($PRE == 'D'){
        $desc = 'Kurang';
    }

    $ubah_nilai = "UPDATE nilai_keterampilan SET 
    H1 = '$H1', 
    H2 = '$H2', 
    H3 = '$H3', 
    H4 = '$H4', 
    H5 = '$H5', 
    H6 = '$H6', 
    H7 = '$H7', 
    H8 = '$H8', 
    RPH = '$RPH', 
    PTS = '$PTS', 
    PAS ='$PAS', 
    HPA ='$HPA', 
    PRE = '$PRE', 
    deskripsi = '$desc' WHERE id_nilai = $id_nilai";
    mysqli_query($conn,$ubah_nilai);
    return mysqli_affected_rows($conn);

        //JIKA DATA NULL
    }else if(mysqli_num_rows($query2) === 0){
        $siswa = mysqli_fetch_assoc($query);
        

    $NISN = $siswa["NISN"];
    $nama_lengkap = $siswa["nama_lengkap"];
    $jenis_kelamin = $siswa["jenis_kelamin"];
    if($jenis_kelamin == 'PEREMPUAN'){
        $jk = 'P';
    }elseif($jenis_kelamin == 'LAKI-LAKI'){
        $jk = 'L';
    }
    
    $H1 = $data['H1'];
    $H2 = $data["H2"];
    $H3 = $data["H3"];
    $H4 = $data["H4"];
    $H5 = $data["H5"];
    $H6 = $data["H6"];
    $H7 = $data["H7"];
    $H8 = $data["H8"];
    if($H1 !== '0'){
        $count = 1;
        if($H2 !== '0'){
            $count = 2;
            if($H3 !== '0'){
                $count = 3;
                if($H4 !== '0'){
                    $count = 4;
                    if($H5 !== '0'){
                        $count = 5;
                        if($H6 !== '0'){
                            $count = 6;
                            if($H7 !== '0'){
                                $count = 7;
                                if($H8 !== '0'){
                                    $count = 8;
                                }
                            }
                        }
                    }
                }
            }
        }
    };
    $RPH = round(($H1+$H2+$H3+$H4+$H5+$H6+$H7+$H8)/$count);
    $PTS = $data["PTS"];
    $PAS = $data["PAS"];
    $HPA = round((($RPH*2)+($PTS)+($PAS))/4);
    
    if($HPA < 70){
        $PRE = 'D';
    } else if($HPA < 80){
        $PRE = 'C';
    }
    else if($HPA < 90){
        $PRE = 'B';
    }else if($HPA < 100){
        $PRE = 'A';
    }
    

    if($PRE == 'A'){
        $desc = 'Baik Sekali';
    } else if($PRE == 'B'){
        $desc = 'Baik';
    }
    else if($PRE == 'C'){
        $desc = 'Cukup';
    }else if($PRE == 'D'){
        $desc = 'Kurang';
    }

    
   
    

    $input_niai = "INSERT INTO nilai_keterampilan VALUES ('','$id_siswa','$id_mapel','$NISN','$nama_lengkap','$jk','$H1','$H2','$H3','$H4','$H5','$H6','$H7','$H8','$RPH','$PTS','$PAS','$HPA','$PRE','$desc')";
    mysqli_query($conn,$input_niai);
    return mysqli_affected_rows($conn);
    }
    
    }

//FUNCTION INPUT ABSEN------------------------------------------------------------------------------------------------------

    function input_absen($data){
        global $conn;
        $id = $data["id_siswa"];
        $tanggal = $data["tanggal"];
        $kehadiran = $data["kehadiran"];

        $query = mysqli_query($conn, "SELECT * FROM absen_siswa WHERE id_siswa = '$id' AND tanggal = '$tanggal'");
        
        
        if(mysqli_num_rows($query) === 0){
            $insert = "INSERT INTO absen_siswa VALUES ('','$id','$tanggal','$kehadiran')";
            mysqli_query($conn,$insert);
            return mysqli_affected_rows($conn);
        } elseif(mysqli_num_rows($query) === 1){
            $data2 = mysqli_fetch_array($query);
            $id_absen = $data2["id_absen"]; 
            $insert = "UPDATE absen_siswa SET id_siswa = '$id', tanggal = '$tanggal', kehadiran = '$kehadiran' WHERE id_absen = '$id_absen'";
            mysqli_query($conn,$insert);
            return mysqli_affected_rows($conn);
        }

    }

//FUNCTION INPUT PRESTASI-----------------------------------------------------------------------------------------------------------------------

    function input_prestasi($data) {
        global $conn;
        $id_siswa = $data["id_siswa"];
        $jenis_prestasi = $data["jenis_prestasi"];
        $tingkat = $data["tingkat"];

        mysqli_query($conn, "INSERT INTO prestasi VALUES('','$id_siswa','$jenis_prestasi','$tingkat')");
        return mysqli_affected_rows($conn);
    }

//FUNCTION EDIT PRESTASI-----------------------------------------------------------------------------------------------------------------------

    function edit_prestasi($data) {
        global $conn;
        $id_prestasi = $data["id_prestasi"];
        $id_siswa = $data["id_siswa"];
        $jenis_prestasi = $data["jenis_prestasi"];
        $tingkat = $data["tingkat"];
        
        

        mysqli_query($conn, "UPDATE prestasi SET id_siswa = '$id_siswa',jenis_prestasi = '$jenis_prestasi', tingkat = '$tingkat' WHERE id_prestasi = $id_prestasi");
        return mysqli_affected_rows($conn);
    }



?>