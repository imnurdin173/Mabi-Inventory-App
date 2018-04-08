<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->model('transaksi_m');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            $data['transaksi'] = $this->transaksi_m->view_input()->result();
            $this->load->view('transaksiTabel_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    function truncate_tabel() {
        $this->transaksi_m->truncate_tabel('transaksi_t');
        redirect('data_transaksi', '');
    }

    function remove($idBarang) {
        $where = array('idBarang' => $idBarang);
        $this->transaksi_m->remove($where, 'transaksi_t');
        redirect('data_transaksi', '');
    }

    function edit($idBarang) {

        $where = array('idBarang' => $idBarang);
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['fullname'] = $session_data['nama_user'];
        $this->load->model('transaksi_m');
        $this->load->model('inventory_m');  
        $data['data_inv'] = $this->inventory_m->view_input()->result();
        $data['transaksi'] = $this->transaksi_m->edit($where, 'transaksi_t')->result();
        $this->load->view('transaksi_edit_v', $data);
        //redirect('penyedia');
    }

    public function export() {
        $ambildata = $this->transaksi_m->export();

        if (count($ambildata) > 0) {
            $objPHPExcel = new PHPExcel();
            // Set properties
            
            $objPHPExcel->getProperties()
                    ->setCreator("Admin") //creator
                    ->setTitle("Data tabel Transaksi");  //file title

            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object

            $objget->setTitle('Sample Sheet'); //sheet title

            $objget->getStyle("A1:H1")->applyFromArray(
                    array(
                        'fill' => array(
                            'type' => PHPExcel_Style_Fill::FILL_SOLID,
                            'color' => array('rgb' => 'green')
                        ),
                        'font' => array(
                            'color' => array('rgb' => '000000')
                        )
                    )
            );

            //table header
            $cols = array("A", "B", "C", "D", "E", "F", "G", "H");

            $val = array("No.", "Id Barang ", "Nama Barang", "Harga Satuan", "Penyedia", "Kuantitas", "Discount", "Harga Total");

            for ($a = 0; $a < 8; $a++) {
                $objset->setCellValue($cols[$a] . '1', $val[$a]);

                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);

                $style = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER),
                    'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
                );

                $objPHPExcel->getActiveSheet()->getStyle($cols[$a] . '1')->applyFromArray($style);
            }

            $baris = 2;
            $total = 0;
            $nom = 1;
            foreach ($ambildata as $frow) {

                //pemanggilan sesuaikan dengan nama kolom tabel
                $objset->setCellValue("A" . $baris, $nom);
                $nom = $nom + 1;
                $objset->setCellValue("B" . $baris, $frow->idBarang);
                $objset->setCellValue("C" . $baris, $frow->namaBarang); //membaca data 
                $objset->setCellValue("D" . $baris, $frow->harga); //membaca data 
                $objset->setCellValue("E" . $baris, $frow->namaPenyedia);
                $objset->setCellValue("F" . $baris, $frow->quantity);
                $objset->setCellValue("G" . $baris, $frow->discount);
                $h_total = ($frow->harga * $frow->quantity) - ($frow->harga * ($frow->discount / 100));
                $objset->setCellValue("H" . $baris, $h_total);
                $total = $h_total + $total;
                //Set number value


                $objPHPExcel->getActiveSheet()->getStyle('F1:H' . $baris)->getNumberFormat()->setFormatCode('0');
                $style = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))
                );

                $objPHPExcel->getActiveSheet()->getStyle('A1:H' . $baris)->applyFromArray($style);

                $baris++;
            }
            $objset->setCellValue("G" . $baris, "Total: ");
            $objset->setCellValue("H" . $baris, $total);


            $objPHPExcel->getActiveSheet()->setTitle('Data Export');

            $objPHPExcel->setActiveSheetIndex(0);
            $filename = urlencode("Data_Transaksi_" . date("d-m-y H:i") . ".xls");

            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
        } else {
            redirect('Excel');
        }
    }

}
