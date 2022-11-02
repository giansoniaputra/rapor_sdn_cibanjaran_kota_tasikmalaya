<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location:../index.php");
    exit;
}

if($_SESSION["level"] !== 'siswa'){
    echo "
            <script>
                alert('Silahkan Login Sebagai Siswa')
                document.location.href= '../config/session-destroy.php'
		    </script>
		";
}

?>