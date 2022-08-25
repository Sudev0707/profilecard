<?php
//error_reporting(0);
// php database connection
require 'db/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Profile</title>
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
    <div class="container border border-2 rounded mt-3">

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
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-header text-center p-2">
                        <h5>Add Profile info</h5>
                    </div>
                    <div class="form-body ">

                        <div class="input">
                            <input class="form-control " type="text" placeholder="enter full name" aria-label=".form-control-sm" name="na" required>
                        </div>
                        <div class="input">
                            <select class="form-select" aria-label="Default select" name="prof" required>
                                <option selected="" placeholder="sbbnb" values="not selected">Select your option</option>
                                <option value="Full Stack Developer">Full Stack Developer</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="Designer">Designer</option>
                                <option value="Analyst">Analyst</option>
                                <option value="Java Developer">Java Developer</option>
                                <option value="PHP Developer">PHP Developer</option>
                                <option value="Software Engineer">Software Engineer</option>
                                <option value="Data Scientist">Data Scientist</option>
                            </select>
                        </div>
                        <div class="input">
                            <input class="form-control " type="number" placeholder="enter mobile" aria-label=".form-control-sm" name="mob" pattern="[0-9]" minlength="10" required>
                        </div>
                        <div class="input">
                            <input class="form-control " type="email" placeholder="enter valid email" aria-label=".form-control-sm" name="email" required>
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
                            <input type="submit" class="btn btn-success w-50" type="button" name="submit_data" value="SUBMIT">
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

if (isset($_POST['submit_data'])) {

    $name = $conn->real_escape_string($_POST['na']);
    $prof = $_POST['prof'];
    $mobile = $_POST['mob'];
    $email = $_POST['email'];

    //FILE
    $file_name = $_FILES['img']['name']; // img
    $file_tmp = $_FILES['img']['tmp_name']; // img
    $folder = 'uploads/' . $file_name;

    move_uploaded_file($file_tmp, $folder);

    $github = $_POST['s1'];
    $linkedin = $_POST['s2'];
    $web = $_POST['s3'];

    // validation
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    // query for submit form data to the database table
    $sql = " INSERT INTO profile_info (name, profession, mobile, email, image, github, linkedin, web) 
    VALUES('$name', '$prof', '$mobile', '$email', '$folder', '$github', '$linkedin', '$web')";

    // execute query
    $data = mysqli_query($conn, $sql);

    if ($data) {
        echo "<script> alert(' record added successfully '); </script>";
        header("Location: index.php");
?>
        <meta http-equiv="refresh" content="0;URL=index.php" />

<?php
    } else {
        echo "<script> alert(' record could not add '); </script>" . $sql . " " . mysqli_error($conn);
        // echo "Error" . $sql . " " . mysqli_error($conn);
    }
    mysqli_close(($conn));
}

?>

<?php
// The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script.
// The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
?>