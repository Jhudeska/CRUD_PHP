<?php
     session_start();

    // initialize variables
    $name = " ";
    $address = " ";
    $id = 0;
    $edit_state = false;


    // connect to database
    $db = mysqli_connect('localhost', 'mamp', 'root', 'crud_p');

if (!$db) {
    echo "geen verbinding!";
}

    // if save button is clicked
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $address = $_POST['address'];

        $query = "INSERT INTO info(name, address) VALUES ('$name', '$address')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = " Address save";
        header('location: index.php');  // redirect tot index page after inserting
    }


    // update records
    if (isset($_POST['update'])){
        $name = mysqli_real_escape_string($_POST['name']);
        $name = mysqli_real_escape_string($_POST['address']);
        $id = mysqli_real_escape_string($_POST['id']);

        mysqli_query($db, "UPDATE info SET  name='$name', address='$address', WHERE id='$id'");
        $_SESSION['msg'] = "Address updates";
        header('location: index.php');

    }

    //delete records
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE from info WHERE id=$id " );
           $_SESSION['msg'] = "Address deleted";
        header('location: index.php');
    }


    // retrieve records
    $results = mysqli_query($db, "SELECT * FROM info");



?>