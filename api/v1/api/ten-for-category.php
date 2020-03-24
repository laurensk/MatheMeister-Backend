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

if (mysqli_num_rows($result) >= 10) {
    while($r = mysqli_fetch_assoc($result)) {

        // get creator fullname for question
        $creatorUuid = $r["que_creatorUuid"];
        $cuSth = sprintf("SELECT use_fullname FROM mm_users WHERE use_id = '%s'", $creatorUuid);
        $cuRes = $conn->query($cuSth);
        $cuRow = mysqli_fetch_assoc($cuRes);
        $r["que_creatorFullname"] = $cuRow['use_fullname'];

        // get category name for question
        $categoryId = $r["que_catId"];
        $caSth = sprintf("SELECT cat_name FROM mm_category WHERE cat_id = '%s'", $categoryId);
        $caRes = $conn->query($caSth);
        $caRow = mysqli_fetch_assoc($caRes);
        $r["que_catName"] = $caRow['cat_name'];
        
        $rows[] = $r;
    }
    echo_util($rows);
} else {
    echo_util("not enough questions");
}

exit;

?>