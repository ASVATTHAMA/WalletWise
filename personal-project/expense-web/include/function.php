<?php
function get_safe_data($connect, $data)
{
    global $connect;
    if ($data) {
        return mysqli_real_escape_string($connect, $data);
    }
}

function checkuser(){
    if (isset($_SESSION['UID']) && $_SESSION['UNAME']!='') {
    
}else{
    header('Location: index.php');
}
}

?>