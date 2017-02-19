<?php

    $dates = [
        '11-12-2019',
        '2-4-1993',
        '02-5-1993',
        '17-05-2011',
        'a-5-1883',
        '7-a-2019',
        '11-4-93'
    ];

    $reg_pattern = '/0?\d\-0?\d\-\d{4}/';
    $match = [];

    foreach ($dates as  $date){
        preg_match_all($reg_pattern,$date,$match);

        if ($match) var_dump($match);
    }
