<?php
if(!class_exists('MasterModel')) {
    Class MasterModel extends MY_Model {
        public function __construct() {
            parent::__construct();
        }

        public function count() {
            $this->db->select('*');
            $this->db->from($this->table);
            $query = $this->db->get();

            return $query->num_rows();
        }

        public function where($column,$value) {
            $this->db->where($column,$value);

            return $this;
        }

        public function whereLike($column,$value) {
            $this->db->where($column . ' like ', '%'.$value.'%');

            return $this;
        }

        public function orWhere($conditions) {
            $this->db->group_start();

            foreach ($conditions as $key => $value) {
                $this->db->or_where($key,$value);
            }

            $this->db->group_end();
            return $this;
        }

        public function query($sql) {
            $query = $this->db->query($sql);
            return $query->result();
        }

        public function orderBy($column,$order="ASC") {
            $this->db->order_by($column,$order);
            return $this;
        }

        public function limit($count,$start=0) {
            $this->db->limit($count,$start);
            return $this;
        }

        public function get($columns="*") {
            $this->db->select($columns);

            $this->db->from($this->table);

            $query = $this->db->get();
            $results = $query->result();

            if($query->num_rows() > 0) {
                return $results;
            } else {
                return false;
            }
        }

        public function first($columns="*") {
            $this->db->select($columns);

            $this->db->from($this->table);
            $this->limit(1);

            $query = $this->db->get();
            $results = $query->result();

            if($query->num_rows() > 0) {
                return $results[0];
            } else {
                return false;
            }
        }

        public function find($id,$column='id') {
            return $this->where($column,$id)->first();
        }

        public function insert($data) {
            $this->db->insert($this->table, $data);
            $insert_id = $this->db->insert_id();    
            return  $insert_id;
        }

        public function column_plus($column,$plus_val=1) {
            $this->db->set($column, $column.'+'.$plus_val, FALSE);
            return $this;
        }

        public function update($data=array()) {
            $this->db->update($this->table, $data);
        }
    }
}/*Class exists*/
?>