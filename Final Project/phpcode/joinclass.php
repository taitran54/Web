<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Join Class</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <style type="text/css">
          .formjoinclass {
            position: absolute;
            left: 500px;
            bottom: 250px;
          }
          .currentuser{
            position: absolute;
            left: 500px;
          }       
      </style>
      <script type="text/javascript">
        function validationJoinClassName(){
          var checkclassname = document.formjoinclass.classname.value;
          if ( checkclassname == "" ) {
            alert("Please Enter Class Name");
            return false;
          }
        }
      </script>
   </head>
   <body>
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
         <a class="navbar-brand" href="Homepage.php">Return</a>
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link">Join Class</a>
            </li>           
         </ul>
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
              <a class="nav-link" href="logout.php">Log out</a>
           </li>
         </ul>
      </nav>
      
      <form class="currentuser">
        <div class="form-group">
          <label for="inputcurrentuser">You're currently signed in as:</label>
          <br>
          <img src="1.jpg"  class="rounded-circle z-depth-0"
                    alt="avatar image" height="35">
                    <small id="namedisplay" class="form-text text-muted">Name display from db</small>
                    <small id="emaildisplay" class="form-text text-muted">Email display from db</small>
          <button type="submit" class="btn btn-primary">Switch Account</button>
        </div>
      </form>

      <form class="formjoinclass" name="formjoinclass" method="post" onsubmit="return validationJoinClassName()">
        <div class="form-group">
          <label for="inputclassname">Class Name</label>
          <small class="form-text text-muted">Ask your teacher for the class name, then enter it here.</small>
          <input type="text" class="form-control" id="classname" aria-describedby="className" placeholder="Class Name">         
          <button type="submit" class="btn btn-primary">Join</button>
        </div>
      </form>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </body>
</html>
