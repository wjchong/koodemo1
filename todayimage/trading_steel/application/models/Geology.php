<?php

class Geology extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getMembers($table, $where = '', $array = false, $order_by = '') {

        if (!empty($where))
            $this->db->where($where);
             $query = $this->db->get($table);

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

    
}

?>