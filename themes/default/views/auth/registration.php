<link href="<?=Yii::app()->theme->baseUrl?>/css/signin.css" rel="stylesheet">
<!--<form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Registration</h2>
        <input type="email" name="User[email]" class="form-control" placeholder="Email address" required autofocus>
        <input type="text" name="User[name]" class="form-control" placeholder="Name">
        <input type="password" name="User[password]" class="form-control" placeholder="Password" required>       
        <input type="password" name="User[repassword]" class="form-control" placeholder="Re-password" required>       
        <input type="file" name="User[photo]" class="form-control">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Registration</button>
</form>-->


<?=CHtml::form('','post',array('class'=>'form-signin', 'enctype'=>'multipart/form-data')); ?>
<h2 class="form-signin-heading">Registration</h2>
<?=CHtml::errorSummary($form); ?>
<?=CHtml::activeTextField($form, 'email', array('class'=>'form-control', 'placeholder'=>'Email')) ?>
<?=CHtml::activeTextField($form, 'name', array('class'=>'form-control', 'placeholder'=>'Name')) ?>
<?=CHtml::activePasswordField($form, 'password', array('class'=>'form-control', 'placeholder'=>'Password')) ?>
<?=CHtml::activePasswordField($form, 'repassword', array('class'=>'form-control', 'placeholder'=>'Repassword')) ?>
<?=CHtml::activeFileField($form, 'image', array('class'=>'form-control')) ?>
<?=CHtml::button('Registration', array('type'=>'submit','name' => 'submit', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
<?=CHtml::endForm(); ?>
