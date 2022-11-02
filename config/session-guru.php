<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location:../index.php");
    exit;
}

if($_SESSION["level"] !== 'guru'){
    echo "
            <script>
                alert('Silahkan Login Sebagai Guru')
                document.location.href= '../config/session-destroy.php'
		    </script>
		";
}

?>