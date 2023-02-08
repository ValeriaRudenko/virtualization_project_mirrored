<nav class="navbar navbar-expand-lg">
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html"
          >Home <span class="sr-only">(current)</span></a
        >
      </li>
      <?php
        session_start();
        require "conn.php";
      ?>
      <?php
        if (!isset($_SESSION["name"])) {
            echo '<li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Sign up
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="signup/signup as doctor.html"
            >SignUp as Doctor</a
          >
          <a class="dropdown-item" href="signup/signup as patient.html"
            >SignUp as Patient</a
          >
        </div>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Log in
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login/login as doctor.html"
            >Log in as Doctor</a
          >
          <a class="dropdown-item" href="login/login as patient.html"
            >Log in as Patient</a
          >
        </div>
      </li>';
    
  }
?>
    
      <li class="nav-item">
        <a class="nav-link" href="list of doctors.php">Our doctors</a>
      </li>
      <?php
            echo '<li class="nav-item">
              <a class="nav-link" href="appointment 1.php">Register with a doctor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="check-out.php">Check-out with a doctor</a>
            </li>';

      ?>
      <li class="nav-item">
        <a class="nav-link" href="find the doctor.php">Search for a doctor</a>
      </li>
      <?php

            echo '<li class="nav-item">
            <a class="nav-link" href="patient card.php">Patient card</a>
            </li>';

      ?>
      
      <?php

            echo '<li class="nav-item">
          <a class="nav-link" href="schedule.php">Working schedule</a>
            </li>';

      ?>
    </ul>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
