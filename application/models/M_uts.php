<?php
class M_uts extends CI_Model
{
    public function tampilUts()
    {
        return $this->db->get('data_pegawai');
    }

    public function simpanUts($data = null)
    {
        $this->db->insert('data_pegawai', $data);
    }

    public function hapusUts($where = null)
    {
        $this->db->delete('data_pegawai', $where);
    }

    public function pegawaiWhere($where)
    {
        return $this->db->get_where('data_pegawai', $where);
    }

    public function updateUts($data = null, $where = null)
    {

        return $this->db->update('data_pegawai', $data, $where);
    }
}
