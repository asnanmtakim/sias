<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratUmumModel extends Model
{
    protected $table = 'surat_umum';
    protected $primaryKey = 'id_surat_umum';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'type', 'jenis', 'tgl_surat', 'pengirim', 'penerima', 'no_surat', 'perihal', 'isi_surat', 'foto_surat',
        'id_surat_masuk', 'id_surat_keluar', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getPengirimMasuk()
    {
        return $this->select('pengirim')
            ->distinct('pengirim')
            ->where('jenis', 'IN')
            ->find();
    }
    public function getPenerimaMasuk()
    {
        return $this->select('penerima')
            ->distinct('penerima')
            ->where('jenis', 'IN')
            ->find();
    }
    public function getPerihalMasuk()
    {
        return $this->select('perihal')
            ->distinct('perihal')
            ->where('jenis', 'IN')
            ->find();
    }

    public function getPengirimKeluar()
    {
        return $this->select('pengirim')
            ->distinct('pengirim')
            ->where('jenis', 'OUT')
            ->find();
    }
    public function getPenerimaKeluar()
    {
        return $this->select('penerima')
            ->distinct('penerima')
            ->where('jenis', 'OUT')
            ->find();
    }
    public function getPerihalKeluar()
    {
        return $this->select('perihal')
            ->distinct('perihal')
            ->where('jenis', 'OUT')
            ->find();
    }
}
