<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	
*	@author : David Musyoka	
*/

class Admin extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->model('crud_model');
		$this->load->database();
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
		if($this->session->userdata('admin_login') == 1)redirect(base_url().'index.php/admin/dashboard' , 'refresh');
		else redirect(base_url().'index.php/admin/login' , 'refresh');
	}

	/***ADMIN DASHBOARD***/
	function dashboard()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_name']	=	'admin/dashboard';
		$page_data['page_title']=	'Admin Dashboard';
		$page_data['page_info']	=	'Admin dashboard';
		$this->load->view('index' , $page_data);
	}
	

	/****MANAGE TEACHERS*****/
	function teachers($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'fname',						
						'label'=>'First Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'lname',			
						'label'=>'Last Name',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['id_no']			=	$this->input->post('id_no');
			$data['fname']			=	$this->input->post('fname');
			$data['lname']			=	$this->input->post('lname');
			$data['initials']		=$this->input->post('initials');
			$data['tsc']			=	$this->input->post('tsc');
			$data['dob']			=	$this->input->post('dob');			
			$data['gender']			=	$this->input->post('gender');
			$data['religion']		=	$this->input->post('religion');
			$data['phone']			=	$this->input->post('phone');
			$data['email']			=	$this->input->post('email');	
                        
                        $teach['name'] = $this->input->post('fname').' '.$this->input->post('lname');
                        $teach['email'] = $this->input->post('email');
                        $teach['password'] = strtolower($this->input->post('fname'));
                        $teach['level'] = 2;
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW TEACHER
			{
				$this->db->insert('teacher' , $data);
				/****IMAGE UPLOAD OF THE TEACHER*********/
				$teacher_id		=	mysql_insert_id();
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/'.$teacher_id.'.jpg');
				$this->db->insert('admin' , $teach);
				$this->session->set_flashdata('teacher_message', 'Teacher created');
				redirect(base_url().'index.php/admin/teachers' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING TEACHER
			{
				$this->db->where('teacher_id' , $param2);
				$this->db->update('teacher' , $data);
				/****IMAGE UPLOAD OF THE TEACHER*********/
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/'.$param2.'.jpg');
				
				$this->session->set_flashdata('teacher_message', 'Teacher edited');
				redirect(base_url().'index.php/admin/teachers/'.$param1.'/'.$param2 , 'refresh');
			}
                    }
		if($param1 == 'personal_profile')
		{
			$page_data['personal_profile']	=	true;
			$page_data['current_teacher_id']=	$param2;
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_teacher_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('teacher_id' , $param2);
			$this->db->delete('teacher');
			$this->session->set_flashdata('teacher_message', 'Teacher deleted');
			redirect(base_url().'index.php/admin/teachers/' , 'refresh');
		}
		


		$page_data['page_info']	=	'Teacher list';

		$page_data['page_name']	=	'admin/teachers';
		$page_data['page_title']=	'Teacher list';
		$this->load->view('index' , $page_data);
	}
	
	
	/***********************************************************************************************************/
		/****TEACHER VIEW STUDENTS*****/
	function viewstudents($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
               
	
	
		if($param1 == 'personal_profile')
		{
			$page_data['personal_profile']	=	true;
			$page_data['current_student_id']=	$param2;
		}
		
		

		$page_data['page_info']	=	'Student list';
		$page_data['page_name']	=	'admin/viewstudents';
		$page_data['page_title']=	'Student list';
		$this->load->view('index' , $page_data);
	}
	/****MANAGE STUDENTS*****/
	function students($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
               
		$config=array(
				array(	'field'=>'fname',						
						'label'=>'First Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'lname',						
						'label'=>'Last Name',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'adm_no',			
						'label'=>'Admission Number',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['adm_no']			=	$this->input->post('adm_no');
			$data['fname']			=	$this->input->post('fname');
			$data['lname']			=	$this->input->post('lname');
			$data['email']			=	$this->input->post('email');
			$data['dob']			=	$this->input->post('dob');
			$data['doa']			=	$this->input->post('doa');						
			$data['gender']			=	$this->input->post('gender');
			$data['religion']		=	$this->input->post('religion');
			$data['class_id']		=	$this->input->post('class_id');
			$data['stream_id']		=	$this->input->post('stream_id');
			$data['kcpe_marks']		=	$this->input->post('kcpe_marks');
			$data['kcpe_pos']		=	$this->input->post('kcpe_pos');
			$data['parent_name']	=	$this->input->post('parent_name');
			$data['parent_contact']	=	$this->input->post('parent_contact');
			$data['disability']  	=	$this->input->post('disability');
			$data['special_condition'] =	$this->input->post('special_condition');

			           $std['name'] = $this->input->post('fname').' '.$this->input->post('lname');
                       $std['email'] = $this->input->post('email');
                       $std['password'] = strtolower($this->input->post('fname'));
                       $std['level']=3;
                        
                             
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW STUDENT
			{
				$this->db->insert('student' , $data);
                                
				/****IMAGE UPLOAD OF THE STUDENT*********/
				$student_id		=	mysql_insert_id();
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$student_id.'.jpg');
				$this->db->insert('admin' , $std);
				$this->session->set_flashdata('student_message', 'Student Added');
				redirect(base_url().'index.php/admin/students' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING STUDENT
			{
				$this->db->where('student_id' , $param2);
				$this->db->update('student' , $data);
				/****IMAGE UPLOAD OF THE STUDENT*********/
				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$param2.'.jpg');				
				$this->session->set_flashdata('student_message', 'Student edited');
				redirect(base_url().'index.php/admin/students/', 'refresh');
			}
			

		}
		if($param1 == 'personal_profile')
		{
			$page_data['personal_profile']	=	true;
			$page_data['current_student_id']=	$param2;
		}
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_student_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('student_id' , $param2);
			$this->db->delete('student');
			$this->session->set_flashdata('student_message', 'Student deleted');
			redirect(base_url().'index.php/admin/students/' , 'refresh');
		}

		$page_data['page_info']	=	'Student list';
		$page_data['page_name']	=	'admin/students';
		$page_data['page_title']=	'Student list';
		$this->load->view('index' , $page_data);
	}
	

	/****MANAGE SUBJECTS*****/
	function subjects($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'subject_code',						
						'label'=>'Subject Code',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'subject_name',			
						'label'=>'Subject Name',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['subject_code']			=	$this->input->post('subject_code');
			$data['subject_name']			=	$this->input->post('subject_name');
			$data['sub_group_id']			=	$this->input->post('sub_group_id');
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW subject
			{
				$this->db->insert('subject' , $data);				
				$subject_id		=	mysql_insert_id();				
				$this->session->set_flashdata('subject_message', 'subject created');
				redirect(base_url().'index.php/admin/subjects' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING subject
			{
				$this->db->where('subject_id' , $param2);
				$this->db->update('subject' , $data);
				$this->session->set_flashdata('subject_message', 'subject edited');
				redirect(base_url().'index.php/admin/subjects/', 'refresh');
			}
			

		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_subject_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('subject_id' , $param2);
			$this->db->delete('subject');
			$this->session->set_flashdata('subject_message', 'subject deleted');
			redirect(base_url().'index.php/admin/subjects/' , 'refresh');
		}
		


		$page_data['page_info']	=	'subject list';

		$page_data['page_name']	=	'admin/subjects';
		$page_data['page_title']=	'subject list';
		$this->load->view('index' , $page_data);
	}
		
	
	/****MANAGE DISCIPLINE*****/
	function disciplines($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'student_id',						
						'label'=>'Student ',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'discipline_type',			
						'label'=>'Discipline Type',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'description',			
						'label'=>'Description',
						'rules'=>'required|xss_clean')
				);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['student_id']			=	$this->input->post('student_id');
			$data['discipline_type']	=	$this->input->post('discipline_type');
			$data['description']		=	$this->input->post('description');
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW subject
			{
				$this->db->insert('discipline' , $data);				
				$id		=	mysql_insert_id();				
				$this->session->set_flashdata('discipline_message', 'discipline case added');
				redirect(base_url().'index.php/admin/disciplines' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING subject
			{
				$this->db->where('id' , $param2);
				$this->db->update('discipline' , $data);
				$this->session->set_flashdata('discipline_message', 'discipline case edited');
				redirect(base_url().'index.php/admin/disciplines/', 'refresh');
			}
			

		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('id' , $param2);
			$this->db->delete('discipline');
			$this->session->set_flashdata('discipline_message', 'discipline case deleted');
			redirect(base_url().'index.php/admin/disciplines/' , 'refresh');
		}
		


		$page_data['page_info']	=	'discipline cases list';

		$page_data['page_name']	=	'admin/disciplines';
		$page_data['page_title']=	'discipline cases list';
		$this->load->view('index' , $page_data);
	}
	
	/*****BACKUP / RESTORE / DELETE DATA PAGE**********/
	function backup_restore($operation = '' , $type = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($operation == 'create')
		{
			$this->crud_model->create_backup($type);
		}
		if($operation == 'restore')
		{
			$this->crud_model->restore_backup();
			$this->session->set_flashdata('backup_message', 'Backup Restored');
			redirect(base_url().'index.php/admin/backup_restore/' , 'refresh');
		}
		if($operation == 'delete')
		{
			$this->crud_model->truncate($type);
			$this->session->set_flashdata('backup_message', 'Data removed');
			redirect(base_url().'index.php/admin/backup_restore/' , 'refresh');
		}
		
		$page_data['page_info']	=	'Create backup / restore from backup';
		$page_data['page_name']	=	'admin/backup_restore';
		$page_data['page_title']=	'Create backup / restore from backup';
		$this->load->view('index' , $page_data);
	}
	
	
	/******SITE ANS SYSTEM SETTINGS HERE*********/
	function settings()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		if($_POST)
		{
			$data['institute_name']		=	$this->input->post('institute_name');
			$data['address']			=	$this->input->post('address');
			$data['phone_number']		=	$this->input->post('phone_number');
			$data['page_title']			=	$this->input->post('page_title');
			$data['page_meta_tag']		=	$this->input->post('page_meta_tag');
			
			$this->db->update('settings' , $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
			$this->session->set_flashdata('settings_message', 'Settings Updated');
			redirect(base_url().'index.php/admin/settings/' , 'refresh');			
		}
		$page_data['page_info']	=	'System settings';
		$page_data['page_name']	=	'admin/settings';
		$page_data['page_title']=	'Manage system settings';
		$this->load->view('index' , $page_data);
	}
	

	////MANAGE GRADES////////

	function grades(){
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_info']	=	'Manage Grades';
		$page_data['page_name']	=	'admin/grades';
		$page_data['page_title']=	'Manage Grades';
		$this->load->view('index' , $page_data);
	}
        
        

	function submit_score(){
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_info']	=	'Submit Score';
		$page_data['page_name']	=	'admin/submit_score';
		$page_data['page_title']=	'Submit Score';
		$this->load->view('index' , $page_data);
	}

	function student_results(){
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
                
                $config=array(
				array(	'field'=>'adm_no',						
						'label'=>'Adm Number',
						'rules'=>'required|xss_clean'));
                
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
                    $page_data['page_info']	=	'Student Results';		
				$page_data['page_name']	=	'admin/view_score_student';	
				$page_data['page_title']=	'View Student results';
			$this->load->view('index', $page_data);
		}
		else{
                $page_data['adm_no'] = $this->input->post('adm_no');
		$page_data['year'] = $this->input->post('year');
		$page_data['term_id'] = $this->input->post('term_id');
		$page_data['exam_type_id'] = $this->input->post('exam_type_id');

		$page_data['page_info']	=	'View Student Results';
		$page_data['page_name']	=	'admin/student_results';
		$page_data['page_title']=	'View Student Results';

		$this->load->view('index' , $page_data);    
                }

		

	}

	


    function view_score_student(){
            if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');

          
                               $page_data['page_info']	=	'Student Results';		
				$page_data['page_name']	=	'admin/view_score_student';	
				$page_data['page_title']=	'View Student results';
			$this->load->view('index' , $page_data);
            


        }

	
	
	
	/********CHANGE PASSWORD FOR ADMIN*********/
	function change_password()
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$config=array(
				array(	'field'=>'password_old',						
						'label'=>'Current Password ',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'password_new',			
						'label'=>'New Password',
						'rules'=>'required|max_length[100]|min_length[6]|xss_clean'),
				array(	'field'=>'password_re',			
						'label'=>'Password Confirmation',
						'rules'=>'required|matches[password_new]|xss_clean')
				);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
			$page_data['page_info']	=	'Change password';
		$page_data['page_name']	=	'admin/change_password';
		$page_data['page_title']=	'Change admin password';
		$this->load->view('index' , $page_data);
		}
		else{
			$sql=$this->db->select('*')->from('admin')->where('email',$this->session->userdata('email'))->get();
			foreach($sql->result() as $my_info)
			{
				$db_password=$my_info->password;
				$db_id=$my_info->admin_id;
              }
				if($this->input->post('password_old')==$db_password){
					$fixed_pw=$this->input->post('password_new');
					$update=$this->db->query("UPDATE `admin` SET `password`='$fixed_pw' WHERE `admin_id`='$db_id'");
					$this->session->set_flashdata('change_password_message', 'Password Updated successfully!');
					redirect(base_url().'index.php/admin/change_password/' , 'refresh');
				}	
			else
			{
			$this->session->set_flashdata('change_password_message', 'Password Updated failed!');
			$page_data['page_info']	=	'Change password';
		    $page_data['page_name']	=	'admin/change_password';
		    $page_data['page_title']=	'Change admin password';
		    $this->load->view('index' , $page_data);
			}
		
	}
}
	
	
	/*********RESULTSHEET OF INDIVIDUAL STUDENTS WITH GRAPH CHART ANALYSIS************/
	function result()
	{
		$page_data['page_info']	=	'Student Result';
		$page_data['page_name']	=	'admin/result';
		$page_data['page_title']=	'Student Result';
		$this->load->view('index' , $page_data);
	}
	
 

	/****MANAGE GRADES*****/
	function submit_grades($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
                
		$config=array(
				array(	'field'=>'adm_no',						
						'label'=>'Adm Number',
						'rules'=>'required|xss_clean'),
				array(	'field'=>'score',			
						'label'=>'Score',
						'rules'=>'required|xss_clean'));
                
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['adm_no']			=	$this->input->post('adm_no');
			$data['year']			=	$this->input->post('year');
			$data['term_id']		=	$this->input->post('term_id');
			$data['exam_type_id']           =	$this->input->post('exam_type_id');			
                        $data['subject_id']             =	$this->input->post('subject_id');                                               
			$data['score']           =	$this->input->post('score');                  
                  
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW subject
			{
				$score_exists = $this->crud_model->get_score_record($data['adm_no'], $data['year'], $data['term_id'], $data['exam_type_id'], $data['subject_id']);

				if ($score_exists == FALSE){
					$this->db->insert('results' , $data);
                                        $this->session->set_flashdata('grade_message', 'Score submitted');
                                    }
				else{
                                        $this->session->set_flashdata('grade_message', '<div class="alert-error">Sorry. You cannot submit a students score twice. </br></br> pleas contact admin for permission</div>');                                       

				}                     
				
                        

				redirect(base_url().'index.php/admin/submit_score' , 'refresh');
			}
			
			

		}
		
		
		$page_data['page_info']	=	'Submit Grades';
		$page_data['page_name']	=	'admin/submit_score';
		$page_data['page_title']=	'submit Score';
		$this->load->view('index' , $page_data);
	}

	/****MANAGE CLASSES*****/
	function classes($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'class',						
						'label'=>'Class',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['class']	= $this->input->post('class');
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW CLASS
			{
				$this->db->insert('class' , $data);
				$this->session->set_flashdata('class_message', 'New class Added!');
				redirect(base_url().'index.php/admin/classes' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING CLASS
			{
				$this->db->where('class_id' , $param2);
				$this->db->update('class' , $data);
				$this->session->set_flashdata('class_message', 'Class edited');
				redirect(base_url().'index.php/admin/classes/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_class_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('class_id' , $param2);
			$this->db->delete('class');
			$this->session->set_flashdata('class_message', 'Class deleted');
			redirect(base_url().'index.php/admin/classes/' , 'refresh');
		}
		$page_data['page_info']	=	'Classes';
		
		$page_data['page_name']	=	'admin/classes';
		$page_data['page_title']=	'Classes';
		$this->load->view('index' , $page_data);
	}
        
        /****MANAGE STREAMS*****/
	function streams($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'stream',						
						'label'=>'Stream',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['stream_name']	= $this->input->post('stream');
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW CLASS
			{
				$this->db->insert('stream' , $data);
				$this->session->set_flashdata('class_message', 'New Stream Added!');
				redirect(base_url().'index.php/admin/streams' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING CLASS
			{
				$this->db->where('stream_id' , $param2);
				$this->db->update('stream' , $data);
				$this->session->set_flashdata('stream_message', 'Stream edited');
				redirect(base_url().'index.php/admin/streams/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_stream_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('stream_id' , $param2);
			$this->db->delete('stream');
			$this->session->set_flashdata('class_message', 'stream deleted');
			redirect(base_url().'index.php/admin/streams/' , 'refresh');
		}
		$page_data['page_info']	=	'STREAMS';
		
		$page_data['page_name']	=	'admin/streams';
		$page_data['page_title']=	'STREAMS';
		$this->load->view('index' , $page_data);
	}
	
         function submit_score_filter(){
            $page_data['page_info']	=	'Submit Score';
            $page_data['page_name']	=	'admin/submit_score_filter';
            $page_data['page_title']=	'submit Score';
            $this->load->view('index' , $page_data);
        }
        function submit_stream_score(){
            
            $page_data['class_id'] = $this->input->post("class_id");
            $page_data['stream_id'] = $this->input->post("stream_id");
            $page_data['exam_type_id'] = $this->input->post("exam_type_id");
            $page_data['year'] = $this->input->post("year");
            $page_data['term_id'] = $this->input->post("term_id");
            $page_data['subject_id'] = $this->input->post("subject_code");
            
            
           $page_data['page_info']	=	'Submit Stream Score';
            $page_data['page_name']	=	'admin/submit_stream_score';
            $page_data['page_title']=	'submit stream Score';
            $this->load->view('index' , $page_data); 
        }
        
        function submit_student_score(){
           $page_data['page_info']	=	'Submit Student Score';
            $page_data['page_name']	=	'admin/submit_student_score';
            $page_data['page_title']=	'submit student Score';
            $this->load->view('index' , $page_data); 
        }
        
        function stream_exam_details(){
            $page_data['page_info']	=	'Select stream details';
            $page_data['page_name']	=	'admin/stream_exam_details';
            $page_data['page_title']    =	'select stream details';
            $this->load->view('index' , $page_data); 
        }
        
        function teacher_profile(){
            $page_data['page_info']	=	'Teacher Profile';
            $page_data['page_name']	=	'admin/teacher_profile';
            $page_data['page_title']    =	'Teacher Profile';
            $this->load->view('index' , $page_data); 
        }
        
        function submit_class_results(){
            if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
              $adm_no= $this->input->post('adm_no');
              $score= $this->input->post('score');             
              $year= $this->input->post('year');
              $exam_id = $this->input->post('exam_id');
              $term_id= $this->input->post('term_id');
              $subject_id = $this->input->post('subject_id');
              $total = count($adm_no);
              for($i=0; $i<$total; $i++){
              $current_score = $score[$i];
              if($current_score==''){
                  $current_score=0;
              }
              $score_exists = $this->crud_model->check_record_exists($adm_no[$i],$year,$term_id,$exam_id,$subject_id);
                            
				if ($score_exists == FALSE){
					$this->crud_model->insert_grade($adm_no[$i],$year,$term_id,$exam_id,$subject_id,$current_score);
                                        $this->session->set_flashdata('result_message', 'Results Submitted successfully');
				}
				else{
					
                                        $this->crud_model->update_grade($adm_no[$i],$year,$term_id,$exam_id,$subject_id,$current_score); 
                                        $this->session->set_flashdata('result_message', 'Results Submitted successfully');
				}
              }
                
                $page_data['page_info']	=	'Submit Successful';
                $page_data['page_name']	=	'admin/stream_exam_details';
                $page_data['page_title']    =	'Submit Successfull';
                //$this->load->view('index' , $page_data); 
                //$this->session->set_flashdata('grade_message', 'Grades Submitted');
		            
                redirect(base_url().'index.php/admin/stream_exam_details' , 'refresh');
                
        }
        
        function view_score_class(){
            if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
                $page_data['page_info']	=	'Class Results';
		$page_data['page_name']	=	'admin/view_score_class';
		$page_data['page_title']=	'Class Results';
                $this->load->view('index',$page_data);
            
        }
        
        function class_results(){
                $page_data['class_id'] = $this->input->post('class_id');
                $page_data['exam_type_id'] = $this->input->post('exam_type_id');
                $page_data['year'] = $this->input->post('year');
                $page_data['term_id'] = $this->input->post('term_id');
                $page_data['page_info']	=	'Class Results';
		$page_data['page_name']	=	'admin/class_results';
		$page_data['page_title']=	'Class Results';                
                $this->load->view('index',$page_data);         
        }
        
        function submit_class_student(){
                $page_data['page_info']	=	'View Results';
		$page_data['page_name']	=	'admin/submit_class_student';
		$page_data['page_title']=	'View Results';                
                $this->load->view('index',$page_data);
        }
        
        
        function student_profile(){
                $page_data['email'] = $this->session->userdata('email');
                $page_data['page_info']	=	'Student Profile';
		$page_data['page_name']	=	'admin/student_profile';
		$page_data['page_title']=	'Student Profile';                
                $this->load->view('index',$page_data);
        }
        function parent_profile(){
                $page_data['email'] = $this->session->userdata('email');
                $page_data['page_info']	=	'Student Profile';
		$page_data['page_name']	=	'admin/parent_profile';
		$page_data['page_title']=	'Parent Profile';                
                $this->load->view('index',$page_data);
        }
        
        function student_view_score(){
            $page_data['email'] = $this->session->userdata('email');
                $page_data['page_info']	=	'Student Results';
		$page_data['page_name']	=	'admin/student_view_score';
		$page_data['page_title']=	'Student Results';                
                $this->load->view('index',$page_data);
        }
        
        function parent_view_score(){
            $page_data['email'] = $this->session->userdata('email');
                $page_data['page_info']	=	'Student Results';
		$page_data['page_name']	=	'admin/parent_view_score';
		$page_data['page_title']=	'Student Results';                
                $this->load->view('index',$page_data);
        }
        
//        function email(){
//            $page_data['page_info']	=	'Email';
//		$page_data['page_name']	=	'admin/email';
//		$page_data['page_title']=	'Email';                
//                $this->load->view('index',$page_data);
//        }
        
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
        
        function maximum_check($num){
            if($num>99|| $num<0){
                $this->form_validation->set_message("score","%s must be between 0 and 99");
                return FALSE;
            }
            else{
                return TRUE;
            }
            
        }
        
        function analyze_scores(){
           
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_info']	=	'Analyze Grades';
		$page_data['page_name']	=	'admin/analyze_scores';
		$page_data['page_title']=	'Analyze Grades';
		$this->load->view('index' , $page_data);
	
        }
        
        function analyze_student(){
           
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_info']	=	'Analyze Student';
		$page_data['page_name']	=	'admin/analyze_student';
		$page_data['page_title']=	'Analyze Grades';
		$this->load->view('index' , $page_data);
	
        }
        function message(){
            if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		$page_data['page_info']	=	'Message';
		$page_data['page_name']	=	'admin/message';
		$page_data['page_title']=	'Message';
		$this->load->view('index' , $page_data);
        }
        
        
        function grading_system($param1 = '' , $param2 = '')
	{
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
		
		$config=array(
				array(	'field'=>'grade_name',						
						'label'=>'Grade Name',
						'rules'=>'required|xss_clean'),
                                array(	'field'=>'grade_points',						
						'label'=>'Grade Point',
						'rules'=>'required|xss_clean'),
                                array(	'field'=>'min_score',						
						'label'=>'Minimum Score',
						'rules'=>'required|xss_clean'),
                                array(	'field'=>'max_score',						
						'label'=>'Maximum Score',
						'rules'=>'required|xss_clean'),
                                array(	'field'=>'comment',						
						'label'=>'Comment',
						'rules'=>'required|xss_clean'));
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
		}
		else
		{
			$data['name']	= $this->input->post('grade_name');
                        $data['grade_point']	= $this->input->post('grade_points');
                        $data['mark_from']	= $this->input->post('min_score');
                        $data['mark_upto']	= $this->input->post('max_score');
                        $data['comment']	= $this->input->post('comment');
			
			
			if($this->input->post('operation') == 'create')		/////CREATING NEW CLASS
			{
				$this->db->insert('grade' , $data);
				$this->session->set_flashdata('grade_message', 'New grade Added!');
				redirect(base_url().'index.php/admin/grading_system' , 'refresh');
			}
			if($this->input->post('operation') == 'edit')		/////EDITING AN EXISTING CLASS
			{
				$this->db->where('grade_id' , $param2);
				$this->db->update('grade' , $data);
				$this->session->set_flashdata('grade_message', 'Grade edited');
				redirect(base_url().'index.php/admin/grading_system/'.$param1.'/'.$param2 , 'refresh');
			}
		}
		
		if($param1 == 'edit')
		{
			$page_data['edit']	=	true;
			$page_data['edit_grade_id']	=	$param2;
		}
		if($param1 == 'delete')
		{
			$this->db->where('grade_id' , $param2);
			$this->db->delete('grade');
			$this->session->set_flashdata('grade_message', 'grade deleted');
			redirect(base_url().'index.php/admin/grading_system/' , 'refresh');
		}
		$page_data['page_info']	=	'STREAMS';
		
		$page_data['page_name']	=	'admin/grading_system';
		$page_data['page_title']=	'Grading System';
		$this->load->view('index' , $page_data);
	}
        
        function student_analysis(){
                $page_data['class_id'] = $this->input->post('class_id');
                $page_data['exam_type_id'] = $this->input->post('exam_type_id');
                $page_data['year'] = $this->input->post('year');
                $page_data['term_id'] = $this->input->post('term_id');
                
                $page_data['page_info']	=	'Score Analysis';		
		$page_data['page_name']	=	'admin/student_analysis';
		$page_data['page_title']=	'Score Analysis';
		$this->load->view('index' , $page_data);
            
        }
        
        function tables(){
            $page_data['page_info']	=	'Results';		
		$page_data['page_name']	=	'admin/tables';
		$page_data['page_title']=	'Score Analysis';
		$this->load->view('index',$page_data);
        }
       function class_reports(){
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
                
                $config=array(
				array(	'field'=>'class_id',						
						'label'=>'Class',
						'rules'=>'required|xss_clean'));
                
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
                    $page_data['page_info']	=	'Class Reports';		
				$page_data['page_name']	=	'admin/view_class_reports';	
				$page_data['page_title']=	'View Class Reports';
			$this->load->view('index', $page_data);
		}
		else{
                $page_data['class_id'] = $this->input->post('class_id');
		$page_data['year'] = $this->input->post('year');
		$page_data['term_id'] = $this->input->post('term_id');
		$page_data['exam_type_id'] = $this->input->post('exam_type_id');

		$page_data['page_info']	=	'View Student Results';
		$page_data['page_name']	=	'admin/class_reports';
		$page_data['page_title']=	'View Student Results';

		$this->load->view('index' , $page_data);    
                }

		

	}

        
               
        function view_class_reports(){
		if($this->session->userdata('admin_login') != 1)redirect(base_url() , 'refresh');
                
                $config=array(
				array(	'field'=>'class_id',						
						'label'=>'Adm Number',
						'rules'=>'required|xss_clean'));
                
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		if($this->form_validation->run() == false)
		{
                    $page_data['page_info']	=	'Student Results';		
				$page_data['page_name']	=	'admin/view_class_reports';	
				$page_data['page_title']=	'View Student Reports';
			$this->load->view('index', $page_data);
		}
		else{
                $page_data['adm_no'] = $this->input->post('class_id');
		$page_data['year'] = $this->input->post('year');
		$page_data['term_id'] = $this->input->post('term_id');
		$page_data['exam_type_id'] = $this->input->post('exam_type_id');

		$page_data['page_info']	=	'View Student Results';
		$page_data['page_name']	=	'admin/view_class_reports';
		$page_data['page_title']=	'View Student Reports';

		$this->load->view('index' , $page_data);    
                }

		

	}

	
        
  

}

