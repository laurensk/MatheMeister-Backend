function editQuestion(queId, level, catName, question, correctAnswer, wrongAnswerOne, wrongAnswerTwo, wrongAnswerThree) {
    window.location.href = 'edit-question.php?'
    + 'que_id=' + encodeURIComponent(queId)
    + '&que_level=' + encodeURIComponent(level)
    + '&cat_name=' + encodeURIComponent(catName)
    + '&que_question=' + encodeURIComponent(question)
    + '&que_correctAnswer=' + encodeURIComponent(correctAnswer)
    + '&que_wrongAnswerOne=' + encodeURIComponent(wrongAnswerOne)
    + '&que_wrongAnswerTwo=' + encodeURIComponent(wrongAnswerTwo)
    + '&que_wrongAnswerThree=' + encodeURIComponent(wrongAnswerThree);
}