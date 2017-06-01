<?php
	require("WriteHTML.php");
	  $a=$_GET['id'];
                              require_once("../connection.php");
	                                     if ($result = $connection->query("SELECT *
	                                        FROM films  where film_id='$a';")) {
	                                             while($obj = $result->fetch_object()) {
	                                             	$pdf=new PDF_HTML();
	                                             	$pdf->AddPage();
	                                             	$pdf->SetFont('Arial','',14);
	                                             	$titular = stripslashes($obj->film_name);
													$titular = iconv('UTF-8', 'windows-1252', $titular);
	                                             	$pdf->WriteHTML($titular,'FJ');
																								// /*$imagen="films/$obj->film_image";
																								// $pdf->Image($imagen,30,30,-500);
	                                                $pdf->ln(20);
	                                             	$cuerpo = stripslashes($obj->film_sinopsis);
													$cuerpo = iconv('UTF-8', 'windows-1252', $cuerpo);
	                                             	$pdf->WriteHTML($cuerpo);
	                                             	$pdf->output();
	                                             	}
	                                             }
	                                              $result->close();
 													unset($obj);
 												unset($connection);
	?>
