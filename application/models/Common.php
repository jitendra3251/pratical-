<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function can_login($email, $password, $table)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function insertData($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function insertBatch($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function accesslimitrecord($tbl = '', $fields = '', $where = '',  $orderby = '',  $ordertype = '', $limit = '', $result = '')
	{
		$this->db->select(implode(',', $fields));
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($orderby)) {
			$this->db->order_by($orderby, $ordertype);
		}
		if (!empty($limit)) {
			$this->db->limit($limit, 0);
		}
		if ($result == 'row') {
			$res = $this->db->get($tbl)->row();
		} else {
			$res = $this->db->get($tbl)->result();
		}
		return $res;
	}

	function accessrecord($table, $select, $where, $want)
	{
		$data = $this->db->get_where($table, $where);
		if ($want == 'row') {
			$result = $data->row();
		} elseif ($want == 'row_array') {
			$result = $data->row_array();
		} elseif ($want == 'result') {
			$result = $data->result();
		} elseif ($want == 'result_array') {
			$result = $data->result_array();
		} elseif($want=='count'){
			return $data->num_rows();
		}
		return  $result;
	}

	function updateData($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	function deleteRecord($table, $data)
	{
		$this->db->delete($table, $data);
	}
	public function check($tbl = '', $fields = '', $where = '', $result)
	{
		$this->db->select(implode($fields));
		$this->db->where($where);
		if ($result == 'row') {
			$res = $this->db->get($tbl)->row();
		} else {
			$res = $this->db->get($tbl)->result();
		}
		return $res;
	}

	public function coutdata($table)
	{
		$this->db->select('count(id)');
		// $this->db->where($where);
		$query = $this->db->get($table);
		$cnt = $query->row_array();
		return $cnt['count(id)'];
	}
	public function get_user($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$data = $this->db->get()->result();
		return $data;
	}

}
