function deleteCategory(catId, catName, queCount) {
    if (queCount >= 1) {
        alert("You can't delete this category unless you delete all questions assigned to this category.");
    } else {
        if (confirm("Are you sure that you want to delete the following category?\n" + "\"" +catName + "\"")) {
            window.location.href = 'helpers/category-deleter.php?cat_id=' + catId;
        }
    }
}