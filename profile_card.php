<?php
// php database connection
require 'db/config.php';
$sql = "SELECT * FROM profile_info ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<!------------------------------- profile card pqage ------------------------------------------------->

<!------------------main container------------------------>
<div class="container border border-1 rounded mt-3 ">

    <!-------------------- head ------------------->
    <div class="container-fluid  m-2 head text-center">
        <a href="add_form.php" class="btn btn-primary text-center ms-5" name="">Add Profile</a>
        <a href="delete_all.php" class="btn btn-danger btn-sm text-center float-end" name="">Delete all records</a>
    </div>
    <hr class="border-2">

    <!-----------------------profile grid container----------------------->
    <div class="flex_container profile border border-2 rounded m-1">

        <!-----------------profile card grid-------------------->
        <?php
        if ($result != 0) {
        ?>
            <?php

            $i = 0;
            while ($record = mysqli_fetch_assoc($result)) {
            ?>
                <div class="card border-0">

                    <!---container-->
                    <div class="row">
                        <div class="img-box">

                            <img src="<?php echo $record['image']; ?>" class="img" alt="img" width="110" height="151">
                        </div>
                        <div class="text-box">
                            <h5><?php echo $record['name']; ?></h4>
                                <h6><i><?php echo $record['profession']; ?></i></h6>
                                <p>+91 <?php echo $record['mobile']; ?></p>
                                <p><?php echo $record['email']; ?></p>
                                <div class="social-links mt-3">
                                    <a href="<?php echo $record['github'] ?>" class="fa-brands fa-github  link"></a>
                                    <a href="<?php echo $record['linkedin']; ?>" class="fa-brands fa-linkedin-in link"></a>
                                    <!-- <a href="http://" class="fa-brands fa-codepen link"></a> -->
                                    <a href="<?php echo $record['web']; ?>" class="fa-solid fa-globe link"></a>
                                </div>
                        </div>
                    </div>
                    <!-- card action buttons -->

                    <div class="card-bottom p-1">
                        <a href=" update_card.php?id=<?php echo $record['id']; ?>" class="btn btn-outline-success  btn-sm text-center" name="edit">Edit</a>
                        <a href="delete_card.php?id=<?php echo $record['id']; ?> " class="btn btn-outline-danger btn-sm text-center" name="delete">Delete</a>
                    </div>


                </div>

        <?php
                $i++;
            }
        } else {
            echo "<script> alert(' No Records Found '); </script>";
        }
        ?>

        <!-- first card end -->

    </div>

</div>