<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location:../index.php");
    exit;
}

if($_SESSION["level"] !== 'admin'){
    echo "
            <script>
                alert('Anda Bukan Admin')
                document.location.href= '../config/session-destroy.php'
		    </script>
		";
}

?>