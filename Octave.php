
<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM register
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!-- Save this as Octave.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="Octave.css">
        
    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    

     <title>Octave</title>
</head>
<body>
    <div class="sidebar close">
        <ul class="nav-links">
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-headphone'></i>
              </a>
            </div>
          </li>
          <!-- An Album -->
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-album'></i>
              </a>
            </div>
          </li>
          <!-- Top Trending -->
          <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-trending-up'></i>
                </a>
            </div>
          </li>
          <!-- Your Music -->
          <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-music' ></i>
                </a>
            </div>
          </li>
          <!-- Genre -->
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-loader'></i>
              </a>
            </div>
          </li>
          <!-- Upload song -->
          <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-headphone'></i>
                </a>
            </div>
          </li>
          <!-- Artist -->
          <li>
            <div class="iocn-link"></div>
                <a href="#">
                    <i class='bx bx-male'></i>
                </a>
            </div>
          </li>
          <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-headphone'></i>
                </a>
            </div>
          </li>
        </ul>
    </div>
    <script>
      let arrow = document.querySelectorAll(".arrow");
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e)=>{
       let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
       arrowParent.classList.toggle("showMenu");
        });
      }
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      console.log(sidebarBtn);
      sidebarBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
      });
      </script>
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            Hello <?= htmlspecialchars($user["name"]) ?>
            <span class="logo navLogo"><a href="#">Octave</a>
        </span>
        


            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">Octave</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>

                <ul class="nav-links">
                    <li><a href="#">Trending</a></li>
                    <li><a href="#">Artist</a></li>
                    <li><a href="#">Genre</a></li>
                </ul>
            </div>

            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>

                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                    </div>

                    <div class="search-field">
                        <input type="text" placeholder="Search your music...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<script>

const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});

</script>  
<img src="home_page.png" alt="home_page" width="100%" height="80%">

<div class="about">
  <h2>About Us</h2>
 
</div>

















</body>
</html>