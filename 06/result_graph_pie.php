<?php // content="text/plain; charset=utf-8"

include ("../../jpgraph/src/jpgraph.php");
include ("../../jpgraph/src/jpgraph_pie.php");

// Create the graph. These two calls are always required
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


//include connection script to database:
include("connection.php");
$result = mysqli_query($dbc, "SELECT gender, COUNT(gender) as 'amount' FROM users GROUP BY gender");


$num = array();
$leg = array();
while($row = mysqli_fetch_object($result)){
    array_push($num, $row->amount);
    array_push($leg, $row->gender);
//  'legends' => $row['gender'],
//  'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
//    echo $row['gender'] . " : ". $row['amount'] . "<br />";
    
}
$data = array("leg" => $leg,"num" => $num);
var_dump($data);die;

//Graph data

$pieplot = new PiePlot($data["num"]);
$pieplot->SetLegends($data["leg"]);
$pieplot->SetStartAngle(90);

$graph->Add($pieplot);

$graph->Stroke();

?>