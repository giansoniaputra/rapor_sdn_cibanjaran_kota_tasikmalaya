<?php 
    include '../config/view.php';
    $id = $_GET["id"];

    if(hapus_siswa($id) > 0){
        echo "
            <script>
                alert('Data Siswa Berhasil Dihapus')
                document.location.href= 'input-siswa.php'
		    </script>";
            
    }else{
        echo "
        <script>
            alert('Data Siswa Berhasil Dihapus')
            document.location.href= 'input-siswa.php'
        </script>";
    }



?>