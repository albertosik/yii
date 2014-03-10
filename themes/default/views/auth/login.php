<link href="<?=Yii::app()->theme->baseUrl?>/css/signin.css" rel="stylesheet">
<form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>       
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
</form>