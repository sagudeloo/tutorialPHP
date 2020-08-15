# How to make your personal web page

## Software requirements

Before follow this tutorial you need install and configure XAMPP in your operative system

[XAMPP Installer](https://www.apachefriends.org/es/index.html)

## Guide

First we need a folder to save all project files in htdocs in XAMPP installation folder and   set up an index.php file with the basic tags to use HTML5 in directory where we will have all project files.

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal web page</title>
</head>
<body>
</body>
</html>
```

Now we will make a header with our information

```html
<body>
    <div class="header">
        <h1>Your Name</h1>
        <p>Your Profession</p>
    </div>
</body>
```

And using the header class we can set a header style and also  we are go to change the body font family with the next code in style.css in the same project directory

```css
.header {
    padding: 60px;
    text-align: center;
    background: #284b63;
    color: white;
    font-size: 30px;
}
body {
    margin: 0px;
    background-color: #ffffff;
    font-family: Arial, Helvetica, sans-serif;
}
```

To import the css style in our index.php we need the next liner in the head index file

```html
<link rel="stylesheet" href="style.css">
```

After that you need to have something like this

![picture1](/opt/lampp/htdocs/newTutorial/picture1.png)

Now let to make a section your post your experience, to save your experience we will use a XML file with the next extructure

```xml
<experience>
    <post>
        <title>Title of your experience 1</title>
        <body>
            Description of your experience 1
        </body>
    </post>
    <post>
        <title>Title of your experience 2</title>
        <body>
            Description of your experience 2
        </body>
    </post>
</experience>
```

To use that information in the XML file we need read that in the index.php file with the next instruction after body tag

```php
<?php
    $experience = simplexml_load_file("experiences.xml") or die("Unable to open file!");
?>
```

This code reads the XML file and save that information in $experience variable

Now we need to desing how to look every experience post, with the next code is a draft of a post

```html
<br/>
<div class='row'>
    <div class='column'>
        <h2>Post title</h2>
        <p>Post body</p>
    </div>
</div>
```

Like that we can make a layout but that is only text then it is missing style, using the class atribute we can set up layout style in the style.css file

```css
* {
    box-sizing: border-box;
}
.column {
    width: 80%;
    margin: 2em auto;
    padding: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;
    background-color: #ffffff;
    font-size: 20px;
}
.row {
    margin: 0 -5px;
    padding: 0 12%;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
```

After set up your page should look like this

![](/opt/lampp/htdocs/newTutorial/picture2.png)

Now we need automate the process to make a post reading the experiences file with PHP replacing the post draf with the next code

```php
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
```

With that code we get each post in the experiences file, and when you open the page, it   should look like this

![](/opt/lampp/htdocs/newTutorial/picture3.png)

Now we go to make side navigator to show our social networks like Gihub, GitLab, Linkedin and other side tag to make one more thing later.

After the  page header and before the posts is necessary next code

```html
<br/>
<div id="mySidenav" class="sidenav">
    <a href="https://github.com/*****" id="sideTag1" target="_blank">GitHub</a>
    <a href="https://gitlab.com/*****" id="sideTag2" target="_blank">GitLab</a>
    <a href="https://www.linkedin.com/in/*****/" id="sideTag3" target="_blank">Linkedin</a>
    <a href="contact.php" id="sideTag4">Contact</a>
</div>
```

If you notice, the urls of the above code need to be replaced by your address and also it needs its style then use the next code in the style.css file

```css
#mySidenav a {
    position: absolute;
    left: -130px;
    transition: 0.5s;
    padding: 15px;
    width: 150px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}
#mySidenav a:hover {
    left: 0;
}
#sideTag1 {
    top: 80px;
    background-color: #0760AF;
}
#sideTag2 {
    top: 140px;
    background-color: #EB001E;
}
#sideTag3 {
    top: 200px;
    background-color: #24282E
}
#contact4 {
    top: 260px;
    background-color: #49CA36
}
```

After that the page has to look like this

![](/opt/lampp/htdocs/newTutorial/picture4.png)

To use more than one page we will emulate a contact page then we use the same code until the side navigator in other file called contact.php

```html
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
            <h1>Stiven Agudelo Osorno</h1>
            <p>Software Developer</p>
        </div>
        <br/>

        <div id="mySidenav" class="sidenav">
            <a href="https://github.com/sagudeloo" id="sideTag1" target="_blank">GitHub</a>
            <a href="https://gitlab.com/sagudeloo" id="sideTag2" target="_blank">GitLab</a>
            <a href="https://www.linkedin.com/in/sagudeloo/" id="sideTag3" target="_blank">Linkedin</a>
            <a href="index.php" id="sideTag4" target="_blank">Main Page</a>
        </div>
        <br/>
    </body>
</html>
```

And de page has to look like this

![](/opt/lampp/htdocs/newTutorial/picture5.png)

After the side navigator we going to add a PHP code to detect when the user send the form and next to we add the form with the next code

```html
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
```

And the next code is the style for the form

```css
input[type=email], input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical
}

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    padding: 20px;
    margin: 10px 20%;
}
```

After that your page has to look like this

![](/opt/lampp/htdocs/newTutorial/picture6.png)

And when you send the form it say thanks

![](/opt/lampp/htdocs/newTutorial/picture7.png)

And does it, good lucky.

### Index.php

```html
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
```

### contact.php

```html
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
```

### style.css

```css
.header {
    padding: 60px;
    text-align: center;
    background: #284b63;
    color: white;
    font-size: 30px;
}

body {
    margin: 0px;
    background-color: #ffffff;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.column {
    width: 80%;
    margin: 2em auto;
    padding: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;
    background-color: #ffffff;
    font-size: 20px;
}

.row {
    margin: 0 -5px;
    padding: 0 12%;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

#mySidenav a {
    position: absolute;
    left: -130px;
    transition: 0.5s;
    padding: 15px;
    width: 150px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#sideTag1 {
    top: 80px;
    background-color: #0760AF;
}

#sideTag2 {
    top: 140px;
    background-color: #EB001E;
}

#sideTag3 {
    top: 200px;
    background-color: #24282E
}

#sideTag4 {
    top: 260px;
    background-color: #49CA36
}

input[type=email], input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical
}

    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    padding: 20px;
    margin: 10px 20%;
}
```
