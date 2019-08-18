<?php
  $editID = isset($_GET['edit']) ? $_GET['edit'] : 0 ;
  global $wpdb;
  $getData = $wpdb->get_row($wpdb->prepare(
    "SELECT * from wp_influencer where id = %d",$editID
  ),ARRAY_A
);
$type = $getData['type'];
if($type =="company"){
   ?>
   <div class="row justify-content-center">
      <div class="col-lg-6">
      <h1 class="text-center">Company Edit Profile</h1>
    <form  enctype="multipart/form-data" id="editCompanyForm" method="post">
      <input type="hidden" name="c_id" value="<?=$getData['id']?>">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" value="<?php echo $getData['name']; ?>" name="name" id="name" autocomplete="off" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" value="<?php echo $getData['email']; ?>" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="Company name">Company Name</label>
          <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $getData['company_name']; ?>" autocomplete="off" required >
        </div> 
       <input type="hidden" class="form-control" name="image_url" id="image_url" value="<?php echo $getData['image']; ?>" >
        <div class="form-group">
            <label for="Image">Image</label>
          <input type="button" class="btn btn-primary" name="photo" id="photos" value="image">
        </div> 

        <span id="show-image"> <img src="<?php echo $getData['image']; ?>" height="50" width="50"></span><br>
        <button type="submit" class="btn btn-primary " name="editcompany" id="submit">Submit</button>
      </form>
   <?php
}else{
   ?>
    <h1 class="text-center">Influencer Edit Profile</h1>
    <form action="#" enctype="multipart/form-data" id="editInfluencerForm" method="post">
    <input type="hidden" value="<?=$getData['id']?>" name="in_id">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" value="<?=$getData['name']?>" name="name" id="name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?=$getData['email']?>" id="email" autocomplete="off" required>
        </div>      
        <div class="form-group">
            <label for="social">Social Name</label>
            <select name="social_name" id="social_name" value="<?=$getData['social']?>" class="form-control" required>
              <option value="<?=$getData['social']?>"><?=$getData['social']?></option>
              <option value="facebook">Facebook</option>
              <option value="instagram">Instagram</option>
              <option value="youtube">Youtube</option>
            </select>
        </div>
        <div class="form-group">
            <label for="like_follow">Like/Follow</label>
            <input type="text" class="form-control" name="like_follow" id="like_follow" value="<?=$getData['like_follow']?>" autocomplete="off" required>
        </div>
        <input type="hidden" class="form-control" name="image_url" id="image_url"  value="<?=$getData['image']?>">
      <div class="form-group">
            <label for="Image">Image</label>
            <input type="button" class="btn btn-info" name="userpic" id="photo" value="image">
        </div> 
       <span id="show-image"><img src="<?=$getData['image']?>" height="60" width="60"></span><br>
        <button type="submit" class="btn btn-primary " name="influencer" id="submit">Submit</button>
      </form>
      </div>
   </div>
   <?php
}
?>