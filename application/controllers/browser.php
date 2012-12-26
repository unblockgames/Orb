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
		global $history;
	}
	public function getNext($q) //this function is called by jquery to update the database listings
	{
		/*
		array_push($history,$q); //keep track of the ids that the user is navigating through because we need them to go backward through the browser
		$this->load->database(); // load the database class
		$result = $this->db->query('SELECT * FROM `invmarketgroups` WHERE `parentGroupID` '.$q); //query the database based on $q which is the marketgroupid
		while ($row = mysql_fetch_array($data['query'])) //for each market catagory extract the data and put it into the form of a php array
		{
			if $row['hasTypes'] = '1' //if the market group has items
					$result = $this->db->query('SELECT * FROM `invmarketgroups` WHERE `parentGroupID` '.$q);//specialized query that requests items
				else
					//query that gets the next set of catagories
			endif
		}*/
		echo "<li>".$q."</li>";
	}
	public function getLast($q) //this function is called by jquery to update the database listings
	{
	}
}
?>