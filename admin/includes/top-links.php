<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-secondary text-white mr-2">
            <i class="mdi mdi-home"></i>


        </span> ADMIN DASHBOARD

    </h3>

    <nav aria-label="breadcrumb">
    </nav>
</div>


<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">


            <?php
                // Fetch total number of users in the database
                $total_users_query = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users WHERE roles != 'Admin'");
                $total_users_result = mysqli_fetch_assoc($total_users_query);
                $total_users = $total_users_result['total_users'];
        ?>
            <a href="pages/forms/all-contestants.php">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Click here to see details of Registered Users<i
                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">
                        <? echo "Total Registered users: " . $total_users;?>

                    </h2>
                </div>
            </a>

        </div>
    </div>




    <?
        $total_votes_query = mysqli_query($conn, "SELECT SUM(no_Of_Votes) AS total_votes FROM votes ");
        // print_r($total_votes_query); die;
        $total_votes_result = mysqli_fetch_assoc($total_votes_query);
        $total_votes = $total_votes_result['total_votes'];
    
    ?>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-secondary card-img-holder text-white">
            <a href="pages/forms/view-votes.php">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Click here to see the details of votes<i
                            class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">
                        Total Numbers of Votes:
                        <? echo $total_votes;?>
                    </h2>
                </div>
            </a>
        </div>
    </div>



    <?php
                // Fetch total number of forms purchased in the database
                
                $total_form_purchased = mysqli_query($conn, "SELECT COUNT(*) AS total_forms FROM contestants");
                $total_forms_result = mysqli_fetch_assoc($total_form_purchased);
                $total_forms = $total_forms_result['total_forms'];
                // print_r($total_forms);
        ?>

    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">
                    Forms purchased
                    <i class="mdi mdi-diamond mdi-24px float-right">
                    </i>
                </h4>
                <h2 class="mb-5">
                    <? echo "Total Form Purchase: " . $total_forms; ?>
                </h2>
            </div>
        </div>
    </div>