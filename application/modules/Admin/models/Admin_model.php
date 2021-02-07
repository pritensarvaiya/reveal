<?php 

class Admin_model extends CI_model {

    public function myQuery($query) {
        return $this->db->query($query)->result_array();

    }
    public function insertData($table_name,$user_data) {
        $this->db->insert($table_name,$user_data);
        return 1;
    }
    public function fatchAll($table_name) {
        return $this->db->get($table_name)->result_array();
    }
    public function fatchOne($table_name,$column_name,$column_value) {
        $this->db->where($column_name,$column_value);
        return $this->db->get($table_name)->row_array();
    }
    public function updateData($table_name,$column_name,$id,$user_data) {
        $this->db->where($column_name,$id);
        $this->db->update($table_name,$user_data);
        return 1;
    }
    public function deleteData($table_name,$column_name,$id) {
        $this->db->where($column_name,$id);
        $this->db->delete($table_name);
        return 1;
    }

}