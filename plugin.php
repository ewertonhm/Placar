<?php 
require_once 'DB.php';

$db = DB::get_instance();
$placar = $db->find('score');


$player1 = $placar[0]->nome;
$player2 = $placar[1]->nome;
$player1placar = $placar[0]->pontos;
$player2placar = $placar[1]->pontos;


?>


<html>
    <head>
        <title>Placar</title>
        <meta charset="UTF-8">
        <style>
            .enjoy-css {
                //-webkit-box-sizing: content-box;
                //-moz-box-sizing: content-box;
                //box-sizing: content-box;
                //width: 280px;
                //cursor: pointer;
                //padding: 9px 20px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 19px/1 "Acme", Helvetica, sans-serif;
                color: rgba(0,0,0,1);
                text-align: center;
                -o-text-overflow: ellipsis;
                text-overflow: ellipsis;
                //background: #ffffff;
                //-webkit-box-shadow: 3px 3px 0 0 rgba(0,0,0,0.8) ;
                //box-shadow: 3px 3px 0 0 rgba(0,0,0,0.8) ;
                //text-shadow: 1px 1px 1px rgba(0,0,0,0.2) ;
            }
        </style>
        <link async href="http://fonts.googleapis.com/css?family=Acme" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <div class="enjoy-css"><?php echo $player1; echo $player1placar; echo "VS"; echo $player2placar; echo $player2; ?></div>
        
        
        
        <script>
            function timedRefresh(timeoutPeriod) {
                    setTimeout("location.reload(true);",timeoutPeriod);
                }
            window.onload = timedRefresh(5000);
        </script>
    </body>
</html>

