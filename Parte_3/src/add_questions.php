<?php
/*
-- -----------------------------------------------------
-- Table `quiz2`.`QUESTION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quiz2`.`QUESTION` (
  `question_id` INT NOT NULL AUTO_INCREMENT,
  `question_text` VARCHAR(255) NOT NULL,
  `option_a` VARCHAR(255) NOT NULL,
  `option_b` VARCHAR(255) NOT NULL,
  `option_c` VARCHAR(255) NOT NULL,
  `option_d` VARCHAR(255) NOT NULL,
  `correct_option` VARCHAR(1) NOT NULL,
  `QUIZ_quiz_id` INT NOT NULL,
  `question_type` ENUM('single_choice', 'multiple_choice', 'short_answer') NULL,
  PRIMARY KEY (`question_id`),
  INDEX `fk_QUESTION_QUIZ_idx` (`QUIZ_quiz_id` ASC) VISIBLE,
  CONSTRAINT `fk_QUESTION_QUIZ`
    FOREIGN KEY (`QUIZ_quiz_id`)
    REFERENCES `quiz2`.`QUIZ` (`quiz_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);*/

    // Connect to the database and take the questions from QUIZ table
    $servername = "db";
    $username = "user";
    $password = "user";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, "quiz2");  

    // If any filed is not set then return false
    if (
        isset($_POST['question']) || 
        isset($_POST['option_a']) || 
        isset($_POST['option_b']) || 
        isset($_POST['option_c']) || 
        isset($_POST['option_d']) || 
        isset($_POST['correct_option']) || 
        isset($_POST['question_type'])) 
        {
        // Add the question to the db
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question'];
            $option_a = $_POST['option_a'];
            $option_b = $_POST['option_b'];
            $option_c = $_POST['option_c'];
            $option_d = $_POST['option_d'];
            $correct_option = $_POST['correct_option'];
            $question_type = $_POST['question_type'];
            $sql = "INSERT INTO QUESTION (question_text, option_a, option_b, option_c, option_d, correct_option, question_type, QUIZ_quiz_id) VALUES ('$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_option', '$question_type', 1)";
            $conn->query($sql);
            echo "Question added successfully";
        }   
    }

    // Close the connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a>
    <!--Make a form to add questions-->
    <form action="add_questions.php" method="post">
        <label for="question">Question</label>
        <input type="text" name="question" id="question">
        <br>
        <label for="option_a">Option A</label>
        <input type="text" name="option_a" id="option_a">
        <br>
        <label for="option_b">Option B</label>
        <input type="text" name="option_b" id="option_b">
        <br>
        <label for="option_c">Option C</label>
        <input type="text" name="option_c" id="option_c">
        <br>
        <label for="option_d">Option D</label>
        <input type="text" name="option_d" id="option_d">
        <br>
        <label for="correct_option">Correct Option</label>
        <input type="text" name="correct_option" id="correct_option">
        <br> 
        <label for="question_type" require>
            <input type="radio" name="question_type" id="question_type" value="single_choice"> Single Choice
            <input type="radio" name="question_type" id="question_type" value="multiple_choice"> Multiple Choice
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>