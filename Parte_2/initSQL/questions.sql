INSERT INTO `quiz2`.`QUIZ` (`title`, `description`) VALUES ('PHP Quiz', 'A quiz about PHP');

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`) 
VALUES (
    '1. What does PHP stand for?', 
    'a) Personal Home Page', 
    'b) PHP: Hypertext Preprocessor', 
    'c) PHP Hyper Markup Language', 
    'd) PHP Hyper Markup Preprocessor', 
    'b', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '2. What is the result of 2 + 2 in PHP?', 
    'a) 3', 
    'b) 4', 
    'c) 5', 
    'd) 6', 
    'b', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '3. ¿Cuál es el resultado de `echo "Hola" . " " . "Mundo";`?', 
    'a) HelloWorld', 
    'b) Hola Mundo', 
    'c) HelloWorld', 
    'd) Hola Mundo', 
    'b', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '4. ¿En PHP, qué bucle se utiliza para ejecutar un bloque de código un número especificado de veces?', 
    'a) Bucle for', 
    'b) Bucle while', 
    'c) Bucle do...while', 
    'd) Bucle foreach', 
    'a', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '5. ¿Qué función de PHP se utiliza para abrir un archivo para escritura?', 
    'a) fopen', 
    'b) file_open', 
    'c) open_file', 
    'd) Ninguna de las anteriores', 
    'a', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '6. ¿Cuál es el propósito de la superglobal `$_GET` en PHP?', 
    'a) Recuperar datos de un formulario con el método POST', 
    'b) Almacenar variables de sesión', 
    'c) Recuperar datos de la cadena de consulta URL', 
    'd) Definir constantes globales', 
    'c', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '7. ¿Cuál de los siguientes es un ejemplo de constante mágica de PHP?', 
    '$this', 
    '__LINE__', 
    '$var', 
    'functionName()', 
    '__LINE__', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '8. ¿Qué hace la función `include` en PHP?', 
    'a) Ejecuta un bloque de código solo si una condición es verdadera', 
    'b) Incluye y evalúa un archivo especificado', 
    'c) Define una nueva función', 
    'd) Genera un número aleatorio', 
    'b', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '9. ¿En PHP, qué comprueba el operador `===`?', 
    'a) Igualdad', 
    'b) Asignación', 
    'c) Desigualdad', 
    'd) Comparación', 
    'd', 
    '1'
);

INSERT INTO `quiz2`.`QUESTION` 
(`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `QUIZ_quiz_id`)
VALUES (
    '10. ¿Cuál de los siguientes se utiliza para crear un objeto en PHP?', 
    'a) new', 
    'b) objeto', 
    'c) crear', 
    'd) instancia', 
    'a', 
    '1'
);