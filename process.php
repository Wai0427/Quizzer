<?php include 'database.php'; ?>

<?php session_start(); ?>

<?php 
//Check to see if score is set_error_handler
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }


    if($_POST){
        $number = $_POST['number'];
        $selected_choice = $_POST['choice'];

        // below showed to check whether it work to show the which question with which choice
        // echo $number . '<br>';
        // echo $selected_choice . '<br>';

        $next = $number+1;

        //Get total number of question
        $query = "SELECT * FROM `questions`";

        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;





        //To get correct choice
        $query = "SELECT * FROM `choices`
                    WHERE question_number = $number AND  is_correct = 1" ;

        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

        //Get row
        $row = $result->fetch_assoc();

        //set correct choice
        $correct = $row['id'];

        //compare
        if($correct == $selected_choice ) {
            //answer correct
            $_SESSION['score']++;

        }

        //check if was last question
        if($number == $total) {
            header("Location: final.php");
            exit();
        } else{
            header("Location: question.php?n=".$next);
        }

    }

?>