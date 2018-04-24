<?php 
    include_once('config.php');
    session_unset($_SESSION['user_id']);
    session_destroy(); 
?>
<script>
	window.location.href='index.php';
</script>