function editCategory(catId, catName) {
    window.location.href = 'edit-category.php?cat_id=' + encodeURIComponent(catId) + '&cat_name=' + encodeURIComponent(catName);
}