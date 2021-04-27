<?php 

//webslesson.info/2016/10/export-mysql-table-data-to-csv-file-in-php.html

$connect = mysqli_connect("localhost", "root", "", "relatorio");
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=arquivo.csv');
// abre o arquivo
$output = fopen('php://output', 'w');


$query = "SELECT * FROM csv ORDER BY id DESC";
$result = mysqli_query($connect, $query);

fputcsv($output , array('id','nome','sobrenome','profissao'));

while ($row = mysqli_fetch_assoc($result) ) {
    fputcsv($output, $row);
}

//fecha o output
fclose($output);