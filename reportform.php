<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat koneksi ke database MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_formpeserta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengeksekusi query untuk mengambil data dari tiga tabel
$query = "SELECT registrasi.idpendaftaran AS idpendaftaran,
registrasi.jenis_pendaftaran AS jenis_pendaftaran, registrasi.tglmasuksekolah AS tglmasuksekolah, registrasi.nis AS nis,
registrasi.nopesujian AS nopesujian, registrasi.appaud AS appaud, registrasi.aptk AS aptk, 
registrasi.noskhun AS noskhun, registrasi.noijazah AS noijazah, registrasi.hobi AS hobi,
registrasi.citacita AS citacita,

datapribadi.namaleng AS namaleng, datapribadi.jkelamin AS jkelamin, datapribadi.nisn AS nisn,
datapribadi.nik AS nik, datapribadi.tempatlahir AS tempatlahir, datapribadi.tglahir AS tglahir,
datapribadi.agama AS agama, datapribadi.kebkhusus AS kebkhusus, datapribadi.alamat AS alamat, 
datapribadi.rt AS rt, datapribadi.rw AS rw, datapribadi.namadusun AS namadusun, datapribadi.namakel AS namakel, 
datapribadi.kec AS kec, datapribadi.kodepos AS kodepos, datapribadi.tmpttinggal AS tmpttinggal,
datapribadi.transport AS transport, datapribadi.nohp AS nohp, datapribadi.notelp AS notelp, 
datapribadi.email AS email, datapribadi.kpspkh AS kpspkh, datapribadi.nokpspkh AS nokpspkh,
datapribadi.kwn AS kwn, datapribadi.namanegara AS namanegara, datapribadi.idpendaftaran AS idpendaftaran,

dataayah.namaayah AS namaayah, dataayah.tlayah AS tlayah, dataayah.pendayah AS pendayah, 
dataayah.pekerjaanayah AS pekerjaanayah, dataayah.salaryayah AS salaryayah, dataayah.berkebayah AS berkebayah, dataayah.idpendaftaran AS idpendaftaran,

dataibu.namaibu AS namaibu, dataibu.tlibu AS tlibu, dataibu.pendibu AS pendibu, dataibu.pekerjaanibu AS pekerjaanibu,
dataibu.salaryibu AS salaryibu, dataibu.berkebibu AS berkebibu, dataibu.idpendaftaran AS idpendaftaran

FROM registrasi 
JOIN datapribadi ON registrasi.idpendaftaran = datapribadi.idpendaftaran 
JOIN dataayah ON registrasi.idpendaftaran = dataayah.idpendaftaran 
JOIN dataibu ON registrasi.idpendaftaran = dataibu.idpendaftaran";
$result = $conn->query($query);

// Membuat objek Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menulis header kolom
$sheet->setCellValue('A1', 'No Pendaftaran')->getStyle('A1')->getFont()->setBold(true);
$sheet->setCellValue('B1', 'Jenis Pendaftaran')->getStyle('C1')->getFont()->setBold(true);
$sheet->setCellValue('C1', 'Tgl Masuk Sekolah')->getStyle('D1')->getFont()->setBold(true);
$sheet->setCellValue('D1', 'NIS')->getStyle('E1')->getFont()->setBold(true);
$sheet->setCellValue('E1', 'No Peserta Ujian')->getStyle('F1')->getFont()->setBold(true);
$sheet->setCellValue('F1', 'Pernah PAUD')->getStyle('G1')->getFont()->setBold(true);
$sheet->setCellValue('G1', 'Pernah TK')->getStyle('H1')->getFont()->setBold(true);
$sheet->setCellValue('H1', 'Seri SKHUN')->getStyle('I1')->getFont()->setBold(true);
$sheet->setCellValue('I1', 'Seri Ijazah')->getStyle('J1')->getFont()->setBold(true);
$sheet->setCellValue('J1', 'Hobi')->getStyle('K1')->getFont()->setBold(true);
$sheet->setCellValue('K1', 'Cita-cita')->getStyle('L1')->getFont()->setBold(true);
$sheet->setCellValue('L1', 'Nama Lengkap')->getStyle('M1')->getFont()->setBold(true);
$sheet->setCellValue('M1', 'Jenis Kelamin')->getStyle('N1')->getFont()->setBold(true);
$sheet->setCellValue('N1', 'NISN')->getStyle('O1')->getFont()->setBold(true);
$sheet->setCellValue('O1', 'NIK')->getStyle('P1')->getFont()->setBold(true);
$sheet->setCellValue('P1', 'Tempat Lahir')->getStyle('Q1')->getFont()->setBold(true);
$sheet->setCellValue('Q1', 'Tgl Lahir')->getStyle('R1')->getFont()->setBold(true);
$sheet->setCellValue('R1', 'Agama')->getStyle('S1')->getFont()->setBold(true);
$sheet->setCellValue('S1', 'Kebutuhan Khusus')->getStyle('T1')->getFont()->setBold(true);
$sheet->setCellValue('T1', 'Alamat')->getStyle('U1')->getFont()->setBold(true);
$sheet->setCellValue('U1', 'RT')->getStyle('V1')->getFont()->setBold(true);
$sheet->setCellValue('V1', 'RW')->getStyle('W1')->getFont()->setBold(true);
$sheet->setCellValue('W1', 'Dusun')->getStyle('X1')->getFont()->setBold(true);
$sheet->setCellValue('X1', 'Kelurahan/Desa')->getStyle('Y1')->getFont()->setBold(true);
$sheet->setCellValue('Y1', 'Kecamatan')->getStyle('Z1')->getFont()->setBold(true);
$sheet->setCellValue('Z1', 'Kode Pos')->getStyle('AA1')->getFont()->setBold(true);
$sheet->setCellValue('AA1', 'Tempat Tinggal')->getStyle('AB1')->getFont()->setBold(true);
$sheet->setCellValue('AB1', 'Moda Transportasi')->getStyle('AC1')->getFont()->setBold(true);
$sheet->setCellValue('AC1', 'No HP')->getStyle('AD1')->getFont()->setBold(true);
$sheet->setCellValue('AD1', 'No Telepon')->getStyle('AE1')->getFont()->setBold(true);
$sheet->setCellValue('AE1', 'E-mail Pribadi')->getStyle('AF1')->getFont()->setBold(true);
$sheet->setCellValue('AF1', 'Penerima KPS/PKH/KIP')->getStyle('AG1')->getFont()->setBold(true);
$sheet->setCellValue('AG1', 'No KPS/PKH/KIP')->getStyle('AH1')->getFont()->setBold(true);
$sheet->setCellValue('AH1', 'Kewarganegaraan')->getStyle('AI1')->getFont()->setBold(true);
$sheet->setCellValue('AI1', 'Negara')->getStyle('AJ1')->getFont()->setBold(true);
$sheet->setCellValue('AJ1', 'Nama Ayah')->getStyle('AK1')->getFont()->setBold(true);
$sheet->setCellValue('AK1', 'Thn Lahir Ayah')->getStyle('AL1')->getFont()->setBold(true);
$sheet->setCellValue('AL1', 'Pend Ayah')->getStyle('AM1')->getFont()->setBold(true);
$sheet->setCellValue('AM1', 'Pekerjaan Ayah')->getStyle('AN1')->getFont()->setBold(true);
$sheet->setCellValue('AN1', 'Gaji')->getStyle('AO1')->getFont()->setBold(true);
$sheet->setCellValue('AO1', 'Keb Khusus')->getStyle('AP1')->getFont()->setBold(true);
$sheet->setCellValue('AP1', 'Nama Ibu')->getStyle('AQ1')->getFont()->setBold(true);
$sheet->setCellValue('AQ1', 'Thn Lahir Ibu')->getStyle('AR1')->getFont()->setBold(true);
$sheet->setCellValue('AR1', 'Pend Ibu')->getStyle('AS1')->getFont()->setBold(true);
$sheet->setCellValue('AS1', 'Pekerjaan Ibu')->getStyle('AT1')->getFont()->setBold(true);
$sheet->setCellValue('AT1', 'Gaji')->getStyle('AU1')->getFont()->setBold(true);
$sheet->setCellValue('AU1', 'Keb Khusus')->getStyle('AV1')->getFont()->setBold(true);

// Menulis data hasil query
$row = 2;
if ($result->num_rows > 0) {
    while ($row_data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $row_data["idpendaftaran"]);
        $sheet->setCellValue('B' . $row, $row_data["jenis_pendaftaran"]);
        $sheet->setCellValue('C' . $row, $row_data["tglmasuksekolah"]);
        $sheet->setCellValue('D' . $row, $row_data["nis"]);
        $sheet->setCellValue('E' . $row, $row_data["nopesujian"]);
        $sheet->setCellValue('F' . $row, $row_data["appaud"]);
        $sheet->setCellValue('G' . $row, $row_data["aptk"]);
        $sheet->setCellValue('H' . $row, $row_data["noskhun"]);
        $sheet->setCellValue('I' . $row, $row_data["noijazah"]);
        $sheet->setCellValue('J' . $row, $row_data["hobi"]);
        $sheet->setCellValue('K' . $row, $row_data["citacita"]);
        $sheet->setCellValue('L' . $row, $row_data["namaleng"]);
        $sheet->setCellValue('M' . $row, $row_data["jkelamin"]);
        $sheet->setCellValue('N' . $row, $row_data["nisn"]);
        $sheet->setCellValue('O' . $row, $row_data["nik"]);
        $sheet->setCellValue('P' . $row, $row_data["tempatlahir"]);
        $sheet->setCellValue('Q' . $row, $row_data["tglahir"]);
        $sheet->setCellValue('R' . $row, $row_data["agama"]);
        $sheet->setCellValue('S' . $row, $row_data["kebkhusus"]);
        $sheet->setCellValue('T' . $row, $row_data["alamat"]);
        $sheet->setCellValue('U' . $row, $row_data["rt"]);
        $sheet->setCellValue('V' . $row, $row_data["rw"]);
        $sheet->setCellValue('W' . $row, $row_data["namadusun"]);
        $sheet->setCellValue('X' . $row, $row_data["namakel"]);
        $sheet->setCellValue('Y' . $row, $row_data["kec"]);
        $sheet->setCellValue('Z' . $row, $row_data["kodepos"]);
        $sheet->setCellValue('AA' . $row, $row_data["tmpttinggal"]);
        $sheet->setCellValue('AB' . $row, $row_data["transport"]);
        $sheet->setCellValue('AC' . $row, $row_data["nohp"]);
        $sheet->setCellValue('AD' . $row, $row_data["notelp"]);
        $sheet->setCellValue('AE' . $row, $row_data["email"]);
        $sheet->setCellValue('AF' . $row, $row_data["kpspkh"]);
        $sheet->setCellValue('AG' . $row, $row_data["nokpspkh"]);
        $sheet->setCellValue('AH' . $row, $row_data["kwn"]);
        $sheet->setCellValue('AI' . $row, $row_data["namanegara"]);
        $sheet->setCellValue('AJ' . $row, $row_data["namaayah"]);
        $sheet->setCellValue('AK' . $row, $row_data["tlayah"]);
        $sheet->setCellValue('AL' . $row, $row_data["pendayah"]);
        $sheet->setCellValue('AM' . $row, $row_data["pekerjaanayah"]);
        $sheet->setCellValue('AN' . $row, $row_data["salaryayah"]);
        $sheet->setCellValue('AO' . $row, $row_data["berkebayah"]);
        $sheet->setCellValue('AP' . $row, $row_data["namaibu"]);
        $sheet->setCellValue('AQ' . $row, $row_data["tlibu"]);
        $sheet->setCellValue('AR' . $row, $row_data["pendibu"]);
        $sheet->setCellValue('AS' . $row, $row_data["pekerjaanibu"]);
        $sheet->setCellValue('AT' . $row, $row_data["salaryibu"]);
        $sheet->setCellValue('AU' . $row, $row_data["berkebibu"]);
        $row++;
    }
}

// Pengaturan Border Tabel
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$row = $row - 1;
$sheet->getStyle('A1:AU'.$row)->applyFromArray($styleArray);

// Mengatur lebar kolom secara otomatis
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);
$sheet->getColumnDimension('H')->setAutoSize(true);
$sheet->getColumnDimension('I')->setAutoSize(true);
$sheet->getColumnDimension('J')->setAutoSize(true);
$sheet->getColumnDimension('K')->setAutoSize(true);
$sheet->getColumnDimension('L')->setAutoSize(true);
$sheet->getColumnDimension('M')->setAutoSize(true);
$sheet->getColumnDimension('N')->setAutoSize(true);
$sheet->getColumnDimension('O')->setAutoSize(true);
$sheet->getColumnDimension('P')->setAutoSize(true);
$sheet->getColumnDimension('Q')->setAutoSize(true);
$sheet->getColumnDimension('R')->setAutoSize(true);
$sheet->getColumnDimension('S')->setAutoSize(true);
$sheet->getColumnDimension('T')->setAutoSize(true);
$sheet->getColumnDimension('U')->setAutoSize(true);
$sheet->getColumnDimension('V')->setAutoSize(true);
$sheet->getColumnDimension('W')->setAutoSize(true);
$sheet->getColumnDimension('X')->setAutoSize(true);
$sheet->getColumnDimension('Y')->setAutoSize(true);
$sheet->getColumnDimension('Z')->setAutoSize(true);
$sheet->getColumnDimension('AA')->setAutoSize(true);
$sheet->getColumnDimension('AB')->setAutoSize(true);
$sheet->getColumnDimension('AC')->setAutoSize(true);
$sheet->getColumnDimension('AD')->setAutoSize(true);
$sheet->getColumnDimension('AE')->setAutoSize(true);
$sheet->getColumnDimension('AF')->setAutoSize(true);
$sheet->getColumnDimension('AG')->setAutoSize(true);
$sheet->getColumnDimension('AH')->setAutoSize(true);
$sheet->getColumnDimension('AI')->setAutoSize(true);
$sheet->getColumnDimension('AJ')->setAutoSize(true);
$sheet->getColumnDimension('AK')->setAutoSize(true);
$sheet->getColumnDimension('AL')->setAutoSize(true);
$sheet->getColumnDimension('AM')->setAutoSize(true);
$sheet->getColumnDimension('AN')->setAutoSize(true);
$sheet->getColumnDimension('AO')->setAutoSize(true);
$sheet->getColumnDimension('AP')->setAutoSize(true);
$sheet->getColumnDimension('AQ')->setAutoSize(true);
$sheet->getColumnDimension('AR')->setAutoSize(true);
$sheet->getColumnDimension('AS')->setAutoSize(true);
$sheet->getColumnDimension('AT')->setAutoSize(true);
$sheet->getColumnDimension('AU')->setAutoSize(true);

// Menyimpan Spreadsheet ke dalam file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Peserta Didik 2023 (1).xlsx');

echo "Report data berhasil disimpan.";

// Menutup koneksi ke database
$conn->close();
?>