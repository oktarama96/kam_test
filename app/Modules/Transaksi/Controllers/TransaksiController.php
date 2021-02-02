<?php 
namespace App\Modules\Transaksi\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class TransaksiController extends BaseController
{
	public function index()
	{
		
		$curl = \Config\Services::curlrequest();
		$customer = $curl->request('GET', 'https://api-test.godig1tal.com/customer/all_customer');
		$resultcustomer = json_decode($customer->getBody());

		$product = $curl->request('GET', 'https://api-test.godig1tal.com/product/all_product');
		$resultproduct = json_decode($product->getBody());
		
		$data = [
			'title' => 'Transaksi',
			'customer' => $resultcustomer,
			'product' => $resultproduct
		];

		return view('App\Modules\Transaksi\Views\TransaksiView', $data);
	}

	public function addTransaksi(){

		$now = Time::parse(Time::now('asia/makassar', 'en_US'));

		$tgl = date("Y-m-d", strtotime($now));

		$order = \Config\Services::curlrequest();
		$response = $order->request('POST', 'https://api-test.godig1tal.com/order/conditional_order', [
						'form_params' => [
							'date' => $tgl,
						]
					]);
		$result_transaksi = json_decode($response->getBody());

		$last = (count($result_transaksi->data)-1);

		$count = $result_transaksi->total;

		if ($count == 0){
			$order_id = "US-".$now->getYear()."-100001";
		} else {
			$kode_get = $result_transaksi->data[$last]->order_id;
			// dd($result_transaksi);
			
			$kodes = substr($kode_get,9);
			$kodes++;
	
			if (strlen($kodes)==1){
				$nol = "0000";
			} elseif (strlen($kodes)==2){
				$nol = "000";
			} elseif (strlen($kodes)==3){
				$nol = "00";
			} elseif (strlen($kodes)==4){
				$nol = "0";
			} elseif (strlen($kodes)==5){
				$nol = "";
			}
	
			$order_id = "US-".$now->getYear()."-1".$nol."".$kodes;
	
		}
		// dd($order_id);
		// dd($result_transaksi);

		$client = \Config\Services::curlrequest();

        $result = $client->request('POST', 'https://api-test.godig1tal.com/order/new_order', [
        'form_params' => [
				'order_id'		=> $order_id, 
				'customer_id'	=> $this->request->getPost('customer_id'),
				'region'		=> $this->request->getPost('region_name'),  
				'product_id'	=> $this->request->getPost('product_id'), 
				'date'			=> $tgl,
				'sales'			=> $this->request->getPost('sales')	 
            ]
        ]);

        $body = $result->getBody();
        
		
		if($result->getStatusCode() == 200){
			session()->setFlashdata('success', 'Berhasil menambahkan data');
			// Redirect halaman ke product
			return redirect()->back();
		}else{
			session()->setFlashdata('error', $result->getReason());
			// Redirect halaman ke product
			return redirect()->back();
		}
	}

	public function showDataTransaksi(){

		$client = \Config\Services::curlrequest();

        $result = $client->request('POST', 'https://api-test.godig1tal.com/order/range_date_region_order', [
        'form_params' => [
				'region'		=> $this->request->getPost('region_name'), 
				'date_start'	=> $this->request->getPost('date_start'), 
				'date_end'		=> $this->request->getPost('date_end')
            ]
        ]);

        $body = $result->getBody();
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;
	}

	public function DataTransaksi(){
		$data = [
			'title' => 'Data Transaksi'
		];
		return view('App\Modules\Transaksi\Views\DataTransaksiView', $data);
	}

}

?>