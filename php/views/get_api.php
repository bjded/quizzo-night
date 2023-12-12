<?php
    $json = file_get_contents('https://opentdb.com/api.php?amount=10&category=9&difficulty=easy');
    $data = json_decode($json, true);
    $trivia_data = $data['results'];

    //echo $json_data;
    //echo '<pre>';
    //print_r($trivia_data);

    foreach ($trivia_data as $td) {
        echo '<p>Q: ' . $td["question"] . '</p>';
        echo '<p>A: ' . $td["correct_answer"] . '</p>';
    }
?>
