<?php

class Contract{

	private $clientID, $contractID, $proposalID, $startDate, $isFinished, $FStartDate,$totalHoursWorked, $core;

	function __construct(){
		

		$this->core = Core::getConnection();
	}
	public function populateObject($clientID, $proposalID, $startDate, $isFinished, $FStartDate, $totalHoursWorked){
		$this->clientID = $clientID;
		$this->proposalID = $proposalID;
		$this->startDate = $startDate;
		$this->isFinished = $isFinished;
		$this->FStartDate = $FStartDate;
		$this->totalHoursWorked = $totalHoursWorked;
	}
	public function addContract(){
		$res = FALSE;
		if($this->checkClient()){
			$query = "INSERT INTO contract (client_id, proposal_id, start_date, is_finished, start_working_date, total_hours_worked) 
							 VALUES (:clientID, :proposalID, :startDate, :isFinished,  :FStartDate, NULL)";
			$stmt = $this->core->prepare($query);
			$res = $stmt->execute([
					':clientID' => $this->getClientID(),
					':proposalID' => $this->getProposalID(),
					':startDate'  => $this->getStartDate(),
					':isFinished' => 0,
					':FStartDate' => $this->getFStartDate()
				]);
		}
		return $res;
	}

	public function endContract(){
		$res = FALSE;
		if($this->checkClient()){
				$delID = $this->contractID;
				$query = "UPDATE contract SET `isFinished` = 1 WHERE contract_id = :delID";
				$stmt = $this->core->prepare($query);
				$res = $stmt->execute([':delID' => $delID]);
		}
		return $res;
	}

	public function getContract($contractID){
		$query = "SELECT * FROM contract WHERE contract_id = :contractID";
		$stmt = $this->core->prepare($query);
		$stmt->execute([':contractID' => $contractID]);
		$res = $stmt->fetchAll();
		return $res;
	}

	/*
	public function getAllContracts(){ // add $freelancer ID
		$query = "SELECT * FROM contract";
		$stmt = $this->core->prepare($query);
		$stmt->execute();
		$res = $stmt->fetchAll();
		return $res;
	}
	*/
	
	private function checkClient(){
		$checkQuery = "SELECT EXISTS(SELECT :clientID FROM contract WHERE contract_id = :clientID";
		$checkResult = $this->core->prepare($checkQuery);
		$checkResult->execute([':clientID' => $this->getClientID()]);
		return $checkResult;
	}


	// Getter and Setter
	function getClientID(){
		return $this->clientID;
	}

	function setClientID($clientID){
		$this->clientID = $clientID;
	}

	function getContractID(){
		return $this->contractID;
	}

	function setContractID($contractID){
		$this->contractID = $contractID;
	}

	function getProposalID(){
		return $this->proposalID;
	}

	function setProposalID($proposalID){
		$this->proposalID = $proposalID;
	}

	function getStartDate(){
		return $this->startDate;
	}

	function setStartDate($startDate){
		$this->startDate = $startDate;
	}

	function getIsFinished(){
		return $this->isFinished;
	}

	function setIsFinished($isFinished){
		$this->isFinished = $isFinished;
	}

	function getFStartDate(){
		return $this->FStartDate;
	}

	function setFStartDate($FStartDate){
		$this->FStartDate = $FStartDate;
	}

	function getFeedbackID(){
		return $this->feedbackID;
	}

	function setFeedbackID($feedbackID){
		$this->feedbackID = $feedbackID;
	}
}