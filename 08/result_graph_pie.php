<?php // content="text/plain; charset=utf-8"

//include graph style
include ("../../jpgraph/src/jpgraph.php");
include ("../../jpgraph/src/jpgraph_pie.php");

//include connection script to database:
include ("connection.php");
$stmt = $pdo ->query("SELECT gender, COUNT(gender) as 'amount' FROM users GROUP BY gender");
$stmt ->execute();

$leg = "";
$num = "";
$colors = array('#8f004a', '#004a8f');
foreach($stmt as $result){
    $leg[] = $result['gender'];
    $num[] = $result['amount'];
}
$data = array("leg" => $leg, "num" => $num, "colors" => $colors);
//var_dump($data["leg"]);
//var_dump($data["num"]);
//var_dump($data["colors"]);die;

//function dispKekka($var, $var_num){
//    print('変数に格納されている値は'.$var.'です<br>');
//    print('変数の型は'.gettype($var).'です<br>');
//
//    if ($var_num == TRUE){
//        print('変数の値は数値として有効です<br><br>');
//    }else{
//        print('変数の値は数値として有効ではありません<br><br>');
//    }
//}
//
//$var = $data["num"];
//$var_kata = is_numeric($var);
//dispKekka($var, $var_kata);

//Create the graph. These two calls are always required
$graph = new PieGraph(300, 200, "auto"); 

//calls bellow are optional
$graph->SetFrame(true);
$graph->SetShadow();
$graph->title->Set("男女比");
$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 16);
//$graph->title->SetColor(array(128, 0, 0));
$graph->title->Align("center","top");
//$graph->subtitle->Set("");
//$graph->subsubtitle->Set("");

//Graph data
$pieplot = new PiePlot($data["num"]);
$pieplot->SetLegends($data["leg"]);
$pieplot->setSliceColors($data["colors"]);
$pieplot->SetStartAngle(90);

$graph->Add($pieplot);

$graph->Stroke();

$pdo = null;

?>