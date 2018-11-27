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
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js"></script>
        <style>
            .enjoy-css {
                -webkit-box-sizing: content-box;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                //width: 280px;
                //cursor: pointer;
                //padding: 9px 20px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 34px/1 "Acme", Helvetica, sans-serif;
                color: rgba(255,255,255,1);
                //text-align: center;
                -o-text-overflow: ellipsis;
                text-transform: uppercase;
                text-overflow: ellipsis;
            }
            .p1 {
                -webkit-box-sizing: content-box;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                width: 210px;
                height: 25px;
                top: 7px;
                left: 20px;
                cursor: pointer;
                padding: 10px 0px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 30px/1 "Acme", Helvetica, sans-serif;
                color: rgba(0,0,0,1);
                text-align: center;
                -o-text-overflow: ellipsis;
                text-transform: uppercase;
                text-overflow: ellipsis;
            }
            .p1p {
                -webkit-box-sizing: content-box;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                width: 50px;
                height: 30px;
                top: 1px;
                left: 265px;
                cursor: pointer;
                padding: 10px 0px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 40px/1 "Acme", Helvetica, sans-serif;
                color: rgba(255,255,255,1);
                text-align: right;
                -o-text-overflow: ellipsis;
                text-transform: uppercase;
                text-overflow: ellipsis;
                
            }
            .p2 {
                -webkit-box-sizing: content-box;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                width: 210px;
                height: 25px;
                top: 7px;
                left: 410px;
                cursor: pointer;
                padding: 10px 0px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 30px/1 "Acme", Helvetica, sans-serif;
                color: rgba(0,0,0,1);
                text-align: center;
                -o-text-overflow: ellipsis;
                text-transform: uppercase;
                text-overflow: ellipsis;
            }
            .p2p {
                -webkit-box-sizing: content-box;
                -moz-box-sizing: content-box;
                box-sizing: content-box;
                width: 50px;
                height: 30px;
                top: 1px;
                left: 333px;
                cursor: pointer;
                padding: 10px 0px;
                overflow: hidden;
                //border: 1px solid;
                font: normal 40px/1 "Acme", Helvetica, sans-serif;
                color: rgba(255,255,255,1);
                text-align: left;
                -o-text-overflow: ellipsis;
                text-transform: uppercase;
                text-overflow: ellipsis;
            }
        </style>
        <link async href="http://fonts.googleapis.com/css?family=Acme" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>       
        <div style='position:relative; top:0px; left:0px;'>
            <img src=img/tema.jpg border=0>
            <div ng-app="playera" ng-controller="controllera" ng-init="display_data()" >
                <div style='position:absolute; ' class="p1">
                    <div ng-repeat="x in names">
                        {{x.nome}}
                    </div>
                </div>
                <div style='position:absolute;' class="p1p">
                    <?php 
                        if($player1placar<=9){
                            echo "0".$player1placar;
                        } else {
                        echo $player1placar; 
                        }
                    ?>
                </div>
            </div>
            <div style='position:absolute; top:15px; left:320px;' class="enjoy-css">
                |
            </div>
            <div ng-app="playerb" ng-controller="controllerb" ng-init="display_data()" >
                <div style='position:absolute;' class="p2">    
                    <div ng-repeat="x in names">
                        {{x.nome}}
                    </div>
                </div>    
                <div style='position:absolute;' class="p2p">
                    <?php
                        if($player2placar<=9){
                            echo "0".$player2placar;
                        } else {
                        echo $player2placar; 
                        }
                    ?>    
                </div>
            </div>    
        </div>
            
        <script>            
            var appa = angular.module("playera",[]);
            appa.controller("controllera", function($scope, $http){
                $scope.display_data = function(){
                    $http.get("json1.php")
                    .success(function(data){
                        $scope.names = data;
                    });
                }
            });
            
            var appb = angular.module("playerb",[]);
            appb.controller("controllerb", function($scope, $http){
                $scope.display_data = function(){
                    $http.get("json2.php")
                    .success(function(data){
                        $scope.names = data;
                    });
                }
            });
                
            function timedRefresh(timeoutPeriod) {
                setTimeout("location.reload(true);",timeoutPeriod);
            }
            window.onload = timedRefresh(5000);
        </script>
    </body>
</html>

