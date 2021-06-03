<?php
require "koneksi.php";
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from tb_zakat");
$html = '<center><h3>Daftar Nama Pembayaran Zakat</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
        <tr>
            	<th>No</th>
                <th>Jenis Zakat</th>
                <th>Nominal</th>
                <th>Nama Lengkap</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
        </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
        <td>".$no."</td>
        <td>".$row['jenis_zakat']."</td>
        <td>".$row['nominal']."</td>
        <td>".$row['nama_lengkap']."</td>
		<td>".$row['nomor_hp']."</td>
        <td>".$row['email']."</td>
        <td>".$row['nama_bank']."</td>
		<td>".$row['nomor_rek']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_zakat.pdf');
?>