<?php ?>
<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Horizontal Form</h4>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        <fieldset class="form-group">
          <div class="row">
            <div class="col-form-label col-sm-3 pt-0">Radios</div>
            <div class="col-sm-9">
              <div class="form-check">
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio3">First Radio</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                  <label class="custom-control-label" for="customRadio2">Second Radio</label>
                </div>
              </div>
            </div>
          </div>
        </fieldset>
        <div class="form-group row">
          <div class="col-sm-3">Checkbox</div>
          <div class="col-sm-9">
            <div class="form-check">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2">
                <label class="custom-control-label" for="customCheck2">Example Checkbox</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </div>
  </div>
</div>