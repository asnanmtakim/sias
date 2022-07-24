<?php

namespace App\Controllers;

use App\Models\SuratPasienModel;
use App\Models\SuratUmumModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $suratPasienModel = new SuratPasienModel();
        $suratUmumModel = new SuratUmumModel();
        $sBiasaIN = $suratUmumModel->where('type', '1')->where('jenis', 'IN')->countAllResults();
        $sBiasaOUT = $suratUmumModel->where('type', '1')->where('jenis', 'OUT')->countAllResults();
        $sRahasiaIN = $suratUmumModel->where('type', '2')->where('jenis', 'IN')->countAllResults();
        $sRahasiaOUT = $suratUmumModel->where('type', '2')->where('jenis', 'OUT')->countAllResults();
        $sPasienUmum = $suratPasienModel->where('jenis_surat', '1')->countAllResults();
        $sPasienBPJS = $suratPasienModel->where('jenis_surat', '2')->countAllResults();
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'sBiasaIN' => $sBiasaIN,
            'sBiasaOUT' => $sBiasaOUT,
            'sRahasiaIN' => $sRahasiaIN,
            'sRahasiaOUT' => $sRahasiaOUT,
            'sPasienUmum' => $sPasienUmum,
            'sPasienBPJS' => $sPasienBPJS
        ];
        return view('dashboard/index', $data);
    }
}
