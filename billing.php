<?php
    session_start();
    //если жетона безопасности( в нашем примере, сессионной переменной с названием user) нет, "не пущаем"
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требуется логин!");
    }
  
    $user = $_SESSION['user'];

    include(getenv("MYAPP_CONFIG"));
?>
<html>
    <head>
        <!-- comment HTML -->
        
        <meta charset="utf-8"/>
        <script>
            // comment JAVA
            function getlog() {
            
                var url = "api/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                var results = JSON.parse(text);
                console.log(results);
                var out = "";
                for(var i=0; i < results.length; i++) {
                    var calc = results[i];
                    console.log(calc);
                    var x =calc[1];
                    var y =calc[2];
                    var z =calc[3];
                    out +=" x: " + x + " y: " + y + " Результат: " + z + "<br />";

                }
                document.getElementById("display").innerHTML = out;
               
            }

        
        </script>
    </head>
    <body onload="getlog();">
        <h1>Ваши вычисления</h1>
        <div id="display"></div>
    </body>
</html>




