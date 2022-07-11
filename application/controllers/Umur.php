<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Umur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('UmurModel', 'data_umur');
    }

    public function index()
    {
        $periode = (!empty($this->input->get('periode'))) ? $this->input->get('periode') : null;
        $data['umur'] = $this->data_umur->getData($periode);
        $this->load->view('pages/umur', $data);
    }

    public function create()
    {
        $this->load->view('pages/umur-add');
    }

    public function store()
    {
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $umur0_4 = $this->input->post('umur0_4');
        $umur5_9 = $this->input->post('umur5_9');
        $umur10_14 = $this->input->post('umur10_14');
        $umur15_19 = $this->input->post('umur15_19');
        $umur20_24 = $this->input->post('umur20_24');
        $umur25_29 = $this->input->post('umur25_29');
        $umur30_34 = $this->input->post('umur30_34');
        $umur35_39 = $this->input->post('umur35_39');
        $umur40_44 = $this->input->post('umur40_44');
        $umur45_49 = $this->input->post('umur45_49');
        $umur50_54 = $this->input->post('umur50_54');
        $umur55_59 = $this->input->post('umur55_59');
        $umur60_64 = $this->input->post('umur60_64');
        $umur65_atas = $this->input->post('umur65_atas');
        $total = $umur0_4 + $umur10_14 + $umur15_19 + $umur20_24 + $umur25_29 + $umur30_34 + $umur35_39 + $umur40_44 + $umur45_49 + $umur50_54 + $umur55_59 + $umur60_64 + $umur65_atas;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'umur0_4' => $umur0_4,
            'umur5_9' => $umur5_9,
            'umur10_14' => $umur10_14,
            'umur15_19' => $umur15_19,
            'umur20_24' => $umur20_24,
            'umur25_29' => $umur25_29,
            'umur30_34' => $umur30_34,
            'umur35_39' => $umur35_39,
            'umur40_44' => $umur40_44,
            'umur45_49' => $umur45_49,
            'umur50_54' => $umur50_54,
            'umur55_59' => $umur55_59,
            'umur60_64' => $umur60_64,
            'umur65_atas' => $umur65_atas,
            'total' => $total,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_umur->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('umur');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('umur/create');
        }
    }

    public function edit($id)
    {
        $data['umur'] = $this->data_umur->getTotal($id);
        $data['kecamatan'] = $this->data_umur->getKecamatan();
        $this->load->view('pages/umur-edit', $data);
    }

    public function update()
    {
        $id_umur = $this->input->post('id');
        $kecamatan = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $umur0_4 = $this->input->post('umur0_4');
        $umur5_9 = $this->input->post('umur5_9');
        $umur10_14 = $this->input->post('umur10_14');
        $umur15_19 = $this->input->post('umur15_19');
        $umur20_24 = $this->input->post('umur20_24');
        $umur25_29 = $this->input->post('umur25_29');
        $umur30_34 = $this->input->post('umur30_34');
        $umur35_39 = $this->input->post('umur35_39');
        $umur40_44 = $this->input->post('umur40_44');
        $umur45_49 = $this->input->post('umur45_49');
        $umur50_54 = $this->input->post('umur50_54');
        $umur55_59 = $this->input->post('umur55_59');
        $umur60_64 = $this->input->post('umur60_64');
        $umur65_atas = $this->input->post('umur65_atas');
        $total = $umur0_4 + $umur10_14 + $umur15_19 + $umur20_24 + $umur25_29 + $umur30_34 + $umur35_39 + $umur40_44 + $umur45_49 + $umur50_54 + $umur55_59 + $umur60_64 + $umur65_atas;

        $data = array(
            'kecamatan_id' => $kecamatan,
            'periode' => $periode,
            'umur0_4' => $umur0_4,
            'umur5_9' => $umur5_9,
            'umur10_14' => $umur10_14,
            'umur15_19' => $umur15_19,
            'umur20_24' => $umur20_24,
            'umur25_29' => $umur25_29,
            'umur30_34' => $umur30_34,
            'umur35_39' => $umur35_39,
            'umur40_44' => $umur40_44,
            'umur45_49' => $umur45_49,
            'umur50_54' => $umur50_54,
            'umur55_59' => $umur55_59,
            'umur60_64' => $umur60_64,
            'umur65_atas' => $umur65_atas,
            'total' => $total,
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );
        $query = $this->data_umur->update($id_umur, $data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
            redirect('umur');
        }
    }

    public function destroy($id)
    {
        $query = $this->data_umur->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('umur', 'refresh');
        }
    }

    public function uploadFile()
    {
        $this->load->view('pages/umur-upload');
    }

    public function downloadFile()
    {
        $this->load->view('pages/umur-download');
    }

    public function spreadsheet_download()
    {
        $periode = $this->input->post('periode');
        $data = $this->data_umur->getData($periode);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_UmurPenduduk"'.$periode.'".xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Jumlah Data Umur Penduduk');
        $sheet->setCellValue('A2', 'Disdukcapil Kota Malang');
        $sheet->setCellValue('A4', 'Periode : '. $periode);
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Kecamatan');
        $sheet->setCellValue('C5', '0-4 TH');
        $sheet->setCellValue('D5', '5-9 TH');
        $sheet->setCellValue('E5', '10-14 TH');
        $sheet->setCellValue('F5', '15-19 TH');
        $sheet->setCellValue('G5', '20-24 TH');
        $sheet->setCellValue('H5', '25-29 TH');
        $sheet->setCellValue('I5', '30-34 TH');
        $sheet->setCellValue('J5', '35-39 TH');
        $sheet->setCellValue('K5', '40-44 TH');
        $sheet->setCellValue('L5', '45-49 TH');
        $sheet->setCellValue('M5', '50-54 TH');
        $sheet->setCellValue('N5', '55-59 TH');
        $sheet->setCellValue('O5', '60-64 TH');
        $sheet->setCellValue('P5', '>=65 TH');
        $sheet->setCellValue('Q5', 'Total Penduduk');
        
        $i=6;
        $no=1;

        foreach ($data as $total) {
            $sheet->setCellValue('A'.$i, $no);
            $sheet->setCellValue('B'.$i, $total->nama_kecamatan);
            $sheet->setCellValue('C'.$i, $total->umur0_4);
            $sheet->setCellValue('D'.$i, $total->umur5_9);
            $sheet->setCellValue('E'.$i, $total->umur10_14);
            $sheet->setCellValue('F'.$i, $total->umur15_19);
            $sheet->setCellValue('G'.$i, $total->umur20_24);
            $sheet->setCellValue('H'.$i, $total->umur25_29);
            $sheet->setCellValue('I'.$i, $total->umur30_34);
            $sheet->setCellValue('J'.$i, $total->umur35_39);
            $sheet->setCellValue('K'.$i, $total->umur40_44);
            $sheet->setCellValue('L'.$i, $total->umur45_49);
            $sheet->setCellValue('M'.$i, $total->umur50_54);
            $sheet->setCellValue('N'.$i, $total->umur55_59);
            $sheet->setCellValue('O'.$i, $total->umur60_64);
            $sheet->setCellValue('P'.$i, $total->umur65_atas);
            $sheet->setCellValue('Q'.$i, $total->total);
            $no++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_format_download()
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="umur_penduduk_periode.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Kecamatan');
        $sheet->setCellValue('B1', 'Periode (YYYY-MM)');
        $sheet->setCellValue('C1', '0-4 TH');
        $sheet->setCellValue('D1', '5-9 TH');
        $sheet->setCellValue('E1', '10-14 TH');
        $sheet->setCellValue('F1', '15-19 TH');
        $sheet->setCellValue('G1', '20-24 TH');
        $sheet->setCellValue('H1', '25-29 TH');
        $sheet->setCellValue('I1', '30-34 TH');
        $sheet->setCellValue('J1', '35-39 TH');
        $sheet->setCellValue('K1', '40-44 TH');
        $sheet->setCellValue('L1', '45-49 TH');
        $sheet->setCellValue('M1', '50-54 TH');
        $sheet->setCellValue('N1', '55-59 TH');
        $sheet->setCellValue('O1', '60-64 TH');
        $sheet->setCellValue('P1', '>=65 TH');
        $sheet->setCellValue('Q1', 'Total');
        $sheet->setCellValue('T2', 'Keterangan kode kecamatan : ');
        $sheet->setCellValue('T3', 'Nama Kecamatan');
        $sheet->setCellValue('U3', 'Kode Kecamatan');
        $sheet->setCellValue('T4', 'Blimbing');
        $sheet->setCellValue('U4', '1');
        $sheet->setCellValue('T5', 'Klojen');
        $sheet->setCellValue('U5', '2');
        $sheet->setCellValue('T6', 'Kedung Kandang');
        $sheet->setCellValue('U6', '3');
        $sheet->setCellValue('T7', 'Sukun');
        $sheet->setCellValue('U7', '4');
        $sheet->setCellValue('T8', 'Lowokwaru');
        $sheet->setCellValue('U8', '5');

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
                $umur0_4 = $sheetdata[$i][2];
                $umur5_9 = $sheetdata[$i][3];
                $umur10_14 = $sheetdata[$i][4];
                $umur15_19 = $sheetdata[$i][5];
                $umur20_24 = $sheetdata[$i][6];
                $umur25_29 = $sheetdata[$i][7];
                $umur30_34 = $sheetdata[$i][8];
                $umur35_39 = $sheetdata[$i][9];
                $umur40_44 = $sheetdata[$i][10];
                $umur45_49 = $sheetdata[$i][11];
                $umur50_54 = $sheetdata[$i][12];
                $umur55_59 = $sheetdata[$i][13];
                $umur60_64 = $sheetdata[$i][14];
                $umur65_atas = $sheetdata[$i][15];
                $total = $umur0_4 + $umur10_14 + $umur15_19 + $umur20_24 + $umur25_29 + $umur30_34 + $umur35_39 + $umur40_44 + $umur45_49 + $umur50_54 + $umur55_59 + $umur60_64 + $umur65_atas;

                $data = array(
                    'kecamatan_id' => $kecamatan,
                    'periode' => $periode,
                    'umur0_4' => $umur0_4,
                    'umur5_9' => $umur5_9,
                    'umur10_14' => $umur10_14,
                    'umur15_19' => $umur15_19,
                    'umur20_24' => $umur20_24,
                    'umur25_29' => $umur25_29,
                    'umur30_34' => $umur30_34,
                    'umur35_39' => $umur35_39,
                    'umur40_44' => $umur40_44,
                    'umur45_49' => $umur45_49,
                    'umur50_54' => $umur50_54,
                    'umur55_59' => $umur55_59,
                    'umur60_64' => $umur60_64,
                    'umur65_atas' => $umur65_atas,
                    'total' => $total,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
                );

                $this->data_penduduk->insert($data);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('umur', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> File excel tidak dapat ditemukan</p></div>');
            redirect('umur/uploadFile', 'refresh');
        }
    }
}
