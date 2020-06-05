<?php

class game{
	private $id;
	private $players = array();
	private $kill = array();
	private $means = array();
	private $total_kills;

	
	public function getId(){
		return $this->id;
	}


	public function getPlayers(){
		return $this->players;
	}


	public function getKills(){
		return $this->kill;
	}

	public function getMeans(){
		return $this->means;
	}

	public function getTotal_Kills(){
		return is_null($this->total_kills) ? 0 : $this->total_kills;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setPlayers($players){
		$this->players[] = $players; 
	}

	public function setKills($kills){
		$this->kill = $kills;
	}

	public function setMeans($means){
		$this->means = $means;
	}

	public function setTotalKills($total_kills){
		$this->total_kills = $total_kills;
	}

	public function addKill(){
		$this->setTotalKills($this->getTotal_Kills() + 1);
	}

	public function toArray() {
        $data = array(
            'total_kills' => $this->getTotal_Kills(),
            'players' => $this->getPlayers(),
            'kills' => $this->getKills(),
            'means' => $this->getMeans()
        );
        $game = array('Game' . $this->getId() => $data);
        return $game;
    }
}

?>