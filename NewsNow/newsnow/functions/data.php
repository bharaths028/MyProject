<?php

	function data_settings_value($bd, $id){

		$q = "SELECT * FROM settings WHERE id = '$id'";
		$r = mysqli_query($bd, $q);

		$data = mysqli_fetch_assoc($r);

		return $data['value'];

	}

	function data_post_type($bd, $id) {
		if(is_numeric($id))	{

			$cond = "WHERE id = '$id'";

		}	else{

			$cond = "WHERE name = '$id'";
		}
	
		$q = "SELECT * FROM post_types $cond";
		$r = mysqli_query($bd, $q);
		
		$data = mysqli_fetch_assoc($r);		
		
		return $data;
		
	}
	
	function data_post($bd, $id){

		if(is_numeric($id))	{

			$cond = "WHERE id = '$id'";

		}	else{

			$cond = "WHERE slug = '$id'";
		}

		$q = "SELECT * FROM posts $cond ORDER BY systdate DESC LIMIT 10";
		$r =  mysqli_query($bd, $q);

		$data =  mysqli_fetch_assoc($r);

		$data['body_nohtml'] = strip_tags($data['pagedesc']);

		if($data['pagedesc'] == $data['body_nohtml']){

			$data['body_formatted'] = '<p>'.$data['pagedesc'].'</p';
		} else{

			$data['body_formatted'] = $data['pagedesc'];
		}

		return $data;
	}


	function article($bd, $id)  {

        if(is_numeric($id)) {

            $cond = "WHERE id = '$id'";

        }   else{

            $cond = "WHERE name = '$id'";
        }
    
        $q = "SELECT * FROM post_types $cond";
        $i = 0;
        $r =  mysqli_query($bd, $q);
        $dyn_table = '<table border="1" cellpadding="10">';
       while($data =  mysqli_fetch_assoc($r))   {

        $id = $data['id'];
        $head = $data['m_head'];
        $pagedesc = substr(strip_tags($data['pagedesc']), 0, 160);

        if($i % 3 == 0) {
            $dyn_table .= '<tr><td><h4>'.$head.'</h4><p>'.$pagedesc.'</p></td>';

        } else {
            $dyn_table .= '<td><h4>'.$head.'</h4><p>'.$pagedesc.'</p></td>';

        }
        
        
        $i++;
       }
       $dyn_table .='</tr></table>';

       return $dyn_table;


    }

?>