<html>
    <head>
        <title>구구단dd</title>
    </head>
    <body>
    
        <?php
for ($a = 2; $a <= 9; $a += 3) {
    for ($i = 1; $i <= 9; $i++) {
        for ($j = $a; $j <= $a + 2 && $j <= 9; $j++) {
            echo "$j X $i = " . ($j * $i) . "&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo "<br>";
    }
    echo "<br><br>";
}
        ?>
    </body>
</html>