<?php

//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Data Jemaat'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();

?>
<?php
			include "../includes/koneksi.php";
			include "include/fungsi_tgl.php";
			date_default_timezone_set('Asia/Jakarta');

			$nama_jemaat=$_GET['nama_jemaat'];
			$sql = mysqli_query($konek, "SELECT a.id_jemaat, a.nama_jemaat, a.tempat_lahir, a.tgl_lahir, a.jenis_kelamin, a.alamat, a.no_telp_hp, a.no_telp_rumah, a.no_telp_kantor, a.status_keluarga, a.status_pernikahan, a.tempat_menikah, a.tgl_pernikahan, a.nama_pasangan, a.anak_ke_1, a.anak_ke_2, a.anak_ke_3, a.anak_ke_4, a.ayah, a.ibu, a.tgl_baptis, a.tempat_baptis, a.pendeta, a.golongan_darah, a.pendidikan_terakhir, a.keahlian, a.pekerjaan, a.tanggal_pengisian_formulir, a.id_licom, a.level, a.foto, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom where a.nama_jemaat='$nama_jemaat'");
			if($sql == false){
   			die ("Terjadi Kesalahan : ". mysqli_error($konek));
			}
			$hasil = mysqli_fetch_array($sql);
?>
<!doctype html>
<html>
    <head>
        <title>Cetak Data Jemaat</title>
		<?php
			include "include/css.php";
		?>
    </head>
    <body>
		<table width="100%" id="data" border="0" class="table table-striped table-scalable">	
				<thead>
					<tr>
						<th colspan="2"><img src="../admin/<?php echo $hasil['foto']; ?>" width="150" height="175"></th>
					</tr>
					<tr>
						<th colspan="2"><h2>Biodata</h2></th>
					</tr>
					<tr>
						<th>Nama</th>
						<th>:&emsp;<?php echo $hasil['nama_jemaat']; ?></th>
					</tr>
					<tr>
						<th>Tempat & Tanggal Lahir</th>
						<th>:&emsp;<?php echo $hasil['tempat_lahir']; ?>, <?php echo tgl_indo($hasil['tgl_lahir']); ?></th>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<th>:&emsp;<?php echo $hasil['jenis_kelamin']; ?></th>
					<tr>
						<th>Alamat</th>
						<th>:&emsp;<?php echo $hasil['alamat']; ?></th>
					</tr>
					<tr>
						<th>No. Telepon HP</th>
						<th>:&emsp;<?php echo $hasil['no_telp_hp']; ?></th>
					</tr>
					<tr>
						<th>No. Telepon Rumah</th>
						<th>:&emsp;<?php echo $hasil['no_telp_rumah']; ?></th>
					</tr>
					<tr>
						<th>No. Telepon Kantor</th>
						<th>:&emsp;<?php echo $hasil['no_telp_kantor']; ?></th>
					</tr>
					<tr>
						<th>Status Keluarga</th>
						<th>:&emsp;<?php echo $hasil['status_keluarga']; ?></th>
					</tr>
					<tr>
						<th>Status Pernikahan</th>
						<th>:&emsp;<?php echo $hasil['status_pernikahan']; ?></th>
					</tr>
					<tr>
						<th>Tempat Menikah</th>
						<th>:&emsp;<?php echo $hasil['tempat_menikah']; ?></th>
					</tr>
					<tr>
						<th>Tanggal Pernikahan</th>
						<th>:&emsp;<?php echo tgl_indo($hasil['tgl_pernikahan']); ?></th>
					</tr>
					<tr>
						<th>Nama Pasangan</th>
						<th>:&emsp;<?php echo $hasil['nama_pasangan']; ?></th>
					</tr>
					<tr>
						<th>Anak Ke-1</th>
						<th>:&emsp;<?php echo $hasil['anak_ke_1']; ?></th>
					</tr>
					<tr>
						<th>Anak Ke-2</th>
						<th>:&emsp;<?php echo $hasil['anak_ke_2']; ?></th>
					</tr>
					<tr>
						<th>Anak Ke-3</th>
						<th>:&emsp;<?php echo $hasil['anak_ke_3']; ?></th>
					</tr>
					<tr>
						<th>Anak Ke-4</th>
						<th>:&emsp;<?php echo $hasil['anak_ke_4']; ?></th>
					</tr>
					<tr>
						<th>Ayah</th>
						<th>:&emsp;<?php echo $hasil['ayah']; ?></th>
					</tr>
					<tr>
						<th>Ibu</th>
						<th>:&emsp;<?php echo $hasil['ibu']; ?></th>
					</tr>
					<tr>
						<th>Tanggal Baptis</th>
						<th>:&emsp;<?php echo tgl_indo($hasil['tgl_baptis']); ?></th>
					</tr>
					<tr>
						<th>Tempat Baptis</th>
						<th>:&emsp;<?php echo $hasil['tempat_baptis']; ?></th>
					</tr>
					<tr>
						<th>Pendeta</th>
						<th>:&emsp;<?php echo $hasil['pendeta']; ?></th>
					</tr>
					<tr>
						<th>Golongan Darah</th>
						<th>:&emsp;<?php echo $hasil['golongan_darah']; ?></th>
					</tr>
					<tr>
						<th>Pendidikan Terakhir</th>
						<th>:&emsp;<?php echo $hasil['pendidikan_terakhir']; ?></th>
					</tr>
					<tr>
						<th>Bidang Ilmu/Keahlian</th>
						<th>:&emsp;<?php echo $hasil['keahlian']; ?></th>
					</tr>
					<tr>
						<th>Pekerjaan</th>
						<th>:&emsp;<?php echo $hasil['pekerjaan']; ?></th>
					</tr>
					<tr>
						<th>Nama Licom</th>
						<th>:&emsp;<?php echo $hasil['nama_licom']; ?></th>
					</tr>
					<tr>
						<th>Level</th>
						<th>:&emsp;<?php echo $hasil['level']; ?></th>
					</tr>
				</thead>
				<tbody>
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