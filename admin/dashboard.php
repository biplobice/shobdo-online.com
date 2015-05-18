<?php require_once '_assets/inc/global.inc.php' ?>
<?php require_once 'admin_header.php'; ?>

<?php displayMessages(); ?>

<div class="panel panel-default">
	<div class="panel-heading">
    	<h4><i class="glyphicon glyphicon-user"></i> Items Table
        <?php $disabled = ($_SESSION['type'] == "home-news")? "disabled" : ""; // disable add for home-news ?>
        &nbsp; <a <?php echo $disabled ?> href="add.php" class="btn btn-success btn-sm pull-right"><b>+</b> Add New Item</a></h4>
    </div>
    
    <!--<div class="panel-body">-->
    	<table class="table table-responsive table-striped table-condensed table-hover">
        	<thead>
            <tr>
                <th>#</th>
                <th>Thumb</th>
                <th>Title</th>
                <th>Url</th>
                <th class="text-center" style="width:120px;">Control</th>
            </tr>
           </thead>
           <tbody>
              <?php
				displayXml($xml);
			  	?>
           </tbody>
       </table>
    <!--</div>-->
    <div class="panel-footer">
 
    </div>
</div>                      
<?php require_once 'admin_footer.php'; ?>
