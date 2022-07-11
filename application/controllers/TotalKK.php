<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TotalKK extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('KkModel', 'data_kk');
    }

    public function index()
    {
        $periode = (!empty($this->input->get('periode'))) ? $this->input->get('periode') : null;
        $data['total_kk'] = $this->data_kk->getData($periode);
        $this->load->view('pages/total_kk', $data);
    }

    public function create()
    {
        $this->load->view('pages/total_kk-add');
    }

    public function store()
    {
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $jumlah_kk = $this->input->post('jumlah_kk');
        $laki = $this->input->post('laki');
        $perempuan = $this->input->post('perempuan');
        $total = $laki + $perempuan;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'jumlah_kk' => $jumlah_kk,
            'l' => $laki,
            'p' => $perempuan,
            'total' => $total,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_kk->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('totalkk');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('totalkk/create');
        }
    }

    public function edit($id)
    {
        $data['total_kk'] = $this->data_kk->getTotal($id);
        $data['kecamatan'] = $this->data_kk->getKecamatan();
        $this->load->view('pages/total_kk-edit', $data);
    }

    public function update()
    {
        $id_totalkk = $this->input->post('id');
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $jumlah_kk = $this->input->post('jumlah_kk');
        $laki = $this->input->post('laki');
        $perempuan = $this->input->post('perempuan');
        $total = $laki + $perempuan;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'jumlah_kk' => $jumlah_kk,
            'l' => $laki,
            'p' => $perempuan,
            'total' => $total,
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );
        $query = $this->data_kk->update($id_totalkk, $data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
            redirect('totalkk');
        }
    }

    public function destroy($id)
    {
        $query = $this->data_kk->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('totalkk', 'refresh');
        }
    }

    public function uploadFile()
    {
        $this->load->view('pages/total_kk-upload');
    }

    public function downloadFile()
    {
        $this->load->view('pages/total_kk-download');
    }

    public function spreadsheet_download()
    {
        $periode = $this->input->post('periode');
        $data = $this->data_kk->getData($periode);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_TotalKepalaKeluarga"'.$periode.'".xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Jumlah Kepala Keluarga');
        $sheet->setCellValue('A2', 'Disdukcapil Kota Malang');
        $sheet->setCellValue('A4', 'Periode : '. $periode);
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Kecamatan');
        $sheet->setCellValue('C5', 'Jumlah Kelurahan');
        $sheet->setCellValue('D5', 'Jumlah KK');
        $sheet->setCellValue('E5', 'Laki - Laki');
        $sheet->setCellValue('F5', 'Perempuan');
        $sheet->setCellValue('G5', 'Total Penduduk');
        
        $i=6;
        $no=1;

        foreach ($data as $total) {
            $sheet->setCellValue('A'.$i, $no);
            $sheet->setCellValue('B'.$i, $total->nama_kecamatan);
            $sheet->setCellValue('C'.$i, $total->jumlah_kelurahan);
            $sheet->setCellValue('D'.$i, $total->jumlah_kk);
            $sheet->setCellValue('E'.$i, $total->l);
            $sheet->setCellValue('F'.$i, $total->p);
            $sheet->setCellValue('G'.$i, $total->total);
            $no++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_format_download()
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="total_kk_penduduk_periode.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Kecamatan');
        $sheet->setCellValue('B1', 'Periode (YYYY-MM)');
        $sheet->setCellValue('C1', 'Jumlah KK');
        $sheet->setCellValue('D1', 'L');
        $sheet->setCellValue('E1', 'P');
        $sheet->setCellValue('I2', 'Keterangan kode kecamatan : ');
        $sheet->setCellValue('I3', 'Nama Kecamatan');
        $sheet->setCellValue('J3', 'Kode Kecamatan');
        $sheet->setCellValue('I4', 'Blimbing');
        $sheet->setCellValue('J4', '1');
        $sheet->setCellValue('I5', 'Klojen');
        $sheet->setCellValue('J5', '2');
        $sheet->setCellValue('I6', 'Kedung Kandang');
        $sheet->setCellValue('J6', '3');
        $sheet->setCellValue('I7', 'Sukun');
        $sheet->setCellValue('J7', '4');
        $sheet->setCellValue('I8', 'Lowokwaru');
        $sheet->setCellValue('J8', '5');

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
                $jumlah_kk = $sheetdata[$i][2];
                $laki = $sheetdata[$i][3];
                $perempuan = $sheetdata[$i][4];
                $total = $laki + $perempuan;

                $data = array(
                    'kecamatan_id' => $kecamatan,
                    'periode' => $periode,
                    'jumlah_kk' => $jumlah_kk,
                    'l' => $laki,
                    'p' => $perempuan,
                    'total' => $total,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
                );

                $this->data_kk->insert($data);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('totalkk', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> File excel tidak dapat ditemukan</p></div>');
            redirect('totalkk/uploadFile', 'refresh');
        }
    }
}
