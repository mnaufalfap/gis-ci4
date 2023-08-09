<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    public function insertData($data = null)
    {
        $this->db->table('tb_lokasi')->insert($data);
    }

    public function getAllData()
    {
        return $this->db->table('tb_lokasi')
            ->get()
            ->getResultArray();
    }

    public function getDataById($id_lokasi)
    {
        return $this->db->table('tb_lokasi')
            ->where('id_lokasi', $id_lokasi)
            ->get()
            ->getRowArray();
    }

    public function updateData($data = null)
    {
        $this->db->table('tb_lokasi')
            ->where('id_lokasi', $data['id_lokasi'])
            ->update($data);
    }

    public function deleteData($data = null)
    {
        $this->db->table('tb_lokasi')
            ->where('id_lokasi', $data['id_lokasi'])
            ->delete($data);
    }
}
