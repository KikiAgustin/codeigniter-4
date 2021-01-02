<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $MahasiswaModel;
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }
    public function index()
    {
        $data = [
            'judul' => "Halaman | Home"
        ];

        return view('mahasiswa/index', $data);
    }

    public function dataMahasiswa()
    {
        // $MahasiswaModel = new MahasiswaModel();
        $mahasiswa = $this->MahasiswaModel->findAll();
        $data = [
            'judul' => "Halaman | Data Mahasiswa",
            'mahasiswa' => $mahasiswa
        ];

        return view('mahasiswa/data_mahasiswa', $data);
    }

    public function about()
    {
        $data = [
            'judul' => "Halaman | About"
        ];
        return view('mahasiswa/about', $data);
    }

    public function tambahData()
    {
        session();
        $validasi = \Config\Services::validation();
        $data = [
            'judul' => 'Halaman | Tambah Data Mahasiswa',
            'validasi' => $validasi
        ];

        return view('mahasiswa/tambah_data', $data);
    }

    public function saveMahasiswa()
    {

        if (!$this->validate([
            'nim' => [
                'rules' => 'required|is_unique[data_mahasiswa.nim]|numeric',
                'errors' => [
                    'required' => 'NIM Wajib disii',
                    'is_unique' => 'NIM ini sudah terdaftar',
                    'numeric'  => 'field ini harus diisi dengan angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib disii'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin Wajib disii'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan Wajib disii'
                ]
            ]
        ])) {
            return redirect()->to('/Mahasiswa/tambahData')->withInput();
        }

        $nim            = $this->request->getVar('nim');
        $nama           = $this->request->getVar('nama');
        $jenis_kelamin  = $this->request->getVar('jenis_kelamin');
        $jurusan        = $this->request->getVar('jurusan');

        $data = [
            'nim'           => $nim,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'jurusan'       => $jurusan
        ];

        $this->MahasiswaModel->insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil ditambah');
        return redirect()->to('dataMahasiswa');
    }

    public function deleteData($id_mahasiswa)
    {

        $this->MahasiswaModel->delete($id_mahasiswa);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Mahasiswa/dataMahasiswa');
    }

    public function editData($id_mahasiswa)
    {
        session();
        $validasi = \Config\Services::validation();
        $mahasiswa = $this->MahasiswaModel->getIdMahasiswa($id_mahasiswa);
        $data = [
            'judul' => 'Halaman | Tambah Data Mahasiswa',
            'validasi' => $validasi,
            'mahasiswa' => $mahasiswa
        ];

        return view('mahasiswa/edit_data', $data);
    }

    public function saveEdit()
    {
        $id_mahasiswa = $this->request->getVar('id_mahasiswa');
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Wajib disii'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin Wajib disii'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jurusan Wajib disii'
                ]
            ]
        ])) {
            return redirect()->to('/Mahasiswa/editData/' . $id_mahasiswa)->withInput();
        }

        $nim            = $this->request->getVar('nim');
        $nama           = $this->request->getVar('nama');
        $jenis_kelamin  = $this->request->getVar('jenis_kelamin');
        $jurusan        = $this->request->getVar('jurusan');

        $data = [
            'id_mahasiswa'  => $id_mahasiswa,
            'nim'           => $nim,
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'jurusan'       => $jurusan
        ];

        $this->MahasiswaModel->replace($data);
        session()->setFlashdata('pesan', 'Data Berhasil di edit');
        return redirect()->to('dataMahasiswa');
    }

    public function dataTable()
    {
        // $MahasiswaModel = new MahasiswaModel();
        $mahasiswa = $this->MahasiswaModel->findAll();
        $data = [
            'judul' => "Halaman | Data Table",
            'mahasiswa' => $mahasiswa
        ];

        return view('mahasiswa/data_table', $data);
    }
}
