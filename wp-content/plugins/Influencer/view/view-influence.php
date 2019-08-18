<?php
   global $wpdb;

    $data_res  = $wpdb->get_results($wpdb->prepare(
        "SELECT * from wp_influencer where type = 'influencer'",""
      )
    );
// echo "<pre>"; print_r($data_res); echo "</pre>";
// echo admin_url();
    ?>
<div class="row justify-content-center">
    	<div class="col-9">
    		<h1 class="pb-3">Influencer Lists</h1>
    		 <table class="table" id="InfluencerTable">
			    <thead>
			      <tr>
						<td>S.no</td>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Social</th>
			        <th>Likes/Followers</th>
			        <th>Influencer Image</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			      	<?php
							$i = 1;
			      	foreach ($data_res as $data) { ?>
			      	  <tr>
								<td><?=$i++?></td>
				      	<td><?=$data->name?></td>
				        <td><?=$data->email?></td>
				        <td><?=$data->social?></td>
				        <td><?=$data->like_follow?></td>
				        <td><img src="<?=$data->image?>" height="50" width="50" class="rounded-circle"></td>

				        <td><a href="admin.php?page=editinfluence&edit=<?php echo $data->id; ?>" class="btn btn-info">Edit</a>
								<button class="btn btn-danger delinfluencer" id="del" delinfluencer="<?=$data->id?>">Delete</button></td>
				       </tr>
				   <?php
				    }
			        ?>
			    
			     
			    </tbody>
			  </table>
    	</div>
    </div>

   

