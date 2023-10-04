<?php



$title = $email = $ingredients = "";
$errors = array("email"=>"","title"=>"","ingredients"=>"");


if(isset($_POST["submit"])){
    //chack email
    if(empty($_POST["email"])){
        $errors["email"] = 'An error has ocurred enter a email <br />';
    } else{
    //htmlspecialchars makes the characters entered into html so they cant make xxs attack
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $errors["email"] = "email must be a valid email adress" ;
        }
    }

    //chack title
    if(empty($_POST["title"])){
        $errors["title"] = "An error has ocurred enter a title <br />";
    } else{
        $title = $_POST["title"];
        // this means that it has to be letters and can be as big as you want
        if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $errors["title"] =  "Title must be letters and spaces only <br />";
        }
    }
    //chack ingredients
    if(empty($_POST["ingredients"])){
        $errors["ingredients"] = "An error has ocurred enter a ingredients <br />";
    } else{
        $ingredients = $_POST["ingredients"];
        //looking for comma separated list of words
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
            $errors["ingredients"] =  "Ingredients must be a coma separated list";
        }
    }
    //checkif there where errors
    if(array_filter($errors)){
        //if true = there are errors
        //echo "errors in the form";

    } else{
        //echo "form is valid"; 
        header("location: index.php");
    }
} //End of post check

?>

<?php

include("Templates/header.php");
?>

<section>
    <h4>Add a Pizza</h4>
    <form action="add.php" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
        <div style="color:red"><?php echo $errors["email"];?></div>
        <label>Pizza title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div style="color:red"><?php echo $errors["title"];?></div>
        <label>Ingredients (Separated by commas):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <div style="color:red"><?php echo $errors["ingredients"];?></div>
        <input type="submit" name="submit" value="submit">
    </form>
</section>

<?php
include("Templates/footer.php");

?>