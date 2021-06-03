<?php
require "koneksi.php";

function query_view($query_view) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query_view);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data_zakat){
    global $koneksi;
    //ambil elemen data
	$kode_zakat = htmlspecialchars($data_zakat["kode_zakat"]);
    $jenis_zakat = htmlspecialchars($data_zakat["jenis_zakat"]);	
    $nominal = htmlspecialchars($data_zakat["nominal"]);
    $nama_lengkap = htmlspecialchars($data_zakat["nama_lengkap"]);
    $nomor_hp = htmlspecialchars($data_zakat["nomor_hp"]);
    $email = htmlspecialchars($data_zakat["email"]);
    $nama_bank = htmlspecialchars($data_zakat["nama_bank"]);
    $nomor_rek = htmlspecialchars($data_zakat["nomor_rek"]);

    //query
    $query = "INSERT INTO tb_zakat
                VALUES
                ('','$kode_zakat','$jenis_zakat', '$nominal', '$nama_lengkap', '$nomor_hp', '$email', '$nama_bank', '$nomor_rek')
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id_zakat){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_zakat WHERE id_zakat = $id_zakat");

    return mysqli_affected_rows($koneksi);
}

function update($data_zakat){
    global $koneksi;
    //ambil elemen data
    $id_zakat = $data_zakat["id"];
    $jenis_zakat = htmlspecialchars($data_zakat["jenis_zakat"]);
	$kode_zakat = htmlspecialchars($data_zakat["kode_zakat"]);
    $nominal = htmlspecialchars($data_zakat["nominal"]);
    $nama_lengkap = htmlspecialchars($data_zakat["nama_lengkap"]);
    $nomor_hp = htmlspecialchars($data_zakat["nomor_hp"]);
    $email = htmlspecialchars($data_zakat["email"]);
    $nama_bank = htmlspecialchars($data_zakat["nama_bank"]);
    $nomor_rek = htmlspecialchars($data_zakat["nomor_rek"]);

    //query
    $query = "UPDATE tb_zakat SET
                jenis_zakat = '$jenis_zakat',
				kode_zakat = '$kode_zakat',
                nominal = '$nominal',
                nama_lengkap = '$nama_lengkap',
                nomor_hp = '$nomor_hp',
                email = '$email',
                nama_bank = '$nama_bank',
                nomor_rek = '$nomor_rek'
            WHERE id_zakat = $id_zakat
            ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

?>