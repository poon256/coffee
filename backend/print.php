<?php

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('project');
$pdf->SetTitle('project');
$pdf->SetSubject('TCPDF-project');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php'))
{
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage();

$html = '';


require_once('class.connect.php');

if($_REQUEST['cat'] == 'inventory')
{
    if ($_REQUEST['typ'] == 'all')
    {
        $html = $html."
        
		<table border='1'>
			<thead>
      
				<tr>
					<th class='text-center'>
						Id
					</th>
					<th class='text-center'>
						Name
					</th>
					<th class='text-center'>
						Buy
					</th>
					<th class='text-center'>
						Sale
					</th>
				</tr>
			</thead>
      <style>
      table, td, th {
  border: 1px solid black;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th {
  height: 50px;
  text-align: center;   //ตัวอักษรอยู่ตรงกลาง
}
td{
  text-align: right;    //ตัวอักษรชิดขวา
}
</style>
			<tbody>";
		$sql = "select * from `inventory`";
		$conn = new connect();
		$res = $conn->query($sql);
		while ($cdr = $res->fetch())
		{
			$html = $html."<tr>";
			$html = $html."<td>";
			$html = $html.$cdr['id'];
			$html = $html."</td>";
			$html = $html."<td>";
			$html = $html.$cdr['name'];
			$html = $html."</td>";
			$html = $html."<td>";
			$html = $html.$cdr['buy'];
			$html = $html."</td>";
			$html = $html."<td>";
			$html = $html.$cdr['sale'];
			$html = $html."</td>";
			$html = $html."</tr>";
		}
		$html = $html."</tbody></table>";
	}
}


if($_REQUEST['cat'] == 'logs')
{
    if ($_REQUEST['typ'] == 'all')
    {
        $html = $html."
		<table border='1'>
			<thead>
				<tr>
					<th class='text-center'>
						No
					</th>
					<th class='text-center'>
						User
					</th>
					<th class='text-center'>
						Action
					</th>
          					<th class='text-center'>
						Date
					</th>
				</tr>
			</thead>
			<tbody>";
      $a = 1;
		$sql = "select * from `logs` left join`users` on  `users`.`id` = `logs`.`uid`";
						$conn = new connect();
						$res = $conn->query($sql);
						while ($cdr = $res->fetch())
		{
      $html = $html."<tr>";
      $html = $html."<td>";
      $html = $html.$a;
      $html = $html."</td>";
      $html = $html."<td>";
      $html = $html.$cdr['name'];
      $html = $html."</td>";
      $html = $html."<td >";
      $html = $html.$cdr['action'];
      $html = $html."</td>";
      $html = $html."<td >";
      $html = $html.date("d/m/Y H:i:s",$cdr['dating']);
      $html = $html."</td>";
      $html = $html."</tr>";
      $a++;
		}
		$html = $html."</tbody></table>";
	}
}

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

$pdf->Output('66118.pdf', 'I');

?>