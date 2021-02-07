<?php 

class Home_model extends CI_model {

    public function insertData($table_name,$user_data) {
        $this->db->insert($table_name,$user_data);
        return 1;
    }

}

?>