<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-secondary text-white mr-2">
            <i class="mdi mdi-home"></i>

            <?php
                $queryVerify = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid' ");
                //  or die(mysqli_error($conn));
                while($rowVerify = mysqli_fetch_assoc($queryVerify)){
            ?>
        </span> USER Serial Number: <?php echo $rowVerify['verification_code']; ?>

    </h3>
    <?php }
                ?>
    <nav aria-label="breadcrumb">
    </nav>
</div>
<?php if(isset($_SESSION['msg'])){ ?>
<div class="alert alert-success">
    <?= $_SESSION['msg'] ?>
</div>
<?php unset($_SESSION['msg']); } ?>






<!--Count the numbers of form purchased by a contestant-->
<?
    $contestantId = $userid;
    // Query to check if the contestant ID exists in the contestants table
    $querypurchase = mysqli_query($conn, "SELECT COUNT(*) AS form_count FROM contestants WHERE contestantId = $contestantId");

?>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">

            <a href="pages/forms/buyform.php">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Contestants<i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">

                        <?php

                    // Check if the query executed successfully
                    if ($querypurchase) {
                        // Fetch the result as an associative array
                        $rowpurchase = mysqli_fetch_assoc($querypurchase);

                        // Check if the count is greater than zero
                        if ($rowpurchase['form_count'] > 0) {
                            echo "You have purchased your form";
                        } else {
                            echo "No form purchased yet!";
                        }
                    } else {
                        // Handle query execution error
                        // echo "Error executing query: " . mysqli_error($conn);
                        echo "Network error!";
                    }
                    ?>



                    </h2>
                </div>
            </a>

        </div>
    </div>












    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-secondary card-img-holder text-white">
            <a href="pages/forms/view-votes.php">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">You have
                        <?php
                            $queryVerify = mysqli_query($conn, "SELECT SUM(no_Of_Votes) votes FROM votes WHERE userId = '$userid' "); 
                            echo mysqli_fetch_assoc($queryVerify)['votes'];
                        ?>
                        vote(s) <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">View my votes</h2>
                </div>

            </a>
        </div>
    </div>



    <!-- Copy Link to clipboard -->
    <div>
        <h6 style="color: red;">My Voting Link</h6>
        <p id="link">
            http://localhost:60/localserver/gm-talent/votes/contestants.php?c_id=<?= $userid ?>&&cat_id=<?= $result['Utalent'] ?>
        </p>
        <button class="btn btn-secondary" id="copyButton">Copy Voting Link</button>

    </div>

    <script>
    document.getElementById("copyButton").addEventListener("click", function() {
        // Get the link text
        var linkText = document.getElementById("link").innerText;

        // Create a temporary input element
        var tempInput = document.createElement('input');
        tempInput.setAttribute('value', linkText);
        document.body.appendChild(tempInput);

        // Select the text inside the input element
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices

        document.execCommand('copy');

        // Remove the temporary input element
        document.body.removeChild(tempInput);

        // Show a confirmation message
        alert('Link copied to clipboard: ' + linkText);
    });
    </script>