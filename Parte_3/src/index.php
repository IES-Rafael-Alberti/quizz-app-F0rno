<?php
    // Connect to the database and take the questions from QUIZ table
    $servername = "db";
    $username = "user";
    $password = "user";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, "quiz2");  
    
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
    ON UPDATE NO ACTION);
    */

    class Quiz {
        const answers = array(
            'q1' => 'b',
            'q2' => 'c',
            'q3' => 'b',
            'q4' => 'a',
            'q5' => 'd',
            'q6' => 'c',
            'q7' => 'b',
            'q8' => 'b',
            'q9' => 'a',
            'q10' => 'a'
        );
        public function check_response($question, $response) {
            if (!array_key_exists($question, self::answers)) {
                return false;
            }
            return $response == self::answers[$question];
        }
        public function check_form() {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                return false;
            }
            return true;
        }
        public function is_response_set($response) {
            if (!isset($_POST[$response])) {
                return false;
            }
            return $_POST[$response];
        }
        public function correct_questions($question, $response) {
            if (!$this->check_form()) {
                return;
            }
            if ($response == null) {
                echo "<span class='no_response'>No respondida</span>";
                return;
            }
            if ($this->check_response($question, $response)) {
                echo "<span class='ok'>Correcta</span>";
            } else {
                echo "<span class='wrong'>Incorrecta</span>";
            }
        }
    }
    $quiz = new Quiz();
    $quiz->check_form();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz</title>
    <link rel="stylesheet" href="quiz.css">
</head>
<body>
    <form method="post" action="index.php">
        <h1>PHP Quiz</h1>

        <!-- Get questions from quiz 1 from the DB and convert it to html -->
        <?php
            $sql = "SELECT * FROM QUESTION WHERE QUIZ_quiz_id = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $i = 1;
                while($row = $result->fetch_assoc()) {
                    // If the question is multiple choice, use checkboxes
                    // instead of radio buttons
                    if ($row["question_type"] == "multiple_choice") {
                        echo "<div class='question'>";
                        $quiz->correct_questions('q' . $i, $quiz->is_response_set('q' . $i));
                        echo "<p>" . " " . $row["question_text"] . "</p>";
                        echo "<label><input type='checkbox' name='q" . $i . "' value='a'> " . $row["option_a"] . "</label>";
                        echo "<label><input type='checkbox' name='q" . $i . "' value='b'> " . $row["option_b"] . "</label>";
                        echo "<label><input type='checkbox' name='q" . $i . "' value='c'> " . $row["option_c"] . "</label>";
                        echo "<label><input type='checkbox' name='q" . $i . "' value='d'> " . $row["option_d"] . "</label>";
                        echo "</div>";
                        $i++;
                        continue;
                    }
                    echo "<div class='question'>";
                    $quiz->correct_questions('q' . $i, $quiz->is_response_set('q' . $i));
                    echo "<p>" . " " . $row["question_text"] . "</p>";
                    echo "<label><input type='radio' name='q" . $i . "' value='a'> " . $row["option_a"] . "</label>";
                    echo "<label><input type='radio' name='q" . $i . "' value='b'> " . $row["option_b"] . "</label>";
                    echo "<label><input type='radio' name='q" . $i . "' value='c'> " . $row["option_c"] . "</label>";
                    echo "<label><input type='radio' name='q" . $i . "' value='d'> " . $row["option_d"] . "</label>";
                    echo "</div>";
                    $i++;
                }
            } else {
                echo "0 results";
            }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    $conn->close();
?>