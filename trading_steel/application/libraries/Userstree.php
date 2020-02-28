<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Parentchild
 *
 * Version: 1.0
 *
 * Author: Srikanth P
 * Email: ponnuru.srikanth@gmail.com
 *    

 *
 */
class Userstree {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->database();
    }

    //properties which hold database and table related information  : start 	
    var $db_table;
    var $item_identifier_field_name;  //may be the primary key of the table : as decided by the db designer 
    var $parent_identifier_field_name; //the fileld name in the table which holds the value of the item_identifier_field_name any item's parent	: as decided by the db designer
    var $item_list_field_name; //field name in the table whose value will be shown in the list or tree (like name or any id etc.) : as choosen by the programmer 
    var $extra_condition;  //if any extra condition should be added with the query : as desided by the programmer 
    var $order_by_phrase = "";  //if any order by phrase should be added with the query : as desided by the programmer 
    //properties which hold database and table related information  : end
    
    var $level_identifier = "  ";  //no. of level of any item as per the generated tree : it will appear number of level times before the item in the list/tree
    var $item_pointer = "|-";
    var $all_childs = array(); //contains the entire tree or list starting from a given root element
	var $all_parents = array();
    var $item_path = array(); //contains the total path of a given element/node(the list of elements starting from the top level root node to the given element/node)

    public function getAllChilds($Parent_ID, $level_identifier = "", $start = true) { // get all the childs of all the levels under a parent as a tree		
        $immediate_childs = $this->getImmediateChilds($Parent_ID, $this->extra_condition, $this->order_by_phrase);
        if (count($immediate_childs)) {
            foreach ($immediate_childs as $chld) {
                $chld[$this->item_list_field_name] = $level_identifier . $this->item_pointer . $chld[$this->item_list_field_name];
                array_push($this->all_childs, $chld);
                $this->getAllChilds($chld[$this->item_identifier_field_name], ($level_identifier . $this->level_identifier), false);
            }
        }
        if ($start) {
            return $this->all_childs;
        }
    }

    private function getImmediateChilds($parent_identifier_field_value, $extra_condition, $order_by_phrase = "") { // get only the direct/immediate childs under a parent 
        $sql = "SELECT * FROM `" . $this->db_table . "` WHERE `" . $this->parent_identifier_field_name . "`='" . $parent_identifier_field_value . "' " . $extra_condition . " " . $order_by_phrase;
        $res = $this->CI->db->query($sql);
        $childs = $res->result_array();        
        return $childs;
    }

    public function getItemPath($item_id, $start = true) { //returns the total path of a given item/node(the list of elements starting from the top level root node to the given item/node)
        if ($item_id != 0) {
            $sql = "SELECT * FROM `" . $this->db_table . "` WHERE `" . $this->item_identifier_field_name . "`='" . $item_id . "' ";
            $res = $this->CI->db->query($sql);
            $itemdata = $res->row_array();
            array_push($this->item_path,$itemdata);

            if ($itemdata[$this->parent_identifier_field_name] != 0) {
                $this->item_path = $this->getItemPath($itemdata[$this->parent_identifier_field_name], false);
            }
            if ($start) {
                $this->item_path = array_reverse($this->item_path);
            }
        }
        return $this->item_path;
    }

	public function getAllParents($Parent_ID, $level_identifier = "", $start = true,$mainId){
		 $immediate_parents = $this->getImmediateParents($Parent_ID, $this->extra_condition, $this->order_by_phrase);
 		  if (count($immediate_parents)) {
            foreach ($immediate_parents as $parents) {
 				 
					$parents[$this->item_list_field_name] = $level_identifier . $this->item_pointer . $parents[$this->item_list_field_name];
					 
					//if($mainId !=$parents[$this->parent_identifier_field_name]){
 						array_push($this->all_parents, $parents);
					// }
                $this->getAllParents($parents[$this->item_identifier_field_name], ($level_identifier . $this->level_identifier), false,$mainId);
            }
        }
         if ($start) {
            return $this->all_parents;
        }


	}

	private function getImmediateParents($parent_identifier_field_value, $extra_condition, $order_by_phrase = "") { // get only the direct/immediate childs under a parent 
        $sql = "SELECT * FROM `" . $this->db_table . "` WHERE `" . $this->parent_identifier_field_name . "`='" . $parent_identifier_field_value . "' " . $extra_condition . " " . $order_by_phrase;
        $res = $this->CI->db->query($sql);
        $parents = $res->result_array();        
        return $parents;
    }

}

/* End of file Parentchild.php */
/* Location: ./application/libraries/Parentchild.php */
