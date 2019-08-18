<?php
if(isset($_GET['edit'])) 
$id =  $_GET['edit'];
global $wpdb;
$influencer_detail = $wpdb->get_row(
  $wpdb->prepare(
    "SELECT * from wp_influencer where id = %d",$id 
  ),ARRAY_A
);

?>

<div class="row justify-content-center">
  <div class="col-5">
    <h1 class="text-center">Influencer Edit Form</h1>
    <form action="#" enctype="multipart/form-data" id="editInfluencerForm" method="post">
    <input type="hidden" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : 10; ?>" name="in_id">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" value="<?=$influencer_detail['name']?>" name="name" id="name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?=$influencer_detail['email']?>" id="email" autocomplete="off" required>
        </div>      
        <div class="form-group">
            <label for="social">Social Name</label>
            <select name="social_name" id="social_name" value="<?=$influencer_detail['social']?>" class="form-control" required>
              <option value="<?=$influencer_detail['social']?>"><?=$influencer_detail['social']?></option>
              <option value="facebook">Facebook</option>
              <option value="instagram">Instagram</option>
              <option value="youtube">Youtube</option>
            </select>
            <!-- <input type="text" class="form-control" name="social_name" id="social_name" value="<?=$influencer_detail['social']?>" autocomplete="off" required> -->
        </div>
        <div class="form-group">
            <label for="like_follow">Like/Follow</label>
            <input type="text" class="form-control" name="like_follow" id="like_follow" value="<?=$influencer_detail['like_follow']?>" autocomplete="off" required>
        </div>
        <input type="hidden" class="form-control" name="image_url" id="image_url"  value="<?=$influencer_detail['image']?>">
      <div class="form-group">
            <label for="Image">Image</label>
            <input type="button" class="btn btn-info" name="userpic" id="photo" value="image">
        </div> 
       <span id="show-image"><img src="<?=$influencer_detail['image']?>" height="60" width="60"></span><br>
        <button type="submit" class="btn btn-primary " name="influencer" id="submit">Submit</button>
      </form>
    </div>
  </div>