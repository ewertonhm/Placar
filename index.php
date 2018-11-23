<!DOCTYPE html>
<?php 
    require_once 'DB.php';
    $db = DB::get_instance();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    </head>
    <body>
        <div data-role="page" id="index">
            <div data-role="header" data-position="fixed"></div>
            <div data-role="main" class="ui-content">
                <div>
                    <?php 
                        if(isset($_POST['btn-players'])){
                            $dbplayer1 = [
                                'nome'=>$_POST['jogador1']
                            ];
                            $dbplayer2 = [
                                'nome'=>$_POST['jogador2']
                            ];

                            $db->update('score',1,$dbplayer1,'id');      
                            $db->update('score',2,$dbplayer2,'id');
                        };
                        if(isset($_POST['btn-db'])){
                            $dbplayer1 = [
                                'nome'=>'Player1',
                                'pontos'=>0
                            ];
                            $dbplayer2 = [
                                'nome'=>'Player2',
                                'pontos'=>0
                            ];

                            $db->update('score',1,$dbplayer1,'id');      
                            $db->update('score',2,$dbplayer2,'id');
                        }
                        if(isset($_POST['btn-pontuar1'])){
                            $params = [
                                'order'=>'id'
                            ];
                            $placar = $db->find('score',$params);
                            $player1placar = $placar[0]->pontos;
                            $pontos = $player1placar +1;
                            $dbplayer1p = [
                                'pontos'=>$pontos
                            ];
                            $db->update('score',1,$dbplayer1p,'id'); 
                            
                            unset($_POST['btn-pontuar1']);
                        }
                        if(isset($_POST['btn-pontuar2'])){
                            $params = [
                                'order'=>'id'
                            ];
                            $placar = $db->find('score',$params);
                            $player2placar = $placar[1]->pontos;
                            $pontos = $player2placar +1;
                            $dbplayer2p = [
                                'pontos'=>$pontos
                            ];
                            unset($_POST['btn-pontuar2']);
                            $db->update('score',2,$dbplayer2p,'id'); 
                        }
                        $params = [
                                'order'=>'id'
                        ];
                        $placar = $db->find('score',$params);

                        $player1 = $placar[0]->nome;
                        $player2 = $placar[1]->nome;
                        $player1placar = $placar[0]->pontos;
                        $player2placar = $placar[1]->pontos;
                    ?>
                    
                    <div class="ui-grid-a">
                        <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:60px">
                                <?php echo $player1; ?>
                                <p>Pontos: <?php echo $player1placar; ?></p>
                            </div></div>
                        <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:60px"><?php echo $player2; ?><p>Pontos: <?php echo $player2placar; ?></p></div></div>
                    </div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">    
                        <div class="ui-grid-a">
                            <div class="ui-block-a"><input type="submit" name="btn-pontuar1" data-theme="b" data-icon="plus" data-iconshadow="true" value="<?php echo $player1; ?>"></div>
                            <div class="ui-block-b"><input type="submit" name="btn-pontuar2" data-theme="b" data-icon="plus" data-iconshadow="true" value="<?php echo $player2; ?>"></div>
                        </div>
                    </form>
                </div>
                <div>
                    <p><a href="#db" class="ui-btn ui-shadow ui-corner-all">Limpar DB</a></p>
                    <p><a href="#players" class="ui-btn ui-shadow ui-corner-all">Configurar Jogadores</a></p>
                    <p><a href="#placar" class="ui-btn ui-shadow ui-corner-all">Placar</a></p>
                </div>
            </div>
                <div data-role="footer" data-position="fixed"><h3>Copyright União Gaming • 2018 </h3>
            </div>
        </div>
        
        <div data-role="page" id="db">
            <div data-role="header" data-position="fixed"></div>
            <div data-role="main" class="ui-content">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button type="submit" class="ui-shadow ui-btn ui-corner-all" name="btn-db">Limpar DB</button>
                </form>
            </div>
            <div data-role="footer" data-position="fixed">
                <p><a href="#index" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b">Voltar a pagina inicial</a></p><h3>Copyright União Gaming • 2018 </h3>
            </div>
        </div>
        
        <div data-role="page" id="players">
            <div data-role="header" data-position="fixed"></div>
            <div data-role="main" class="ui-content">                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                    <label for="text-basic">Jogador 1:</label>
                    <input type="text" name="jogador1" id="jogador1" value="">
                    <label for="text-basic">Jogador 2:</label>
                    <input type="text" name="jogador2" id="jogador2" value="">
                    <button type="submit" class="ui-shadow ui-btn ui-corner-all" name="btn-players">Salvar</button>
                </form>
            </div>    
            <div data-role="footer" data-position="fixed">
                <p><a href="#index" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b">Voltar a pagina inicial</a></p><h3>Copyright União Gaming • 2018 </h3>
            </div>
        </div>        
        
        <div data-role="page" id="placar">
            <div data-role="header" data-position="fixed"><h1>Placar</h1></div>
            <div data-role="main" class="ui-content">
                <p>Para placar, acesse:</p>
                <p>192.168.xx.xxx/placar/placar</p>
            </div>
            <div data-role="footer" data-position="fixed">
                <p><a href="#index" data-direction="reverse" class="ui-btn ui-shadow ui-corner-all ui-btn-b">Voltar a pagina inicial</a> </p><h3>Copyright União Gaming • 2018 </h3>
            </div>
        </div>  
    </body>
</html>
