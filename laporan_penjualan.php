<?php
include_once 'includes/config.php';
 //KONEKSI
// $host="localhost"; //isi dengan host anda. contoh "localhost"
// $user="root"; //isi dengan username mysql anda. contoh "root"
// $password=""; //isi dengan password mysql anda. jika tidak ada, biarkan kosong.
// $database="project213";//isi nama database dengan tepat.
// mysql_connect($host,$user,$password);
// mysql_select_db($database);
	$con = mysqli_connect('localhost','root','','project213');
?>
<?php
	$content = "
	<html> 
	<body>
		<table>
			<tr>
				<th>No.<th>
				<th>Nama Mekanik</th>
				<th>Sparepart</th>
				<th>Qty</th>
				<th>Harga Sparepart</th>
				<th>Harga Jasa</th>
				<th>Tanggal</th>
			</tr>";

			$no = 1;
			$sql = mysqli_query($con,"SELECT * FROM 213_pembelian JOIN 213_mekanik ON 213_pembelian.id_mekanik=213_mekanik.id_mekanik JOIN 213_sparepart ON 213_pembelian.id_sparepart=213_sparepart.id_sparepart ORDER BY id_pembelian ASC");
			while($row=mysqli_fetch_array($sql)){
				
			$content .= "<tr>
							<td>".$no++."</td>
							<td>".$row["nama_mekanik"]."</td>
							<td>".$row["sparepart"]."</td>
							<td>".$row["qty"]."</td>
							<td>".$row["harga"]."</td>
							<td>".$row["harga_jasa"]."</td>
							<td>".$row["tgl_beli"]."</td>
						 </tr>";
			}
		$content .= "</table>
	</body>
	</html>
	";

    require_once "./mpdf_v8.0.3-master/vendor/autoload.php";	
    $mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>