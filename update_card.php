<?php
error_reporting(0);
require 'db/config.php';

$id = $_GET['id'];

// select all data from id no.
$sql = "SELECT * FROM profile_info WHERE id=$id";
// execute query
$result = mysqli_query($conn, $sql);
// fetch data from table using id
$data = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/24bb2596e9.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark sticky-top">
        <!-- Navbar content -->
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="#">
                <h1 class="d-inline-block align-text-top"> Profile Card </h1>
            </a>
        </div>
    </nav>

    <!------------------main container------------------------>
    <div class="container border border-2 rounded mt-2">

        <!-------------------- head ------------------->
        <div class="container-fluid  m-2 head text-center">
            <a href="index.php" class="btn btn-outline-warning text-center" name="">Home</a>
            <!-- <a href="" class="btn btn-primary text-center" name="">Add Profile</a> -->
        </div>
        <hr class="border-2">

        <!-----------------------profile grid container----------------------->
        <div class="flex_container profile border border-2 rounded m-1">

            <!-----------------profile card grid-------------------->

            <!------------------------- second form ------------------------------------>
            <div class="second-form-container">
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-header text-center p-2">
                        <h5>Update Profile Info</h5>
                    </div>
                    <div class="form-body ">

                        <div class="input">
                            <input class="form-control " type="text" value="<?php echo $data['name']; ?>" placeholder="enter full name" aria-label=".form-control-sm" name="na" required>
                        </div>
                        <div class="input">
                            <select class="form-select" value="<?php echo $data['profession']; ?>" aria-label="Default select" name="prof" required>
                                <option selected="" placeholder="sbbnb" value="not selected">Select your option</option>

                                <option value="Full Stack Developer" <?php
                                                                        if ($data['profession'] == 'Full Stack Developer') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Full Stack Developer</option>
                                <option value="Frontend Developer" <?php
                                                                    if ($data['profession'] == 'Frontend Developer') {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Frontend Developer</option>
                                <option value="Backend Developer" <?php
                                                                    if ($data['profession'] == 'Backend Developer') {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Backend Developer</option>
                                <option value="Designer" <?php
                                                            if ($data['profession'] == 'Designer') {
                                                                echo "selected";
                                                            }
                                                            ?>>Designer</option>
                                <option value="Analyst" <?php
                                                        if ($data['profession'] == 'Analyst') {
                                                            echo "selected";
                                                        }
                                                        ?>>Analyst</option>
                                <option value="Java Developer" <?php
                                                                if ($data['profession'] == 'Java Developer') {
                                                                    echo "selected";
                                                                }
                                                                ?>>Java Developer</option>
                                <option value="PHP Developer" <?php
                                                                if ($data['profession'] == 'PHP Developer') {
                                                                    echo "selected";
                                                                }
                                                                ?>>PHP Developer</option>
                                <option value="Software Engineer" <?php
                                                                    if ($data['profession'] == 'Software Engineer') {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Software Engineer</option>
                                <option value="Data Scientist" <?php
                                                                if ($data['profession'] == 'Data Scientist') {
                                                                    echo "selected";
                                                                }
                                                                ?>>Data Scientist</option>
                            </select>
                        </div>
                        <div class="input">
                            <input class="form-control " type="number" value="<?php echo $data['mobile']; ?>" placeholder="enter mobile" aria-label=".form-control-sm" name="mob" pattern="[0-9]" minlength="10" required>
                        </div>
                        <div class="input">
                            <input class="form-control " type="email" value="<?php echo $data['email']; ?>" placeholder="enter valid email" aria-label=".form-control-sm" name="email" required>
                        </div>
                        <div class="input">
                            <input class="form-control" type="file" id="formFile" name="img">
                        </div>
                        <hr>

                        <!-- url input -->
                        <div class="input">
                            <input class="form-control url" type="url" placeholder="enter github profile link" pattern="https://.*" size="30" aria-label=".form-control-sm" name="s1">
                        </div>
                        <div class="input">
                            <input class="form-control url" type="url" placeholder="enter linkedin profile link" pattern="https://.*" size="30" aria-label=".form-control-sm" name="s2">
                        </div>
                        <div class="input">
                            <input class="form-control url" type="url" placeholder="enter your website URL" pattern="https://.*" size="30" aria-label=".form-control-sm" name="s3">
                        </div>

                    </div>
                    <!-- form footer -->
                    <div class="form-footer p-2">
                        <div class="button text-center mt-1">
                            <input type="submit" class="btn btn-success w-50" type="button" name="update_data" value="UPDATE">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['update_data'])) {

    $name = $conn->real_escape_string($_POST['na']);
    $prof = $_POST['prof'];
    $mobile = $_POST['mob'];
    $email = $_POST['email'];

    //FILE
    $file_name = $_FILES['img']['name']; // img
    $file_tmp = $_FILES['img']['tmp_name']; // img
    $folder = "uploads/".$file_name;

    $github = $_POST['s1'];
    $linkedin = $_POST['s2'];
    $web = $_POST['s3'];

    // validation


    // submit form data to the database table
    // $sql = " INSERT INTO profile_info (name, profession, mobile, email, image, github, linkedin, web) 
    // VALUES('$name', '$prof', '$mobile', '$email', '$folder', '$github', '$linkedin', '$web')";

    // update form data to the database table
    $sql = "UPDATE profile_info SET name='$name',profession='$prof',mobile='$mobile',email='$email',image='$folder',github='$github',linkedin='$linkedin',web='$web' WHERE id=$id";

    // execute query
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "<script> alert(' Record updated successfully '); </script>";
        ?>
        <meta http-equiv="refresh" content="0;URL=index.php" />
        <?php
    } else {
        echo "<script> alert('Failed to update'); </script>" . $sql . " " . mysqli_error($conn);
        // echo "Error" . $sql . " " . mysqli_error($conn);
    }    
    //mysqli_close(($conn));
}
?>