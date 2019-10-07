<?php include_once("nav.php"); 
			include_once("model/book.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content ="width=device-width, initial-scale=1">
    <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<style type="text/css">
	  	.title{
	  		height: 50x;
	  		background-color:#000;
	  		color: #fff;
	  		text-align: center;

	  	}
	  	.content{
	  		text-align: center;
	  		height: 60px;
	  	}
	  	button{
	  		background-color: #FFF;
	  		border-radius: 5px ;
	  		border: 1px solid;
	  	}
	  	td:hover{
	  		background-color: #ccc;
	  		color: #ED4E4E;
	  	}
	  	label {
	  		display: block !important;

	  	}
	  	.modal-body input {
	  		width: 100%;
	  	}
	  </style>
<body>
	<?php if($_REQUEST['action'] == 'delete'){
			        book::delete($_REQUEST['id']);
	} 
	 if (isset($_REQUEST['submitedit'])) {
		$idedit= $_GET['idedit'];
		$editid= $_GET['editid'];
		$giaedit= $_GET['editgia'];
		$titledit= $_GET['edittitle'];
		$tacgiaedit= $_GET['edittacgia'];
		$yearedit= $_GET['edityear'];
		book::edit($idedit,$editid,$giaedit,$titledit,$tacgiaedit,$yearedit);
	}
	 ?>
	
	  <div align="center">
            <form action="" method="get">
                Search: <input type="text" name="search" placeholder="<?php echo $_GET['search'];  ?>" />
                <input type="submit" name="ok" value="search" />
            </form>
        </div>
        
	<div class="container">
		<table width="1000px" border="1px">
			<button name="them" type="button" data-toggle="modal" data-target="#exampleModal">Them</button>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">ADD new</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        	<form action="" method="get">
			        		<label>Id<input type="text" name="inputid" value="" required></label>
				        	<label>Gia<input type="text" name="inputgia" value="" required></label>
				        	<label>Title<input type="text" name="inputtitle" value="" required></label>
				        	<label>Tacgia<input type="text" name="inputtacgia" value="" required></label>
				        	<label>year<input type="text" name="inputyear" value="" required></label>
				        	<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        		<button type="submit" class="btn btn-primary" name="submitadd">Save changes</button>
				      		</div>
			        	</form>
			      		</div>
			    	</div>
			  	</div>
			</div>
			<?php 
			if (isset($_REQUEST['submitadd'])) {
				$idadd= $_GET['inputid'];
				$giaadd= $_GET['inputgia'];
				$titleadd= $_GET['inputtitle'];
				$tacgiaadd= $_GET['inputtacgia'];
				$tacgiayear= $_GET['inputyear'];
				book::add($idadd,$giaadd,$titleadd,$tacgiaadd,$tacgiayear);
			}
			 ?>

			<tr class="title" border: >
				<td>id</td>
				<td>Gia</td>
				<td>title</td>
				<td>tac gia</td>
				<td>year</td>
				<td>Thao tac</td>
			</tr>
			<?php 
			$file= book::getListFromFile();
			if (isset($_REQUEST['ok'])) { ?>
				<style>
					.default{display: none;}
				</style>
			<?php $search= $_GET['search'];
				book::search($search);
			 }

			foreach ($file as $lsa) { ?>
				<tr class="content default" >
					<td><?php echo $lsa->id ; ?></td>
					<td><?php echo $lsa->sprice ; ?></td>
					<td><?php echo $lsa->title; ?></td>
					<td><?php echo $lsa->author; ?></td>
					<td><?php echo $lsa->year; ?></td>
					<td>
						
	                        
	                       	<button type="button" data-toggle="modal" data-target="#exampleModal<?php echo $lsa->id; ?>">sua</button>
	                   

						<div class="modal fade" id="exampleModal<?php echo $lsa->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
						        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      		</div>
						      		<div class="modal-body">
						        	<form action="" method="get">
						        		<input type="hidden" name="idedit" value="<?php echo $lsa->id ; ?>"> 
						        		<label>Id<input type="text" name="editid" value="<?php echo $lsa->id ; ?>" required></label>
							        	<label>Gia<input type="text" name="editgia" value="<?php echo $lsa->sprice ; ?>" required></label>
							        	<label>Title<input type="text" name="edittitle" value="<?php echo $lsa->title; ?>" required></label>
							        	<label>Tacgia<input type="text" name="edittacgia" value="<?php echo $lsa->author; ?>" required></label>
							        	<label>year<input type="text" name="edityear" value="<?php echo $lsa->year; ?>" required></label>
							        	<div class="modal-footer">
							        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        		<button type="submit" class="btn btn-primary" name="submitedit">Save changes</button>
							      		</div>
						        	</form>
						      		</div>
						    	</div>
						  	</div>
						</div>
						<form action="" style=" display: inline-block;" method="get">
	                        <input type="hidden" name="action" value="delete"> 
	                        <input type="hidden" name="id" value="<?php echo $lsa->id ; ?>"> 
	                        <button> xoa</button>
	                    </form>
					</td>
				</tr>
			<?php  } ?>
			
		</table>
	</div>


</body>
</html>