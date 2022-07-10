<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_appointment');
	}

    public function index()
	{
		$this->data['result'] = $this->Model_appointment->getAppointmentData();
        //$s_id = $this->data['result']['id'];die($s_id);
        //die(var_dump($this->data['result']));
        
        foreach ($this->data['result'] as $key => $value) {
            
            $this->data['data'][$key]['name'] = $value['name'];
            $this->data['data'][$key]['title'] = $value['doctor_name'];
            $this->data['data'][$key]['date'] = $value['date'];
            // $data['data'][$key]['message'] = $value->message;
            // $data['data'][$key]['email'] = $value->email;
        }

        $this->load->view('listing', $this->data);
	}

    //Book an Appointment
    public function bookAppointment()
	{
		$this->load->view('appointment_form');
	}
    // Book an appointment

    public function book() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('date', 'Date of Appointment', 'required');
        $this->form_validation->set_rules('doctor', 'Select a doctor', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == TRUE) {
            //die('hi');
			
        	$data = array(
        		'name' => $this->input->post('name'),	
                'email' => $this->input->post('email'),
				'date' => $this->input->post('date'),
                'message' => $this->input->post('message'),
                'doctor_id' => $this->input->post('doctor')
            );
            // die(var_dump($data));
        	$create = $this->Model_appointment->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('Appointment/index', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Database Error occurred!!');
        		$this->load->view('appointment_form');
        	}
        }
        else {
            // false case  	
            $this->session->set_flashdata('errors', 'Form Validation Failed!!');
            $this->load->view('appointment_form');
        }
    }

	/*
	* Update terms and conditions
	*/
	public function update($s_id = null)
    {    //die('hello');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('date', 'Date of Appointment', 'required');
        $this->form_validation->set_rules('doctor', 'Select a doctor', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == TRUE) {
			// true case        
        	$data = array(
        		'name' => $this->input->post('name'),	
                'email' => $this->input->post('email'),
				'date' => $this->input->post('date'),
                'message' => $this->input->post('message'),
                'doctor_id' => $this->input->post('doctor')
			);
			// die(var_dump($data));
            $update = $this->Model_appointment->update($data, $s_id);
            if($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('Appointment/index', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Database Error occurred!!');

                $doctor = $this->Model_appointment->getDoctorData($s_id);
                $this->data['doctor'] = $doctor;
                $this->load->view('edit/'.$s_id, $this->data);
            }
        }
        else {
            $this->data['doctor'] = $this->Model_appointment->getDoctorData($s_id);
            $this->data['appointment'] = $this->Model_appointment->getAppointmentData($s_id);
            
            $this->load->view('edit', $this->data); 
        }   
	}

    public function delete($s_id = null){
		if($s_id) {
			$delete = $this->Model_appointment->remove($s_id);
			if($delete == true) {
				$this->session->set_flashdata('success', 'Successfully Deleted!!');
                redirect('Appointment/index', 'refresh');
			}
			else {
				$this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('Appointment/index', 'refresh');
			}
		}
    }
}
