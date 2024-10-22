<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKupon extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('kupon', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kupon');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kupon', $id);
		$this->db->update('kupon', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kupon', $id);
		$this->db->delete('kupon');
	}
}

/* End of file mKupon.php */
