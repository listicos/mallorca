<?php 
$complejos = allFullComplejos();

function truncateHTML($str, $len, $end = '&hellip;'){
            //find all tags
            $tagPattern = '/(<\/?)([\w]*)(\s*[^>]*)>?|&[\w#]+;/i';  //match html tags and entities
            preg_match_all($tagPattern, $str, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER );
            //WSDDebug::dump($matches); exit; 
            $i =0;
            //loop through each found tag that is within the $len, add those characters to the len,
            //also track open and closed tags
            // $matches[$i][0] = the whole tag string  --the only applicable field for html enitities  
            // IF its not matching an &htmlentity; the following apply
            // $matches[$i][1] = the start of the tag either '<' or '</'  
            // $matches[$i][2] = the tag name
            // $matches[$i][3] = the end of the tag
            //$matces[$i][$j][0] = the string
            //$matces[$i][$j][1] = the str offest

            while($matches[$i][0][1] < $len && !empty($matches[$i])){

                $len = $len + strlen($matches[$i][0][0]);
                if(substr($matches[$i][0][0],0,1) == '&' )
                    $len = $len-1;


                //if $matches[$i][2] is undefined then its an html entity, want to ignore those for tag counting
                //ignore empty/singleton tags for tag counting
                if(!empty($matches[$i][2][0]) && !in_array($matches[$i][2][0],array('br','img','hr', 'input', 'param', 'link'))){
                    //double check 
                    if(substr($matches[$i][3][0],-1) !='/' && substr($matches[$i][1][0],-1) !='/')
                        $openTags[] = $matches[$i][2][0];
                    elseif(end($openTags) == $matches[$i][2][0]){
                        array_pop($openTags);
                    }else{
                        $warnings[] = "html has some tags mismatched in it:  $str";
                    }
                }


                $i++;

            }

            $closeTags = '';

            if (!empty($openTags)){
                $openTags = array_reverse($openTags);
                foreach ($openTags as $t){
                    $closeTagString .="</".$t . ">"; 
                }
            }

            if(strlen($str)>$len){
                //truncate with new len
                $truncated_html = substr($str, 0, $len);
                //add the end text
                $truncated_html .= $end ;
                //restore any open tags
                $truncated_html .= $closeTagString;


            }else
            $truncated_html = $str;


            return $truncated_html; 
        }
$complejos_data = array();
$idComplejo = false;
if($complejos){
	foreach ($complejos as $a_k => $a) {
                if($idComplejo != $a['id_complejo']) {
                    $idComplejo = $a['id_complejo'];
                    $complejos_data[$a['id_complejo']]['id_complejo'] = $a['id_complejo'];
                    $complejos_data[$a['id_complejo']]['nombre'] = $a['complejo'];
                    $complejos_data[$a['id_complejo']]['descripcion'] = $a['descripcion'];
                    
                    if($a['descripcion'] && strlen($a['descripcion']) > 2
                            && $a['descripcion'][0] == '{'
                            && $a['descripcion'][strlen($a['descripcion']) - 1] == '}') {
                        $descripcion = json_decode($a['descripcion']);
                        $complejos_data[$a['id_complejo']]['descripciones'] = get_object_vars($descripcion);
                    } else {
                        $complejos_data[$a['id_complejo']]['descripciones'] = array('es' => $a['descripcion']);
                    }
                    
                    $complejos_data[$a['id_complejo']]['lat'] = $a['lat'];
                    $complejos_data[$a['id_complejo']]['lon'] = $a['lon'];
                    $precios = getRangoPreciosByComplejo($idComplejo);
                    $complejos_data[$a['id_complejo']]['min'] = $precios[0];
                    $complejos_data[$a['id_complejo']]['max'] = $precios[1];
                }
		$complejos_data[$a['id_complejo']]['adjuntos'][$a['ruta']] = $a['ruta'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['nombre'] = $a['a_nombre'];
		$complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['descripcion'] = json_decode($a['a_descripcion']);
                $complejos_data[$a['id_complejo']]['apartamentos'][$a['id_apartamento']]['adjuntos'][$a['id_adjunto']] = $a['ruta'];
	}
}

$smarty->assign('page','agroturismo');
$smarty->assign('complejos',$complejos_data);
$smarty->display('complejos.tpl');
?>