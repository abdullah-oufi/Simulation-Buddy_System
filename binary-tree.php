
<?php  
$db = new mysqli("127.0.0.1", "root", "", "binary");


if (mysqli_connect_errno()) {
    printf("Connect failed: %s", mysqli_connect_error());
    exit();
    
}
		$sql = "Select * from tree";
        if($result = $db->query($sql)){
            while ($row = $result->fetch_assoc()){
                $account['tree'] = $row;
            }
            
        }

echo '<html>'; 
echo '	<head>'; 
echo '	<title>Binary Tree</title>'; 
echo '	<meta http-equiv=Content-Type content=\'text/html; charset=utf-8\'>'; 
echo '	<meta http-equiv=content-language content=en>'; 
echo '	<link href=\'styles.css\' type=text/css rel=stylesheet>'; 
echo '	<link rel=\'stylesheet\' href=\'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\' integrity=\'sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7\' crossorigin=\'anonymous\'>';
echo '	<link rel=\'stylesheet\' href=\'css2/bootstrap.min.css\'>';

echo '	</head>'; 
echo '<body>'; 

if (isset($_GET['a']) && $_GET['a'] == 'M') {
	insert_Mb($_POST['Mb']);
}
else if (isset($_POST['A']) && $_POST['A'] > (-1)) { 
	if (validacion_repe('A') == false) {motor($_POST['A'],'A');}
    else{mensage("Libere primero el proceso A");}
}
else if (isset($_POST['B']) && $_POST['B'] > (-1)) { 
	if (validacion_repe('B') == false) {motor($_POST['B'],'B');}
    else{mensage("Libere primero el proceso B");}
}
else if (isset($_POST['C']) && $_POST['C'] > (-1)) { 
	if (validacion_repe('C') == false) {motor($_POST['C'],'C');}
    else{mensage("Libere primero el proceso C");}
}
else if (isset($_POST['D']) && $_POST['D'] > (-1)) { 
	if (validacion_repe('D') == false) {motor($_POST['D'],'D');}
    else{mensage("Libere primero el proceso D");}
}
else if (isset($_POST['delA']) && $_POST['delA'] == true){ 
	if (validacion_repe('A') == true) {delete_letra("A");}
    else{mensage("No encontre nungun proceso A en mi Memoria! :/");}
}
else if (isset($_POST['delB']) && $_POST['delB'] == true){ 
	if (validacion_repe('B') == true) {delete_letra("B");}
    else{mensage("No encontre nungun proceso B en mi Memoria! :/");}
}
else if (isset($_POST['delC']) && $_POST['delC'] == true){ 
	if (validacion_repe('C') == true) {delete_letra("C");}
    else{mensage("No encontre nungun proceso C en mi Memoria! :/");}
}
else if (isset($_POST['delD']) && $_POST['delD'] == true){ 
	if (validacion_repe('D') == true) {delete_letra("D");}
    else{
    	mensage("No encontre nungun proceso D en mi Memoria! :/");
    }
}
else if (isset($_POST['U']) && $_POST['U'] == true){ 
	fusion();
    #else{echo "No encontre nungun proceso D en mi Memoria! :/";}
}
else if (isset($_GET['a']) && $_GET['a'] == 'erase') {erase_db();}


if (find_Mb() == false) {
	echo '  <div class=\'row\'><div class=\'col-md-6 col-md-offset-4\'><br><br><br><br></div></div>';
	echo '<div class=\'row\' style=\'background-color: #F5F5F5;
border: 1px solid #E3E3E3;
border-radius: 4px;
box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;\'>'; 
	echo '  <div class=\'col-md-9 col-md-offset-2\' ><h1 style=\'color: #fff;
	text-shadow: 0px 1px 0px #999, 0px 2px 0px #888, 0px 3px 0px #777, 0px 4px 0px #666, 0px 5px 0px #555, 0px 6px 0px #444, 0px 7px 0px #333, 0px 8px 7px #001135;
	font: 75px \\\'ChunkFiveRegular\\\';\'>Bienvenidos a mi simulador de Buddy System - por Amin.</h1><h6>Prototipo</h6></div>';
	echo '  <div class=\'col-md-6 col-md-offset-4\'>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php?a=M\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>Memoria Total</div>'; 
	echo '		      <input type=\'text\' class=\'form-control\' id=\'Mb\' name=\'Mb\'placeholder=\'Cantidad para la memoria\'>'; 
	echo '		      <div class=\'input-group-addon\'>M</div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-primary\'>Enviar</button>'; 
	echo '		</form>';
	echo '  </div>'; 
	echo '</div>';
}
if (isset($_GET['a'])) {
	switch ($_GET['a']) {

		case 'memo_insert':
			mensage("Memoria Completada.");
			break;
		case 'memo_insert_error':
			mensage("Memoria Incompleta, vuelva a intentar con valores reales y enteros.");
			break;
		case 'erase':
			mensage("Memoria Borrada.");
			break;
		case 'union':
			mensage("Hubo una compactacion.");
			break;
		default:			
			break;
	}
	
}
if (find_Mb() == true) {
	echo ' 
	<div class=\'row\'><br>
		<div class=\'col-md-4 col-md-offset-5\'>
			<a class=\'btn btn-danger\' href=\'binary-tree.php?a=erase\'>Borrar Toda La Memoria</a>
		</div>
	</div>';
 
	echo '  <div class=\'row\'><div class=\'col-md-6 col-md-offset-4\'><br></div></div>';
	echo '  <div class=\'col-md-3\'>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>A</div>'; 
	echo '		      <input type=\'text\' class=\'form-control\' size=\'5\' id=\'A\' name=\'A\'placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'>Kb</div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-primary\'>Solicitar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>B</div>'; 
	echo '		      <input type=\'text\' class=\'form-control\' size=\'5\' id=\'B\' name=\'B\'placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'>Kb</div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-primary\'>Solicitar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>C</div>'; 
	echo '		      <input type=\'text\' class=\'form-control\' size=\'5\' id=\'C\' name=\'C\'placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'>Kb</div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-primary\'>Solicitar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>D</div>'; 
	echo '		      <input type=\'text\' class=\'form-control\' size=\'5\'id=\'D\' name=\'D\'placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'>Kb</div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-primary\'>Solicitar</button>'; 
	echo '		</form>';


	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>A</div>'; 
	echo '		      <input type=\'hidden\' class=\'form-control\' id=\'delA\' name=\'delA\' value =\'true\' placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'></div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-warning\'>Liberar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>B</div>'; 
	echo '		      <input type=\'hidden\' class=\'form-control\' id=\'delB\' name=\'delB\' value =\'true\' placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'></div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-warning\'>Liberar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>C</div>'; 
	echo '		      <input type=\'hidden\' class=\'form-control\' id=\'delC\' name=\'delC\' value =\'true\' placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'></div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-warning\'>Liberar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>D</div>'; 
	echo '		      <input type=\'hidden\' class=\'form-control\' id=\'delD\' name=\'delD\' value =\'true\' placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'></div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-warning\'>Liberar</button>'; 
	echo '		</form>';
	echo '		<form class=\'form-inline\' method=\'POST\'   action=\'binary-tree.php\'>'; 
	echo '		  <div class=\'form-group\'>'; 
	echo '		    <label class=\'sr-only\' for=\'exampleInputAmount\'>Cantidad (numero Entero)</label>'; 
	echo '		    <div class=\'input-group\'>'; 
	echo '		      <div class=\'input-group-addon\'>Union</div>'; 
	echo '		      <input type=\'hidden\' class=\'form-control\' id=\'U\' name=\'U\' value =\'true\' placeholder=\'Cantidad\'>'; 
	echo '		      <div class=\'input-group-addon\'></div>'; 
	echo '		    </div>'; 
	echo '		  </div>'; 
	echo '		  <button type=\'submit\' class=\'btn btn-warning\'>Compactar</button>'; 
	echo '		</form>';
	echo '	</div>'; 
$arreglo = select_all();

	echo '  <div class=\'col-md-9\'  style=\'background-color: #F5F5F5;
border: 1px solid #E3E3E3;
border-radius: 4px;
box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;\'>';
echo '  <div class=\'row text-center text-primary\'><div class=\'col-md-1 text-center\'>#</div><div class=\'col-md-7 col-md-offset-1 \'>Kb/procesos</div><div class=\'col-md-1 col-md-offset-1 \'>Accion</div><div class=\'col-md-1\'>Medida</div></div>';


foreach ($arreglo as $key){
	
	foreach ($key as $a){	
		echo '<div class=\'row bs-example\' style=\'padding: 10px;
    padding-top: 2px;
    padding-right: 2px;
    padding-bottom: 2px;
    padding-left: 2px;
margin: 5px 0px;
border-width: 1px 1px 1px 5px;
border-style: solid;
border-color: #EEE;
-moz-border-top-colors: none;
-moz-border-right-colors: none;
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
border-image: none;
border-radius: 3px;\'>'; 


		echo '  <div class=\'col-md-1 text-left\'>'. $a['id'] .' </div>'; 
		echo '  <div class=\'col-md-9 text-center\'>';
		if ($a['valor_letra'] == 'M')
			echo $a['valor'] / 1024 .'</div>'; 
		else echo $a['valor'].'</div>';
		echo '  <div class=\'col-md-1 text-right\'>'. $a['letra'] .':';
		if ($a['valor_letra'] != 'NULL' && $a['valor_letra'] != 'M'){echo $a['valor_letra'].'</div>';}
		elseif ($a['valor_letra'] == 'M'){
			echo '<span class=\'glyphicon glyphicon-floppy-disk\' aria-hidden=\'true\'></span></div>';
		} 
		else{ echo '<span class=\'glyphicon glyphicon-scissors\' aria-hidden=\'true\'></span></div>';}  
		
		echo '  <div class=\'col-md-1 text-right\'>'. $a['padre'] .' </div>'; 
		echo '</div>';
	}
	
}
	echo '	</div>'; 
	echo '</body>'; 
	echo '</html>';
}
function mensage($string){
	echo '<p class=\'text-danger\'>'.$string.'</p><br>';
}

function contador_letras(){
	$bulbasaur = last_line();
	$bulbi  = substr_count($bulbasaur['valor'], 'A');
	$bulbi += substr_count($bulbasaur['valor'], 'B');
	$bulbi += substr_count($bulbasaur['valor'], 'C');
	$bulbi += substr_count($bulbasaur['valor'], 'D');
	if ($bulbi > 0) return true;
	return false;
}


function limpiar_arreglo($a){
	$tmp = array();
	for ($i=0; $i < count($a) ; $i++)
		if ($a[$i] > 0 || (
			   substr($a[$i], 0 ,1)  == "A"
			|| substr($a[$i], 0 ,1)  == "B"
			|| substr($a[$i], 0 ,1)  == "C"
			|| substr($a[$i], 0 ,1)  == "D")
			)
			array_push($tmp, $a[$i]);

	return $tmp;
}

function fusion(){
	$pikachu = last_line();
	$raichu = string_to_array($pikachu['valor']);
	$raichu = limpiar_arreglo($raichu);
	$count_raichu = count($raichu);
	$evolucion = "";
	for ($piko = 0; $piko < $count_raichu; $piko++){
		if(substr($raichu[$piko], 0 ,1)  == "A" || substr($raichu[$piko], 0 ,1)  == "B"|| substr($raichu[$piko], 0 ,1)  == "C" || substr($raichu[$piko], 0 ,1)  == "D"){
			if ($piko+1 == $count_raichu) {$evolucion .= $raichu[$piko];}
			else{$evolucion .= $raichu[$piko] . " ";	}
			continue;
		}
		if ($raichu[$piko] == $raichu[$piko+1] && $piko+1 != $count_raichu ){	
			if ($piko+1 == $count_raichu) {
				$evolucion .= $raichu[$piko] + $raichu[$piko+1];
				$piko +=1 ;
			}else{
				$evolucion .= $raichu[$piko] + $raichu[$piko+1] . " ";
				$piko +=1 ;
			}			
		}else{
			if ($piko+1 == $count_raichu) {
				$evolucion .= $raichu[$piko];
			}
			else{
				$evolucion .= $raichu[$piko] . " ";
			}				
		}
	}
	
	insertar($evolucion,"U","Compact");
	header("Location: binary-tree.php?a=union");
    exit;
}

function delete_letra($letra){
	$pikachu = last_line();	
	$pikachu['valor'] = str_replace($letra, "", $pikachu['valor']);		
	insertar($pikachu['valor'],$letra,"Liberada");
	fusion();
}

function validacion_repe($a){
	$miau = last_line();	
	if(substr_count($miau['valor'],$a) > 0 )return true;
	return false;	
}

function motor($valor,$letra){
	global $db;
	$brr = last_line();
	$M = find_Mb(); 
	
	if ($M['M']['valor'] >= $valor && $valor > 0) {
		$elemento = string_to_array($brr['valor']); //convertimos los valores en un arreglo 
		for ($i=0;$i<count($elemento);$i++){
			
			if(substr($elemento[$i], 0 ,1) == "A"){continue;}//brinca el hijo si tiene algun proceso(letra)
			if(substr($elemento[$i], 0 ,1) == "B"){continue;}//brinca el hijo si tiene algun proceso(letra)
			if(substr($elemento[$i], 0 ,1) == "C"){continue;}//brinca el hijo si tiene algun proceso(letra)
			if(substr($elemento[$i], 0 ,1) == "D"){continue;}//brinca el hijo si tiene algun proceso(letra)
			if ($valor <= $elemento[$i]) {
				if ($elemento[$i]/2 < $valor && $valor <= $elemento[$i]) {// si el el valor esta en kb/2 < request <= kb
					$elemento[$i] = $letra.$elemento[$i];
					$elemento = array_to_string($elemento);
					insertar($elemento,$letra,$valor);
					break;
				}else { //si no esta, procedemos a dividir la memoria y gurdarla
					if (count($elemento) == 1) { //en caso en q el arreglo sea solo un valor
						$tmp_arr = array();
						array_push($tmp_arr, $elemento[$i]/2, $elemento[$i]/2);
						$tmp_arr = array_to_string($tmp_arr);
						insertar($tmp_arr,"Divi","NULL");
						unset($tmp_arr);
						motor($valor,$letra);
						break;
					}else{
						$num = $i;
						$tmp_arr = array();
						$cont = count($elemento);// 6+1 =7

						for($j=0;$j<$num;$j++)
							array_push($tmp_arr,$elemento[$j]);

						for($k=$num;$k<$num+2;$k++)
							array_push($tmp_arr,$elemento[$i]/2);
 
						if ($i+1 < $cont) {
							for ($p=$i+1; $p < $cont ; $p++) { 
								array_push($tmp_arr,$elemento[$p]);
							}
						}
						$tmp_arr = array_to_string($tmp_arr);
						insertar($tmp_arr,"Divi","NULL");
						unset($tmp_arr);
						motor($valor,$letra);
						break;
					}
				}
			}else{
				continue;
			}
		}
	}else if ($M['M']['valor'] < $valor){
		mensage("No tengo espacio XD para ese valor que me pides!");
	}elseif ($valor == 0){
		$ensajito = "Eres muy pequenio para mi! :)";
		mensage($ensajito);

	}
}

function array_to_string($array){
	$string = "";
	for ($i=0;$i<count($array);$i++){
		$string .= $array[$i] . " ";
	}
	return $string;
}

function string_to_array($string){
	$array = explode(" ", $string);
	return $array;
}

function insertar($valor,$letra,$valor_letra){
	global $db;
	$p = "Insert into tree set padre='Kb', valor='$valor', letra='$letra' , valor_letra='$valor_letra' ";
	mysqli_query($db,$p) or die(mysql_error());
}

function last_line(){
	global $db;
	$last = '';
	$sql = "Select * from tree";
    if($result = $db->query($sql)){
    	while ($row = $result->fetch_assoc()){
                $last = $row;
            }
        return  $last;
    }
}

function find_Mb(){
	global $db;
	$last = array();
	$sql = "Select * from tree where padre = 'Mb' and letra ='M' ";
        if($result = $db->query($sql)){
        	while ($row = $result->fetch_assoc()){
                $last['M'] = $row;
            }
            return  $last;
        }else{
        	return  false;
        }
}
function insert_Mb($valor){
	global $db;
	if ($valor > 0) {
		$valor *= 1024;
	$q = "Insert into tree set  padre='Mb', valor='$valor', letra='M', valor_letra='M' ";
    mysqli_query($db,$q) or die(mysql_error());           
    header("Location: binary-tree.php?a=memo_insert");
    exit;
	}else{
		header("Location: binary-tree.php?a=memo_insert_error");
    	exit;
	}         
    
}


function erase_db(){
	global $db;
	$sql = "TRUNCATE tree";

	if (mysqli_query($db, $sql)) {
		mensage("Record borrado satisfactoriamente.");
	} 
	else {
	    echo "Error deleting record: " . mysqli_error($db);
	}
}

function select_all(){
	global $db;
	$a = array();
	$sql = "Select * from tree";
    if($result = $db->query($sql)){
        while ($row = $result->fetch_assoc()){
            $a['tree'][] = $row;
        }        
    }
    return $a;
}

mysqli_close($db);
?>
