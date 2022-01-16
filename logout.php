<?php
session_start();
session_unset();

header("location:index.html");
?>



           //query
            $sql=mysql_query("SELECT id,name FROM patients");
            if(mysql_num_rows($sql))
            {
                $select= '<select name="select">';
                while($rs=mysql_fetch_array($sql))
                {
                    $select.='<option value="'.$rs['id'].'">'.$rs['name'].'</option>';
                }
            }
            $select.='</select>';
            echo $select;
        ?>
        