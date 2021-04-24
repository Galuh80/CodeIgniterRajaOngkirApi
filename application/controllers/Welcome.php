<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BukuModel');
	}

	public function index()
	{
		$data['row'] = $this->BukuModel->getAllBuku();
		$this->load->view('welcome', $data);
	}

	public function getCity($province)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key:b277bcce83b57bd914e9db7110ab40d9"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
		}

		for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
			echo "<option value='" . $data['rajaongkir']['results'][$i]['city_id'] . "'>" . $data['rajaongkir']['results'][$i]['city_name'] . " (" . $data['rajaongkir']['results'][$i]['type'] . " - " . $data['rajaongkir']['results'][$i]['postal_code'] . ")</option>";
		}
	}

	public function getCost()
	{
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array(
			'origin' => $origin,
			'destination' => $destination,
			'berat' => $berat,
			'courier' => $courier

		);

		$this->load->view('rajaongkir/getCost', $data);
	}
}
