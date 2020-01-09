<?php 
if(isset($_REQUEST['success'])){
    if($_REQUEST['success'] == "false") {
        echo "<p class='warning' style='color: red; cursor: pointer' >Error: " . $sql . "<br>" . $con->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spanish Dictionary</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li class="<?= $file === "home" ? "active" : '' ?>"> <a href="/"> Home </a> </li>
            <li class="<?= $file === "random" ? "active" : '' ?>"> <a href="/random"> Random </a> </li>
        </ul>
    </nav>
    <div class="header">
        <form method="post" action="https://spanish.test/">
            <input type="text" name="english" id="english" required placeholder="English">
            <input type="text" name="spanish" id="english" required placeholder="Spanish">
            <input type="text" name="example" id="example" placeholder="Example">
            <select name="topic" id="topic">
            <?php foreach($topics as $topic) { 
                if($topic['id'] !== 0) {
                    if(!array_key_exists($topic['name'])) {
                        var_dump($topic);
                    }?>
                <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
            <?php }} ?>
            </select>
            <input type="submit" value="Save">
        </form>
        
        <button class="show-all"> Show All </button>
    </div>
    
    <?php require('../views/' . $file . '.php'); ?> 

    <div class="modal hidden"> 
        <p> </p>
    </div>
    
    <script src="./assets/js/jquery.min.js"></script>   
    <script src="./assets/js/script.js"></script>    
</body>
</html>