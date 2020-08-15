<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal web page</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
    $experience = simplexml_load_file("experiences.xml") or die("Unable to open file!");
?>
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
        <a href="contact.php" id="sideTag4" target="_blank">Contact</a>
    </div>
    <br/>
    <?php
        foreach($experience as $post){
            echo "
            <div class='row'>
                <div class='column'>
                    <h2>".$post->title."</h2>
                    <p>".$post->body."</p>
                </div>
            </div>
            ";
        }
    ?>
</body>
</html>