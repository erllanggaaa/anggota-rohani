<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Data Semua Jemaat'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
<!doctype html>
<html>
    <head>
        <title>Cetak Semua Jemaat</title>
		<?php
			include "include/css.php";
		?>
    </head>
    <body>
        <?php
		include "../includes/koneksi.php";
		include "include/fungsi_tgl.php";
		//include "auth_user.php";
		date_default_timezone_set('Asia/Jakarta');
		?>
		<table width="100%" id="data" class="table table-striped table-scalable">	
				<thead>
					<tr>
						<th colspan="2" style='text-align:center'><h2>Data Semua Jemaat</h2></th>
					</tr>
				</thead>
		</table>
		<table width="100%" id="data" border="1" class="table table-bordered table-striped table-scalable">	
				<thead>
					<tr>
						<th style='text-align:center; font-weight:bold;'>Nama</th>
						<th style='text-align:center; font-weight:bold;'>Tempat & Tanggal Lahir</th>
						<th style='text-align:center; font-weight:bold;'>Jenis Kelamin</th>
						<th style='text-align:center; font-weight:bold;'>Alamat</th>
						<th style='text-align:center; font-weight:bold;'>No. Telepon HP</th>
						<th style='text-align:center; font-weight:bold;'>No. Telepon Rumah</th>
						<th style='text-align:center; font-weight:bold;'>No. Telepon Kantor</th>
						<th style='text-align:center; font-weight:bold;'>Status Keluarga</th>
						<th style='text-align:center; font-weight:bold;'>Status Pernikahan</th>
						<th style='text-align:center; font-weight:bold;'>Tempat Menikah</th>
						<th style='text-align:center; font-weight:bold;'>Tanggal Pernikahan</th>
						<th style='text-align:center; font-weight:bold;'>Nama Pasangan</th>
						<th style='text-align:center; font-weight:bold;'>Anak Ke-1</th>
						<th style='text-align:center; font-weight:bold;'>Anak Ke-2</th>
						<th style='text-align:center; font-weight:bold;'>Anak Ke-3</th>
						<th style='text-align:center; font-weight:bold;'>Anak Ke-4</th>
						<th style='text-align:center; font-weight:bold;'>Ayah</th>
						<th style='text-align:center; font-weight:bold;'>Ibu</th>
						<th style='text-align:center; font-weight:bold;'>Tanggal Baptis</th>
						<th style='text-align:center; font-weight:bold;'>Tempat Baptis</th>
						<th style='text-align:center; font-weight:bold;'>Pendeta</th>
						<th style='text-align:center; font-weight:bold;'>Golongan Darah</th>
						<th style='text-align:center; font-weight:bold;'>Pendidikan Terakhir</th>
						<th style='text-align:center; font-weight:bold;'>Bidang Ilmu/Keahlian</th>
						<th style='text-align:center; font-weight:bold;'>Pekerjaan</th>
						<th style='text-align:center; font-weight:bold;'>Nama Licom</th>
						<th style='text-align:center; font-weight:bold;'>Level</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($konek, "SELECT a.id_jemaat, a.nama_jemaat, a.tempat_lahir, a.tgl_lahir, a.jenis_kelamin, a.alamat, a.no_telp_hp, a.no_telp_rumah, a.no_telp_kantor, a.status_keluarga, a.status_pernikahan, a.tempat_menikah, a.tgl_pernikahan, a.nama_pasangan, a.anak_ke_1, a.anak_ke_2, a.anak_ke_3, a.anak_ke_4, a.ayah, a.ibu, a.tgl_baptis, a.tempat_baptis, a.pendeta, a.golongan_darah, a.pendidikan_terakhir, a.keahlian, a.pekerjaan, a.tanggal_pengisian_formulir, a.id_licom, a.level, a.foto, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom where a.id_jemaat ORDER BY a.id_jemaat DESC");
					while ($hasil = mysqli_fetch_array($sql)){
								echo "
									<tr>
										<td style='text-align:center'>$hasil[nama_jemaat]</td>
										<td style='text-align:center'>$hasil[tempat_lahir], ".tgl_indo($hasil['tgl_lahir']) ."</td>
										<td style='text-align:center'>$hasil[jenis_kelamin]</td>
										<td style='text-align:center'>$hasil[alamat]</td>
										<td style='text-align:center'>$hasil[no_telp_hp]</td>
										<td style='text-align:center'>$hasil[no_telp_rumah]</td>
										<td style='text-align:center'>$hasil[no_telp_kantor]</td>
										<td style='text-align:center'>$hasil[status_keluarga]</td>
										<td style='text-align:center'>$hasil[status_pernikahan]</td>
										<td style='text-align:center'>$hasil[tempat_menikah]</td>
										<td style='text-align:center'>".tgl_indo($hasil['tgl_pernikahan']) ."</td>
										<td style='text-align:center'>$hasil[nama_pasangan]</td>
										<td style='text-align:center'>$hasil[anak_ke_1]</td>
										<td style='text-align:center'>$hasil[anak_ke_2]</td>
										<td style='text-align:center'>$hasil[anak_ke_3]</td>
										<td style='text-align:center'>$hasil[anak_ke_4]</td>
										<td style='text-align:center'>$hasil[ayah]</td>
										<td style='text-align:center'>$hasil[ibu]</td>
										<td style='text-align:center'>".tgl_indo($hasil['tgl_baptis']) ."</td>
										<td style='text-align:center'>$hasil[tempat_baptis]</td>
										<td style='text-align:center'>$hasil[pendeta]</td>
										<td style='text-align:center'>$hasil[golongan_darah]</td>
										<td style='text-align:center'>$hasil[pendidikan_terakhir]</td>
										<td style='text-align:center'>$hasil[keahlian]</td>
										<td style='text-align:center'>$hasil[pekerjaan]</td>
										<td style='text-align:center'>$hasil[nama_licom]</td>
										<td style='text-align:center'>$hasil[level]</td>
									</tr>";
								} ?>
				</tbody>
			</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#data').DataTable();
});
</script>
</body>
</html>

<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf

$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>