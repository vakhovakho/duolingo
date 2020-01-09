<?php
    
    $sql = "SELECT * FROM 
            (
                (
                    SELECT *
                    FROM translations AS t1
                    WHERE forgot = 1
                    ORDER BY RAND()
                    LIMIT 50
                )
                UNION
                (
                    SELECT *
                    FROM translations AS t2
                    WHERE forgot = 0
                    ORDER BY RAND()
                    LIMIT 100
                )
            ) AS t3
            ORDER BY RAND()
            LIMIT 100
    ";
    $result = $con->query($sql);
    
    $top100 = [
        'id' => 0,
        'name' => 'Random 100 Words',
        'translations' => $result->fetch_all(MYSQLI_ASSOC)
    ];
    

    $sql = "SELECT * FROM topics";
    $result = $con->query($sql);
    
    $topics = $result->fetch_all(MYSQLI_ASSOC);   
    
    array_unshift($topics, $top100);

    
    $con->close();
?>
