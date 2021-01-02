<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'data_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = ['nim', 'nama', 'jenis_kelamin', 'jurusan'];

    public function getIdMahasiswa($id_mahasiswa)
    {
        return $this->where(['id_mahasiswa' => $id_mahasiswa])->first();
    }
}
