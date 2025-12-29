<html>
    <head>
        <title>PHP TEST</title>
    </head>
    <body>
    
        <?php
        //$payment = 3000;
        //$price = 800;
        //$num = 3;

        //$change = $money - ($price * $num);

        //echo "Unit Price: $price <br>";
        //echo "Payment: $money <br>";
        //echo "Change: $change<br>";

        $weight = 60;
        $height = 170;

        $result = ($height - 100) * 0.9;

        if($weight > $result){
            echo("다이어트");
        }else{
            echo("노 필요");
        }

        ?>



    </body>
</html>