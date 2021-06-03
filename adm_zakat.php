<?php
require "../koneksi.php";
include "../template/adm_nav.php";
require "../functions/function_zakat.php";
$zakat_view = query_view("SELECT * FROM tb_zakat");
?>

<div class="container">
	<div class="table-responsive">
		<div style="text-align: center">
        <h3>Data Pembayaran Zakat <?php echo @$_GET['zakat']; ?></h3>
		<?php echo '<h3>'."Per " . date("d M Y H:i:s") ;
		?>
		</div>
		<div class="row">
             <div class="col-md-12">
            	<div class="h-25">
             	</div>
             </div>
          </div>
        <hr>
        <div style="padding-bottom:25px">
			<div style="float: right">
        <a href="../adm_zakat/tambah_zakat.php" class="btn btn-primary" title="Tambah data Pembayaran Zakat"><span class="glyphicon glyphicon-pencil"></span> Tambah Data</a>
        </div>
			</div>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
    <div class="form-group">
        <label for="sel1">Select Zakat:</label>
        <select class="form-control" name="zakat" onchange='this.form.submit()'>
            <?php
            require "../koneksi.php";
            //Perintah sql untuk menampilkan semua data pada tabel jurusan
            $sql="select * from zakat";

            $hasil=mysqli_query($koneksi,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            $ket="";
            if (isset($_GET['zakat'])) {
                $zakat = trim($_GET['zakat']);

                if ($zakat==$data['kode_zakat'])
                {
                    $ket="selected";
                }
            }
            ?>
            <option <?php echo $ket; ?> value="<?php echo $data['kode_zakat'];?>"><?php echo $data['nama_zakat'];?></option>
            <?php
	}
  ?>
        </select>
    </div>
    </form>
        <table class="table table-stripped table-hover datatabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Zakat</th>
                <th>Nominal</th>
                <th>Nama Lengkap</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Nama Bank</th>
                <th>Nomor Rek</th>
                <th>Action</th>                         
            </tr>
        </thead>  
			<?php


        if (isset($_GET['zakat'])) {
            $zakat=trim($_GET['zakat']);
            $sql="select * from tb_zakat where kode_zakat='$zakat' order by id_zakat asc";
        }else {
            $sql="select * from tb_zakat order by id_zakat asc";
        }


        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
        <tbody>
        
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["jenis_zakat"]; ?></td>
                <td><?php echo "Rp.".number_format($data["nominal"],0, ".", "."); ?></td>
                <td><?php echo $data["nama_lengkap"]; ?></td>
                <td><?php echo $data["nomor_hp"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td><?php echo $data["nama_bank"]; ?></td>
                <td><?php echo $data["nomor_rek"]; ?></td>
                <td>
                    <a href="../adm_zakat/update_zakat.php?id=<?php echo $data["id_zakat"]; ?>" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-cog"></span> Edit</a>
                    <a href="../adm_zakat/hapus_zakat.php?id=<?php echo $data["id_zakat"]; ?>" onclick="return confirm('Yakin MENGHAPUS data ?');" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
        </table>     
		<div style="padding-bottom:25px">
			<div style="float: right">
        <a href="../report.php" class="btn btn-primary" title="Tambah data Pembayaran Zakat"></span> Download</a>
        </div>
				</div>
    </div>
</div> <!--container-->