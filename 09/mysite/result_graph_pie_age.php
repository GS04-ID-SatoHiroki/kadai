<?php // content="text/plain; charset=utf-8"

//include graph style
include ("../../../jpgraph/src/jpgraph.php");
include ("../../../jpgraph/src/jpgraph_pie.php");

include ("func.php");

//include connection script to database:
$pdo = db();
$stmt = $pdo ->query("SELECT age, COUNT(age) as 'amount' FROM users GROUP BY age ORDER BY age DESC");

$leg = "";
$num = "";
foreach($stmt as $result){
    $leg[] = $result['age'];
    $num[] = $result['amount'];
//  'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
    
}
$data = array("leg" => $leg,"num" => $num);
//var_dump($data["num"]);
//var_dump($data["leg"]);die;

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
$graph->title->Set("年齢構成");
$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 16);
//$graph->title->SetColor(array(128, 0, 0));
$graph->title->Align("center","top");
//$graph->subtitle->Set("");
//$graph->subsubtitle->Set("");

//Graph data
$pieplot = new PiePlot($data["num"]);
$pieplot->SetLegends($data["leg"]);
$pieplot->SetStartAngle(90);

$graph->Add($pieplot);

$graph->Stroke();

$pdo = null;

?>