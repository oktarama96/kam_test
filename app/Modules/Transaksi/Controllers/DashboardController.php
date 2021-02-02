<?php 
namespace App\Modules\Transaksi\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class DashboardController extends BaseController
{
    public function index(){

        $now = Time::parse(Time::now('asia/makassar', 'en_US'));

        $year = $now->getYear();

        $penjualanPerBulan = $this->PenjualanPerBulan($year);
        $east = $this->PenjualanPerRegion("East");
        $west = $this->PenjualanPerRegion("West");
        $central = $this->PenjualanPerRegion("Central");
        $south = $this->PenjualanPerRegion("South");
        $topcust = $this->TopCustomer();
        $topprod = $this->TopProduct();
        $worstprod = $this->WorstProduct();

        // dd($penjualanPerBulan->data);

        $data = [
            'title' => 'Dashboard',
            'tahun' => $year,
            'penjualanperbulan' => $penjualanPerBulan,
            'east' => $east,
            'west'  => $west,
            'central'   => $central,
            'south' => $south,
            'topcust' => $topcust,
            'topprod' => $topprod,
            'worstprod' => $worstprod
            
        ];
        
        // dd($data);

        return view('App\Modules\Transaksi\Views\DashboardView', $data);
    }

    public function PenjualanPerBulan($year){

        $client = \Config\Services::curlrequest();

        $result = $client->request('POST', 'https://api-test.godig1tal.com/order/sales_monthly', [
        'form_params' => [
                'year' => $year
                ]
        ]);

        $body = json_decode($result->getBody());
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;	
    }

    public function PenjualanPerRegion($region)
    {
        $client = \Config\Services::curlrequest();

        $result = $client->request('POST', 'https://api-test.godig1tal.com/order/sales_region_yearly', [
        'form_params' => [
                'region' => $region
                ]
        ]);

        $body = json_decode($result->getBody());
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;	
    }

    public function TopCustomer()
    {
        $client = \Config\Services::curlrequest();

        $result = $client->request('get', 'https://api-test.godig1tal.com/order/customer_ot_year');

        $body = json_decode($result->getBody());
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;	
    }

    public function TopProduct()
    {
        $client = \Config\Services::curlrequest();

        $result = $client->request('get', 'https://api-test.godig1tal.com/order/top_10_product');

        $body = json_decode($result->getBody());
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;	
    }

    public function WorstProduct()
    {
        $client = \Config\Services::curlrequest();

        $result = $client->request('get', 'https://api-test.godig1tal.com/order/worst_10_product');

        $body = json_decode($result->getBody());
        
		
		if($result->getStatusCode() == 200){
			$dataa = $body;
		}else{
			$dataa = $result->getReason();
		}

		return $dataa;	
    }
	
}

?>