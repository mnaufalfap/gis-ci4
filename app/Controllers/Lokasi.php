<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    public function __construct()
    {
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Lokasi',
            'page'  => 'lokasi/v_data_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData()
        ];
        return view('v_template', $data);
    }

    public function inputLokasi()
    {
        $data = [
            'judul' => 'Input Lokasi',
            'page'  => 'lokasi/v_input_lokasi'
        ];
        return view('v_template', $data);
    }

    public function editLokasi($id_lokasi)
    {
        $data = [
            'judul' => 'Edit Lokasi',
            'page'  => 'lokasi/v_edit_lokasi',
            'lokasi' => $this->ModelLokasi->getDataById($id_lokasi)
        ];
        return view('v_template', $data);
    }

    public function mapingLokasi()
    {
        $data = [
            'judul' => 'Maping Lokasi',
            'page'  => 'lokasi/v_maping_lokasi',
            'lokasi' => $this->ModelLokasi->getAllData()
        ];
        return view('v_template', $data);
    }

    public function insertData()
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'alamat_lokasi' => [
                'label' => 'Alamat Lokasi',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'tingkat_kerusakan' => [
                'label' => 'Tingkat Kerusakan',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'foto_lokasi' => [
                'label' => 'Foto Lokasi',
                'rules' => 'uploaded[foto_lokasi]|mime_in[foto_lokasi,image/png,image/jpeg]',
                'err' => [
                    'uploaded' => '{field} tidak boleh kosong !!',
                    'mime_in' => 'Format {field} harus jpeg/png !!'
                ]
            ]
        ])) {
            $foto_lokasi = $this->request->getFile('foto_lokasi');
            $nama_file = $foto_lokasi->getRandomName();

            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'tingkat_kerusakan' => $this->request->getPost('tingkat_kerusakan'),
                'foto_lokasi' => $nama_file
            ];

            $foto_lokasi->move('photo', $nama_file);
            $this->ModelLokasi->insertData($data);

            session()->setFlashdata('pesan', 'Data lokasi berhasil ditambahkan !!');
            return redirect()->to('Lokasi/inputLokasi')->withInput();
        } else {
            return redirect()->to('Lokasi/inputLokasi')->withInput();
        }
    }

    public function updateData($id_lokasi)
    {
        if ($this->validate([
            'nama_lokasi' => [
                'label' => 'Nama Lokasi',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'alamat_lokasi' => [
                'label' => 'Alamat Lokasi',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'latitude' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ],
            'longitude' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'err' => [
                    'required' => '{field} tidak boleh kosong !!'
                ]
            ]
            // 'tingkat_kerusakan' => [
            //     'label' => 'Tingkat Kerusakan',
            //     'rules' => 'required',
            //     'err' => [
            //         'required' => '{field} tidak boleh kosong !!'
            //     ]
            // ],
            // 'foto_lokasi' => [
            //     'label' => 'Foto Lokasi',
            //     'rules' => 'uploaded[foto_lokasi]|mime_in[foto_lokasi,image/png,image/jpeg]',
            //     'err' => [
            //         'mime_in' => 'Format {field} harus jpeg/png !!'
            //     ]
            // ]
        ])) {
            // $foto_lokasi = $this->request->getFile('foto_lokasi');
            // $nama_file = $foto_lokasi->getRandomName();

            // $lokasi = $this->ModelLokasi->getDataById($id_lokasi);
            // if ($foto_lokasi->getError() == 4) {
            //     $nama_file = $lokasi['foto_lokasi'];
            // } else {
            //     $nama_file = $foto_lokasi->getRandomName();
            //     $foto_lokasi->move('photo', $nama_file);
            // }

            $data = [
                'id_lokasi' => $id_lokasi,
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude')
                // 'tingkat_kerusakan' => $this->request->getPost('tingkat_kerusakan'),
                // 'foto_lokasi' => $nama_file
            ];

            $this->ModelLokasi->updateData($data);

            session()->setFlashdata('pesan', 'Data lokasi berhasil ditambahkan !!');
            return redirect()->to('Lokasi/index')->withInput();
        } else {
            return redirect()->to('Lokasi/editLokasi/' . $id_lokasi)->withInput();
        }
    }

    public function deleteLokasi($id_lokasi)
    {
        $data = [
            'id_lokasi' => $id_lokasi
        ];

        $this->ModelLokasi->deleteData($data);
        session()->setFlashdata('pesan', 'Data lokasi berhasil dihapus !!');
        return redirect()->to('Lokasi/index')->withInput();
    }
}
