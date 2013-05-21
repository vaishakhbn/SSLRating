

<?php


error_reporting(0);
session_start();
        if(!isset($_SESSION['stdname'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
                unset($_SESSION['stdname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
?>
<html>
    <head>
        <title>OES-DashBoard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="oes.css"/>
    </head>
    <body>
        <?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
        <div id="container">
           <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="200" src="images/logo.gif" alt="OES"/><h3 class="headtext"> &nbsp;V's RVCE Quiz System </h3><h4 style="color:#ffffff;text-align:center;margin:0 0 5px 5px;"></h4>
            </div>
            <div class="menubar">

                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])){ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
            <div class="stdpage">
                      
                <form id="stdloginform" action="index.php" method="get">
      
                         
              <table cellpadding="30" cellspacing="10">
              <tr>
                  <td>Enter Web Address</td>
                  <td><input type="text" tabindex="1" name="name" value="" size="16" /></td>

              </tr>
		<tr>
                  <td><input type="submit" value="Click here to rate"></td>
                                       
		</tr>
              </table>


             </form>


                    
                </div>
                

            </div>

           <div id="footer">
          <p style="font-size:70%;color:#25afff;"> Developed By-<b>Vinaykumar M Kolli & Vinay B S</b><br/> </p>
      </div>
      </div>
  </body>
</html>
