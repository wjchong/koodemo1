<?php
class Master extends CI_Model {
  public function __construct() {
    $this->load->database();
    }

    public function getRow($table, $where = '', $array = false, $order_by = '') {

        if (!empty($where))
            $this->db->where($where);
             $query = $this->db->get($table);
                  //print_r($array);
            if ($array):

                if (!empty($order_by)):
                    $this->db->order_by("id", $order_by);
                endif;
                return (array) $query->row();
            else:
                if (!empty($order_by)):
                    $this->db->order_by("id", $order_by);
                endif;

                return $query->row();
            endif;
			
    }

    public function getRows($table, $where = '', $start = '', $offset = '', $order_by = '') {

        if (!empty($where))
            $this->db->where($where);

        if (!empty($offset)):
            $this->db->limit($offset, $start);
        endif;
        if (!empty($order_by)):
            $this->db->order_by("id", $order_by);
        endif;

        $query = $this->db->get($table);
        return $query->result();
    }

    public function getRowsArray($table, $where = '', $offset = '', $start = '') {
        if (!empty($where))
            $this->db->where($where);

        if (!empty($offset))
            $this->db->limit($offset, $start);

        $query = $this->db->get($table);

        return $query->result_array();
    }

    public function save($table, $vals, $field = '', $id = '') {
	
        $this->db->set($vals);
        if(!empty($id)) {
            $this->db->where($field, $id);
            $this->db->update($table);
	 
			  return $id;
			
        } else {
            $query = $this->db->insert($table);
            return $this->db->insert_id();
        }
    }
	
	 public function add_role($vals) {
       $this->db->insert('tbl_assist_type', $vals);
       
    }
	
	 public function update_role($id,$vals) {
		 echo $id;
		 //print_r($vals);
		 $this->db->where('id', $id); 
       $this->db->update('tbl_assist_type', $vals);
       
    }

	public function view_assist_type()  
      {  
         //data is retrive from this query  
        $query = $this->db->query("SELECT * FROM `tbl_assist_type`");  
   
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	  
	 /* public function getv_assist_type()  
      {  
         //data is retrive from this query  
		
        $query = $this->db->query("SELECT id,assist_type FROM `tbl_assist_type`");  
             
		 $data = $query->result_array();		
		 
		return $data;
		 
      } */
	  
	  public function edit_assist_type($id)  
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM `tbl_assist_type` where id='".$id."'");  
        
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	  
	  public function add_assistant($vals) {
       $this->db->insert('tbl_admin', $vals);
       
    }
	
	public function view_assistant($member_id)  
      {  
         //data is retrive from this query  
		
		 //echo "SELECT * FROM `tbl_admin` where id!='".$member_id."'";
        $query = $this->db->query("SELECT * FROM `tbl_admin` where id!='".$member_id."'");  
   
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	  
	    public function block_assistant($table, $vals, $field = '', $id = '') {
	      //$vl=$vals['locked'];
        //$this->db->set($vals);
        if(!empty($id)) {
            //$this->db->where($field, $id);
            //$this->db->update($table);
			$query = $this->db->query("UPDATE tbl_admin SET locked='".$vals."' where id='".$id."'");  
			//$this->db->where('id', $id);
//$this->db->update('tbl_admin', $vals);
	 
			  return $id;
			
        } else {
            $query = $this->db->insert($table);
            return $this->db->insert_id();
        }
    }
	
	public function edit_assistant($id)  
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM `tbl_admin` where id='".$id."'");  
        
		 $data = $query->result_array();		
		 
		return $data;
		 
      }
	  
	   public function update_assistant($id,$vals) {
		
		 print_r($vals);
		 $this->db->where('id', $id); 
       $this->db->update('tbl_admin', $vals);
       
    }

	
	
	/*Start vendor*/
	
	
	 public function add_category($vals) {
       $this->db->insert('tbl_category', $vals);
       
    }
	
	 public function update_category($id,$vals) {
		 echo $id;
		 //print_r($vals);
		 $this->db->where('id', $id); 
       $this->db->update('tbl_category', $vals);
       
    }

	public function view_category()  
      {  
         //data is retrive from this query  
        $query = $this->db->query("SELECT * FROM `tbl_category`");  
   
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	  
	 /* public function getv_assist_type()  
      {  
         //data is retrive from this query  
		
        $query = $this->db->query("SELECT id,assist_type FROM `tbl_assist_type`");  
             
		 $data = $query->result_array();		
		 
		return $data;
		 
      } */
	  
	  public function edit_category($id)  
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM `tbl_category` where id='".$id."'");  
        
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	
	public function add_vendor($vals) {
       $this->db->insert('tbl_vendor', $vals);
       
    }
	  
    public function delete($table, $field = '', $where = '') {
        if (!empty($where)) {
            $this->db->where_in($field, $where);
        }
        $this->db->delete($table);
    }

	public function view_vendor()  
      {  
         //data is retrive from this query  
		
		 //echo "SELECT * FROM `tbl_admin` where id!='".$member_id."'";
        $query = $this->db->query("SELECT * FROM `tbl_vendor`");  
   
		 $data = $query->result_array();		
		 
		return $data;
		 
      } 
	  
	    public function block_vendor($table, $vals, $field = '', $id = '') {
	      //$vl=$vals['locked'];
        //$this->db->set($vals);
        if(!empty($id)) {
            //$this->db->where($field, $id);
            //$this->db->update($table);
			$query = $this->db->query("UPDATE tbl_vendor SET locked='".$vals."' where id='".$id."'");  
			//$this->db->where('id', $id);
//$this->db->update('tbl_admin', $vals);
	 
			  return $id;
			
        } else {
            $query = $this->db->insert($table);
            return $this->db->insert_id();
        }
    }
	
	public function edit_vendor($id)  
      {  
         //data is retrive from this query  
         $query = $this->db->query("SELECT * FROM `tbl_vendor` where id='".$id."'");  
        
		 $data = $query->result_array();		
		 
		return $data;
		 
      }
	  
	   public function update_vendor($id,$vals) {
		
		 //print_r($vals);
		 $this->db->where('id', $id); 
       $this->db->update('tbl_vendor', $vals);
       
    }
	
	 public function add_permission($vals) {
       $this->db->insert('tbl_permission', $vals);
       
    }
	
	
	
	
	public function get_permission($member_id){
		//echo "SELECT * FROM `tbl_permission` where assist_id='".$member_id."'";
		$query = $this->db->query("SELECT * FROM `tbl_permission` where assist_id='".$member_id."'");
		 $data = $query->result_array();		
		 
		return $data;
		
	}
	
	public function get_profile($member_id){
		//echo "SELECT * FROM `tbl_permission` where assist_id='".$member_id."'";
		$query = $this->db->query("SELECT * FROM `tbl_admin` where id='".$member_id."'");
		 $data = $query->result_array();		
		 
		return $data;
		
	}
	
	   public function profile_update($id,$vals){
		   print_r($id);
		 $this->db->where('id', $id); 
       $this->db->update('admin', $vals);
       
    }
	
	/*public function get_permission_data($member_id){
		//echo "SELECT * FROM `tbl_permission` where assist_id='".$member_id."'";
		echo "SELECT * FROM `tbl_permission` where assist_id='".$member_id."'";
		$query = $this->db->query("SELECT * FROM `tbl_permission` where assist_id='".$member_id."'");
		 $data = $query->result_array();		
		 
		return $data;
		
	}*/
    public function num_rows($table, $where = '') {
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function last_query() {

        return $this->db->last_query();
    }

    public function last_id() {

        return $this->db->insert_id();
    }

    public function last_row($table, $where = '') {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->order_by('id', "desc");
        $this->db->limit(1);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function query($query, $array = false) {
        $query = $this->db->query($query);
        if ($array) {

            return $query->result_array();
        } else {
            return $query->result();
        }
    }

	public function GetBalance($id)
	{
		$query = $this->db->query("SELECT SUM(balance) as blnc FROM `tbl_user_wallet_blnc` WHERE user_id = $id");
		$query_w = $this->db->query("SELECT SUM(withdraw_balance) as blnc FROM `tbl_user_wallet_withdraw` WHERE user_id = $id");

		$row = $query->result_array();
		$row_w = $query_w->result_array();
		$balance = $row[0]['blnc'];
		$balance_w = $row_w[0]['blnc'];

		$total = $balance-$balance_w;
		return $total;
	}
	public function GetWalletData($id)
	{
			// $query = $this->db->query("SELECT t2.*,t1.* FROM `tbl_user_wallet_blnc` as t2,`tbl_user_wallet_withdraw` as t1 WHERE t2.user_id=$id and t1.user_id=$id ORDER BY t2.date_created");	
		
		$query = $this->db->query("select balance as amount,date_created as date1,comments as comments,null as way from tbl_user_wallet_blnc where user_id=$id  UNION ALL select withdraw_balance as amount,date_created as date1,null as comments,way as way   from `tbl_user_wallet_withdraw` where user_id=$id");

		/*
		SELECT id as id, NULL as title, NULL as body, downloads as downloads, 
		  views as views, created as created, 'foo' as table_name
		FROM foo
		UNION ALL
		SELECT NULL as id, title as title, body as body, NULL as downloads, 
		  NULL as views, created as created, 'bar' as table_name
		FROM bar
		ORDER BY created ASC
		*/
		$data = $query->result_array();		
		 
		return $data;
	}
	public function GetBlockWallet($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_user_wallet_block');
		$this->db->where('status','1');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

 	public function GetWalletTotal($id)
	{
		$query = $this->db->query("SELECT SUM(balance) as blnc FROM `tbl_user_wallet_blnc` WHERE user_id = $id");
		
		$row = $query->result_array();
		$totals = $row[0]['blnc'];
		return $totals;
	}

	public function Getpayout()
	{
		$query = $this->db->query("SELECT t1.*,t2.* FROM `tbl_user_wallet_withdraw`as t1 join `tbl_members` as t2 ON t2.id = t1.user_id WHERE t1.way='mywallet'");
		$row = $query->result_array();
		return $row;
	}

	public function getWithdrawltime($id)
	{
		$query = $this->db->query("SELECT * from `tbl_user_wallet_withdraw` where  user_id=".$id." ORDER by ID desc");
		$row = $query->result_array();
		return $row;
	}
	public function AddPack($datanew)
	{
		return $this->db->insert('tbl_package',$datanew);
	}
	public function UpdatePack($datanew,$id)
	{
		$this->db->where("id",$id);
		return $this->db->update('tbl_package',$datanew);
	}
	public function ticketInsert($datanew, $datanewmsg)
	{
		$query1 = $this->db->insert('tbl_tickets',$datanew);
		$query2 = $this->db->insert('tbl_message',$datanewmsg);
		return array($query1,$query2);
	}
	//get Ticket userside
	public function fatchTicket($userid) {
		$this->db->select("*");
		$this->db->from("tbl_tickets");
		$this->db->where("uid",$userid);
		$query=$this->db->get();
		return $query->result_array();
	}
	//get Ticket adminside
	public function fatchAllTicket() {
		$this->db->select("*");
		$this->db->from("tbl_tickets");
		$query=$this->db->get();
		return $query->result_array();
	}
	//get replay tickets record
	public function getreplay($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_tickets");
		$this->db->where("id",$id);
		$query=$this->db->get();
		return $query->row_array();
	}
	public function viewTicket($ticketid)
	{
		$this->db->select('tbl_tickets.*,tbl_message.*');
		$this->db->from('tbl_tickets');
		$this->db->join('tbl_message', 'tbl_tickets.ticketid = tbl_message.ticketid');
		$this->db->where("tbl_tickets.ticketid",$ticketid);
		$query=$this->db->get();
		return $query->result_array();
		
	}
	//get payout history userside
	public function GetPayHistory($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_payout_history");
		$this->db->where("member_id",$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	//get Comissions history userside
	public function GetComHistory($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_comissions");
		$this->db->where("member_id",$id);
		$query=$this->db->get();
		return $query->result_array();
	}
	//get order history userside
	public function GetOrderHistory($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_transactions");
		$this->db->where("mem_id",$id);
		$this->db->join("tbl_package", "tbl_transactions.package_id= tbl_package.id");
		$query=$this->db->get();
		return $query->result_array();
	}
	//share withdraw
	public function AddShareWithdraw($datanew)
	{
		return $this->db->insert('tbl_user_wallet_withdraw',$datanew);
	}
	public function addMsg($datanew)
	{
		return $this->db->insert('tbl_message',$datanew);
	}
	public function updateTicketStatus($datanew,$statusid)
	{
		$this->db->where('id', $statusid);
		return $this->db->update('tbl_tickets', $datanew);
	}
	
}

?>