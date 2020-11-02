<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

	//Login
	function admin_login($email , $password)
	{
	$query = $this->db->get_where('admin', array('email'	=> $this->input->post('email'),
				'password'	=> $this->input->post('password')));
	if($query->num_rows()>0)
            {
                $row   = $query->row();
                $this->session->set_userdata('admin_login','1');           
                $this->session->set_userdata('login_type','admin');
                $this->session->set_userdata('admin_id',$row->admin_id);
                $this->session->set_userdata('level',$row->level);
                return TRUE;
            }
         else
            {
                return FALSE;
            }
	}

	////MANAEG EXAM//////
	function get_exam_type(){
		$query = $this->db->query("SELECT * FROM exam");
		return $query->result_array();
	}

	//Access system settings
	
	function get_settings()
	{
		$query	=	$this->db->get('settings' );
		return $query->result_array();
	}



	
	/////////TEACHER/////////////
        
        function get_teacher($email){
            $query	=	$this->db->get_where('teacher' , array('email' => $email));
            return	$query->result_array();
        }
        function get_teachers()
	{
		$query	=	$this->db->get('teacher' );
		return $query->result_array();
	}
	function get_teacher_name($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		$res	=	$query->result_array();
		foreach($res as $row)
			return $row['name'];
	}
	function get_teacher_info($teacher_id)
	{
		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));
		return $query->result_array();
	}

	/////////STUDENTS///////////
	function get_students()
	{
		$query	= $this->db->query('select s.student_id, s.adm_no, s.fname, s.lname,s.email, s.gender,s.religion,(YEAR(doa)-YEAR(dob)) Age,s.parent_name,s.parent_contact,s.kcpe_marks, c.class, t.stream_name FROM student s, class c, stream t WHERE s.class_id=c.class_id AND s.stream_id = t.stream_id');
		return $query->result_array();
	}
	
	function get_student_info($student_id)
	{
		$query =  $this->db->query("select s.student_id, s.adm_no, s.fname, s.lname, s.dob, s.doa, s.gender, s.religion,c.class, t.stream_name, s.kcpe_marks,s.parent_name, s.parent_contact,s.disability,s.special_condition FROM student s, class c, stream t WHERE s.class_id = c.class_id AND s.stream_id = t.stream_id AND s.student_id={$student_id}");
		return $query->result_array();
	}

	function get_student_details($adm_no){
		$query =  $this->db->query("select s.adm_no, s.fname, s.lname, c.class, t.stream_name FROM student s, class c, stream t WHERE s.class_id = c.class_id AND s.stream_id = t.stream_id AND s.adm_no={$adm_no}");
		return $query->result_array();
	}

	function get_student_results($adm_no,$year,$term_id,$exam_type_id){	
                $query =  $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) BS,

  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where s.adm_no=$adm_no and r.term_id=$term_id and r.exam_type_id=$exam_type_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no ");
		return $query->result_array();
	}

	function display_students($class_id, $stream_id)
	{
		$query	= $this->db->query('SELECT adm_no FROM student WHERE class_id = '.$class_id.' and stream_id = '.$stream_id);
                return $query->result_array();
	}
        function get_students_class($class_id,$year,$term_id,$exam_type_id){
           //$query =  $this->db->query("select * from scores where class_id=$class_id AND year=$year AND term_id=$term_id AND exam_type_id=$exam_type_id order by total desc");
            $query =  $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) BS,

  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where r.term_id=$term_id and r.exam_type_id=$exam_type_id and s.class_id=$class_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc");
		return $query->result_array();
            
        }
	/////////////// DISCIPLINE///////////////
function get_disciplines()
	{
		$query	= $this->db->query('select id, discipline_type, description,adm_no,fname,lname from discipline a, student b where a.student_id= b.student_id');
		return $query->result_array();
	}
		function get_discipline_info($id)
	{
		$query=$this->db->get_where('discipline' , array('id' => $id));
		return $query->result_array();
	}

	//////////SUBJECT/////////////
	function get_subjects()
	{
		$query	= $this->db->query('select subject_id, subject_code, subject_name, group_name from subject a, subject_group b where a.sub_group_id= b.group_id');
		return $query->result_array();
	}	
	function get_subject_info($subject_id)
	{
		//$query	=	$this->db->get_where('subject' , array('subject_id' => $subject_id));
		$query = $this->db->query('select subject_id, subject_code, subject_name, group_name from subject a, subject_group b where a.sub_group_id= b.group_id AND subject_id = '.$subject_id);
		return $query->result_array();
	}
        function get_subject_name($subject_id){
            $query = $this->db->query('select subject_name from subject where subject_id = '.$subject_id);
            return $query->result_array();
        }
                
	function get_classes()
	{
		$query	=	$this->db->get('class');
		return $query->result_array();
	}	
	function get_Streams(){
		$query = $this->db->get('stream');
		return $query->result_array();
	}
        function get_grades(){
		$query = $this->db->get('grade');
		return $query->result_array();
	}
	
	function get_subject_group()
	{
		$query	=	$this->db->get('subject_group' );
		return $query->result_array();
	}	
	function get_class_info($class_id)
	{
		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));
		return $query->result_array();
	}

        function get_stream_inf($stream_id)
	{
		$query	=	$this->db->get_where('stream' , array('stream_id' => $stream_id));
		return $query->result_array();
	}
         function get_grade_info($grade_id)
	{
		$query	=	$this->db->get_where('grade' , array('grade_id' => $grade_id));
		return $query->result_array();
	}
                
        function get_stream_details($class_id,$stream_id){
            $query = $this->db->query("SELECT * FROM student s, class c, stream t where s.class_id={$class_id} AND s.stream_id={$stream_id} AND s.class_id=c.class_id AND s.stream_id=t.stream_id");
            return $query->result_array();
        }
        
        function get_stream_info($class_id,$stream_id,$term_id, $exam_type_id, $subject_id){
    $query = $this->db->query("SELECT * FROM student s, class c, stream t, term m, exam x, subject b where s.class_id={$class_id} AND s.stream_id={$stream_id} AND m.term_id={$term_id}
AND x.exam_id={$exam_type_id} AND b.subject_code={$subject_id} AND s.class_id=c.class_id AND s.stream_id=t.stream_id LIMIT 1");
            return $query->result_array();
        }
                
        function get_score_record($adm_no, $year, $term_id, $exam_type_id, $subject_id){
         $query = $this->db->query("SELECT * FROM results WHERE adm_no =$adm_no AND year=$year AND term_id=$term_id AND exam_type_id=$exam_type_id AND subject_id=$subject_id");        

         if($query->num_rows() > 0){
         	return TRUE;
         }
         else{
         	return FALSE;
         }
          
        }

	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}
	

	///MANAGE TERMS////
	function get_terms(){
		$query	=	$this->db->get('term' );
		return $query->result_array();
	}

	function get_grade($value){
	$query=$this->db->query("SELECT name,grade_point, comment FROM  grade WHERE $value>= mark_from AND $value<= mark_upto");
		return $query->result_array();
	}
		              
              
        function insert_grade($adm_no,$year,$term_id,$exam_type_id,$subject_id,$score){
            $this->db->query("INSERT INTO results (adm_no, year, term_id, exam_type_id, subject_id, score) VALUES($adm_no,$year,$term_id,$exam_type_id,$subject_id,$score)");
            
        }
        
        
        function check_record_exists($adm_no,$year,$term_id,$exam_type_id,$subject_id){
         $query = $this->db->query("SELECT * FROM results WHERE adm_no={$adm_no} AND year={$year} AND term_id={$term_id} AND exam_type_id={$exam_type_id} AND subject_id={$subject_id}");
         if($query->num_rows() > 0){
         	return TRUE;
         }
         else{
         	return FALSE;
         }
          
        }
        function update_grade($adm_no,$year,$term_id,$exam_type_id,$subject_id,$score){
            $this->db->query("UPDATE results SET score = {$score} WHERE adm_no={$adm_no} AND year={$year} AND term_id={$term_id} AND exam_type_id={$exam_type_id} AND subject_id={$subject_id}");
            
        }        

        function getUserRank($adm_no,$term_id,$year,$exam_type_id,$class_id){
           $query = "select adm_no, total, @rnk:=IF(@prev_val=total,@rnk,@rnk+1) as rnk
                        from scores,(select @rnk:=0) as r where adm_no=$adm_no AND year=$year AND term_id=$term_id AND exam_type_id=$exam_type_id order by total desc ";
           return $query->result_array();
        }
        
        
        function get_exam_details($class_id,$exam_type_id,$term_id,$year){
            $query = "select e.exam_name, c.class, j.term_name,year  
from results r, student s, class c, stream t, exam e, term j where s.class_id=4 AND r.term_id=1 and r.exam_type_id=101 and `year`=2014 AND r.adm_no = s.adm_no AND r.term_id = j.term_id AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no Limit 1";
            return $query->result_array();
        }
        
        function get_student_information($adm_no){
            $query = "select s.student_id, s.adm_no, s.fname, s.lname, s.dob, s.doa, s.gender, s.religion, c.class, t.stream_name, s.parent_name,s.parent_contact, s.disability,s.special_condition FROM student s, class c, stream t WHERE s.class_id = c.class_id AND s.stream_id = t.stream_id AND s.adm_no={$adm_no}";
        }
        
        ////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else if($type == 'student')
		{
			$tables = array('tables'	=>	array('student'));
			$file_name	=	'student_personal_information';
		}
		else if($type == 'results')
		{
			$tables = array('tables'	=>	array('results'));
			$file_name	=	'student_academic_result';
		}
		else if($type == 'teacher')
		{
			$tables = array('tables'	=>	array('teacher'));
			$file_name	=	'teacher_personal_information';
		}
		else if($type == 'subject')
		{
			$tables = array('tables'	=>	array('subject'));
			$file_name	=	'subject_information';
		}
		else if($type == 'class')
		{
			$tables = array('tables'	=>	array('class'));
			$file_name	=	'class_information';
		}
                else if($type == 'student_subjects')
		{
			$tables = array('tables'	=>	array('student_subjects'));
			$file_name	=	'student_subjects';
		}
                
                
		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
        
        /////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
			$this->db->truncate('student');
			$this->db->truncate('exam');
			$this->db->truncate('teacher');
			$this->db->truncate('subject');
			$this->db->truncate('class');
			$this->db->truncate('grade');
			$this->db->truncate('stream');
                        $this->db->truncate('parent');
                        $this->db->truncate('term');
                        $this->db->truncate('results');
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
        function get_top_student($class_id,$term_id,$exam_type_id,$year){
            $query = $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) BS,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where r.term_id=1 and r.exam_type_id=$exam_type_id and s.class_id=$class_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc LIMIT 1");
                
		return $query->result_array();
        }
 
        function get_top_three($class_id,$term_id,$exam_type_id,$year){
            $query = $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) Home_Science,
  sum(case when `subject_id`='12' then score else 0 end) Art_And_Craft,
  sum(case when `subject_id`='13' then score else 0 end) CS,
  sum(case when `subject_id`='14' then score else 0 end) BS,
  sum(case when `subject_id`='15' then score else 0 end) Music,
  sum(case when `subject_id`='16' then score else 0 end) French,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where r.term_id=1 and r.exam_type_id=$exam_type_id and s.class_id=$class_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc LIMIT 3");
                
		return $query->result_array();
        }

    function get_top_ten($class_id,$term_id,$exam_type_id,$year){
            $query = $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) Home_Science,
  sum(case when `subject_id`='12' then score else 0 end) Art_And_Craft,
  sum(case when `subject_id`='13' then score else 0 end) CS,
  sum(case when `subject_id`='14' then score else 0 end) BS,
  sum(case when `subject_id`='15' then score else 0 end) Music,
  sum(case when `subject_id`='16' then score else 0 end) French,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where r.term_id=1 and r.exam_type_id=$exam_type_id and s.class_id=$class_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total desc LIMIT 10");
                
		return $query->result_array();
        }
    function get_last_ten($class_id,$term_id,$exam_type_id,$year){
            $query = $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) Home_Science,
  sum(case when `subject_id`='12' then score else 0 end) Art_And_Craft,
  sum(case when `subject_id`='13' then score else 0 end) CS,
  sum(case when `subject_id`='14' then score else 0 end) BS,
  sum(case when `subject_id`='15' then score else 0 end) Music,
  sum(case when `subject_id`='16' then score else 0 end) French,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where r.term_id=1 and r.exam_type_id=$exam_type_id and s.class_id=$class_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no order by total asc LIMIT 10");
                
		return $query->result_array();
        }
        
       function get_class_results($class_id,$year,$term_id,$exam_type_id){	
                $query =  $this->db->query("select s.fname, s.lname, e.exam_name,c.class_id, c.class, t.stream_name,
	r.adm_no,r.exam_type_id,r.term_id,`year`,
  sum(case when `subject_id`=1 then score else 0 end)English,
  sum(case when `subject_id`=2 then score else 0 end)Kiswahili,
  sum(case when `subject_id`='3' then score else 0 end) Mathematics,
  sum(case when `subject_id`='4' then score else 0 end) Chemistry,
  sum(case when `subject_id`='5' then score else 0 end) Biology,
  sum(case when `subject_id`='6' then score else 0 end) Physics,
  sum(case when `subject_id`='7' then score else 0 end) Geography,
  sum(case when `subject_id`='8' then score else 0 end) History,
  sum(case when `subject_id`='9' then score else 0 end) CRE,
  sum(case when `subject_id`='10' then score else 0 end) Agriculture,
  sum(case when `subject_id`='11' then score else 0 end) Home_Science,
  sum(case when `subject_id`='12' then score else 0 end) Art_And_Craft,
  sum(case when `subject_id`='13' then score else 0 end) CS,
  sum(case when `subject_id`='14' then score else 0 end) BS,
  sum(case when `subject_id`='15' then score else 0 end) Music,
  sum(case when `subject_id`='16' then score else 0 end) French,
  (SUM(score)) Total
  
  
  
from results r, student s, class c, stream t, exam e where s.class_id=$class_id and r.term_id=$term_id and r.exam_type_id=$exam_type_id and `year`=$year AND r.adm_no = s.adm_no AND s.class_id = c.class_id AND s.stream_id = t.stream_id AND r.exam_type_id = e.exam_id
group by r.adm_no ");
		return $query->result_array();
	}
    
        
}
