<?php include "database.php"; ?>
<?php session_start(); ?>
<?php

// Set the question number

//(int) is used to convert the a value into interger
$number = (int) $_GET['n'];

/*

* GET TOTAL QUESTIONS

*/

$query = "SELECT * FROM `questions`";

// Get result

$results = $mysqli->query($query) or die($mysqli->error.__LINE__);

$total = $results->num_rows;

/*

* GET QUESTION

*/

$query = "SELECT * FROM `questions` WHERE question_number = $number";

// Result of the query

$result = $mysqli->query($query) or die($mysqli->error. __LINE__);

$question = $result->fetch_assoc();

// GET CHOICES

$query = "SELECT * FROM `choices` WHERE question_number = $number";

// Results of the query

$choices = $mysqli->query($query) or die($mysqli->error. __LINE__);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>PHP Quizzer</title>

<link rel="stylesheet" href="css/style.css" type="text/css">

</head>

<body>

<header>

<div class="container">

<h1>PHP Quizzer</h1>

</div>

</header>

<main>

<div class="container">

<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>

<p class="question">

<?php echo $question['text']; ?>

</p>

<form action="process.php" method="post">

<ul class="choices">

<?php while ($row = $choices->fetch_assoc()) : ?>

<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['text']; ?></li>

<?php endwhile; ?>

</ul>

<input type="submit" value="Submit">

<input type="hidden" name="number" value="<?php echo $number; ?>">

</form>

</div>

</main>

<footer>

<div class="container">

Copyright &copy; 2023 PHP Quizzer

</div>

</footer>

</body>

</html>