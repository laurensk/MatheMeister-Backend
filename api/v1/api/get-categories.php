<?php

/*
API: GET-CATEGORIES
-----
Get all categories with category id.
*/

$sth = sprintf("SELECT * FROM mm_category ORDER BY cat_name");

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