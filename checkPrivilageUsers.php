<?php
    if($_SESSION[ses_privilage] == 2){//User
        echo"<meta http-equiv='refresh' content='0;URL=dashboardUsers.php'>";
    }else if($_SESSION[ses_privilage] == 5){
        echo"<meta http-equiv='refresh' content='0;URL=dashboardManager.php'>";
    }

?>