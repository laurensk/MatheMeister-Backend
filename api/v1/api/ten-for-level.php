<?php

/*
API: TEN-FOR-LEVEL
-----
Get ten questions for the users level.
*/

$level = $data["level"];

if(empty(trim($level))) {
    echo_util("error: not all information given");
    $conn->close();
    exit;
}

$sth = sprintf("SELECT * FROM mm_questions WHERE que_level = '%s' ORDER BY RAND() LIMIT 10", $level);

$result = mysqli_query($conn, $sth);

if (mysqli_num_rows($result) > 0) {
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo_util($rows);
} else {
    echo_util("0 results");
}

exit;

?>