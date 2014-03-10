<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=Yii::app()->name?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=Yii::app()->theme->baseUrl?>/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/yii/"><?=Yii::app()->name?></a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="">Hello, <?=Yii::app()->user->name;?></a></li>             
              
              <?php
              if(Yii::app()->user->isGuest)
              {
                  ?>
                    <li><a href="/yii/auth/registration">Registration</a></li>  
                  <?php
              }
              else 
              {
                  ?>
                    <li><a href="/yii/auth/logout">Exit</a></li>  
                  <?php
              }
              ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      <?=$content?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?=Yii::app()->theme->baseUrl?>/js/bootstrap.min.js"></script>
  </body>
</html>


