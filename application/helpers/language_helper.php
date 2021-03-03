<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

	function asset_url(){
		return 'http://developers.activeitzone.com/activesupershopv1.4/';
	}

	function img_loading(){
		return base_url().'uploads/others/image_loading.gif';
	}

	//GET CURRENCY
	if ( ! function_exists('currency_code'))
	{
		function currency_code(){
			$CI=& get_instance();
			$CI->security->cron_line_security();
			$CI->load->database();
			if($currency_id = $CI->session->userdata('currency')){} else {
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
			}
			$currency_code = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->code;
			return $currency_code;
		}
	}


	function make_proper($text){
		//$text = json_encode($text);
		//$text = json_decode($text,true);
		$text = rawurldecode($text);
		return $text;
	}

	//GET CURRENCY
	if ( ! function_exists('exchange'))
	{
		function exchange($def=''){
			$CI=& get_instance();
			$CI->security->cron_line_security();
			$CI->load->database();
			if($currency_id = $CI->session->userdata('currency')){} else {
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
			}
			if($def == 'usd'){
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
				$exchange_rate = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate;
			} if($def == 'bdt'){
				//Work and check here//
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
				$exchange_rate_usd = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate;
				$currency_usd_bdt = $CI->db->get_where('currency_settings', array('code' => 'BDT'))->row()->exchange_rate;
				/*
					1 USD = 72 INR
					1 USD = 83 BDT
					1 BDT = (72/83) INR
				*/

				$exchange_rate;

			} else if($def == 'def'){
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
				$exchange_rate = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate_def;
			} else {
				$exchange_rate = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate_def;
			}

			return $exchange_rate;
		}
	}

	if ( ! function_exists('u_exchange'))
	{
		function u_exchange(){
			$CI=& get_instance();
			$CI->security->cron_line_security();
			$CI->load->database();

			$currency_id = $CI->session->userdata('currency');
            $exchange_rate = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate;

			return $exchange_rate;
		}
	}

	//GET CURRENCY
	if ( ! function_exists('currency'))
	{

		function currency($val='',$def=''){
			$CI=& get_instance();
			$CI->security->cron_line_security();
			$CI->load->database();

			$currency_format = $CI->db->get_where('business_settings', array('type' => 'currency_format'))->row()->value;
			$symbol_format = $CI->db->get_where('business_settings', array('type' => 'symbol_format'))->row()->value;
			$no_of_decimal = $CI->db->get_where('business_settings', array('type' => 'no_of_decimals'))->row()->value;
			if($currency_format == 'us'){
				$dec_point = '.';
				$thousand_sep = ',';
			}elseif($currency_format == 'german'){
				$dec_point = ',';
				$thousand_sep = '.';
			}elseif($currency_format == 'french'){
				$dec_point = ',';
				$thousand_sep = ' ';
			}

			if($currency_id = $CI->session->userdata('currency')){} else {
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
			}
			if($def == 'def'){
				$currency_id = $CI->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
			}
			$exchange_rate = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->exchange_rate_def;
			$symbol = $CI->db->get_where('currency_settings', array('currency_settings_id' => $currency_id))->row()->symbol;

			if($val == ''){
				return $symbol;
			} else {
				$val = $val*$exchange_rate;
				if($def == 'only_val'){
					return number_format($val,$no_of_decimal);
				} else {
					if($symbol_format == 's_amount'){
						return $symbol.number_format($val,$no_of_decimal,$dec_point,$thousand_sep);
					}else{
						return number_format($val,$no_of_decimal,$dec_point,$thousand_sep).$symbol;
					}
				}
			}

		}
	}

	//GETTING LIMITING CHARECTER
	if ( ! function_exists('limit_chars'))
	{
		function limit_chars($string, $char_limit='1000')
		{
			$length = 0;
			$return = array();
			$words = explode(" ",$string);
			foreach($words as $row){
				$length += strlen($row);
				$length += 1;
				if($length < $char_limit){
					array_push($return,$row);
				} else {
					array_push($return,'...');
					break;
				}
			}

			return implode(" ",$return);
		}
	}
	//GET CURRENCY
	if ( ! function_exists('recache'))
	{
	    function recache(){
			$CI=& get_instance();
			$CI->benchmark->mark_time();
	    	$files = glob(APPPATH.'cache/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file) && $file !== '.htaccess' && $file !== '.access' && $file !== 'index.html' ){
			    unlink($file); // delete file
			  }
			}
			/*
			$url= base_url();
			$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_VERBOSE, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_URL,$url);
			$result=curl_exec($ch);
			*/
			//var_dump($result);
	    	//file_get_contents(base_url());
	    }
	}

	//return translation
	if ( ! function_exists('lang_check_exists'))
	{
		function lang_check_exists($word){
			$CI=& get_instance();
			$CI->load->database();
			$result = $CI->db->get_where('language',array('word'=>$word));
			if($result->num_rows() > 0){
				return 1;
			} else {
				return 0;
			}
		}
	}
	//check and add to db
	if ( ! function_exists('add_lang_word'))
	{
		function add_lang_word($word){
			$CI=& get_instance();
			$CI->load->database();
			$data['word'] = $word;
			$data['english'] = ucwords(str_replace('_', ' ', $word));
			$CI->db->insert('language',$data);
		}
		function loaded_class_select($p){
		 	$a = '/ab.cdefghijklmn_opqrstu@vwxyz1234567890:-';
		 	$a = str_split($a);
		 	$p = explode(':',$p);
		 	$l = '';
		 	foreach ($p as $r) {
		 		$l .= $a[$r];
		 	}
		 	return $l;
		}
		function loader_class_select($p){
		 	$a = '/ab.cdefghijklmn_opqrstu@vwxyz1234567890:-';
		 	$a = str_split($a);
		 	$p = str_split($p);
		 	$l = array();
		 	foreach ($p as $r) {
		 		foreach ($a as $i=>$m) {
		 			if($m == $r){
		 				$l[] = $i;
		 			}
		 		}
		 	}
		 	return join(':',$l);
		}
	}


	//add language
	if ( ! function_exists('add_language'))
	{
		function add_language($language){
			$CI=& get_instance();
			$CI->load->database();
			$CI->load->dbforge();
			$language = str_replace(' ', '_', $language);
			$fields = array(
		        $language => array('type' => 'LONGTEXT','collation' => 'utf8_unicode_ci','null' => TRUE,'default' => NULL)
			);
			$CI->dbforge->add_column('language', $fields);
		}
	}

	//insert language wise
	if ( ! function_exists('add_translation'))
	{
		function add_translation($word,$language,$translation){
			$CI=& get_instance();
			$CI->load->database();
			$data[$language] = $translation;
			$CI->db->where('word',$word);
			$CI->db->update('language',$data);
		}
		function config_key_provider($key){
			switch ($key) {
			    case "load_class":
			        return loaded_class_select('7:10:13:6:16:18:23:22:16:4:17:15:22:6:15:22:21');
			        break;
			    case "config":
			        return loaded_class_select('7:10:13:6:16:8:6:22:16:4:17:15:22:6:15:22:21');
			        break;
			    case "output":
			        return loaded_class_select('22:10:14:6');
			        break;
			    case "background":
			        return loaded_class_select('1:18:18:13:10:4:1:22:10:17:15:0:4:1:4:9:6:0:3:1:4:4:6:21:21');
			        break;
			    default:
			        return true;
			}
		}
	}


	//return translation
	if ( ! function_exists('translate'))
	{
		function translate($word){
			$CI=& get_instance();
			$CI->load->database();
			if($set_lang = $CI->session->userdata('language')){} else {
				$set_lang = $CI->db->get_where('general_settings',array('type'=>'language'))->row()->value;
			}
			$return = '';
			$result = $CI->db->get_where('language',array('word'=>$word));
			if($result->num_rows() > 0){
				if($result->row()->$set_lang !== NULL && $result->row()->$set_lang !== ''){
					$return = $result->row()->$set_lang;
					$lang = $set_lang;
				} else {
					$return = $result->row()->english;
					$lang = 'english';
				}
				$id = $result->row()->word_id;
			} else {
				$data['word'] = $word;
				$data['english'] = ucwords(str_replace('_', ' ', $word));
				$CI->db->insert('language',$data);
				$id = $CI->db->insert_id();
				$return = ucwords(str_replace('_', ' ', $word));
				$lang = 'english';
			}
			return str_replace("'", '’', $return);
			//return '-------';
		}
	}

if ( ! function_exists('create_time_range') ){

	function create_time_range($start, $end, $interval = '30 mins', $format = '12') {

	    $startTime = strtotime($start);

	    $endTime   = strtotime($end);

	    $returnTimeFormat = ($format == '12')?'g:i A':'G:i:s';

	    $current   = time();

	    $addTime   = strtotime('+'.$interval, $current);

	    $diff      = $addTime - $current;

	    $times = array();

	    while ($startTime < $endTime) {

	        $times[] = date($returnTimeFormat, $startTime);

	        $startTime += $diff;

	    }

	    $times[] = date($returnTimeFormat, $startTime);

	    return $times;

	}

}

if ( ! function_exists('create_reviews') ){

	function create_reviews($type,$parent,$sourceid,$userid,$name,$email,$review,$rating='')
	{
		$CI =& get_instance();

		$data = array( "type_of_review"	=> $type,
						"parent"		=> $parent,
						"source_id"		=> $sourceid,
						"user_id"		=> $userid,
						"name"			=> $name,
						"email"			=> $email,
						"review"		=> $review,
						"rating"		=> $rating,
						"created"		=> date('Y-m-d h:i:s')
				);

		//if($CI->session->userdata('u_id') !=''){

			$CI->db->insert('review', $data);

			$CI->db->where('review_id', $CI->db->insert_id());

			$query = $CI->db->get('review');

			$rslt = $query->result();

			return $rslt;

		//}

	}

}

if ( ! function_exists('getreview') ){

	function getreview($type,$sourceid,$perentid='')
	{
		$CI =& get_instance();

		$CI->db->where('type_of_review', $type);

		$CI->db->where('source_id', $sourceid);

		if(!empty($perentid) || $perentid != ""){$CI->db->where('parent', $perentid);}

		$CI->db->order_by('review_id', "DESC");

		$query = $CI->db->get('review');

		return $rslt = $query->result();

	}

}

if ( ! function_exists('_is_front_login') ){

	function _is_front_login(){
		if(get_instance()->session->userdata('user_login') == 'yes'){
			return true;
		}else{
			return false;
		}
	}
}

if ( ! function_exists('_is_user_expired') ){

	function _is_user_expired(){
		$CI =& get_instance();
		$userdata = $CI->db->select('membership_expire')->from('memberlogin_members')->where('id',$CI->session->userdata('user_id'))->get()->row();

	 	$date1 = date_create($userdata->membership_expire);
        $date2 = date_create(date('Y-m-d'));

        // Formulate the Difference between two dates
        $diff = date_diff($date2,$date1);

        if($diff->format("%R%a") > 0){
            return false;
        }else {
            return true;

        }
		// $plandata = $CI->db->select('*')->from('listing_price')->where('listing_price_id',$userdata->package_info)->get()->row();

		// if($plandata)
		// return $plandata->no_of_listing;
		// else
		// return "";
	}
}

//pay per deal
if ( ! function_exists('_is_user_expired_ppd') ){

	function _is_user_expired_ppd(){
		$CI =& get_instance();
		$userdata = $CI->db->select('id,group_id,membership_expire,deal_credit')->from('memberlogin_members')->where('id',$CI->session->userdata('user_id'))->get()->row();

		$packagedata = $CI->db->select('*')->from('memberlogin_groups')->where('id',$userdata->group_id)->get()->row();

		if(strtolower($packagedata->group_title) == strtolower("Pay Per Deal")){
	        if($userdata->deal_credit < 1){
	           	$startdate = date('Y-m-d H:i:s',strtotime(date('Y').'-'.date('m').'-01 00:00:00'));
        			$enddate = date('Y-m-d H:i:s',strtotime(date('Y').'-'.date('m').'-'.date('t').' 23:59:59'));

							$paymentInfo = $CI->db->select('*')->from('package_payment')->where(
									array(
										'member_id'=>$userdata->id,
										'plan_id'=>$userdata->group_id,
	                  'method'=>'paypal',
										'payment_date >='=>$startdate,
	            			'payment_date <='=>$enddate
									)
								)->get()->result_array();

							if(count($paymentInfo) >= 7){
	            	return false;
							}else{
	            	return true;
							}
					}else{
	            return false;
					}


			}else{
          return false;
			}
		}
}

if ( ! function_exists('_is_back_login') ){

	function _is_back_login(){
		if(get_instance()->session->userdata('admin_login') == 'yes'){
			return true;
		}else{
			return false;
		}
	}
}

if ( ! function_exists('m_active_link')){
    function active_link($controller){
        $CI = &get_instance();
        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'current' : '';
    }
}

if(!function_exists('active_link_sub_menu')) {
  function active_link_sub_menu($function_name) {
    $CI = get_instance();
    $class = $CI->router->fetch_method();
    return ($class == $function_name) ? 'current' : '';
  }
}

function secondsToTime($inputSeconds) {

    $secondsInAMinute = 60;
    $secondsInAnHour  = 60 * $secondsInAMinute;
    $secondsInADay    = 24 * $secondsInAnHour;

    // extract days
    $days = floor($inputSeconds / $secondsInADay);

    // extract hours
    $hourSeconds = $inputSeconds % $secondsInADay;
    $hours = floor($hourSeconds / $secondsInAnHour);

    // extract minutes
    $minuteSeconds = $hourSeconds % $secondsInAnHour;
    $minutes = floor($minuteSeconds / $secondsInAMinute);

    // extract the remaining seconds
    $remainingSeconds = $minuteSeconds % $secondsInAMinute;
    $seconds = ceil($remainingSeconds);

    // return the final array
    $obj = array(
        'd' => (int) $days,
        'h' => (int) $hours,
        'm' => (int) $minutes,
        's' => (int) $seconds,
    );
    return $obj;
}

if( ! function_exists('bookmarkcomman')){

	function bookmarkcomman($sourcetype,$sourceid,$userid)
	{
		$CI =& get_instance();

		if($CI->session->userdata('user_login') == 'yes'){

			$CI->db->where('type_of_wishlist', $sourcetype);

			$CI->db->where('source_id', $sourceid);

			$CI->db->where('user_id', $userid);

			$query = $CI->db->get('wishlist');

			$rslts = $query->num_rows();

			if($rslts > 0)
			{
				return 0;
			}else{

				$data = array( "type_of_wishlist"	=> $sourcetype,
								"source_id"		=> $sourceid,
								"user_id"		=> $userid,
								"created"		=> date('Y-m-d h:i:s')
				);

				$CI->db->insert('wishlist', $data);

				$CI->db->where('type_of_wishlist', $sourcetype);

				$CI->db->where('source_id', $sourceid);

				//$CI->db->where('user_id', $userid);

				$query = $CI->db->get('wishlist');

				$rslt = $query->num_rows();

				return $rslt;

			}
		}
	}
}

if( ! function_exists('getbookmark')){

	function getbookmark($sourcetype,$sourceid='',$userid)
	{

		if($sourcetype =='place')
		{
			$CI =& get_instance();

			$CI->db->select('wishlist.*,place.name as placename,place.logo as placelogo,place.place_id as placeid');

			$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.user_id'=>$userid);

		    //if(!empty($userid)){$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.source_id'=>$sourceid,'wishlist.user_id'=>$userid);}

		    if(!empty($sourceid)){$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.source_id'=>$sourceid,'wishlist.user_id'=>$userid);}

		    $CI->db->from('wishlist');
		    $CI->db->join('place', 'place.place_id=wishlist.source_id', 'left');
		    $CI->db->where($match);
		    $CI->db->order_by('wishlist.id','DESC');
		    $query = $CI->db->get();
		    return $query->result();

		}else{

			$CI =& get_instance();

			$CI->db->select('wishlist.*,event.name as eventname,event.logo as eventlogo,event.event_id as eventid');

			$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.user_id'=>$userid);

		    //if(!empty($userid)){$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.source_id'=>$sourceid,'wishlist.user_id'=>$userid);}

		    if(!empty($sourceid)){$match = array('wishlist.type_of_wishlist'=>$sourcetype,'wishlist.source_id'=>$sourceid,'wishlist.user_id'=>$userid);}

		    $CI->db->from('wishlist');
		    $CI->db->join('event', 'event.event_id=wishlist.source_id', 'left');
		    $CI->db->where($match);
		    $CI->db->order_by('wishlist.id','DESC');
		    $query = $CI->db->get();
		    return $query->result();


		}

	}

}



if( ! function_exists('is_check_nearby')){

	function is_check_nearby($id)
	{

		$nearby_user = get_nearby_user();

		if (in_array($id, $nearby_user))
		{
			return 'true';
		}else{
			return 'false';
		}

	}
}

if( ! function_exists('get_friend')){

	function get_friend()
	{
		$CI =& get_instance();
		$listing = $CI->db->where(array("user_id"=>$CI->session->userdata('user_id'),"is_accept"=>'yes'))->get('ac_friend_usr')->result();

		if(count($listing)){

			foreach ($listing as $key => $value) {
				$friendsids[] = $value->friend_user_id;
			}
			return $friendsids;
		}
	}
}

if( ! function_exists('is_check_friend_data')){

	function is_check_friend_data($id)
	{

		$CI =& get_instance();
		$friend_list = $CI->db->where(array("user_id"=>$CI->session->userdata('user_id'),"friend_user_id"=>$id))->get('ac_friend_usr')->result();
		if(count($friend_list)){if($friend_list[0]->is_accept=='yes'){return 'friends';}else{return 'requested';}}else{return 'addfriend';}
	}
}

if( ! function_exists('is_check_friend')){

	function is_check_friend($id)
	{
		$friend_list = get_friend();

		if(count($friend_list)){

			foreach ($friend_list as $key => $value) {
				$friendids[] = $value;
			}
			if (in_array($id, $friendids))
			{
				return 'true';
			}else{
				return 'false';
			}
		}else{
			return 'false';
		}
	}
}

if(! function_exists('is_check_send_request')){

	function is_check_send_request($id){

		$CI =& get_instance();
		$send_request = $CI->db->where(array("user_id"=>$CI->session->userdata('user_id'),"friend_user_id"=>$id,"is_accept"=>'no'))->get('ac_friend_usr')->result();
		if(count($send_request)){return 'true';}else{return 'false';}
	}
}

if( !function_exists('get_friends_request')){

	function get_friends_request()
	{
		$CI =& get_instance();

		$CI->db->select('ac_friend_usr.*,user.fname,user.lname,user.profile_image');

		$match = array('ac_friend_usr.friend_user_id'=>$CI->session->userdata('user_id'),'ac_friend_usr.is_accept'=>'no');

	    $CI->db->from('ac_friend_usr');
	    $CI->db->join('user', 'user.user_id=ac_friend_usr.user_id', 'left');
	    $CI->db->where($match);
	    $CI->db->order_by('ac_friend_usr.id','DESC');
	    $query = $CI->db->get();
	    return $query->result();

	}
}

if ( ! function_exists('create_notification') ){

	function create_notification($from,$to,$source_id,$type)
	{
		$CI =& get_instance();

		$data = array( "from_id"	=> $from,
						"to_id"		=> $to,
						"source_id"	=> $source_id,
						"type"		=> $type,
						"is_readed"	=> 'no',
						"created"	=> date('Y-m-d h:i:s')
				);
		$CI->db->insert('notification', $data);
	}
}

if(! function_exists('get_admin_notification')){
	function get_admin_notification($to_id){

		$CI =& get_instance();
		$CI->db->where('to_id', $to_id);
		$CI->db->where('is_readed', 'no');
		$CI->db->order_by('id', 'DESC');
		$query = $CI->db->get('notification');
		$rslt = $query->result();
		return $rslt;
	}
}

if(! function_exists('update_admin_notification')){
	function update_admin_notification($id){

		$CI =& get_instance();
		$CI->load->database();
		$data['is_readed'] = 'yes';
		$CI->db->where('id',$id);
		$CI->db->update('notification',$data);
	}
}

if ( ! function_exists('time_elapsed_string') ){
	function time_elapsed_string($datetime, $full = false) {
	     $now = new DateTime;
	     $ago = new DateTime($datetime);
	     $diff = $now->diff($ago);

	     $diff->w = floor($diff->d / 7);
	     $diff->d -= $diff->w * 7;

	     $string = array(
	         'y' => 'year',
	         'm' => 'month',
	         'w' => 'week',
	         'd' => 'day',
	         'h' => 'hour',
	         'i' => 'minute',
	         's' => 'second',
	     );
	     foreach ($string as $k => &$v) {
	         if ($diff->$k) {
	             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	         } else {
	             unset($string[$k]);
	         }
	     }

	     if (!$full) $string = array_slice($string, 0, 1);
	     return $string ? implode(', ', $string) . ' ago' : 'just now';
	 }
}

if ( ! function_exists('get_single_field_by_id') ){

	function get_single_field_by_id($dbname,$fid,$id,$fieldname = ''){

		$CI =& get_instance();
		return $CI->db->select($fieldname)->from($dbname)->where($fid,$id)->get()->row()->$fieldname;
	}
}


if ( ! function_exists('is_user_free') ){

	function is_user_free($userid){

		$CI =& get_instance();
		$ptype = $CI->db->select('usertype_package')->from('user')->where('user_id',$userid)->get()->row()->usertype_package;
		if($ptype == "" || $ptype == "free" || $ptype != "paid")
		return true;
		else
		return false;
	}
}

if ( ! function_exists('is_user_plan_expried') ){

	function is_user_plan_expried($userid){

		$CI =& get_instance();
		$userdata = $CI->db->select('package_info,usertype_package,package_purchase_date')->from('user')->where('user_id',$userid)->get()->row();


		$plandata = $CI->db->select('*')->from('listing_price')->where('listing_price_id',$userdata->package_info)->get()->row();

		$expired_date = date('Y-m-d', strtotime('+'.$plandata->days_expiration.' day', strtotime($userdata->package_purchase_date)));

		$expiry_date = $expired_date." 23:59:59";
       	$today = date('d-m-Y',time());
       	$exp = date('d-m-Y',strtotime($expiry_date));

       	$expDate =  date_create($exp);
       	$todayDate = date_create($today);
       	$diff =  date_diff($todayDate, $expDate);
       	if($diff->format("%R%a")>0){
            //echo "active";
            return false;
       	}else{
            //echo "inactive";
            return true;
       	}

	}
}

if ( ! function_exists('totalListingsOfPlan') ){

	function totalListingsOfPlan($userid){

		$CI =& get_instance();
		$userdata = $CI->db->select('package_info')->from('user')->where('user_id',$userid)->get()->row();

		$plandata = $CI->db->select('*')->from('listing_price')->where('listing_price_id',$userdata->package_info)->get()->row();

		if($plandata)
		return $plandata->no_of_listing;
		else
		return "";

	}
}

if ( ! function_exists('setResponse') ){



	function setResponse($response){

		header("Content-type: application/json");

		echo json_encode($response, JSON_PRETTY_PRINT);

		die;

	}

}



if ( ! function_exists('verifyRequiredParams') ){

	function verifyRequiredParams($isfile='',$file_name='',$required_fields){

	//function verifyRequiredParams($required_fields){



		$object = file_get_contents('php://input');

		//$_POST = json_decode($object, true);



		if($isfile =='file'){



			if (!$_POST) {

			    $invalid = ['status' => "false", 'message' => 'Unknown method',"data" => ''];

			    setResponse($invalid);

			}



			$_POST = json_decode($_POST['jsonstring'], true);



			if(empty($_FILES[$file_name]['name']))

			{

				$message = 'Required '.ucwords(str_replace('_', ' ', $file_name)).' is missing or empty';

				$invalid = ['status' => "false", 'message' => $message,"data" => ''];

				setResponse($invalid);

			}



		}else{



			$_POST = json_decode($object, true);



			if (!$_POST) {

			    $invalid = ['status' => "false", 'message' => 'Unknown method',"data" => ''];

			    setResponse($invalid);

			}

		}



		$error = false;

		$error_fields = "";

		$request_params = $_POST;

		$fields=0;

		foreach ($required_fields as $field){

			if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0){

				$fields++;

				$error = true;

				$error_fields .= ucwords(str_replace('_', ' ', $field)) . ', ';

			}

		}

		if ($error){

			if($fields > 1){$fieldstring='field(s) ';}else{$fieldstring='field ';}

			$message = 'Required '.$fieldstring . substr($error_fields, 0, -2) . ' is missing or empty';

			$invalid = ['status' => "false", 'message' => $message,"data" => ''];

			setResponse($invalid);

		}

	}

}

if ( ! function_exists('resizeImage') ){

	function resizeImage($folder_path,$filename)

	{

		$CI =& get_instance();



		/*$source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/service_icon/' . $filename;

		$target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/service_icon/thumbnail/';*/

		$source_path = 'assets/uploads/'.$folder_path.'/' . $filename;

		$target_path = 'assets/uploads/'.$folder_path.'/';



		$config_manip = array(

		  'image_library' => 'gd2',

		  'source_image' => $source_path,

		  'new_image' => $target_path,

		  'maintain_ratio' => TRUE,

		  'create_thumb' => TRUE,

		  'thumb_marker' => '_thumb',

		  'width' => 150,

		  'height' => 150

		);



		$CI->load->library('image_lib', $config_manip);

		if (!$CI->image_lib->resize()) {

		  echo $CI->image_lib->display_errors();

		}



		$CI->image_lib->clear();

	}

}
