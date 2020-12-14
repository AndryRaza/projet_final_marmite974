<?php 
if(
    $_POST['mail_user'] === "admin"
&& $_POST['mdp_user'] === "admin"
)
{
    $_SESSION['admin'] = true ;
    header(location:index.php);
}
?>