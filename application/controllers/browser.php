<?php
class Browser extends CI_Controller {

	public function index() //the default function called when the page is first visited
	{
		$this->load->library('session');
		$this->load->helper('html');
		$this->load->database();//load the database library
		$data['title'] = "Item Browser"; //set up the title of the page
		$data['heading'] = "Eve-Online Market"; //set up the heading of the page
		$data['result'] = array(); //initialize the array that will hold the arrays of data
		$data['result'] = $this->db->query('SELECT * FROM `invmarketgroups` WHERE `parentGroupID` IS NULL ORDER BY `invmarketgroups`.`marketGroupName` ASC'); // query the database to retrieve the initial base market catagories
		$this->load->view('browserview', $data); // load the view and send the view the data we've created here
		$q = array('IS NULL');
		$this->session->set_userdata('q',$q);
	}
	public function getNext($q) //this function is called by jquery to update the database listings
	{
		$this->load->library('session');
		$tempArray = $this->session->userdata('q');
		array_push($tempArray, $q);
		$this->session->set_userdata('q',$tempArray);
		$this->load->database(); // load the database class
		$result = $this->db->query("SELECT * FROM `invmarketgroups` WHERE `parentGroupID` = '".$q."' ORDER BY `invmarketgroups`.`marketGroupName` ASC"); //query the database based on $q which is the marketgroupid
		foreach ($result->result_array() as $row)
			{
				if ($row['hasTypes'] == 0)
				echo '<li q = "'.$row['marketGroupID'].'" hasTypes = "0">'.$row['marketGroupName'].'</li>';
				else
				echo '<li q = "'.$row['marketGroupID'].'" hasTypes = "1">'.$row['marketGroupName'].'</li>';
			}
	}
	public function listItems($q) //this function is called by jquery to update the database listings
	{
		$this->load->library('session');
		$tempArray = $this->session->userdata('q');
		array_push($tempArray, $q);
		$this->session->set_userdata('q',$tempArray);
		$this->load->library('session');
		$this->load->database(); // load the database class
		$result = $this->db->query("SELECT * FROM `invtypes` WHERE `marketGroupID` = '".$q."' ORDER BY `invtypes`.`typeName` ASC"); //query the database based on $q which is the marketgroupid
		
		foreach ($result->result_array() as $row)
			{
				echo '<li q = "null">'.$row['typeName'].'</li>';
			}
	}
	public function getLast() //this function is called by jquery to update the database listings
	{
		$this->load->library('session');
		$this->load->database(); // load the database class
		$tempArray = $this->session->userdata('q');
			if (count($tempArray)>1)
				array_pop($tempArray);
			$this->session->set_userdata('q',$tempArray);
		if (end($this->session->userdata('q')) <> 'IS NULL')
		{
			$result = $this->db->query("SELECT * FROM `invmarketgroups` WHERE `parentGroupID` = '".end($this->session->userdata('q'))."' ORDER BY `invmarketgroups`.`marketGroupName` ASC"); //query the database based on $q which is the marketgroupid
			foreach ($result->result_array() as $row)
			{
				echo '<li q = "'.$row['marketGroupID'].'" hasTypes = "'.$row['hasTypes'].'">'.$row['marketGroupName'].'</li>';
			}
		}
		else
		{
			$result = $this->db->query("SELECT * FROM `invmarketgroups` WHERE `parentGroupID` IS NULL ORDER BY `invmarketgroups`.`marketGroupName` ASC"); //query the database based on $q which is the marketgroupid
			foreach ($result->result_array() as $row)
			{
				echo '<li q = "'.$row['marketGroupID'].'" hasTypes = "0">'.$row['marketGroupName'].'</li>';
			}
		}
		
	}
}
?>