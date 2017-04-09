<!DOCTYPE html>
<html>

    <head>
      <link rel="stylesheet" type="text/css" href="css/registration.css">
      <script type="text/javascript" src="js/registration.js"></script>
    </head>

    <header>Operation SLS</header>

    <div id="container">
        <div id="mainContent">
            <div>
                <h2>Registration</h2>
            </div>

            <form action="index.html" method="post"> <!-- index.html might change-->
                <div class="registrationFormEntry">
                    <label>Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="registrationFormEntry">
                  <label>Email</label>
                  <input type="email" name="email" id="email" required>
                </div>

                <div class="registrationFormEntry">
                    <label>Password</label>
                    <input type="password" name="password" id="pass" required>
                </div>

                <div class="registrationFormEntry">
                    <label>Confirm Password</label>
                    <input type="password" name="password" id="passConf" onchange="validatePass()"
                        name="passwordConfrim" required> <br>
                </div>

      <script>
        var pass = document.getElementById("pass");
        var confPass = document.getElementById('passConf');

        function validatePass() {
          if (pass.value != confPass.value){
              confPass.setCustomValidity("Passwords donut match");
          } else {
            confPass.setCustomValidity('');
          }
        }
      </script>

      User Type:
      <select name="userType" id="usrType" onchange="showOrHide()" required>
        <option>City Scientist</option>
        <option>City Official</option>
      </select><br>

      State: <select name="officialState" id='offStateSelect'>
        <?php
        $conn = mysql_connect("localhost","compuser","yeahsure");
        mysql_select_db("4400DatabaseProject",$conn);
        echo mysql_error();

        if (!$conn) {
            echo "Unable to connect to DB: " . mysql_error();
            exit;
        }

        $theQuery = "SELECT state FROM CityState";
        $theResponse = mysql_query($theQuery);

        while ($row = mysql_fetch_assoc($theResponse)) {
            echo "<option>".$row["state"]."</option>";
        }
        ?>

      </select><br>
      City: <select name="officialCity" id="offCitySelect">
        <?php

        $conn = mysql_connect("localhost","compuser","yeahsure");
        mysql_select_db("4400DatabaseProject",$conn);
        echo mysql_error();

        if (!$conn) {
            echo "Unable to connect to DB: " . mysql_error();
            exit;
        }

        $theQuery = "SELECT city FROM CityState";
        $theResponse = mysql_query($theQuery);

        while ($row = mysql_fetch_assoc($theResponse)) {
            echo "<option>".$row["city"]."</option>";
        }
        ?>
      </select>

      <br><input type=submit value="Submit">

      <script>
        var useType = document.getElementById('usrType');

        function showOrHide(){
        if (useType.value == "City Official") {
            document.getElementById("offStateSelect").style.display = "none";
            document.getElementById("offCitySelect").style.display = "none";
        }
        if(useType.value == "City Scientist"){
            document.getElementById("offStateSelect").style.display = "block";
            document.getElementById("offCitySelect").style.display="block";
        }
    }
      </script>
  </form>
</html>
