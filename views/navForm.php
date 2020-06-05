
<?php 
$i = 0;
$motivos = [//array usado para trocar valor da morte por nomes de mortes
    'MOD_UNKNOWN'=> 'Desconhecido',
    'MOD_SHOTGUN'=> 'Espingarda 12',
    'MOD_GAUNTLET'=> 'Manopla',
    'MOD_MACHINEGUN'=> 'Metralhadora',
    'MOD_GRENADE'=> 'Granada',
    'MOD_GRENADE_SPLASH'=> 'Respeindo da Granada',
    'MOD_ROCKET'=> 'Foguete',
    'MOD_ROCKET_SPLASH'=> 'Respingo do Foguete',
    'MOD_PLASMA'=> 'Arma de Plasma',
    'MOD_PLASMA_SPLASH'=> 'Respindo do plasma',
    'MOD_RAILGUN'=> 'Arma de Trilho',
    'MOD_LIGHTNING'=> 'Arma de Raio',
    'MOD_BFG'=> 'BFG',
    'MOD_BFG_SPLASH'=> 'Respingo de BRG',
    'MOD_WATER'=> 'Água',
    'MOD_SLIME'=> 'Lodo',
    'MOD_LAVA'=> 'Lava',
    'MOD_CRUSH'=> 'Esmagamento',
    'MOD_TELEFRAG'=> 'Telefrag',
    'MOD_FALLING'=> 'Queda',
    'MOD_SUICIDE'=> 'Suicídio',
    'MOD_TARGET_LASER'=> 'Mira a laser',
    'MOD_TRIGGER_HURT'=> 'Sangramento',
    'MOD_NAIL'=> 'Prego',
    'MOD_CHAINGUN'=> 'Correia',
    'MOD_PROXIMITY_MINE'=> 'Mina',
    'MOD_KAMIKAZE'=> 'Ataque suicída',
    'MOD_JUICED'=> 'Espremido',
    'MOD_GRAPPLE' => 'Garramento'
];
$cont = 1;
$dados = count($viewData);
$nome = "Game";
while ($i < $dados) {//estrutura de repecição para exibir formuario quado estiver recebendo dados
    $dadoLog = $viewData;
    $dadoLog = extract($dadoLog[$i], EXTR_PREFIX_SAME, "wddx");
    $dadoLog = extract(${$nome . $cont}, EXTR_PREFIX_SAME, "wddx");
    ?>
<form name="formulario" id="formulario" method="POST">
<!--Formulario do Game-->
<div class="container">
    <div class="form-group col-md-12">
        <div class="list-group">
            <div class="row">
                <div class="list-group-item list-group-item-dark col-md-12 text-center">
                    <b>Partida: <?php echo $cont ?></b>
                </div>
                <div class="list-group-item col-md-6">
                    <b class="text-center mb-2">Jogadores Na Partida:</b>
                    <table class="table table-hover table-bordered mt-2">
                        <thead class="thead-light">
                             <tr>
                                <th scope="col" class="text-center">Jogadores:</th>
                            </tr>
                        <tbody>
                        <?php
                        if(count($players) > 0 ){
                            foreach ($players as $value) {
                        ?>
                            <tr>
						        <td> <?php echo ($value); ?></td>
                            </tr>
                        <?php
                            }
                        }else{
                            ?>
                            <tr>
						        <td class="text-center">0</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="list-group-item col-md-6">
                    <b class="text-center">Motivos de mortes:</b>
                    <table class="table table-hover table-bordered  mt-2">
                        <thead class="thead-light">
                             <tr>
                                <th scope="col" class="text-center">Motivos:</th>
                                <th scope="col" class="text-center">Quantidade:</th>
                            </tr>
                        <tbody>
                        <?php
                        if(count($means) > 0 ){
                            foreach ($means as $key => $value) {
                        ?>
                            <tr>
						        <td><?php echo ($motivos[$key]); ?></td>
						        <td class="text-center"> <?php echo ($value); ?></td>
                            </tr>
                        <?php
                            }
                        }else{
                        ?>
                            <tr>
                                <td class="text-center">0</td>
						        <td class="text-center">0</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="list-group-item col-md-12">
                    <div class="row">
                        <b class="col-md-12 text-center mb-2">Histórico:</b>
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="text-center">jogador:</th>
                                        <th scope="col" class="text-center">Kills:</th>
                                    </tr>
                                <tbody>
                                <?php
                                 if(count($kills) > 0 ){
                                    foreach ($kills as $key => $value) {
                                ?>
                                <tr>
						            <td><?php echo ($key); ?></td>
						            <td class="text-center"> <?php echo ($value); ?></td>
                                </tr>
                                <?php
                            }
                        }else{
                            ?>
                            <tr>
                                <td class="text-center">0</td>
						        <td class="text-center">0</td>
                            </tr>
                        <?php
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php 
unset($kills);
unset($players);
unset($totalKills);
unset($means);
unset($dadoLog);
$cont++;
$i++;
} ?>