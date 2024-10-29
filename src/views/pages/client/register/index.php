<section class="logReg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-sm-10 col-md-8">
        <div class="logReg-box">
          <h2 class="logReg-box__title">Registration</h2>
          <p class="logReg-box__desc">For new user you have to register here</p>
          <form id="registerForm" action="" method="post">
            <div class="row">
              <div class="col-12">
                <div class="logReg__input">
                  <input type="text" name="name" placeholder="Name">
                </div>
              </div>
              <div class="col-12">
                <div class="logReg__input">
                  <input type="tel" name="phone" placeholder="Phone">
                </div>
              </div>
              <div class="col-12">
                <div class="logReg__input">
                  <input type="password" name="password" placeholder="Password">
                </div>
              </div>
              <div class="col-12">
                <div class="logReg__input">
                  <input type="password" name="confirmPassword" placeholder="Confirm Password">
                </div>
              </div>
              <div class="col-12">
                <ul id="error-list" class="logReg__input text-danger text-start ps-4" style="list-style: disc;">
                </ul>
              </div>

              <div class="col-12">
                <button id="registerBtn" class="btn w-100" type="submit" name="register">Register</button>
              </div>
            </div>
          </form>

          <p">Already have an account ? <a href="/login">Login here</a></p>
        </div>
      </div>
    </div>
  </div>
</section>