<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratPasienModel extends Model
{
    protected $table = 'surat_pasien';
    protected $primaryKey = 'id_surat_pasien';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'tgl_surat', 'nama_pasien', 'tgl_masuk', 'tgl_keluar', 'diagnosa', 'jenis_surat', 'no_bpjs', 'tagihan',
        'foto_surat', 'id_surat_keluar', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function getDiagnosa()
    {
        return $this->select('diagnosa')
            ->distinct('diagnosa')
            ->find();
    }

    public function getJenisSurat()
    {
        return $this->select('jenis_surat as jenis')
            ->distinct('jenis_surat as jenis')
            ->find();
    }
}
