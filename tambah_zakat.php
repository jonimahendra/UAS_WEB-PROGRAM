<?php
include "../template/adm_nav.php";
require "../functions/function_zakat.php";

//cek tombol submit ditekan/belum
if(isset($_POST["submit"])){
    
    //cek berhasil / tidak tambah data
    if(tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data BERHASIL ditambahkan');
                document.location.href = '../admin/adm_zakat.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('data GAGAL ditambahkan');
                document.location.href = '../admin/adm_zakat.php';
            </script>
        ";
    }

}
?>

<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
    <h3 align="center">Input Data Pembayaran Baru</h3>
</div>
<div class="panel-body">
    <form class="form-horizontal" action="" method="post">
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-4" for="jenis_zakat">Jenis Zakat:</label>
                <div class="col-sm-8"><select id="jenis_zakat" name="jenis_zakat" class="form-control select2" style="width: 100%;">
                    <option value="-" selected="selected">---</option>
                    <option value="Zakat Penghasilan"> Zakat Penghasilan</option>
                    <option value="Zakat Maal">Zakat Maal</option>
                    <option value="Zakat Fitrah">Zakat Fitrah</option>
                </select>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4" for="kode_zakat">Kode Zakat:</label>
                <div class="col-sm-8"><select id="kode_zakat" name="kode_zakat" class="form-control select2" style="width: 100%;">
                    <option value="<?php echo $data_mahasiswa["id_mhs"];?>" selected="selected">---</option>
                    <option value="ZP">ZP</option>
                    <option value="ZM">ZM</option>
                    <option value="ZF">ZF</option>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nominal">Nominal :</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="nominal" id="nominal" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama_lengkap">Nama Lengkap :</label>
                <div class="col-sm-8">
                    <input id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-sm-4" for="nomor_hp">Nomor HP :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
                </div>
            </div>            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-sm-4" for="email">Email :</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama_bank">Nama Bank :</label>
                <div class="col-sm-8">
                    <input id="nama_bank" name="nama_bank" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nomor_rek">Nomor Rek :</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nomor_rek" id="nomor_rek" required>
                </div>
            </div>
        </div> <!-- col -->
        </div> <!-- row -->
        <hr>
        <button type="submit" name="submit" class="btn btn-primary">Register Data</button>
        <a href="../admin/adm_zakat.php" class="btn btn-danger">Batal</a>
    </form>
</div>
</div> <!--container-->
