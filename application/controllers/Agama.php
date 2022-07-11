<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Agama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('AgamaModel', 'data_agama');
    }

    public function index()
    {
        $periode = (!empty($this->input->get('periode'))) ? $this->input->get('periode') : null;
        $data['agama'] = $this->data_agama->getData($periode);
        $this->load->view('pages/agama', $data);
    }

    public function create()
    {
        $this->load->view('pages/agama-add');
    }

    public function store()
    {
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $islam = $this->input->post('islam');
        $kristen = $this->input->post('kristen');
        $katholik = $this->input->post('katholik');
        $hindu = $this->input->post('hindu');
        $buddha = $this->input->post('buddha');
        $konghucu = $this->input->post('konghucu');
        $penghayat_kepercayaan = $this->input->post('penghayat_kepercayaan');
        $total = $islam + $kristen + $katholik + $hindu + $buddha + $konghucu + $penghayat_kepercayaan;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'islam' => $islam,
            'kristen' => $kristen,
            'katholik' => $katholik,
            'hindu' => $hindu,
            'buddha' => $buddha,
            'konghucu' => $konghucu,
            'penghayat_kepercayaan' => $penghayat_kepercayaan,
            'total' => $total,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_agama->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('agama');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('agama/create');
        }
    }

    public function edit($id)
    {
        $data['agama'] = $this->data_agama->getTotal($id);
        $data['kecamatan'] = $this->data_agama->getKecamatan();
        $this->load->view('pages/agama-edit', $data);
    }

    public function update()
    {
        $id_agama = $this->input->post('id');
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $islam = $this->input->post('islam');
        $kristen = $this->input->post('kristen');
        $katholik = $this->input->post('katholik');
        $hindu = $this->input->post('hindu');
        $buddha = $this->input->post('buddha');
        $konghucu = $this->input->post('konghucu');
        $penghayat_kepercayaan = $this->input->post('penghayat_kepercayaan');
        $total = $islam + $kristen + $katholik + $hindu + $buddha + $konghucu + $penghayat_kepercayaan;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'islam' => $islam,
            'kristen' => $kristen,
            'katholik' => $katholik,
            'hindu' => $hindu,
            'buddha' => $buddha,
            'konghucu' => $konghucu,
            'penghayat_kepercayaan' => $penghayat_kepercayaan,
            'total' => $total,
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );
        $query = $this->data_agama->update($id_agama, $data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
            redirect('agama');
        }
    }

    public function destroy($id)
    {
        $query = $this->data_agama->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('agama', 'refresh');
        }
    }

    public function uploadFile()
    {
        $this->load->view('pages/agama-upload');
    }

    public function downloadFile()
    {
        $this->load->view('pages/agama-download');
    }

    public function spreadsheet_download()
    {
        $periode = $this->input->post('periode');
        $data = $this->data_agama->getData($periode);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_AgamaPenduduk"'.$periode.'".xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Jumlah Data Agama Penduduk');
        $sheet->setCellValue('A2', 'Disdukcapil Kota Malang');
        $sheet->setCellValue('A4', 'Periode : '. $periode);
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Kecamatan');
        $sheet->setCellValue('C5', 'Islam');
        $sheet->setCellValue('D5', 'Kristen');
        $sheet->setCellValue('E5', 'Katholik');
        $sheet->setCellValue('F5', 'Hindu');
        $sheet->setCellValue('G5', 'Buddha');
        $sheet->setCellValue('H5', 'Konghucu');
        $sheet->setCellValue('I5', 'Penghayat Kepercayaan');
        $sheet->setCellValue('j5', 'Total Penduduk');
        
        $i=6;
        $no=1;

        foreach ($data as $total) {
            $sheet->setCellValue('A'.$i, $no);
            $sheet->setCellValue('B'.$i, $total->nama_kecamatan);
            $sheet->setCellValue('C'.$i, $total->islam);
            $sheet->setCellValue('D'.$i, $total->kristen);
            $sheet->setCellValue('E'.$i, $total->katholik);
            $sheet->setCellValue('F'.$i, $total->hindu);
            $sheet->setCellValue('G'.$i, $total->buddha);
            $sheet->setCellValue('H'.$i, $total->konghucu);
            $sheet->setCellValue('I'.$i, $total->penghayat_kepercayaan);
            $sheet->setCellValue('J'.$i, $total->total);
            $no++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_format_download()
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="agama_penduduk_periode.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Kecamatan');
        $sheet->setCellValue('B1', 'Periode (YYYY-MM)');
        $sheet->setCellValue('C1', 'Islam');
        $sheet->setCellValue('D1', 'Kristen');
        $sheet->setCellValue('E1', 'Katholik');
        $sheet->setCellValue('F1', 'Hindu');
        $sheet->setCellValue('G1', 'Buddha');
        $sheet->setCellValue('H1', 'Konghucu');
        $sheet->setCellValue('I1', 'Penghayat Kepercayaan');
        $sheet->setCellValue('L2', 'Keterangan kode kecamatan : ');
        $sheet->setCellValue('L3', 'Nama Kecamatan');
        $sheet->setCellValue('M3', 'Kode Kecamatan');
        $sheet->setCellValue('L4', 'Blimbing');
        $sheet->setCellValue('M4', '1');
        $sheet->setCellValue('L5', 'Klojen');
        $sheet->setCellValue('M5', '2');
        $sheet->setCellValue('L6', 'Kedung Kandang');
        $sheet->setCellValue('M6', '3');
        $sheet->setCellValue('L7', 'Sukun');
        $sheet->setCellValue('M7', '4');
        $sheet->setCellValue('L8', 'Lowokwaru');
        $sheet->setCellValue('M8', '5');

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
                $islam = $sheetdata[$i][2];
                $kristen = $sheetdata[$i][3];
                $katholik = $sheetdata[$i][4];
                $hindu = $sheetdata[$i][5];
                $buddha = $sheetdata[$i][6];
                $konghucu = $sheetdata[$i][7];
                $penghayat_kepercayaan = $sheetdata[$i][8];
                $total = $islam + $kristen + $katholik + $hindu + $buddha + $konghucu + $penghayat_kepercayaan;

                $data = array(
                    'kecamatan_id' => $kecamatan,
                    'periode' => $periode,
                    'islam' => $islam,
                    'kristen' => $kristen,
                    'katholik' => $katholik,
                    'hindu' => $hindu,
                    'buddha' => $buddha,
                    'konghucu' => $konghucu,
                    'penghayat_kepercayaan' => $penghayat_kepercayaan,
                    'total' => $total,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
                );

                $this->data_agama->insert($data);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('agama', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> File excel tidak dapat ditemukan</p></div>');
            redirect('agama/uploadFile', 'refresh');
        }
    }
}
