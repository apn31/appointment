<?php 

class Model_appointment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the Appointment Data */
	public function getAppointmentData($id = null)
	{
		if($id) {
            $this->db->select('*,doctor_name, doctor.id as dd_id');
            $this->db->where('appointment.id',$id);
            $this->db->join('doctor', 'appointment.doctor_id = doctor.id');
			$query = $this->db->get('appointment');
			return $query->row_array();
		}
        $this->db->select('*, doctor_name, appointment.id as aa_id');
        $this->db->join('doctor', 'appointment.doctor_id = doctor.id');
        $query = $this->db->get('appointment');
		return $query->result_array();
	}

	/* get doctors data */
	public function getDoctorData($id = null)
	{
        $this->db->select('*');
		$query = $this->db->get('doctor');
		return $query->result_array();
	}

    /* create appointment data */
    public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('appointment', $data);
			return ($insert == true) ? true : false;
		}
	}

    /* update appointment data */
	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('appointment', $data);
			return ($update == true) ? true : false;
		}
	}

    /* delete appointment data */
	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('appointment');
			return ($delete == true) ? true : false;
		}
	}

}