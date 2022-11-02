<?php 
    include '../config/view.php';
    $id = $_GET["id"];

    if(hapus_mapel($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus')
                document.location.href= 'input-mapel.php'
		    </script>";
            
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus')
            document.location.href= 'input-mapel.php'
        </script>";
    }



?>