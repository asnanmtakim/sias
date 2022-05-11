<?php
function format_rupiah($angka)
{
   $rupiah = number_format($angka, 0, ',', '.');
   return $rupiah;
}
function format_tanggal($tgl)
{
   $tanggal = date('d-m-Y', strtotime($tgl));
   return $tanggal;
}
function formatDateDatabase($tgl)
{
   $tanggal = date('Y-m-d H:i:s', strtotime($tgl));
   return $tanggal;
}

function hitung_umur($tanggal_lahir)
{
   $birthDate = new DateTime($tanggal_lahir);
   $today = new DateTime("today");
   if ($birthDate > $today) {
      exit("0 tahun 0 bulan 0 hari");
   }
   $y = $today->diff($birthDate)->y;
   $m = $today->diff($birthDate)->m;
   $d = $today->diff($birthDate)->d;
   return $y . " tahun " . $m . " bulan " . $d . " hari";
}

function getUmur($tanggal_lahir)
{
   $birthDate = new DateTime($tanggal_lahir);
   $today = new DateTime("today");
   if ($birthDate > $today) {
      exit("0");
   }
   $y = $today->diff($birthDate)->y;
   return $y;
}

function app_identity()
{
   $db = \Config\Database::connect();
   $builder = $db->table('config_app');
   $output = $builder->orderBy('conf_char', 'ASC')->get()->getResultArray();
   $appTitle = $output[5]['conf_value'];
   $output = [
      'app_title' => $appTitle,
      'app_name' => $output[4]['conf_value'],
      'app_icon' => base_url() . '/' . $output[3]['conf_value'],
      'app_descryption' => $output[2]['conf_value'],
      'app_brand' => base_url() . '/' . $output[1]['conf_value'],
      'app_about' => $output[0]['conf_value'],
   ];
   return $output;
}

function tanggalIndoJam($tanggal)
{
   $tanggal = date('Y-m-d H:i', strtotime($tanggal));
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $waktu = explode(' ', $tanggal);
   $tgl = explode('-', $waktu[0]);
   return $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0] . ' ' . $waktu[1];
}

function tanggalIndo($tanggal)
{
   $tanggal = date('Y-m-d', strtotime($tanggal));
   $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
   );
   $tgl = explode('-', $tanggal);
   return $tgl[2] . ' ' . $bulan[(int)$tgl[1]] . ' ' . $tgl[0];
}
