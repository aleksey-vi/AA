<?php

$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;
include($_ENV["MYAPP_CONFIG"]);
// вызываем функцию для связи(коннекция) с SQL базой и указываем ip адрес, в нашем случае бд локальная поэтому
// localhost затем пользователя root который будет использоваться в нашем приложении("принцип наименьших 
// привелегий" по хорошему юзера руут нельзя указывать с точки зрения ИБ)
// после руута указывается пароль, в нашем случае он пустой и это тоже не правильно
// 4й параметр это название базы данных
//$conn = mysqli_connect("localhost","root","","calc");
$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
// создадим переменную sql и пропишем sql команды, в скобках перечисляем столбцы в нашей таблице log 
// в values казываем значения
// указание переменных в таком виде является уязвимостью для sql-иньекций, нарушен принцип любую
// стороннею систему считать не безопасной(для безопасного написания необходимо проводить проверку значений 
// которые пришли)
$sql = "INSERT INTO log(number1,number2,result,UserID) VALUES($x,$y,$z,'anonym')";
// вызываем функцию для добавления и укажем два параметра коннект и нашу sql переменную
mysqli_query($conn,$sql);
// добавим функцию, которая выводит ошибку на экран
// echo(mysqli_error($conn));
// закроем сессию коннекта
mysqli_close($conn);
echo($z);











