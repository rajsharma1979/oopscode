<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

//require(APPPATH . '/libraries/REST_Controller.php');

class Apicontroller extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
        //https://rapidapi.com/blog/how-to-use-an-api-with-php/
		//https://weichie.com/blog/curl-api-calls-with-php/
		//$this->load->library(array('parser'));
		
		//$this->TokenID = "BNiKdG2U5PTA";
        $this->load->model('Api_model');
		
		$this->load->helper('function_helper');
		$this->config->load('', TRUE);
		     
	}
	public function StateList(){
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		
		$tokenID = $this->config->item('token_id'); 
		
		$URL = 'http://api.tradologie.com/Buyer/StateList';
		
		//$data = "Token=".$tokenID."&UserName=Rajneesh sharma";
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		
		$tokenID = $this->config->item('token_id'); 
				
		$URL = 'http://api.tradologie.com/Buyer/StateList';
		$curl = curl_init();
			$header = array(
				  'Content-Type: application/x-www-form-urlencoded');
		
		
			  
			  
			
			 $CountryName  = 'India';
			  
			 $data = "Token=".$tokenID."&CountryName=".$CountryName."";
				
			 curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			
		    print_r($decode_response);
		
		
	}	
	
	public function AddAuctionSupplier(){
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/AddAuctionSupplier';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  
			  $AuctionID  = '363';
			  $CustomerD  = '5';
			  
			  $data = json_encode([
				  'AuctionID' => $AuctionID,
				  'CustomerID ' => $CustomerD,
				  'Supplier'   => '2256,2358,2200,2456,2237,2179'
				  
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			//$decode_response = json_decode($response);
			
		    print_r($response);
		
	}
	
	
	
	
	public function EditCustomerAddressDetail(){
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = $post->Token;
		
		$URL = 'http://api.tradologie.com/Supplier/UpdateCounterOfferStatus';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  $data = json_encode([
				  'CustomerTranID' => 'CustomerTranID'
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$otp_response = json_decode($response);
		
	}
	
	public function UpdateCounterOfferStatus(){
		
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		$post = json_decode(file_get_contents("php://input"));
		$access_token = $post->Token;
		
		
		
		
		if(isset($post) && !empty($post))
        {
			
			
			$URL = 'http://api.tradologie.com/Supplier/UpdateCounterOfferStatus';
		   
		   	$data = array('CustomerID' => $post->CustomerID,
					'auctionID' => $post->auctionID,
					'venderID' => $post->venderID
					);
		
		
			
		}
		
		
	}
	
	
	
	public  function orderProcess(){
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		$post = json_decode(file_get_contents("php://input"));
		$access_token = $post->Token;
		
		if(isset($post) && !empty($post))
        {


			
			$URL = 'http://api.tradologie.com/Supplier/UpdateCounterOfferStatus';
		   
		   	$data = array('CustomerID' => $post->CustomerID,
					'CounterRate' => $post->CounterRate,
					'AuctionTranID' => $post->auctionTranID,
					'Qty' => $post->Quantity,
					'AuctionRateID' => $post->AuctionRateID,
					
					);
		
		
			
		}
		
		
	}
	
	public function UpdateCounterOfferQty(){
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		$post = json_decode(file_get_contents("php://input"));
		
		
		$access_token = $post->Token;
		if(isset($post) && !empty($post))
        {
		$URL = 'http://api.tradologie.com/Supplier/UpdateCounterOfferStatus';
		//'https://www.instamojo.com/api/1.1/payments/' . $payment_id . '/'
		
		$data = array('CustomerID' => $post->CustomerID,
					'auctionRateID' => $post->auctionRateID,
					'Qty' => $post->Quantity,
					'CounterRate' => $post->CounterRate,
					'AuctionTranID' => $post->auctionTranID
					);
					
						
					curl_setopt($ch, CURLOPT_URL, $URL);
					curl_setopt($ch, CURLOPT_HEADER, false);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
					//curl_setopt($ch, CURLOPT_POSTFIELDS,$data); 
					
					$response = curl_exec($ch);
					curl_close($ch);
					
					$res = json_decode($response);
					
					
						
					
		}
		
	}	
	
	
	
	
	public function UpdateAuctionQty(){
		
		
		
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		$post = json_decode(file_get_contents("php://input"));
		
		$url = 'http://api.tradologie.com/Supplier/AuctionOrderProcessItemList';

	
		
	}
	
	
	public function CountryList(){
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/AddAuctionSupplier';
		$curl = curl_init();
			/* $header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  ); */
			  
			  $data = json_encode([
			      'Token' => $access_token,
				  'CountryName' => $countryName
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			
	}
	
	public function CityList(){
		
			date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		//$access_token = 'gEQAgHjoIk1cPmY8JIAId4BmXKvbfxLtANnH'; //$post->Token;
		
		$access_token = 'yVge4IsIKDcNiwnAkIySqUb0CQXHocxNoAJ1';
		
		$URL = 'http://api.tradologie.com/Buyer/CityList';
		$stateName = 'Mumbai';
		$curl = curl_init();
			// $header = array(
				  // 'Authorization: Bearer' . $access_token,
				  // 'Content-Type: application/json',
				  // 'Accept: application/json'
			  // );
			  
			  $data = json_encode([
			      'Token' => $access_token,
				  'StateName' => $stateName
				]);
			
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data
			));
			
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			
			pr($response);
		
		
	}
	
	
	
	public function AreaList(){
		
			date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = 'gEQAgHjoIk1cPmY8JIAId4BmXKvbfxLtANnH'; //$post->Token;
		$areaName = 'Karol Bagh';
		$url = 'http://api.tradologie.com/Buyer/AddAuctionSupplier';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  $data = json_encode([
				  'AreaName' => $areaName
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
		CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response,true);
			print_r($decode_response);
		
	}
	
	
	
	
	public function GettingProductItemList(){
		
		
		
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = 'gEQAgHjoIk1cPmY8JIAId4BmXKvbfxLtANnH'; //$post->Token;
		$AuctionID = '0';
		$url = 'http://api.tradologie.com/Buyer/AuctionItemSubmittedList';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  $data = json_encode([
				  'AuctionID' => $AuctionID
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
		CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response,true);
			print_r($decode_response);
		
	} 
	
	
	
	
	
	
	
   public function SaveUpdateCustomerAddressDetail(){
	   
	   
	   	date_default_timezone_set('Asia/Calcutta');
		
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/AddAuctionSupplier';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  $data = json_encode([
				  		'CustomerTranID'  =>  $customerTranID,
						'CustomerID'  =>  $customerID,
						'CountryName'  =>  $CountryName,
						'StateName'  =>  $StateName,
						'CityName'  =>  $CityNames,
						'AreaName'  =>  $AreaNames,
						'ZipCode'  =>  $ZipCode,
						'AddressType'  =>  $addressTypeID, 
						'CompanyName'  =>  $CompanyName,
						'Address'  =>  $Address,
						'MobileNo'  =>  $MobileNo,
						'GSTIN'  =>  $GSTIN,
						'ReceiverName'  =>  $ReceiverName,
						'ReceiverMobile'  =>  $ReceiverMobile,
						'ReceiverID'  =>  $ReceiverIDType,  
						'ReceiverID_No'  =>  $ReceiverIDNo,
						'PortOfDischarge'  =>  $portOfDischarge
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
   }
   
   
   public function  UploadInspectionDocument(){
	   
	   $URL = ' http://api.tradologie.com/Supplier/UploadInspectionDocument';
	   
   }
   public function  UploadOtherDocument(){
	   
	   $URL = 'http://api.tradologie.com/Supplier/UploadOtherDocument';
	   
   }
 
   
   
   public function Extrafunction(){
	   
	   
				 $data = json_encode(['AgencyName' => $AgencyName,
						'AuctionName' => $Testing,
						'DeliveryLastDate' => $DeliveryLastDate,
						'AuctionStartDate' => $AuctionStartDate,
						'DeliveryAddress' => $DeliveryAddress,
						'Token' => $Token,
						'BankerName' => $BankerName,
						'CustomerID' => $CustomerID,
						'PaymentTerm' => $PaymentTerm,
						'MinQuantity' => $MinQuantity,
						'UserTimeZone' => $UserTimeZone,
						'InspectionAgency' => $InspectionAgency,
						'AgencyAddress' => $AgencyAddress,
						'AgencyPhone' => $AgencyPhone,
						'PartialDelivery' => $PartialDelivery,
						'TotalQuantity' => $TotalQuantity,
						'Remarks' => $Remarks,
						'AgencyEmail' => $AgencyEmail,
						'AuctionCode' => $AuctionCode,
						'Currency' => $Currency,
						'AuctionID' => $AuctionID,
						'AuctionGroupID' => $AuctionGroupID
				]);
				
				/*	'CountryName'  =>  $CountryName,
						'StateName'  =>  $StateName,
						'CityName'  =>  $CityNames,
						'AreaName'  =>  $AreaNames,
						'ZipCode'  =>  $ZipCode,
						'AddressType'  =>  $addressTypeID, 
						'CompanyName'  =>  $CompanyName,
						'Address'  =>  $Address,
						'MobileNo'  =>  $MobileNo,
						'GSTIN'  =>  $GSTIN,
						'ReceiverName'  =>  $ReceiverName,
						'ReceiverMobile'  =>  $ReceiverMobile,
						'ReceiverID'  =>  $ReceiverIDType,  
						'ReceiverID_No'  =>  $ReceiverIDNo,
						'PortOfDischarge'  =>  $portOfDischarge*/
   }
   
   
   public function CustomerAddress(){
	   
	   
	 date_default_timezone_set('Asia/Calcutta');
		
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		//$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		$access_token = 'yVge4IsIKDcNiwnAkIySqUb0CQXHocxNoAJ1';
		
		
		$customerID = '1';
		$customerTranID = '2';
		
		
		$URL = 'http://api.tradologie.com/Buyer/CustomerAddress';
		$curl = curl_init();
			$header = array(
				  'Authorization: Apisecret ' . $access_token,
				  'Content-Type: application/json',
				  'Accept: application/json'
			  );
			  
			  $data = json_encode([
				  		'CustomerTranID'  =>  $customerTranID,
						'CustomerID'  =>  $customerID
					
				]);
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			print_r($decode_response);	
			
	   
   }
   
   
   
	public function SupplierList_ByBuyer(){
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		//$URL = 'http://api.tradologie.com/Buyer/SupplierList_ByBuyer/5/2';
		$URL = 'http://api.tradologie.com/Buyer/CategoryForRegistration';
		$curl = curl_init();
		
			$header = array(
				   'Content-Type: application/json',
				  'Accept: application/json'
			  ); 
			  
			 /* $data = json_encode([
			      'Token' => $access_token,
				  'CountryName' => $countryName
				]);*/
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => $header,
			  CURLOPT_POSTFIELDS => false
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			pr($decode_response);
			
	}
	
	
	
	
	public function CategoryForRegistration(){
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/CategoryForRegistration';
		$curl = curl_init();
		
			$header = array(
				   'Content-Type: application/json',
				  'Accept: application/json'
			  ); 
			  
			 /* $data = json_encode([
			      'Token' => $access_token,
				  'CountryName' => $countryName
				]);*/
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => $header,
			  CURLOPT_POSTFIELDS => false
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			pr($decode_response);
			
	}
	
	
		public function category(){
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/category';
		$curl = curl_init();
		
			$header = array(
				   'Content-Type: application/json',
				  'Accept: application/json'
			  ); 
			  
			 /* $data = json_encode([
			      'Token' => $access_token,
				  'CountryName' => $countryName
				]);*/
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => $header,
			  CURLOPT_POSTFIELDS => false
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			pr($decode_response);
			
	}
	
	
	public function AutionSupplierList(){
		date_default_timezone_set('Asia/Calcutta');
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$access_token = '0t0nRrLjrG3eE6DJD77tfWrpa5EuE3xqyEOF'; //$post->Token;
		
		$URL = 'http://api.tradologie.com/Buyer/AutionSupplierList';
		$curl = curl_init();
		
			$header = array(
				   'Content-Type: application/json',
				  'Accept: application/json'
			  ); 
			  
			 /* $data = json_encode([
			      'Token' => $access_token,
				  'CountryName' => $countryName
				]);*/
				
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => $header,
			  CURLOPT_POSTFIELDS => false
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			
			$decode_response = json_decode($response);
			pr($decode_response);
			
	}
	
	
	
	
		public function registervone(){
				
	    date_default_timezone_set('Asia/Calcutta');
		
		$crdate = date('Y-m-d h:i:s');
		// get posted data
		$post = json_decode(file_get_contents("php://input"));
		$data="Token=2018APR031848&UserName=Rajneesh sharma&EmailID=rajsharma231979@gmail.com&MobileNo=9800000000&Password=123456&GenderID=2&TypeOfAccountID=1&GroupIDs=8";
		
		

		$URL = 'http://api.tradologie.com/Buyer/RegisterV1';
		$curl = curl_init();
			$header = array(
				  'Content-Type: application/x-www-form-urlencoded');
			  
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $URL,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10, 
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $data, // $validdays (int()3)*24*3600
			  CURLOPT_HTTPHEADER => $header,
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
		
			$resul_response = json_decode($response);
			

			
			if ($err) {
				$arr['status']['status']     = '0';
				$arr['status']['statuscode'] = "201";
				$arr['data']                 = $response;
				$arr['message']['message']   = "Error Please try again!";
			} else {
				
				$arr['status']['status']     = '1';
				$arr['status']['statuscode'] = "200";
				$arr['data']                 = $resul_response;
				$arr['message']['message']   = "Information Post successfully!";
			}
		
		echo json_encode($arr);
		
	}
	
	
	public function displaycontents(){
		
		
		  $cate_id =24;
		  $data['birla_cement'] = $this->Api_model->display_contents($cate_id);
		  
			//pr($data['birla_cement']);
			$name = $data['birla_cement'][0]->name;
			$image = $data['birla_cement'][0]->image;
			$slug = $data['birla_cement'][0]->slug;
			$description = $data['birla_cement'][0]->description;
			
			
		
		
	}
	
	
	
	
	
}

?>