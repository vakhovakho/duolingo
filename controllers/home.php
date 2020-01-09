<?php
    if(!empty($_REQUEST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $topicID = $_REQUEST['topic'];
        $spanish = $_REQUEST['spanish'];
        $english = $_REQUEST['english'];
        $example = $_REQUEST['example'];
    
        $sql = "INSERT INTO translations (topic_id, spanish, english, example) 
        VALUES ('$topicID', '$spanish', '$english', '$example')";
        
        var_dump('location: /' . $file !== 'home' ? $file : '');
        if ($con->query($sql) === TRUE) {
            header('location: /' . $referer ?? '');    
        } else {
            header('location: /' . $referer ?? '' . '?success=false');    
        }
    }
    
    $sql = "SELECT * FROM translations WHERE forgot = 1 ORDER BY created_at DESC";
    $result = $con->query($sql);
    $forgot = [
        'id' => 0,
        'name' => 'Forgotten Words',
        'translations' => $result->fetch_all(MYSQLI_ASSOC)
    ];   
    
    $sql = "SELECT * FROM topics";
    $result = $con->query($sql);
    
    $topics = $result->fetch_all(MYSQLI_ASSOC);   
    
    foreach($topics as $key => $topic) {
        $newArr = new ArrayObject($topic);
    
        $topicId = $newArr['id'];
        
        $sql = "SELECT * FROM translations WHERE topic_id = $topicId ORDER BY created_at DESC";
        $result = $con->query($sql);
        $newArr['translations'] = $result->fetch_all(MYSQLI_ASSOC);
        $topics[$key] = $newArr;   
        
    }
    
    uasort($topics,"sortByTranslationsCount");
    
    array_unshift($topics, $forgot);
    
    $con->close();
?>
