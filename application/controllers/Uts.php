<?php
class Uts extends CI_Controller
{
    public function index()
    {
        $data['pegawai'] = $this->M_uts->tampilUts()->result();
        $this->load->view('v_uts', $data);
    }

    public function cetak()
    {

        $this->form_validation->set_rules(
            'nip',
            'Nip',
            'trim|required|min_length[3]',
            array(
                'required' => '%s Wajib diisi.',
                'min_lenght' => '%s terlalu pendek'
            )
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'gaji',
            'Gaji',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        if ($this->form_validation->run() == false) {
            $data['pegawai'] = $this->M_uts->tampilUts()->result();
            $this->load->view('v_uts', $data);
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'status' => $this->input->post('status'),
                'jabatan' => $this->input->post('jabatan'),
                'gaji' => $this->input->post('gaji'),
                'tunjangan' => $this->input->post('tunjangan'),
                'foto' => $this->input->post('foto')
            ];
            $this->M_uts->simpanUts($data);
            redirect('Uts/index/');
        }
    }

    public function hapus()
    {
        $where = ['nip' => $this->uri->segment(3)];
        $this->M_uts->hapusUts($where);
        redirect('Uts/index/');
    }

    public function edit()
    {
        $pegawai = $this->M_uts->pegawaiWhere(['nip' => $this->uri->segment(3)])->result_array();
        $data = array(
            "nip" => $pegawai[0]['nip'],
            "nama" => $pegawai[0]['nama'],
            "status" => $pegawai[0]['status'],
            "jabatan" => $pegawai[0]['jabatan'],
            "gaji" => $pegawai[0]['gaji'],
            "tunjangan" => $pegawai[0]['tunjangan'],
            "foto" => $pegawai[0]['foto'],
        );
        $this->load->view('v_uts_edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules(
            'nip',
            'Nip',
            'trim|required|min_length[3]',
            array(
                'required' => '%s Wajib diisi.',
                'min_lenght' => '%s terlalu pendek'
            )
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'gaji',
            'Gaji',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        if ($this->form_validation->run() != true) {
            $data['pegawai'] = $this->m_uts->tampilUts()->result();

            $this->load->view('v_uts', $data);
        } else {

            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '210000';
            $config['max_width']  = '230240';
            $config['max_height']  = '321680';
            $new_name = time() . $_FILES["foto"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');

            $datafoto = $this->upload->data();

            $this->load->library('image_lib');
            $configer =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $datafoto['full_path'],
                'maintain_ratio'  =>  TRUE,
                'width'           =>  250,
                'height'          =>  250,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();

            if ($_FILES["foto"]['name'] == "") {
                $nama_foto = $_POST['hidden_foto'];
            } else {
                $nama_foto = $datafoto['file_name'];
            }
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'status' =>  $this->input->post('status'),
                'jabatan' => $this->input->post('jabatan'),
                'gaji' => $this->input->post('gaji'),
                'tunjangan' => $this->input->post('tunjangan'),
                'foto' => $nama_foto,
            );
            $this->M_uts->updateUts($data, ['nip' => $this->input->post('nip')]);
            redirect('Uts');
        }
    }
}
