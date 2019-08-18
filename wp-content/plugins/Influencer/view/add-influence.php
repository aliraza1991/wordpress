
<div class="row justify-content-center">
  <div class="col-8">
    <h1 class="text-center">Influencer Form</h1>
    <form action="#" enctype="multipart/form-data" id="influencerForm" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="social">Social Name</label>
            <select name="social_name" id="social_name" class="form-control" required>
              <option value="">Select Social Name</option>
              <option value="facebook">Facebook</option>
              <option value="instagram">Instagram</option>
              <option value="youtube">Youtube</option>
            </select>
            <!-- <input type="text" class="form-control" name="social_name" id="social_name" autocomplete="off" required> -->
        </div>
        <div class="form-group">
            <label for="like_follow">Like/Follow</label>
            <input type="text" class="form-control" name="like_follow" id="like_follow" autocomplete="off" required>
        </div>
        <input type="hidden" class="form-control" name="image_url" id="image_url">
      <div class="form-group">
            <label for="Image">Image</label>
            <input type="button" class="btn btn-info" name="userpic" id="photo" value="image">
        </div> 
       <span id="show-image"></span><br>
        <button type="submit" class="btn btn-primary " name="influencer" id="submit">Submit</button>
      </form>
    </div>
  </div>