
<div class="row justify-content-center">
  <div class="col-8">
      <h1 class="text-center">Company Form</h1>
      <span id="message"></span>
    <form action="#" enctype="multipart/form-data" id="companyForm" method="post">
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
          <label for="Company name">Company Name</label>
          <input type="text" class="form-control" name="company_name" id="company_name" autocomplete="off" required >
        </div> 
        <input type="hidden" class="form-control" name="image_url" id="image_url"  >
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="button" class="btn btn-primary" name="photo" id="photos" value="image" required>
        </div> 
        <span id="show-image"></span><br>
        <button type="submit" class="btn btn-primary " name="company" id="submit">Submit</button>
      </form>
  </div>
</div>
