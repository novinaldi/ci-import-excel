<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
	}

	public function index()
	{
		$this->load->view('formimport');
	}

	function doimport()
	{
		$jmlsukses = 0;
		$jmlgagal = 0;
		$fileName = $_FILES['uploadfile']['name'];

		$config['upload_path'] = './assets/fileimport/'; //buat folder dengan nama assets di root folder
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size'] = 10000;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('uploadfile')) {
			echo $this->upload->display_errors();
		} else {
			$media = $this->upload->data();
			$inputFileName = './assets/fileimport/' . $media['file_name'];

			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
				$rowData = $sheet->rangeToArray(
					'A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE
				);

				$nim = $rowData[0][1];
				$nama = $rowData[0][2];
				$jenkel = $rowData[0][3];
				$tmplahir = $rowData[0][4];
				$tgllahir = $rowData[0][5];

				$cekdata = $this->db->get_where('mhs', ['nim' => $nim]);
				if ($cekdata->num_rows() > 0) {
					++$jmlgagal;
				} else {
					$datasimpan = [
						'nim' => $nim, 'namamahasiswa' => $nama,
						'tempatlahir' => $tmplahir,
						'tanggallahir' => $tgllahir,
						'jeniskelamin' => $jenkel
					];

					$this->db->insert('mhs', $datasimpan);
					++$jmlsukses;
				}
			}

			echo 'Jumlah Data Yang Berhasil :<strong>' . $jmlsukses . '</strong><br>';
			echo 'Jumlah Data Yang Gagal :<strong>' . $jmlgagal . '</strong><br>';
		}
	}
}