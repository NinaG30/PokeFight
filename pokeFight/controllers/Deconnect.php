<?php

class Deconnect extends controller
{
    public function logOut() {

        unset($_SESSION['id_joueur']);
        unset($_SESSION['pseudo']);
        session_destroy();     
        echo "<script> window.location.href='/pokeFight'</script>";
    }

}