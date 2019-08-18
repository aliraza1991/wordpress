<?php
// require_once('../../../../wp-config.php');
if (array_key_exists('cid', $_GET))
    $cid =  $_GET['cid'];
// echo $id = isset($_GET['cid']);
// $c_id = isset($_GET['cid']) ? 1 : 0;
//  echo $c_id;
global $wpdb;
$company_detail = $wpdb->get_row(
  $wpdb->prepare(
    "SELECT * from wp_influencer where id = %d",$cid
  ),ARRAY_A
);

?>
<?php $wpdb->show_errors(); ?> 
<div class="row justify-content-center">
  <div class="col-5">
  <span class="message"></span>
      <h1 class="text-center">Company Edit Form</h1>
    <form  enctype="multipart/form-data" id="editCompanyForm" method="post">
      <input type="hidden" name="c_id" value="<?php echo isset($_GET['cid']) ? $_GET['cid'] : 0; ?>">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" value="<?php echo $company_detail['name']; ?>" name="name" id="name" autocomplete="off" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" value="<?php echo $company_detail['email']; ?>" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="Company name">Company Name</label>
          <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $company_detail['company_name']; ?>" autocomplete="off" required >
        </div> 
       <input type="hidden" class="form-control" name="image_url" id="image_url" value="<?php echo $company_detail['image']; ?>" >
        <div class="form-group">
            <label for="Image">Image</label>
          <input type="button" class="btn btn-primary" name="photo" id="photos" value="image">
        </div> 

        <span id="show-image"> <img src="<?php echo $company_detail['image']; ?>" height="50" width="50"></span><br>
        <button type="submit" class="btn btn-primary " name="editcompany" id="submit">Submit</button>
      </form>
  </div>
</div>
