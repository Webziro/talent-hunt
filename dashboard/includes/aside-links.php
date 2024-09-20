 <ul class="nav">
     <li class="nav-item nav-profile">
         <a href="#" class="nav-link">
             <div class="nav-profile-image">
                 <img src="assets/images/faces/face1.jpg" alt="profile">
                 <span class="login-status online"></span>
                 <!--change to offline or busy as needed-->
             </div>

             <?php
                $queryVerify = mysqli_query($conn, "SELECT a.Uname uname, b.name catName FROM users a JOIN categories b ON a.Utalent=b.id WHERE a.id = '$userid' ");
                
                $rowVerify = mysqli_fetch_assoc($queryVerify);
            ?>
             <div class="nav-profile-text d-flex flex-column">
                 <span class="font-weight-bold mb-2"><?php echo $rowVerify['uname']; ?></span>
                 <span class="text-secondary text-small"><strong style="color: black;">Talent:</strong> <br>
                     <?php echo $rowVerify['catName'];?></span>
             </div>
             <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
         </a>

     </li>


     <li class="nav-item">
         <a class="nav-link" href="index.php">
             <span class="menu-title" style="color: #000f;">GMA User Dashboard</span>

         </a>
     </li>


     <li class="nav-item">
         <a class="nav-link" href="pages/forms/profile.php">
             <span class="menu-title">View my Profile</span>
             <i class="mdi mdi-format-list-bulleted menu-icon"></i>
         </a>
     </li>



     <li class="nav-item">
         <a class="nav-link" href="pages/forms/editprofile.php">
             <span class="menu-title">Edit Profile</span>
             <i class="mdi mdi-pen menu-icon"></i>
         </a>
     </li>


     <li class="nav-item">
         <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
             aria-controls="general-pages">
             <span class="menu-title">Password</span>
             <i class="menu-arrow"></i>
             <i class="mdi mdi-medical-bag menu-icon"></i>
         </a>
         <div class="collapse" id="general-pages">
             <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="pages/password/changepass.php"> Change Password </a>
                 </li>
                 <li class="nav-item"> <a class="nav-link" href="pages/password/signout.php"> Sign Out</a></li>
             </ul>
         </div>
     </li>



     <!-- <li class="nav-item sidebar-actions">
         <span class="nav-link">
             <div class="border-bottom">
                 <h6 class="font-weight-normal mb-3">Projects</h6>
             </div>
             <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
         </span>
     </li> -->
 </ul>