<?php
require 'config.php';
$source = DEMO_MODE == 1 ? 'summary_demo.html' : PC2_SUMMARY_LOCATION;
$data = file_get_contents($source);
$data = explode('</TABLE>', $data);
$data = explode('<TABLE border="0">', $data[0]);
$data = explode("<tr>\r\n<td></td><td></td><td></td><td></td><td>\r\n<center>", $data[1]);
$data[1] = explode("</center>\r\n</td>\r\n</tr>", $data[1]);
$data[2] = explode("</center>\r\n</td>\r\n</tr>", $data[2]);
$data[2][1] = explode("Total Yes</td><td></td><td></td><td>", $data[2][1]);
$data[2][1] = explode("</td><td>", $data[2][1][1]);
foreach($data[2][1] as &$prob){
	if(strpos($prob, '>') == 0){
		$prob = explode('/', $prob);
	}
}
$prob_count = count($data[2][1]) - 1;
$text_sum = array('Submitted', 'First AC', 'Total AC');
$sum = '';
for($i = 0; $i < 3; $i++){
	$col = '<tr><td></td><td>'.$text_sum[$i].'</td><td></td><td></td>';
	for($j = 0; $j < $prob_count; $j++){
		$col .= '<td>'.$data[2][1][$j][$i].'</td>';
	}
	if($i == 0){
		$col .= '<td>'.$data[2][1][$prob_count];
	}else{
		$col .= '</tr>';
	}
	$sum .= $col;
}
// print_r($data);
$table = $data[0].$data[1][1].$sum;
echo '<TABLE>'.$table.'</TABLE>';
?>
