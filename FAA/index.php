<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
.login{
    margin-top: 20%;
   
}

  </style>
  <body class="bg-dark text-white">
      <div class="container">
          <div class="row">
              <div class="col-4 offset-4">
                  <div class="login">
                      <h2 class="text-center">Login </h2>
                      <form action="login.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text"  name = "username" class="form-control text-center" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                          </div>

                          <div class="input-group mb-3">
                            <input type="password" required name="pwd" class="form-control text-center" id="pwd_input" placeholder="password">
                            <div class="input-group-append">
                              <span class="input-group-text" onclick="change_input()"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </div>
                          </div>

                         

                          <div class="remember">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" class="text-primary">Remember Me</label>
                          </div>

                          <div class="forgot">
                              <span class="text-left"><a href="#">Forgot password?</a></span>
                          </div>

                          <div class="text-center">
                            <input type="submit" required value="Login" class="btn btn-primary">
                        </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function change_input(){
             x = document.getElementById("pwd_input").type
             if (x == "password"){
                 document.getElementById("pwd_input").type= "text"
             }
             else{
                document.getElementById("pwd_input").type= "password"
             }

        }
    </script>
  </body>
</html>