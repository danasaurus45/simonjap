<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Total extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('PendudukModel', 'data_penduduk');
    }

    public function index()
    {
        $periode = (!empty($this->input->get('periode'))) ? $this->input->get('periode') : null;
        $data['penduduk'] = $this->data_penduduk->getData($periode);
        $this->load->view('pages/total', $data);
    }

    public function create()
    {
        $this->load->view('pages/total-add');
    }

    public function store()
    {
        $kecamatan = $this->input->post('kecamatan');
        $jk = $this->input->post('jenis_kelamin');
        $warga_negara = $this->input->post('warga_negara');
        $periode = $this->input->post('periode');
        $lahir = $this->input->post('lahir');
        $mati = $this->input->post('mati');
        $pendatang = $this->input->post('pendatang');
        $pindah = $this->input->post('pindah');
        $total = ($lahir + $pendatang) - ($mati + $pindah);

        $data = array(
            'kecamatan_id' => $kecamatan,
            'jenis_kelamin' => $jk,
            'warga_negara' => $warga_negara,
            'periode' => $periode,
            'lahir' => $lahir,
            'mati' => $mati,
            'pendatang' => $pendatang,
            'pindah' => $pindah,
            'total' => $total,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );

        $query = $this->data_penduduk->insert($data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('total');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> Data gagal ditambahkan</p></div>');
            redirect('total/create');
        }
    }

    public function edit($id)
    {
        $data['penduduk'] = $this->data_penduduk->getTotal($id);
        $data['kecamatan'] = $this->data_penduduk->getKecamatan();
        $this->load->view('pages/total-edit', $data);
    }

    public function update()
    {
        $id_total = $this->input->post('id');
        $kecamatan = $this->input->post('kecamatan');
        $jk = $this->input->post('jenis_kelamin');
        $warga_negara = $this->input->post('warga_negara');
        $periode = $this->input->post('periode');
        $lahir = $this->input->post('lahir');
        $mati = $this->input->post('mati');
        $pendatang = $this->input->post('pendatang');
        $pindah = $this->input->post('pindah');
        $total = ($lahir + $pendatang) - ($mati + $pindah);

        $data = array(
            'kecamatan_id' => $kecamatan,
            'jenis_kelamin' => $jk,
            'warga_negara' => $warga_negara,
            'periode' => $periode,
            'lahir' => $lahir,
            'mati' => $mati,
            'pendatang' => $pendatang,
            'pindah' => $pindah,
            'total' => $total,
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
        );
        $query = $this->data_penduduk->update($id_total, $data);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil diubah</p></div>');
            redirect('total');
        }
    }

    public function destroy($id)
    {
        $query = $this->data_penduduk->delete($id);
        if ($query) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil dihapus</p></div>');
            redirect('total', 'refresh');
        }
    }

    public function uploadFile()
    {
        $this->load->view('pages/total-upload');
    }

    public function downloadFile()
    {
        $this->load->view('pages/total-download');
    }

    public function spreadsheet_download()
    {
        $periode = $this->input->post('periode');
        $data = $this->data_penduduk->getData($periode);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan_TotalPenduduk"'.$periode.'".xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Laporan Jumlah Data Penduduk');
        $sheet->setCellValue('A2', 'Disdukcapil Kota Malang');
        $sheet->setCellValue('A4', 'Periode : '. $periode);
        $sheet->setCellValue('A5', 'No');
        $sheet->setCellValue('B5', 'Kecamatan');
        $sheet->setCellValue('C5', 'Jenis Kelamin');
        $sheet->setCellValue('D5', 'Warga Negara');
        $sheet->setCellValue('E5', 'Jumlah Kelahiran');
        $sheet->setCellValue('F5', 'Jumlah Kematian');
        $sheet->setCellValue('G5', 'Jumlah Pendatang');
        $sheet->setCellValue('H5', 'Jumlah Pindahan');
        $sheet->setCellValue('I5', 'Total Penduduk');
        
        $i=6;
        $no=1;

        foreach ($data as $total) {
            $sheet->setCellValue('A'.$i, $no);
            $sheet->setCellValue('B'.$i, $total->nama_kecamatan);
            $sheet->setCellValue('C'.$i, $total->jenis_kelamin);
            $sheet->setCellValue('D'.$i, $total->warga_negara);
            $sheet->setCellValue('E'.$i, $total->lahir);
            $sheet->setCellValue('F'.$i, $total->mati);
            $sheet->setCellValue('G'.$i, $total->pendatang);
            $sheet->setCellValue('H'.$i, $total->pindah);
            $sheet->setCellValue('I'.$i, $total->total);
            $no++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
    }

    public function spreadsheet_format_download()
    {

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="total_penduduk_periode.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Kode Kecamatan');
        $sheet->setCellValue('B1', 'Jenis Kelamin (L/P)');
        $sheet->setCellValue('C1', 'Warga Negara (WNI/WNA)');
        $sheet->setCellValue('D1', 'Periode (YYYY-MM)');
        $sheet->setCellValue('E1', 'Jumlah Kelahiran');
        $sheet->setCellValue('F1', 'Jumlah Kematian');
        $sheet->setCellValue('G1', 'Jumlah Pendatang');
        $sheet->setCellValue('H1', 'Jumlah Pindahan');
        $sheet->setCellValue('I1', 'Total');
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
                $jk = $sheetdata[$i][1];
                $warga_negara = $sheetdata[$i][2];
                $periode = $sheetdata[$i][3];
                $lahir = $sheetdata[$i][4];
                $mati = $sheetdata[$i][5];
                $pendatang = $sheetdata[$i][6];
                $pindah = $sheetdata[$i][7];
                $total = ($lahir + $pendatang) - ($mati + $pindah);

                $data = array(
                    'kecamatan_id' => $kecamatan,
                    'jenis_kelamin' => $jk,
                    'warga_negara' => $warga_negara,
                    'periode' => $periode,
                    'lahir' => $lahir,
                    'mati' => $mati,
                    'pendatang' => $pendatang,
                    'pindah' => $pindah,
                    'total' => $total,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', now()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', now())
                );

                $this->data_penduduk->insert($data);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Sukses!</strong> Data berhasil ditambahkan</p></div>');
            redirect('total', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert">×</button><strong>Gagal!</strong> File excel tidak dapat ditemukan</p></div>');
            redirect('total/uploadFile', 'refresh');
        }
    }
}
