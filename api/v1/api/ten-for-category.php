<?php

/*
API: TEN-FOR-CATEGROY
-----
Get ten questions for a category but exclude already answered questions
*/

$catId = $data["catId"];
$answeredQuestionIds = $data["answeredQuestionIds"];

if(empty(trim($catId))) {
    echo_util("error: not all information given");
    $conn->close();
    exit;
}

$sth = sprintf("SELECT * FROM mm_questions WHERE que_catId = '%s' AND que_id NOT IN (%s) ORDER BY RAND() LIMIT 10", $catId, $answeredQuestionIds);

$result = mysqli_query($conn, $sth);

if (mysqli_num_rows($result) > 0) {
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo_util($rows);
} else {
    echo_util("no more questions");
}

exit;

?>