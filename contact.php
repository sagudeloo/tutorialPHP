<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Personal web page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <h1>Your Name</h1>
            <p>Your Profession</p>
        </div>
        <br/>
        <div id="mySidenav" class="sidenav">
            <a href="https://github.com/sagudeloo" id="sideTag1" target="_blank">GitHub</a>
            <a href="https://gitlab.com/sagudeloo" id="sideTag2" target="_blank">GitLab</a>
            <a href="https://www.linkedin.com/in/sagudeloo/" id="sideTag3" target="_blank">Linkedin</a>
            <a href="index.php" id="sideTag4" target="_blank">Main Page</a>
        </div>
        <br/>
        <div class="container">
            <?php
                if(isset($_POST['submit'])){
                    echo "<h3>Thanks ".htmlentities($_POST["fname"]." ".$_POST["lname"])." your message was sent!</h3>";
                }
            ?>
            <form method="POST">

                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Your name.." required>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

                <input type="submit" name="submit" value="Submit">

            </form>
        </div>
    </body>
</html>