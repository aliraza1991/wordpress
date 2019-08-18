<?php

 $id = $_GET['id'];

 global $wpdb;
 $get_res = $wpdb->get_row($wpdb->prepare(
     "SELECT * from wp_influencer where id = $id",""
 ),ARRAY_A
 );


 
//  print_r($get_res);
?>

    <div class="row">
       
        <?php
        if($get_res['type']=="influencer"){
            ?>
            <div class="col-lg-7">
            <h3>This Company contact to you.</h3>
            <table class="table" id="">
            <tr><th>S.no</th><th>Name</th><th>Email</th><th>Company Name</th><th>Company Logo</th></tr>
              <?php
                global $wpdb;
               $influencer_contact = $wpdb->get_results($wpdb->prepare(
                  "SELECT * from wp_influencer_contact where influencer_id = %d",$id
                )
                );
                $s = 1;
                foreach($influencer_contact as $contact){
                  $comId = $contact->company_id;
                  $com_datas = $wpdb->get_results($wpdb->prepare(
                    "SELECT * from wp_influencer where id = %d",$comId
                  )
                  );
                  
                  foreach($com_datas as $com_data){
                  ?>
                  
			            <tr>
                  <td><?=$s++?></td>
                    <td><?=$com_data->name?></td>
                    <td><?=$com_data->email?></td>
                    <td><?=$com_data->company_name?></td>
                    <td><img src="<?=$com_data->image?>" height="50" width="50" class="rounded-circle"></td>
                  </tr>
                
                  <?php
                  }
                }
              ?>
                </table>
            </div>
            <div class="col-lg-5">
            <div class="">
            <h3>Influencer Detail</h3>
            <table class="table" id="">
			      <tr>
			        <th>Name</th>
                    <td><?=$get_res['name']?></td>
                  </tr>
                  <tr>
			        <th>Email</th>
                    <td><?=$get_res['email']?></td>
                  </tr>
                  <tr>
			        <th>Social</th>
                    <td><?=$get_res['social']?></td>
                  </tr>
                  <tr>
			        <th>Likes/Followers</th>
                    <td><?=$get_res['like_follow']?></td>
                  </tr>
                  <tr>
			        <th>Profile Image</th>
                    <td><img src="<?=$get_res['image']?>" height="50" width="50" class="rounded-circle"></td>
                  </tr>
                  <tr>
			        <th>Action</th>
                    <td><a href="edit-profile/?edit=<?php echo $get_res['id']; ?>" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger delinfluencer" id="del" delinfluencer="<?=$get_res['id']?>">Delete</button>
                    </td>
			      </tr>
			</table>
            </div>
            </div>
            <?php
        }
        elseif($get_res['type']=="company"){
            ?>
             <div class="col-lg-7">
             <h3>Influencers details</h3>
             <table class="table" id="companyTable">
             <thead>        
			      <tr>
			        <th>Name</th>
              <th>Social</th>
              <th>Likes/Followers</th>  
              <th>Profile Image</th> 
              <th>Connect</th> 
            </tr> 
            </thead>  
            <tbody>
                <?php
                global $wpdb;
                $get_res1 = $wpdb->get_results($wpdb->prepare(
                    "SELECT * from wp_influencer where type = %s","influencer"
                )
                );
               
                foreach($get_res1 as $data){
                    ?>
           
          
                  <tr>
                    <td><?=$data->name?></td>
                    <td><?=$data->social?></td>
                    <td><?=$data->like_follow?></td>
                    <td><img src="<?=$data->image?>" height="50" width="50" class="rounded-circle"></td>
                    <td>
                    <?php
                     $get_res2 = $wpdb->get_row($wpdb->prepare(
                      "SELECT * from wp_influencer_contact where company_id = %d AND influencer_id = %d",$id,$data->id
                  ),ARRAY_A
                  );
                  if($get_res2){
                   echo '<a href="javascript:void(0)" class="btn btn-warning">Contacted</a>';
                  }
                  else{
                    ?>
                   
                      <a href="javascript:void(0)" class="btn btn-primary influencer_contact" name="influencer" influencer_id="<?=$data->id?>" company_id="<?=$id?>" id="influencer_contact">Contact</a>
                    </td>
                  </tr>
            
                 
			
                    <?php
                }
              }
                ?>
                </tbody>
                </table>
            </div>
            <div class="col-lg-5">
            <div class="">
            <h3>Company Detail</h3>
            <table class="table" id="">
			      <tr>
			        <th>Name</th>
                    <td><?=$get_res['name']?></td>
                  </tr>
                  <tr>
			        <th>Email</th>
                    <td><?=$get_res['email']?></td>
                  </tr>
                  <tr>
			        <th>Company Name</th>
                    <td><?=$get_res['company_name']?></td>
                  </tr>
                  <tr>
			        <th>Company Logo</th>
                    <td><img src="<?=$get_res['image']?>" height="50" width="50" class="rounded-circle"></td>
                  </tr>
                  <tr>
			        <th>Action</th>
                    <td><a href="edit-profile/?edit=<?php echo $get_res['id']; ?>" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger delinfluencer" id="del" delinfluencer="<?=$get_res['id']?>">Delete</button>
                    </td>
			      </tr>
			</table>
            </div>
        </div>
            <?php
        }
        else{
            echo "Sorry no record found";
        }
        ?>

           
    </div>

