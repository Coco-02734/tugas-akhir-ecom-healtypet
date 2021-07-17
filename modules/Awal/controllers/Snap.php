<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods:GET,OPTIONS");

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-LSAqj3CmCZbchx9iFBysqXgd', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		$harga = $this->input->post('harga');
		$id_dokter = $this->input->post('id_dokter');
		$id_user = $this->input->post('id_user');
		$id_faskes = $this->input->post('id_faskes');
		$jadwal = $this->input->post('jadwal');
		$peliharaan = $this->input->post('peliharaan');
		$keterangan = $this->input->post('keterangan');
		$order_id = rand();

		// Required
		$transaction_details = array(
			'order_id' => $order_id,
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'DK - ' . $order_id,
			'price' => $harga,
			'quantity' => 1,
			'name' => $keterangan
		);

		// Optional
		// $item2_details = array(
		// 	'id' => 'a2',
		// 	'price' => 20000,
		// 	'quantity' => 2,
		// 	'name' => "Orange"
		// );

		// Optional
		$item_details = array($item1_details);

		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$customer_details = array(
			'first_name'    => $user['nama'],
			'email'         => $user['email'],
			'phone'         => $user['no_tlpn']
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$dataTrans = [
			'id_transaksi' => $order_id,
			'id_faskes' => $id_dokter,
			'id_user' => $id_user,
			'keterangan' => $keterangan,
			'harga' => $harga,
			'metode_pembayaran' => 'gopay',
			'kurir' => 'JNE-REG',
			'statusd' => '201',
		];
		$this->db->insert('transaksi', $dataTrans);

		if ($id_dokter == 0) {
			$this->db->set('status', 1);
			$this->db->where('id_user', $user['id']);
			$this->db->update('tb_keranjang');
		} else if ($id_dokter == 1) {
			include "./assets/phpqrcode/qrlib.php";
			QRcode::png("$order_id", "./assets/user/img/bercode_janji/$order_id.png", "H", 6, 6);

			$dataJanji = [
				'id_transaksi' => $order_id,
				'id_faskes' => $id_faskes,
				'id_user' => $id_user,
				'nama_peliharaan' => $peliharaan,
				'jadwal' => $jadwal,
				'harga' => $harga,
				'nama_pemilik' => $user['nama'],
				'status' => '201'
			];
			$this->db->insert('transaksi_faskes', $dataJanji);
		} else {
			$dataDok = [
				'id_transaksi' => $order_id,
				'id_dokter' => $id_dokter,
				'keterangan' => $keterangan,
				'harga' => $harga,
				'status' => '201'
			];
			$this->db->insert('transaksi_dokter', $dataDok);
		}
		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$result = json_decode($this->input->post('result_data'), true);
		$data = [
			'id_user' => $user['id'],
			'harga' => $result['gross_amount'],
			'date_created' => time(),
			'date_late' => time() + (60 * 60 * 24),
			'statusd' => $result['status_code'],
			'metode_pembayaran' => $result['payment_type'],
			'bank' => $result['va_numbers'][0]['bank'],
			'va_number' => $result['va_numbers'][0]['va_number'],
			'pdf_url' => $result['pdf_url']
		];
		$this->db->set($data);
		$this->db->where('id_transaksi', $result['order_id']);
		$this->db->update('transaksi');
		redirect('awal/user/transaksi_detail/' . $result['order_id']);
	}
}
