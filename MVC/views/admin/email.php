<?php

/**
* 
*/
class Email extends CI_Contoller
{
	
	function email(){
		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => '465',
				'smtp_user' => 'harunisiaho@gmail.com',
				'smtp_pass' => 'mwenyemacho10'
			);
		$this->load->library('email',$config);

		$this->email->set_newline("\r\n");

		$this->email->from('harunisiaho@gmail.com','Harun Isiaho');
		$this->email->to('harunisiaho@gmail.com');
		$this->email->subject('Email teact');
		$this->email->message('It is working');

		if($this->email->send()){
			echo 'Your email was sent, fool';
		}
		else{
			show_error($this->email->print_debugger);
		}
	}
}

