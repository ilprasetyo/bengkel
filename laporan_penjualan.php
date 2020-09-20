<?php
	$content = "
	<html> 
	<body>
		<h1>MPDF SUCCESS !</h1> 
		berhasil
	</body>
	</html>
	";

    require_once "./mpdf_v8.0.3-master/vendor/autoload.php";	
    $mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>