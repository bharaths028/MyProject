<?php
    include('includes/connection.php');

    

      
    
        $q = "SELECT * FROM post_types ORDER BY systdate DESC LIMIT 15";
        $i = 0;
        $r =  mysqli_query($bd, $q);
        echo '<table border="1" cellpadding="10">';
       while($data =  mysqli_fetch_assoc($r))   {

        $id = $data['id'];
        $head = $data['m_head'];
        $pagedesc = substr(strip_tags($data['pagedesc']), 0, 160);

        if($i % 3 == 0) {
            echo'<tr><td><h4>'.$head.'</h4><p>'.$pagedesc.'</p></td>';

        } else {
            echo'<td><h4>'.$head.'</h4><p>'.$pagedesc.'</p></td>';

        }
        
        
        $i++;
       }
       echo'</tr></table>';

       return $dyn_table;
        }

        $article = article($bd,$path['call_parts'][0]);


?>
