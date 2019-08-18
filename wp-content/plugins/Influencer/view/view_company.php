<?php

// require_once('../../../../wp-config.php');
   global $wpdb;

    $data_res  = $wpdb->get_results($wpdb->prepare(
        "SELECT * from wp_influencer where type = 'company' order by id ASC"," "
      )
    );

    // $wpdb->delete(
    //   "wp_company_wp",
    //   [
    //     "id"=>1
    //   ]
    // )

    ?>
    <div class="row justify-content-center">
    	<div class="col-8">
    		<h1 class="pb-3">Companies Lists</h1>
    		 <table class="table" id="companyTable">
			    <thead>
			      <tr>
			      	<th>S.no</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Company Name</th>
			        <th>Company Logo</th>
			            <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			      	<?php
			      	$i=1;
			      	foreach ($data_res as $data) { ?>

			      	  <tr>
			      	  	<td><?=$i++?></td>
				      	<td><?=$data->name?></td>
				        <td><?=$data->email?></td>
				        <td><?=$data->company_name?></td>
				        <td><img src="<?=$data->image?>" height="50" width="50" class="rounded-circle"></td>
				        <td><a href="admin.php?page=editcompany&cid=<?php echo $data->id; ?>" class="btn btn-info">edit</a>
								<a href="javascript:void(0)" class="delcompany btn btn-danger" del="<?php echo $data->id; ?>">delete</a></td>
				       </tr>
				   <?php
				    }
			        ?>
			    
			     
			    </tbody>
			  </table>
    	</div>
    </div>
     
		  
	