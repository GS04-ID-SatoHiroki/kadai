<?php // content="text/plain; charset=utf-8"

include ("../../jpgraph/src/jpgraph.php");
include ("../../jpgraph/src/jpgraph_bar.php");

$data1y = array(-8, 8, 9, 3, 5, 6);
$data2y = array(18, 2, 1, 7, 5, 4);

// Create the graph. These two calls are always required
$graph = new Graph(300, 200, "auto"); 
$graph->SetScale("textlin");

//calls bellow are optional
$graph->SetFrame(true);
$graph->SetShadow();
$graph->title->Set("男女比");
$graph->title->SetFont(FF_GOTHIC, FS_NORMAL, 16);
//$graph->title->SetColor(array(128, 0, 0));
$graph->title->Align("center","top");
//$graph->subtitle->Set("");
//$graph->subsubtitle->Set("");

//Set the axis
$graph->xaxis->SetWeight(2);
$graph->yaxis->SetWeight(2);

//Set the axis color
$graph->xaxis->SetColor("red", "black");
$graph->yaxis->SetColor(array(0, 128, 255));

//Set the axis font
$graph->xaxis->SetFont(FF_GOTHIC, FS_NORMAL, 10);
$graph->yaxis->SetFont(FF_GOTHIC, FS_NORMAL, 10);

//Set the axis title
$graph->xaxis->title->Set("x-title");
$graph->yaxis->title->Set("y-title");

$graph->xaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 10);
$graph->yaxis->title->SetFont(FF_GOTHIC, FS_NORMAL, 10);

$graph->xaxis->title->SetColor(array(255, 0, 0));
$graph->yaxis->title->SetColor(array(0, 0, 128));


$graph->img->SetMargin(40, 30, 20, 40);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b1plot->value->Show();
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
$b2plot->value->Show();

$gbplot = new AccBarPlot(array($b1plot, $b2plot));

$graph->Add($gbplot);

// Display the graph
$graph->Stroke();

?>