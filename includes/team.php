<?php
include "includes/conn.php";
?>

<section id="team" class="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <span class="title-icon float-left"><i class="fa fa-weixin"></i></span>
                <h2 style="color:#F58634;" class="title">TEAM MEMBERS<span class="title-desc">
                        A dedicated team running the GM ALLY Vision
                    </span>
                </h2>
            </div>
        </div>


        <div class="row">
            <?php
    $queryTeam = mysqli_query($conn, "SELECT * FROM team_members");

    while ($rowResult = mysqli_fetch_assoc($queryTeam)) {
        ?>
            <div class="col-md-3 col-sm-6">
                <div class="team wow fadeInUp" data-wow-delay=".6s">
                    <div class="img-square">
                        <!-- Convert binary image data to base64 and embed it -->
                        <?php
                    // Check if image content exists and is not empty
                    if (!empty($rowResult['image_content'])) {
                        // Convert binary data to base64 encoded string
                        $imageData = base64_encode($rowResult['image_content']);
                        // Output HTML with embedded image
                        echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="' . $rowResult['team_name'] . '" style="width:100%; height:auto;">';
                    } else {
                        // Output placeholder image if no image content exists
                        echo '<img src="images/team/team1.jpg" alt="' . $rowResult['team_name'] . '" style="width:100%; height:auto;">';
                    }
                    ?>
                    </div>

                    <div class="team-content">
                        <h3><?php echo $rowResult['team_name']; ?></h3>
                        <p style="color: #F58634;"><?php echo $rowResult['team_position']; ?></p>
                        <p><?php echo $rowResult['team_number']; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>



</section>