<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="omijn">
    <link rel="icon" href="favicon.ico">

    <title>Instagrabber</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>   
    <div class="container">
      <div class="header clearfix">        
        <h3>Instagram image downloader</h3>
      </div>


      <div class="jumbotron">

        <h1 style="margin-top:0">Instagrabber</h1>
        <!-- <h4 class="text-muted" style="color:#ccc;"></h4> -->        
        <form action="grab.php" method="POST">
        
        <div class="form-group">
		    <label for="imgurl" class="lead">Enter image url</label>
		    <input type="text" class="form-control" id="imgurl" name="imgurl" placeholder="eg. http://www.instagram.com/p/91MGx5Bdjg/" autofocus>
		    <input type="submit" name="btn_one" class="btn btn-lg btn-success" value="Grab" style="width:100%"/>
		</div>
        
        <div class="form-group">
		    <label for="imgurl" class="lead">Or enter username</label>
		    <input type="text" class="form-control" id="uname" name="uname" placeholder="eg. alexstrohl">
		    <input type="text" class="form-control" name="limit" placeholder="Download first 'n' images. Enter n. (optional)">
		    <input type="submit" name="btn_all" class="btn btn-lg btn-success" value="Grab all" style="width:100%"/>
		</div>		

        </form>
      <p class="alert alert-dismissible alert-warning" style="text-align:center; font-size:18px">Disclaimer: This site only downloads pictures from public instagram accounts.</p>

      </div>

      

      <footer class="footer">
        <p>&copy; omijn 2015</p>
      </footer>

    </div> <!-- /container -->


    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>