<?php 
include_once('phplot.php');
$elem="legend";
$elem1="title";
$font="5";
$plot = new PHPlot(1200, 600);
$plot->SetPieAutoSize(True);
//$plot->SetXAxisPosition(200);
$plot->SetShading(100);//for 3d look
$plot->SetPrintImage(False);  // Do not output the image
$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetFontGD($elem, $font);
$plot->SetFontGD('title',5);
//$plot->SetLegendPixels(1,50,true);
//$plot->SetLabelScalePosition(0.5);
$data_array=array();
$data_array[0][0]=10;
$data_array[0][1]=20;
$data_array[0][2]=30;
$data_array[0][3]=40;
$plot->SetDataValues($data_array);
$plot->SetLegendStyle('left','left');
$plot->SetLegendPosition(0, 0, 'plot', 0, 0,0,0);
$plot->SetPieAutoSize(True);
# Main plot title:
$plot->SetTitle(" Usage of Server  : Departmentwise");
foreach ($data_array as $row) $plot->SetLegend($row[0]); // Copy labels to legend
# Place the legend in the upper left corner:
//$plot->SetLegendPixels(5, 5);
$plot->DrawGraph();
echo "<img src=\"" . $plot->EncodeImage() . "\">\n";
}
?>
