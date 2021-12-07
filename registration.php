

<?php

session_start();

if(!isset($_SESSION["user"]) )
{
    echo('<meta http-equiv="refresh" content="2; URL = login.php">');
die("Login required");
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Calculator</title>
    </head>
    
  
  

    <style>
    input ,button  {
        width: 140px;
        margin: 5px;
        text-align: center;
    }
    button{
        width: 65px;
    }
    .pressed{
        background-color:  pink;
    }
    </style>


    <script >
        
                function metod( )
                {


                   
        

                  var paragraph = document.getElementById("resultstate"); 
                  

                  
  
                   var name = document.getElementById("username").value ;
                   var pwd  = document.getElementById("password").value ;
                 
                   
 
                 
              
                  var url="api/adduser.php?UserName="+name+"&PwdHash="+pwd;
                  var xhr =new XMLHttpRequest();
      
                  xhr.open("GET",url,false);
                  xhr.send();
 
                 // var z=xhr.responseText;

                 var result = JSON.parse(xhr.responseText);
                  if(result.status=="fail")
                  {
                     paragraph.innerText= String(result.error ) ;
                   
                     
                  }else
                  {
                     paragraph.innerText= String("Success") ;
                     
                  }

                  setTimeout(function () {
       window.location.href = "index.html";  
    }, 2000); //will call the function after 2 secs.
 

                }

    </script>
    
<body>




 
    <h1>Registration</h1>
   <h2 style="text-align: center;">Please fill username and password !</h1>
      
   <form method="post" action="try_register.php"  >
         <table  class="center">
            <tr  >
               <td >
                  <label for="UserName">User Name</label>
               </td>
               <td  style="padding-left:10px;">
                  <input id="username" name="UserName"   >
               </td>
            </tr>
            <tr>
               <td>
                  <label for="Password">Password</label>
               </td>
               <td  style="padding-left:10px;">
                  <input  id="password" name="Password"    >
               </td>
            </tr>
             <tr>
                
             </tr>
         </table>
         </form>
         <div style="text-align: center;"> 
             <button  id="butn1"  onclick="metod( );" > register</button>
         </div>
<h3 id="resultstate" style="text-align: center;"></h3>

    
</body>
</html>