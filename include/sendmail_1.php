<?php 
global $_REQUEST;
$response = array('error'=>'');
$contact_email = 'info@josephandsaraking.org';

// type
$type = $_REQUEST['type'];	
// parse
parse_str($_POST['data'], $post_data);	
		

                                                $user_amount = stripslashes(strip_tags(trim($post_data['amount'])));
		$user_name = stripslashes(strip_tags(trim($post_data['username'])));
		$user_email = stripslashes(strip_tags(trim($post_data['email'])));
		$user_os1 =stripslashes(strip_tags(trim( $post_data['os1'])));
			
		if (trim($contact_email)!='') {
			$subj = 'Message from Revelation Christ Ministries';
			$msg = $subj." \r\nName: $user_amount\r\nName: $user_name \r\nE-mail: $user_email \r\nMessage: $user_os1";
		
			$head = "Content-Type: text/plain; charset=\"utf-8\"\n"
				. "X-Mailer: PHP/" . phpversion() . "\n"
				. "Reply-To: $user_email\n"
				. "To: $contact_email\n"
				. "From: $user_email\n";
		
			if (!@mail($contact_email, $subj, $msg, $head)) {
				$response['error'] = 'Error send message!';
			}
		} else 
				$response['error'] = 'Error send message!';
		


	echo json_encode($response);
	die();
?>