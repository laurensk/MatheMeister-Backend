function deleteQuestion(queId, queQuestion) {
    if (confirm("Are you sure that you want to delete the following question?\n" + "\"" +queQuestion + "\"")) {
        window.location.href = 'helpers/question-deleter.php?que_id=' + queId;
    }
}