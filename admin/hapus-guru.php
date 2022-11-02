<?php 
    include '../config/view.php';
    $id = $_GET["id"];

    if(hapus_guru($id) > 0){
        echo "
            <script>
                alert('Data Guru Berhasil Dihapus')
                document.location.href= 'input-guru.php'
		    </script>";
            
    }else{
        echo "
        <script>
            alert('Data Guru Berhasil Dihapus')
            document.location.href= 'input-guru.php'
        </script>";
    }



?>