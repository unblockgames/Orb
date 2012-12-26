<?php
class Browser extends CI_Controller {

	public function index() //the default function called when the page is first visited
	{
		$this->load->helper('html');
		$this->load->database();//load the database library
		$data['title'] = "Item Browser"; //set up the title of the page
		$data['heading'] = "Eve-Online Market"; //set up the heading of the page
		$data['result'] = array(); //initialize the array that will hold the arrays of data
		$data['result'] = $this->db->query('SELECT * FROM `invmarketgroups` WHERE `parentGroupID` IS NULL ORDER BY `invmarketgroups`.`marketGroupName` ASC'); // query the database to retrieve the initial base market catagories
		$this->load->view('browserview', $data); // load the view and send the view the data we've created here
	}
	public function getNext($q) //this function is called by jquery to update the database listings
	{
		/*
		What does this do? $history will be reset everytime this is called; it will always be an array containing only $q.
		It is never referenced though elsewhere. Seems superfluous. Commented it out. [JAS]
		static $history = array();
		array_push($history,$q); //keep track of the ids that the user is navigating through because we need them to go backward through the browser
		
		Tried to get ahold of you but couldn't so I figured I'd just leave a comment...
		*/
		$this->load->database(); // load the database class
		$result = $this->db->query("SELECT * FROM `invmarketgroups` WHERE `parentGroupID` = '".$q."' ORDER BY `invmarketgroups`.`marketGroupName` ASC"); //query the database based on $q which is the marketgroupid
		
		foreach ($result->result_array() as $row)
			{
				echo '<li q = "'.$row['marketGroupID'].'">'.$row['marketGroupName'].'</li>';
			}
	}
	public function getLast($q) //this function is called by jquery to update the database listings
	{
	}
}
?>
