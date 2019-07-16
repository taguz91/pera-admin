
<?php
function getCon(){
try{
$pdo= new PDO("pgsql:dbname=IstaBDWEB;host=localhost;port=5432;",'postgres','1802');
echo "Nos conectamos";
return $pdo;
}catch(\Exception $e){
 echo $e->getMessage();
 return null;
}
}
