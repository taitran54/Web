<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>HomePage</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px; 
    }
    .navbar-nav {
        padding-left: 400px;

    }
    .nav-item avatar{
        position: absolute;
    }
    .imagecontent {
      left: 200px;
      bottom: auto;
      position: absolute;
    }
    .text {
      color: #000000;
      position: absolute;
      bottom: 200px;
      
    }
    .content {
      height: 400px;
      width: 100%;
      background-image:url(1.jpg) ;     
      background-size: cover;

    } 
    .right textarea{
      padding: 7.5px 15px;
      width: 100%;
      border: 1px solid #cccccc;
      outline: none;
      font-size: 16px;
      min-height: 120px;
      color: #666666;
    }
   
</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-grey">
        <a href="#" class="navbar-brand">
            <img src="1.jpg" height="28" alt="ClassRoom">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="Assignment.php" class="nav-item nav-link">Assignment</a>
                <a href="status.php" class="nav-item nav-link">Status</a>
                <a href="showmembers.php" class="nav-item nav-link">Members</a>
            </div>
            <ul class="navbar-nav ml-auto nav-flex-icons">
              <li class="nav-item avatar">
                <a class="nav-link p-0" href="#">
                    <img src="1.jpg" class="rounded-circle z-depth-0"
                    alt="avatar image" height="35">
                </a>
              </li>
            </ul>
        </div>
    </nav>
    <div class="content">
      <div class="text">
        <p>Name Class: ??????</p>
        <p>Describe Class: ??????</p>
        <p>Class Code: ??????</p>
        <p>Room: ??????</p>
        <p>Object: ??????</p>
      </div>
    </div>
  
    
    <table class="fixed" border="1px" height="100%" width="100%">
        <tr align="center" valign="middle">
            <td class="left" width= "100px"> 
              <p>Your Assignment</p>
              <a href="Assignment.php">See all</a>
            </td>
            <td class="right" width="350px">
                <textarea name="textarea" placeholder="Give Your text here......"></textarea>
                <br>
                <input type="file" name="fileupdate" value="Choose File">
                <input type="submit" placeholder="Send" value="Send">
            </td>
        </tr>       
    </table>
    <tbody>display all notification here

    </tbody>
</div>
<footer>
  footer
</footer>
</body>
</html>
