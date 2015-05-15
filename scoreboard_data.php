<?php
require 'config.php';
$data = file_get_contents(PC2_SUMMARY_LOCATION);
$data = explode('</TABLE>', $data);
$data = explode('<TABLE', $data[0]);
echo '<TABLE style="text-align:center"'.$data[1].'</TABLE>';
?>
