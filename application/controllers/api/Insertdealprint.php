<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ini_set('allow_url_fopen',1);
class Insertdealprint extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{


		// if( ini_get('allow_url_fopen') ) {
		//     die('allow_url_fopen is enabled. file_get_contents should work well');
		// } else {
		//     die('allow_url_fopen is disabled. file_get_contents would not work');
		// }

		verifyRequiredParams('','',array('member_id','buyers_id'));
        //print_r($_POST);die;

		    $data['buyers_id']            = $_POST['buyers_id'];
            $data['inv_id']               = $_POST['inv_id'];
            $data['trade_inv_id']         = $_POST['trade_inv_id'];
            $data['member_id']            = $_POST['member_id'];
            $data['buyers_first_name']      = $_POST['buyers_firstname'];
            $data['buyers_mid_name']        = $_POST['buyers_middlename'];
            $data['buyers_last_name']       = $_POST['buyers_lastname'];
            $data['buyers_pri_email']       = $_POST['buyers_email'];
            $data['buyers_address']         = $_POST['buyers_address'];
            $data['buyers_city']            = $_POST['buyers_city'];
            $data['buyers_state']           = $_POST['buyers_state'];
            $data['buyers_zip']             = $_POST['buyers_zip'];
            $data['buyers_work_phone']      = $_POST['buyers_workphone'];
            $data['buyers_home_phone']      = $_POST['buyers_homephone'];
            $data['buyers_pri_phone_cell']  = $_POST['buyers_mobile'];
            $data['buyers_DL_number']       = $_POST['buyers_dlnumber'];
            $data['buyers_DL_state']        = $_POST['buyers_dlstate'];
            $data['buyers_DL_expire']       = $_POST['buyers_dlexpire'];
            $data['buyers_DL_dob']          = $_POST['buyers_dldob'];
            $data['buyers_temp_tag_number'] = $_POST['buyers_temp_tag_number'];


            if(empty($_POST['cobuyers_id']) || $_POST['cobuyers_id'] == 0){

            }else{

                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $_POST['cobuyers_id']))->row();
                $data['co_buyers_first_name']   = $buyer_data->co_buyers_first_name;
                $data['co_buyers_last_name']    = $buyer_data->co_buyers_last_name;
                $data['co_buyers_pri_email']    = $buyer_data->co_buyers_pri_email;
                $data['co_buyers_address']      = $buyer_data->co_buyers_address;
                $data['co_buyers_city']         = $buyer_data->co_buyers_city;
                $data['co_buyers_state']        = $buyer_data->co_buyers_state;
                $data['co_buyers_zip']          = $buyer_data->co_buyers_zip;
                $data['co_buyers_work_phone']   = $buyer_data->co_buyers_work_phone;
                $data['co_buyers_home_phone']   = $buyer_data->co_buyers_home_phone;
                $data['co_buyers_pri_phone_cell'] = $buyer_data->co_buyers_pri_phone_cell;
                $data['co_buyers_DL_number']    = $buyer_data->co_buyers_DL_number;
                $data['co_buyers_DL_state']     = $buyer_data->co_buyers_DL_state;
                $data['co_buyers_DL_expire']    = $buyer_data->co_buyers_DL_expire;
                $data['co_buyers_DL_dob']       = $buyer_data->co_buyers_DL_dob;

            }

            if(empty($_POST['insurance_buyers_id']) || $_POST['insurance_buyers_id'] == 0){

            }else{
                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $_POST['buyers_id']))->row();

                $data['ins_company']            = $buyer_data->ins_company;
                $data['ins_pol_num']            = $buyer_data->ins_pol_num;
                $data['ins_phone']              = $buyer_data->ins_phone;
                $data['ins_address']            = $buyer_data->ins_address;
                $data['ins_city']               = $buyer_data->ins_city;
                $data['ins_state']              = $buyer_data->ins_state;
                $data['ins_zip']                = $buyer_data->ins_zip;
                $data['ins_agent']              = $buyer_data->ins_agent;
            }

            $data['sale_price']             = $_POST['saleprice'];
            $data['trade_credit']           = $_POST['tradecredit'];
            // $data['trade_balance']          = $_POST['tradebalance'];
            $data['cash_credit']            = $_POST['cashcredit'];
            $data['tax']                    = $_POST['tax'];
            $data['dealer_fee']             = $_POST['servicefee'];
            $data['dmv']                    = $_POST['tagregistration'];
            $data['total_due']              = $_POST['total_due'];
            $data['sub_due']                = $_POST['sub_due'];
            $data['sub_due1']               = $_POST['sub_due1'];
            $data['sub_due2']               = $_POST['sub_due2'];

            if(!empty($_POST['inv_id']) && !empty($_POST['trade_inv_id'])){

                $data['inv_vin']                = $_POST['inventory_vin'];
                $data['inv_stock']              = $_POST['inventory_stocknumber'];
                $data['inv_year']               = $_POST['inventory_year'];
                $data['inv_make']               = $_POST['inventory_make'];
                $data['inv_model']              = $_POST['inventory_model'];
                $data['inv_style']              = $_POST['inventory_style'];
                $data['inv_color']              = $_POST['inventory_color'];
                $data['inv_mileage']            = $_POST['inventory_mileage'];
                $data['inv_exempt']             = $_POST['inventory_exempt'];
                $data['inv_cost']               = $_POST['inventory_cost'];
                $data['inv_addedcost']          = $_POST['inventory_addedcost'];
                $data['inv_price']              = $_POST['inventory_price'];
                $data['inv_flrc']               = $_POST['inventory_totalcost'];

                $data['trade_inv_vin']          = $_POST['trade_vin'];
                $data['trade_inv_year']         = $_POST['trade_year'];
                $data['trade_inv_make']         = $_POST['trade_make'];
                $data['trade_inv_model']        = $_POST['trade_model'];
                $data['trade_inv_style']        = $_POST['trade_style'];
                $data['trade_inv_color']        = $_POST['trade_color'];
                $data['trade_inv_mileage']      = $_POST['trade_mileage'];
                $data['trade_inv_exempt']       = $_POST['trade_exempt'];
                $data['trade_inv_price']        = $_POST['trade_allowance'];

            }else{

                if(!empty($_POST['inv_id'])){

                    $data['inv_vin']                = $_POST['inventory_vin'];
                    $data['inv_stock']              = $_POST['inventory_stocknumber'];
                    $data['inv_year']               = $_POST['inventory_year'];
                    $data['inv_make']               = $_POST['inventory_make'];
                    $data['inv_model']              = $_POST['inventory_model'];
                    $data['inv_style']              = $_POST['inventory_style'];
                    $data['inv_color']              = $_POST['inventory_color'];
                    $data['inv_mileage']            = $_POST['inventory_mileage'];
                    $data['inv_exempt']             = $_POST['inventory_exempt'];
                    $data['inv_cost']               = $_POST['inventory_cost'];
                    $data['inv_addedcost']          = $_POST['inventory_addedcost'];
                    $data['inv_price']              = $_POST['inventory_price'];
                    $data['inv_flrc']               = $_POST['inventory_totalcost'];
                }
                if(!empty($_POST['trade_inv_id'])){

                    $data['trade_inv_vin']          = $_POST['trade_vin'];
                    $data['trade_inv_year']         = $_POST['trade_year'];
                    $data['trade_inv_make']         = $_POST['trade_make'];
                    $data['trade_inv_model']        = $_POST['trade_model'];
                    $data['trade_inv_style']        = $_POST['trade_style'];
                    $data['trade_inv_color']        = $_POST['trade_color'];
                    $data['trade_inv_mileage']      = $_POST['trade_mileage'];
                    $data['trade_inv_exempt']       = $_POST['trade_exempt'];
                    $data['trade_inv_price']        = $_POST['trade_allowance'];

                }
            }

            $data['transact']           = "";
            $data['sale_date']          = date('Y-m-d');
            $data['status']             = "closed";

            if(empty($_POST['saleprice'])){
                $dataTrans['msg'] = "complete payment calculator section first to proceed further";
                $dataTrans['request_status'] = 'error';
                //echo json_encode($dataTrans);

                $valid = array('status' => "false", "message" => 'Complete payment calculator section first to proceed further', 'data' => $dataTrans);
            }else{

                if(empty($_POST['transact_id'])){
                    $this->upadateDealCredit($_POST['member_id']);
                    $inserted = $this->db->insert('transactions', $data);
                    $dataTrans['transact_id'] = $this->db->insert_id();
                    $dataTrans['request_status'] = 'done';
                    $_POST['transact_id'] = $dataTrans['transact_id'];

                    if(!empty($_POST['trade_inv_id'])){

                        $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $_POST['trade_inv_id']))->row();

                        $member_id = $_POST['member_id'];
                        $dataInv['member_id']      = $member_id;
                        $dataInv['inv_vin']        = $trade_data->trade_inv_vin;
                        $dataInv['inv_stock']      = "0";
                        $dataInv['inv_year']       = $trade_data->trade_inv_year;
                        $dataInv['inv_make']       = $trade_data->trade_inv_make;
                        $dataInv['inv_model']      = $trade_data->trade_inv_model;
                        $dataInv['inv_style']      = $trade_data->trade_inv_style;
                        $dataInv['inv_color']      = $trade_data->trade_inv_color;
                        $dataInv['inv_mileage']    = $trade_data->trade_inv_mileage;
                        $dataInv['inv_exempt']     = $trade_data->trade_inv_exempt;
                        $dataInv['inv_cost']       = $trade_data->trade_inv_price;
                        $dataInv['inv_addedcost']  = "0";
                        $dataInv['inv_price']      = $trade_data->trade_inv_price;
                        $dataInv['inv_flrc']       = $trade_data->trade_inv_price;
                        $dataInv['active']         = '0';
                        $this->db->insert('inventory', $dataInv);

                        $this->db->where("inv_vin",$trade_data->trade_inv_vin);
                        $this->db->update("inventory",$dataInv);

                        $data3['active']      = '1';
                        $this->db->where("trade_inv_id",$_POST['trade_inv_id']);
                        $this->db->update("trade",$data3);
                    }

                }else{
                    $this->db->where('transact_id', $_POST['transact_id']);
                    $inserted = $this->db->update('transactions', $data);
                    $dataTrans['transact_id'] = $_POST['transact_id'];
                    $dataTrans['request_status'] = 'done';
                }



                $data1['active']      = '1';
                $this->db->where("buyers_id",$_POST['buyers_id']);
                $this->db->update("buyers",$data1);

                if(!empty($_POST['inv_id'])){
                    $data2['active']      = '1';
                    $this->db->where("inv_id",$_POST['inv_id']);
                    $this->db->update("inventory",$data2);
                }



                $this->db->where("member_id",$_POST['member_id']);
                $this->db->where("buyers_id",$_POST['buyers_id']);
                $this->db->where("inv_id",$_POST['inv_id']);
                $this->db->where("trade_inv_id",$_POST['trade_inv_id']);
                $this->db->where("status",'processing');
                $this->db->delete("transactions");

                if($inserted){
                    //print for print normal document
                    //contract for BHPH contract
                    if($_POST['document_type'] == "print")
                        $dataTrans['pdfFilePath'] = $this->documents($_POST);
                    else if($_POST['document_type'] == "contract")
                        $dataTrans['pdfFilePath'] = $this->contracts($_POST);

                    $valid = array('status' => "true", "message" => 'Deal printed successfully.', 'data' => $dataTrans);
                }else{
                    $valid = array('status' => "false", "message" => 'Deal not printed.', 'data' => '');
                }
	        }
            setResponse($valid);
    }

    public function documents()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        $inv_id         = $_POST['inv_id'];
        $trade_inv_id   = $_POST['trade_inv_id'];
        $buyers_id      = $_POST['buyers_id'];
        $transact_id    = $_POST['transact_id'];

        if($inv_id != '0'){
            $page_data['inventory_data'] = $this->db->get_where('inventory',array('inv_id' => $inv_id))->row();//row2
        }else{
            $page_data['inventory_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2
        }
        $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "exempt" : $page_data['inventory_data']->inv_mileage;

        if($trade_inv_id != '0'){
            $page_data['trade_data'] = $this->db->get_where('trade',array('trade_inv_id' => $trade_inv_id))->row();//row4
        }else{
            $page_data['trade_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row4
        }
        $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "exempt" : $page_data['trade_data']->trade_inv_mileage;

        $page_data['buyers_data'] = $this->db->get_where('buyers',array('buyers_id' => $buyers_id))->row();//row
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $_POST['member_id']))->row();//row3

        $page_data['state']    = $page_data['memberdata']->state;

        $page_data['transact_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2

        if(!empty($page_data['transact_data']->inv_vin)){
            $page_data['transact_data']->inv_mileage = $page_data['transact_data']->inv_exempt == "yes" ? "Exempt" : $page_data['transact_data']->inv_mileage;
        }
        if(!empty($page_data['transact_data']->trade_inv_vin)){
            $page_data['transact_data']->trade_inv_mileage = $page_data['transact_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['transact_data']->trade_inv_mileage;
        }

        $sale_price = empty($page_data['buyers_data']->sale_price) ? "0":$page_data['buyers_data']->sale_price;
        $dealer_fee = empty($page_data['buyers_data']->dealer_fee) ? "0":$page_data['buyers_data']->dealer_fee;
        $tax = empty($page_data['buyers_data']->tax) ? "0":$page_data['buyers_data']->tax;
        $page_data['d'] = ($sale_price + $dealer_fee + $tax);

        $page_data['calltype'] = 'app';

        $phoneNumber ="";
        if(!empty($page_data['buyers_data']->buyers_home_phone))
        $phoneNumber = $page_data['buyers_data']->buyers_home_phone;
        elseif (!empty($page_data['buyers_data']->buyers_work_phone))
        $phoneNumber = $page_data['buyers_data']->buyers_work_phone;
        else
        $phoneNumber = $page_data['buyers_data']->buyers_pri_phone_cell;

        $co_phoneNumber ="";
        if(!empty($page_data['buyers_data']->co_buyers_home_phone))
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_home_phone;
        elseif (!empty($page_data['buyers_data']->co_buyers_work_phone))
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_work_phone;
        else
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_pri_phone_cell;

        // echo date('Y-m-d\TH:i:s', strtotime($page_data['transact_data']->sale_date)).'.00Z';
        // echo $page_data['transact_data']->sale_date;
        $data = array(
            "dealerNumber" => $_POST['member_id'],
            "dealNumber" => $transact_id,
            "vendorId"=> "f0da3a86-2714-47a7-85f4-17d2b059d2b5",
            "deal" => array (
                "dealDate" => date('Y-m-d\TH:i:s', strtotime($page_data['transact_data']->sale_date)).'.00Z',
                "dealNumber" => $transact_id,
                "dealType" => "Cash",
                "insurancePolicyNumber" => $page_data['buyers_data']->ins_pol_num
            ),
            "buyer" => array (
                "dmsCustomerNumber" => "",
                "customerType" => "B",
                "companyName" => $page_data['memberdata']->company_name,
                "firstName" => $page_data['buyers_data']->buyers_first_name,
                "middleName" => $page_data['buyers_data']->buyers_mid_name,
                "lastName" => $page_data['buyers_data']->buyers_last_name,
                "nameSuffix" => "",
                "residentialStreetAddress" => $page_data['buyers_data']->buyers_address,
                "residentialStreetAddress2" => "",
                "residentialCity" => $page_data['buyers_data']->buyers_city,
                "residentialState" => $page_data['buyers_data']->buyers_state,
                "residentialZipCode" => $page_data['buyers_data']->buyers_zip,
                "residentialZipPlus4" => "",
                "mailingStreetAddress" => "",
                "mailingStreetAddress2" => "",
                "mailingCity" => "",
                "mailingState" => "",
                "mailingZipCode" => "",
                "mailingZipPlus4" => "",
                "phoneNumber" => $phoneNumber,
                "phoneNumberExt" => "",
                "emailAddress" => $page_data['buyers_data']->buyers_pri_email,
                "gender" => "",
                "birthDate" => date('Y-m-d\TH:i:s', strtotime($page_data['buyers_data']->buyers_DL_dob)).'.00Z',
                "driverLicenseNumber" => $page_data['buyers_data']->buyers_DL_number,
                "feid" => "",
                "feidSuffix" => ""
            ),
            "cobuyer" => array (
                "dmsCustomerNumber" => "",
                "customerType" => "B",
                "companyName" => $page_data['memberdata']->company_name,
                "firstName" => $page_data['buyers_data']->co_buyers_first_name,
                "middleName" => $page_data['buyers_data']->co_buyers_mid_name,
                "lastName" => $page_data['buyers_data']->co_buyers_last_name,
                "nameSuffix" => "",
                "residentialStreetAddress" => $page_data['buyers_data']->co_buyers_address,
                "residentialStreetAddress2" => "",
                "residentialCity" => $page_data['buyers_data']->co_buyers_city,
                "residentialState" => $page_data['buyers_data']->co_buyers_state,
                "residentialZipCode" => $page_data['buyers_data']->co_buyers_zip,
                "residentialZipPlus4" => "",
                "mailingStreetAddress" => "",
                "mailingStreetAddress2" => "",
                "mailingCity" => "",
                "mailingState" => "",
                "mailingZipCode" => "",
                "mailingZipPlus4" => "",
                "phoneNumber" => $co_phoneNumber,
                "phoneNumberExt" => "",
                "emailAddress" => $page_data['buyers_data']->co_buyers_pri_email,
                "gender" => "",
                "birthDate" => date('Y-m-d\TH:i:s', strtotime($page_data['buyers_data']->co_buyers_DL_dob)).'.00Z',
                "driverLicenseNumber" => $page_data['buyers_data']->co_buyers_DL_number,
                "feid" => "",
                "feidSuffix" => ""
            ),
            "lessor" => array (
                "lessorName" => "",
                "streetAddress" => "",
                "streetAddress2" => "",
                "city" => "",
                "state" => "",
                "zipCode" => "",
                "zipPlus4" => "",
                "feid" => "",
                "feidSuffix" => ""
            ),
            "lienholders" => array (),
            "saleVehicle" => array (
                "stockNumber" => $page_data['transact_data']->inv_stock,
                "newOrUsed" => null,
                "netWeight" => null,
                "listPrice" => null,
                "retailPrice" => null,
                "salePrice" => (float)$page_data['transact_data']->sale_price,
                "rebate" => null,
                "acquisitionFee" => (float)$page_data['transact_data']->dealer_fee,
                "downPayment" => (float)$page_data['transact_data']->cash_credit,
                "amountFinanced" => (float)$page_data['transact_data']->total_due,
                "baseLeasePayment" => null,
                "securityDeposit" => null,
                "totalOfPayments" => (float)$page_data['buyers_data']->bhph_months,
                "yearMake" => (float)$page_data['transact_data']->inv_year,
                "odometerMileage" => (float)$page_data['transact_data']->inv_mileage,
                "vehicleIdentificationNumber" => $page_data['transact_data']->inv_vin,
                "makeTypeCode" => $page_data['transact_data']->inv_make,
                "bodyTypeCode" => $page_data['transact_data']->inv_style,
                "fuelTypeCode" => null,
                "grossVehicleWeight" => null,
                "modelName" => $page_data['transact_data']->inv_model,
                "majorColorCode" => $page_data['transact_data']->inv_color,
                "minorColorCode" => null,
                "payoffAmount" => null,
                "bankName" => null,
                "tradeAllowance" => (float)$page_data['transact_data']->trade_credit,
                "taxes" => array (
                    "additionalProp1" => (float)$page_data['transact_data']->tax,
                    "additionalProp2" => null,
                    "additionalProp3" => null
                )
            ),
            "tradeVehicles" => $page_data['transact_data']->trade_inv_vin ? array (
                "stockNumber" => null,
                "newOrUsed" => null,
                "netWeight" => null,
                "listPrice" => null,
                "retailPrice" => null,
                "salePrice" => (float)$page_data['transact_data']->sale_price,
                "rebate" => null,
                "acquisitionFee" => (float)$page_data['transact_data']->dealer_fee,
                "downPayment" => (float)$page_data['transact_data']->cash_credit,
                "amountFinanced" => (float)$page_data['transact_data']->total_due,
                "baseLeasePayment" => null,
                "securityDeposit" => null,
                "totalOfPayments" => (float)$page_data['buyers_data']->bhph_months,
                "yearMake" => (float)$page_data['transact_data']->trade_inv_year,
                "odometerMileage" => (float)$page_data['transact_data']->trade_inv_mileage,
                "vehicleIdentificationNumber" => $page_data['transact_data']->trade_inv_vin,
                "makeTypeCode" => $page_data['transact_data']->trade_inv_make,
                "bodyTypeCode" => $page_data['transact_data']->trade_inv_style,
                "fuelTypeCode" => null,
                "grossVehicleWeight" => null,
                "modelName" => $page_data['transact_data']->trade_inv_model,
                "majorColorCode" => $page_data['transact_data']->trade_inv_color,
                "minorColorCode" => null,
                "payoffAmount" => null,
                "bankName" => null,
                "tradeAllowance" => (float)$page_data['transact_data']->trade_credit,
                "taxes" => array (
                    "additionalProp1" => (float)$page_data['transact_data']->tax,
                    "additionalProp2" => null,
                    "additionalProp3" => null
                )
            ) : array ()
        );

        $postdata = json_encode($data);
        $ch = curl_init('https://dmsvendorapi.services.qa.dlrdmv.com/api/Dms/StoreDeal');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
        	array(
            	'Content-Type: application/json',
            	'Authorization: Basic ZTkzOTM3MzYtYzNhNy00M2QyLWI3YjQtZWQzYjQ0NGE3N2UyOmM4MWViZjhjLTExNGYtNGNkOC1iYTg0LTM2MDg3NjJkYTAwNg=='
           	)
        );
        $result = curl_exec($ch);
        curl_close($ch);

        $page_data['date'] = $_POST['sd_main_readyprint_date'];
        $html_content =  $this->load->view('documents',$page_data,true);
        // this the the PDF filename that user will get to download
        $pdfFilePath = "assets/pdf/".$page_data['buyers_data']->buyers_first_name.date("Ymdhms").rand(0,100).".pdf";

		$file = '/home/bubbadms/public_html/document.html';
		// Write the contents back to the file
		file_put_contents($file, $html_content );

		$apikey = '4702c9a0-fdef-4252-9727-3c03ee375201';
		$postdata = http_build_query(
		    array(
		        'apikey' => $apikey,
		        'value' => 'https://bubbadms.com/document.html',
		        'MarginBottom' => '6',
		        'MarginTop' => '6',
		        'MarginLeft' => '10',
		        'MarginRight' => '10',
                'PageSize' => 'Letter'
		    )
		);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);

		$context  = stream_context_create($opts);

		// Convert the HTML string to a PDF using those parameters
		$result = file_get_contents('http://api.html2pdfrocket.com/pdf', false, $context);
		// // Save to root folder in website
		file_put_contents($pdfFilePath, $result);
		return base_url().$pdfFilePath;
    }

    public function contracts()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        $inv_id         = $this->input->post('inv_id');
        $trade_inv_id   = $this->input->post('trade_inv_id');
        $buyers_id      = $this->input->post('buyers_id');
        $transact_id    = $this->input->post('transact_id');

        if($inv_id != '0'){
            $page_data['inventory_data'] = $this->db->get_where('inventory',array('inv_id' => $inv_id))->row();//row2
        }else{
            $page_data['inventory_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2
        }
        $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "Exempt" : $page_data['inventory_data']->inv_mileage;

        if($trade_inv_id != '0'){
            $page_data['trade_data'] = $this->db->get_where('trade',array('trade_inv_id' => $trade_inv_id))->row();//row4
        }else{
            $page_data['trade_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row4
        }
        $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['trade_data']->trade_inv_mileage;

        $page_data['buyers_data'] = $this->db->get_where('buyers',array('buyers_id' => $buyers_id))->row();//row
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $_POST['member_id']))->row();//row3

        $page_data['date'] = $this->input->post('sd_main_bhphcontract_date');

        //trade_inv_id='$trade', bhph_rate='$bhrate', bhph_tpmts='$bhpmts', bhph_months='$bhmo', bhph_pmtdate='$bhdate'
        $data['trade_inv_id'] = $trade_inv_id;
        $data['inv_id'] = $inv_id;
        $data['sale_date'] = $this->input->post('sd_main_bhphcontract_date');
        $data['bhph_rate'] = $this->input->post('sd_main_bhphcontract_interest_rate');
        $data['bhph_tpmts'] = $this->input->post('sd_main_bhphcontract_total_payments');
        $data['bhph_months'] = $this->input->post('sd_main_bhphcontract_number_payments');
        $data['bhph_pmtdate'] = $this->input->post('sd_main_bhphcontract_payment_schedule');
        $this->db->where('buyers_id', $buyers_id);
        $this->db->update('buyers', $data);

        $page_data['bhpmts'] = empty($_POST["sd_main_bhphcontract_total_payments"]) ? "0":$_POST["sd_main_bhphcontract_total_payments"];
        //$bhmo = $_POST["bhph_months"];
        //$bhdate = $_POST["bhph_pmtdate"];
        $page_data['bhpmt'] = empty($_POST["sd_main_bhphcontract_payment_amount"]) ? "0":$_POST["sd_main_bhphcontract_payment_amount"];
        //$bhtfee = $_POST["bhph_tfee"];
        $page_data['bhttppd'] = empty($_POST["sd_main_bhphcontract_tot_price_paid"]) ? "0":$_POST["sd_main_bhphcontract_tot_price_paid"];
        $page_data['bhtfin'] = empty($_POST["sd_main_bhphcontract_tot_finance_amt"]) ? "0":$_POST["sd_main_bhphcontract_tot_finance_amt"];
        $page_data['bhtch'] = empty($_POST["sd_main_bhphcontract_finance_charge"]) ? "0":$_POST["sd_main_bhphcontract_finance_charge"];
        $sale_price = empty($page_data['buyers_data']->sale_price) ? "0":$page_data['buyers_data']->sale_price;
        $dealer_fee = empty($page_data['buyers_data']->dealer_fee) ? "0":$page_data['buyers_data']->dealer_fee;
        $tax = empty($page_data['buyers_data']->tax) ? "0":$page_data['buyers_data']->tax;
        $page_data['d'] = ($sale_price + $dealer_fee + $tax);

        $page_data['calltype'] = 'app';

        // $this->load->view('contracts',$page_data);
        $html_content =  $this->load->view('docs/BHPHv7',$page_data,true);
        // this the the PDF filename that user will get to download
        $pdfFilePath = "assets/pdf/".$page_data['buyers_data']->buyers_first_name.date("Ymdhms").rand(0,100).".pdf";

        $file = '/home/bubbadms/public_html/document.html';
        // Write the contents back to the file
        file_put_contents($file, $html_content );

        $apikey = '4702c9a0-fdef-4252-9727-3c03ee375201';
        $postdata = http_build_query(
            array(
                'apikey' => $apikey,
                'value' => 'https://bubbadms.com/document.html',
                'MarginBottom' => '8',
                'MarginTop' => '8',
                'MarginLeft' => '6',
                'MarginRight' => '6',
                'PageSize' => 'Letter'

            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        // Convert the HTML string to a PDF using those parameters
        $result = file_get_contents('http://api.html2pdfrocket.com/pdf', false, $context);
        // // Save to root folder in website
        file_put_contents($pdfFilePath, $result);
        return base_url().$pdfFilePath;
    }

        //for pay per deal only
    public function upadateDealCredit($member_id)
    {
        $userdata = $this->db->get_where('memberlogin_members',array('id' => $member_id))->row();
        $packagedata = $this->db->get_where('memberlogin_groups',array('id' => $userdata->group_id))->row();
        if(strtolower($packagedata->group_title) == strtolower("Pay Per Deal")){
            if($userdata->deal_credit < 1){
                return true;
            }else{
                $data['deal_credit'] = $userdata->deal_credit - 1;
                $this->db->where('id', $userdata->id);
                $this->db->update('memberlogin_members', $data);
            }
        }else{
            return false;
        }
    }

}
