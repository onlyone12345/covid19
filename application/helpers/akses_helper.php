<?php 
	function in_access()
	{
		$ci=& get_instance();
		if($ci->session->userdata('status')=='login'){
			redirect('backend/dashboard');
		}
	}

	function no_access($hak_akses)
	{
		$ci=& get_instance();
		if(!$ci->session->userdata('status')){
			redirect('login');
		}elseif(!in_array($ci->session->userdata('level'), $hak_akses)){
			redirect('denied');
		}
	}


?>