<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My Form</title>
    </head>
    <body>
        <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > <!-- Creating form and using POST [not case sensitive but keep it caps] 
                                                                                                htmlspecialchars() allows us to keep the form safe from XSS -->
            Name: <input type="text" name="name"><br>
            
            E-mail: <input type ="text" name="email"><br>

            Favorite TV Show: <input type="text" name="tv-show"><br>

            <br>

            Why is this your favorite show?<br>
            <textarea name="reason" rows = 3 cols = 40></textarea><br>

            Gender:
            <input type="radio" name="gender" value = "male">Male
            <input type="radio" name="gender" value = "female">Female
            <input type="radio" name="gender" value = "other">Other
            <input type="submit">
        </form>

        <?php 
        $name = $email = $tv_show = $reason = "";                                       //instantiating variables as an empty string

        if($_SERVER["REQUEST_METHOD"] == "POST")                                        //checks if the form is using POST or GET [needs to be in all caps]
        {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $tv_show = test_input($_POST["tv-show"]);
            $reason = test_input($_POST["reason"]);
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            echo "<p>$data</p>";
        }
        ?>
    </body>
</html>