<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Identitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('IdentitasModel', 'data_identitas');
    }

    public function index()
    {
        $periode = (!empty($this->input->get('periode'))) ? $this->input->get('periode') : null;
        $data['identitas'] = $this->data_identitas->getData($periode);
        $this->load->view('pages/identitas', $data);
    }

    public function create()
    {
        $this->load->view('pages/identitas-add');
    }

    public function store()
    {
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $wajib_akta = $this->input->post('wajib_akta');
        $punya_akta = $this->input->post('punya_akta');
        $wajib_ktp_laki = $this->input->post('laki');
        $wajib_ktp_perempuan = $this->input->post('perempuan');
        $total_wajib_ktp = $wajib_ktp_laki + $wajib_ktp_perempuan;
        $punya_ktp = $this->input->post('punya_ktp');

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'wajib_akta' => $wajib_akta,
            'punya_akta' => $punya_akta,
            'wajib_ktp_laki' => $wajib_ktp_laki,
            'wajib_ktp_perempuan' => $wajib_ktp_perempuan,
            'total_wajib_ktp' => $total_wajib_ktp,
            'punya_ktp' => $punya_ktp,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_identitas->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('identitas');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('identitas/create');
        }
    }

    public function edit($id)
    {
        $data['identitas'] = $this->data_identitas->getTotal($id);
        $data['kecamatan'] = $this->data_identitas->getKecamatan();
        $this->load->view('pages/identitas-edit', $data);
    }

    public function update()
    {
        $id_identitas = $this->input->post('id');
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $wajib_akta = $this->input->post('wajib_akta');
        $punya_akta = $this->input->post('punya_akta');
        $wajib_ktp_laki = $this->input->post('laki');
        $wajib_ktp_perempuan = $this->input->post('perempuan');
        $total_wajib_ktp = $wajib_ktp_laki + $wajib_ktp_perempuan;
        $punya_ktp = $this->input->post('punya_ktp');

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'wajib_akta' => $wajib_akta,
            'punya_akta' => $punya_akta,
            'wajib_ktp_laki' => $wajib_ktp_laki,
            'wajib_ktp_perempuan' => $wajib_ktp_perempuan,
            'total_wajib_ktp' => $total_wajib_ktp,
            'punya_ktp' => $punya_ktp,
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );
        $query = $this->data_identitas->update($id_identitas, $data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
            redirect('identitas');
        }
    }

    public function destroy($id)
    {
        $query = $this->data_identitas->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('identitas', 'refresh');
        }
    }

    public function uploadFile()
    {
        $this->load->view('pages/identitas-upload');
    }

    public function downloadFile()
    {
        $this->load->view('pages/identitas-download');
    }

    public function spreadsheet_download()
    {
        $periode = $this->input->post('periode');
        $data = $this->data_identitas->getData($periode);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_IdentitasPenduduk"'.$periode.'".xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Jumlah Data Identitas Penduduk');
        $sheet->setCellValue('A2', 'Disdukcapil Kota Malang');
        $sheet->setCellValue('A4', 'Periode : '. $periode);
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Kecamatan');
        $sheet->setCellValue('C5', 'Wajib KTP Laki - laki');
        $sheet->setCellValue('D5', 'Wajib KTP Perempuan');
        $sheet->setCellValue('E5', 'Total Wajib KTP');
        $sheet->setCellValue('F5', 'Sudah rekam KTP');
        $sheet->setCellValue('G5', 'Wajib punya akta');
        $sheet->setCellValue('H5', 'Sudah punya akta');
        
        $i=6;
        $no=1;

        foreach ($data as $total) {
            $sheet->setCellValue('A'.$i, $no);
            $sheet->setCellValue('B'.$i, $total->nama_kecamatan);
            $sheet->setCellValue('C'.$i, $total->wajib_ktp_laki);
            $sheet->setCellValue('D'.$i, $total->wajib_ktp_perempuan);
            $sheet->setCellValue('E'.$i, $total->total_wajib_ktp);
            $sheet->setCellValue('F'.$i, $total->punya_ktp);
            $sheet->setCellValue('G'.$i, $total->wajib_akta);
            $sheet->setCellValue('H'.$i, $total->punya_akta);
            $no++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_format_download()
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="identitas_penduduk_periode.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Kecamatan');
        $sheet->setCellValue('B1', 'Periode (YYYY-MM)');
        $sheet->setCellValue('C1', 'Wajib KTP Laki - laki');
        $sheet->setCellValue('D1', 'Wajib KTP Perempuan');
        $sheet->setCellValue('E1', 'Sudah rekam KTP');
        $sheet->setCellValue('F1', 'Wajib punya akta');
        $sheet->setCellValue('G1', 'Sudah punya akta');
        $sheet->setCellValue('J2', 'Keterangan kode kecamatan : ');
        $sheet->setCellValue('J3', 'Nama Kecamatan');
        $sheet->setCellValue('K3', 'Kode Kecamatan');
        $sheet->setCellValue('J4', 'Blimbing');
        $sheet->setCellValue('K4', '1');
        $sheet->setCellValue('J5', 'Klojen');
        $sheet->setCellValue('K5', '2');
        $sheet->setCellValue('J6', 'Kedung Kandang');
        $sheet->setCellValue('K6', '3');
        $sheet->setCellValue('J7', 'Sukun');
        $sheet->setCellValue('K7', '4');
        $sheet->setCellValue('J8', 'Lowokwaru');
        $sheet->setCellValue('K8', '5');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_import()
    {
        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheetdata = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetdata); $i++) {
                $kecamatan = $sheetdata[$i][0];
                $periode = $sheetdata[$i][1];
                $wajib_ktp_laki = $sheetdata[$i][2];
                $wajib_ktp_perempuan = $sheetdata[$i][3];
                $total_wajib_ktp = $wajib_ktp_laki + $wajib_ktp_perempuan;
                $punya_ktp = $sheetdata[$i][4];
                $wajib_akta = $sheetdata[$i][5];
                $punya_akta = $sheetdata[$i][6];

                $data = array(
                    'kecamatan_id' => $kecamatan,
                    'periode' => $periode,
                    'wajib_akta' => $wajib_akta,
                    'punya_akta' => $punya_akta,
                    'wajib_ktp_laki' => $wajib_ktp_laki,
                    'wajib_ktp_perempuan' => $wajib_ktp_perempuan,
                    'total_wajib_ktp' => $total_wajib_ktp,
                    'punya_ktp' => $punya_ktp,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
                );

                $this->data_identitas->insert($data);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('identitas', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> File excel tidak dapat ditemukan</p></div>');
            redirect('identitas/uploadFile', 'refresh');
        }
    }
}
