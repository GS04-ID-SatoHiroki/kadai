<?php // content="text/plain; charset=utf-8"

include ("../../jpgraph/src/jpgraph.php");
include ("../../jpgraph/src/jpgraph_pie.php");

// Create the graph. These two calls are always required
$graph = new PieGraph(300, 200, "auto"); 
$graph->SetFrame(true);

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
$g = mysqli_query($dbc, "SELECT gender, COUNT(gender) as 'amount' FROM users GROUP BY gender");
$data = array();
while($row = mysqli_fetch_assoc($g)){
    $data[] = $row['amount'];
//  'legends' => $row['gender'],
//  'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
//    echo $row['gender'] . " : ". $row['amount'] . "<br />";
    
}

//Graph data


$pieplot = new PiePlot($data);
//$pieplot->SetLegends($data['legends']);
$pieplot->SetStartAngle(90);

$graph->Add($pieplot);

$graph->Stroke();

?>