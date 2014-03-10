<div class="jumbotron">
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Наименование</th>
            <th>Цена</th>            
            </tr>
        </thead>
        <tbody>           
<?php
    foreach ($goods as $g)
    {
        ?>
            <tr><td><?=$g->name?></td><td><?=$g->price?></td></tr>
        <?php
    }
?>
        </tbody>
  </table>
<?php
    $this->widget('CLinkPager', array('pages'=>$pag)); 
?>
</div>