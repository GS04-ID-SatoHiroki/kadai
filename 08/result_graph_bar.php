<?php // content="text/plain; charset=utf-8"

//include graph style
include ("../../jpgraph/src/jpgraph.php");
include ("../../jpgraph/src/jpgraph_bar.php");

//include connection script to database:
include ("connection.php");
$result = mysqli_query($dbc, "SELECT score, COUNT(score) as 'amount' FROM users GROUP BY score");

$num = array();
$leg = array();
while($row = mysqli_fetch_object($result)){
    array_push($num, intval($row->amount));
    array_push($leg, intval($row->score));
//  'colors' => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
    
}
$data = array("leg" => $leg,"num" => $num);
//var_dump($data["num"]);
//var_dump($data["leg"]);die;

//$data1y = array(-8, 8, 9, 3, 5, 6);
//$data2y = array(18, 2, 1, 7, 5, 4);

// Create the graph. These two calls are always required
$graph = new Graph(300, 200, "auto"); 
$graph->SetScale("textint");

//calls bellow are optional
$graph->SetFrame(true);
$graph->SetShadow();
$graph->title->Set("評価");
$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 16);
//$graph->title->SetColor(array(128, 0, 0));
$graph->title->Align("center","top");
//$graph->subtitle->Set("");
//$graph->subsubtitle->Set("");

//Set the axis
$graph->xaxis->SetWeight(2);
$graph->yaxis->SetWeight(2);

//Set the axis color
$graph->xaxis->SetColor("#295890", "black");
$graph->yaxis->SetColor("#295890", "black");

//Set the axis font
$graph->xaxis->SetFont(FF_GOTHIC, FS_NORMAL, 10);
$graph->yaxis->SetFont(FF_GOTHIC, FS_NORMAL, 10);

//Set the axis title
$graph->xaxis->title->Set("評価");
$graph->yaxis->title->Set("人数");

$graph->xaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 10);
$graph->yaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 10);

$graph->xaxis->title->SetColor("#295890");
$graph->yaxis->title->SetColor("#295890");

$graph->img->SetMargin(40, 30, 20, 40);

// Create the bar plots
$b1plot = new BarPlot($data["num"]);
$b1plot->SetFillColor("orange");
$b1plot->value->Show();
//$b2plot = new BarPlot($data2y);
//$b2plot->SetFillColor("blue");
//$b2plot->value->Show();

$gbplot = new AccBarPlot(array($b1plot));

$graph->Add($gbplot);

// Display the graph
$graph->Stroke();

mysqli_close($dbc);

?>