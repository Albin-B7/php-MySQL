<?php 
/*Creating a session  based on a session identifier, passed via a GET or POST request.
  We will include config.php for connection with database.
  */

	 session_start();
   
  

   include_once('config.php');

   $user_id = $_SESSION['id'];
   
/*
If the user is admin we will fetch some datas from database and show them,
 and if user is not admin we will fetch some data based on his id and show those datas. 
 If the user is admin we will create a option to approve or decline a booking.
 If we want to approve a booking we will create a link which will link us with approve.php file,
  and if we want to decline we will create a link which will link us with decline.php file.
*/
   if ($_SESSION['is_admin'] == 'true') {

     $sql = "SELECT movies.movie_name, users.email,bookings.id, bookings.nr_tickets, bookings.date, bookings.is_approved, bookings.time FROM movies
     INNER JOIN bookings ON movies.id = bookings.movie_id
     INNER JOIN users ON users.id = bookings.user_id";
            

    $selectBookings = $conn->prepare($sql);
    $selectBookings->execute();

    $bookings_data = $selectBookings->fetchAll();
   }else {
    
      $sql = "SELECT movies.movie_name, users.email, bookings.nr_tickets, bookings.date,bookings.is_approved, bookings.time
            FROM movies INNER JOIN bookings ON movies.id = bookings.movie_id 
            INNER JOIN users ON users.id = bookings.user_id WHERE bookings.user_id = :user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->bindParam(':user_id',$user_id);
    $selectBookings->execute();

    $bookings_data = $selectBookings->fetchAll();

   }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Dashboard</title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
  	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png"><div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <ul class="nav flex-column">
           <?php if ($_SESSION['is_admin'] == 'true') { ?>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_movies.php">
              <span data-feather="file"></span>
              Movies
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
        
        <?php }else{ ?>
          <li class="nav-item">
              <a class="nav-link" href="home.php">
                <span data-feather="file"></span>
                Home
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="bookings.php">
              <span ></span>
              Bookings
            </a>
          </li>
          
        </ul>

        <?php }?>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       
      </div>

    

      <h2>Movie Bookings</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">