<?php

class parser{

    private $fireLog;
    private $game;
    private $numGame = 0;
    private $mean;
    private $kills;
    public $dados = array();

    public function __construct(){
    $this->fireLog = 'games.log';
    $this->carregar();
    }
    /**
     * ao carregar sera feiro um tratamento de erro caso passe retornara o log
     */
    private function carregar(){
        try{//usando try e catch para fazer o tratamento de erro
            if(!file_exists($this->fireLog)){//o if verificara se existe o arquivo
                throw new Exception('Arquivo Não existente!');//exception que será exibida no catch caso seja true
            } 
            $log = fopen($this->fireLog,'r');//abre o arquivo

            if(!$log){//verifica se existe o $log apos abrir
                throw new Exception('Não foi possivel abrir o arquivo');//exception que será exibida no catch caso seja true
            }

            if(trim(file_get_contents($this->fireLog)) == false){//verifica se o arquivo contem conteúdo
                throw new Exception('Arquivo esta vazio!');//exeption que será exibida no catch caso true
            }

        }catch(Exception $excep){//verifica se contem Execption
            echo $excep->getMessage();//exibe Execption
        };

        $log= fopen($this->fireLog, 'r');
        $this->leitor($log);
        fclose($log);
    }
    /**
     * functon que lê o arquivo e retorna a linha de inicio;
     */
    private function leitor($log){
        while(!feof($log)){
			$linha = $this->getline($log);

			switch ($linha['command']) {
                case 'InitGame':
                    $this->initGame($linha);
                    break;
                case 'ClientUserinfoChanged':
                    $this->clientUserinfoChanged($linha);
                    break;
                case 'Kill':
                    $this->kill($linha);
                    break;
                case '------------------------------------------------------------':
                case 'ShutdownGame':
                    $this->shutdownGame($linha);
                    break;
                default:
                    break;
            }
		}
    }
    /**
     * armazena em um array apartir de um ':' para contar um componete
     */
    private function getline($file) {
        $linha = fgets($file, 4096);
        if (!empty($linha)) {
            $params = explode(":", trim($linha), 3);
            $time = explode(" ", $params[0], 2);
            $time = isset($time[1]) ? $time[1] : $time[0];
            $time = trim($time . ":" . $params[1]);
            $time_command = explode(" ", $time, 2);

            $result['params'] = isset($params[2]) ? $params[2] : '';
            $result['time'] = $time_command[0];
            $result['command'] = $time_command[1];

            return $result;
        }
        return false;
    }
    /**
     * entra na classe game, define mean e kills como um arrays, numGame conta ++ e chama game dentro de setId 
     */
    private function initGame($linha){
        require_once('game.php');
    	$this->game = new game();
    	$this->mean = array();
    	$this->kills = array();
    	$this->numGame ++;
    	$this->game->setId($this->numGame);
    }
    /**
     * seta o nome do player centrando na function clientUserinfoChanged
     */
    private function clientUserinfoChanged($linha){
    	$player = explode('\t\\', $linha['params'], 2);
        $player = explode(' n\\', $player[0], 2);

        if (!in_array($player[1], $this->game->getPlayers())) {
            $this->game->setPlayers($player[1]);
        }
    }
    /**
     * function que conta kill para cada player
     */
    private function kill($linha){
    	$this->game->addKill();

    	$valor = explode(":", $linha['params'], 2);
    	$valor = explode("killed", $valor[1]);
    	$p_killer = trim($valor[0]);
    	$valor = explode(" by ", trim($valor[1]));
        $p_killed = trim($valor[0]);
        $mod = trim($valor[1]);

        $this->setKill($p_killer, $p_killed);
        $this->mean[$mod] = (isset($this->mean[$mod]) ? $this->mean[$mod] : 0) + 1;
    }
    /**
     * funcion que conta quandos player morreram para o <World> que seria suicídio ou morte sem player declarados
     */
    private function setKill($p_killer, $p_killed) {
        if ($p_killer == "<world>") {
            $this->kills[$p_killed] = (isset($this->kills[$p_killed]) ? $this->kills[$p_killed] : 0) - 1;
        } else if ($p_killer == $p_killed) {
            $this->kills[$p_killer] = (isset($this->kills[$p_killer]) ? $this->kills[$p_killer] : 0) - 1;
        } else {
            $this->kills[$p_killer] = (isset($this->kills[$p_killer]) ? $this->kills[$p_killer] : 0) + 1;
        }
    }
    /**
     * busca kills e means no array declarado como dados
     */
    private function shutdownGame($linha){
    	if (isset($this->game)) {
            $this->game->setKills($this->kills);
            $this->game->setMeans($this->mean);
            $this->dados[] = $this->game->toArray();
            unset($this->game);
        }
    }
/**
 * da um get no dados e retorna ele mesmo
 */
    public function getDados() {
        return $this->dados;
    }

}

?>