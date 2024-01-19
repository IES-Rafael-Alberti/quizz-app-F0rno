<?php   
    class Quiz {
        const answers = array( // Fix the typo in the constant name
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

        <!-- Question 1 -->
        <div class="question">
            <?php $quiz->correct_questions('q1', $quiz->is_response_set('q1')); ?>
            <p>1. What does PHP stand for?</p>
            <label><input type="radio" name="q1" value="a"> a) Personal Home Page</label>
            <label><input type="radio" name="q1" value="b"> b) PHP: Hypertext Preprocessor</label>
            <label><input type="radio" name="q1" value="c"> c) PHP Hyper Markup Language</label>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <?php $quiz->correct_questions('q2', $quiz->is_response_set('q2')); ?>
            <p>2. What is the result of 2 + 2 in PHP?</p>
            <label><input type="radio" name="q2" value="a"> a) 3</label>
            <label><input type="radio" name="q2" value="b"> b) 4</label>
            <label><input type="radio" name="q2" value="c"> c) 5</label>
        </div>

        <!-- Add more questions as needed -->

        <!-- Question 3 -->
        <div class="question">
            <?php $quiz->correct_questions('q3', $quiz->is_response_set('q3')); ?>
            <p>3. ¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?</p>
            <label><input type="radio" name="q3" value="a"> a) HelloWorld</label>
            <label><input type="radio" name="q3" value="b"> b) Hola Mundo</label>
            <label><input type="radio" name="q3" value="c"> c) HelloWorld</label>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <?php $quiz->correct_questions('q4', $quiz->is_response_set('q4')); ?>
            <p>4. ¿En PHP, qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?</p>
            <label><input type="radio" name="q4" value="a"> a) Bucle for</label>
            <label><input type="radio" name="q4" value="b"> b) Bucle while</label>
            <label><input type="radio" name="q4" value="c"> c) Bucle do...while</label>
            <label><input type="radio" name="q4" value="d"> d) Bucle foreach</label>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <?php $quiz->correct_questions('q5', $quiz->is_response_set('q5')); ?>
            <p>5. ¿Qué función de PHP se utiliza para abrir un archivo para escritura?</p>
            <label><input type="radio" name="q5" value="a"> a) fopen</label>
            <label><input type="radio" name="q5" value="b"> b) file_open</label>
            <label><input type="radio" name="q5" value="c"> c) open_file</label>
            <label><input type="radio" name="q5" value="d"> d) Ninguna de las anteriores</label>
        </div>

        <!-- Question 6 -->
        <div class="question">
            <?php $quiz->correct_questions('q6', $quiz->is_response_set('q6')); ?>
            <p>6. ¿Cuál es el propósito de la superglobal `$_GET` en PHP?</p>
            <label><input type="radio" name="q6" value="a"> a) Recuperar datos de un formulario con el método POST</label>
            <label><input type="radio" name="q6" value="b"> b) Almacenar variables de sesión</label>
            <label><input type="radio" name="q6" value="c"> c) Recuperar datos de la cadena de consulta URL</label>
            <label><input type="radio" name="q6" value="d"> d) Definir constantes globales</label>
        </div>

        <!-- Question 7 -->
        <div class="question">
            <?php $quiz->correct_questions('q7', $quiz->is_response_set('q7')); ?>
            <p>7. ¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?</p>
            <label><input type="radio" name="q7" value="a"> a) $this</label>
            <label><input type="radio" name="q7" value="b"> b) __LINE__</label>
            <label><input type="radio" name="q7" value="c"> c) $var</label>
            <label><input type="radio" name="q7" value="d"> d) functionName()</label>
        </div>

        <!-- Question 8 -->
        <div class="question">
            <?php $quiz->correct_questions('q8', $quiz->is_response_set('q8')); ?>
            <p>8. ¿Qué hace la función `include` en PHP?</p>
            <label><input type="radio" name="q8" value="a"> a) Ejecuta un bloque de código solo si una condición es verdadera</label>
            <label><input type="radio" name="q8" value="b"> b) Incluye y evalúa un archivo especificado</label>
            <label><input type="radio" name="q8" value="c"> c) Define una nueva función</label>
            <label><input type="radio" name="q8" value="d"> d) Genera un número aleatorio</label>
        </div>

        <!-- Question 9 -->
        <div class="question">
            <?php $quiz->correct_questions('q9', $quiz->is_response_set('q9')); ?>
            <p>9. ¿En PHP, qué comprueba el operador `===`?</p>
            <label><input type="radio" name="q9" value="a"> a) Igualdad</label>
            <label><input type="radio" name="q9" value="b"> b) Asignación</label>
            <label><input type="radio" name="q9" value="c"> c) Desigualdad</label>
            <label><input type="radio" name="q9" value="d"> d) Comparación</label>
        </div>

        <!-- Question 10 -->
        <div class="question">
            <?php $quiz->correct_questions('q10', $quiz->is_response_set('q10')); ?>
            <p>10. ¿Cuál de los siguientes se utiliza para crear un objeto en PHP?</p>
            <label><input type="radio" name="q10" value="a"> a) new</label>
            <label><input type="radio" name="q10" value="b"> b) objeto</label>
            <label><input type="radio" name="q10" value="c"> c) crear</label>
            <label><input type="radio" name="q10" value="d"> d) instancia</label>
        </div>

        <input type="submit" value="Submit">
    </form>
</body>
</html>