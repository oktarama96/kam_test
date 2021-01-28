<?php 
namespace App\Modules\User\Controllers;
use App\Controllers\BaseController;

class UserController extends BaseController
{
	public function index()
	{
		$user = \Config\Services::curlrequest();
		$response = $user->request('GET', 'https://reqres.in/api/users?page=2');
		$result = json_decode($response->getBody());

		$data = [
			'title' => 'Data User',
			'results' => $result
		];

		return view('App\Modules\User\Views\UserView', $data);
	}

	public function showLogin(){
		return view('App\Modules\User\Views\LoginView');
	}
}

?>