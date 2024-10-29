<section class="logReg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-sm-10 col-md-8">
        <div class="logReg-box">
          <h2 class="logReg-box__title">Welcome back!</h2>
          <p class="logReg-box__desc">Login in to continue</p>
          <form id="loginForm" action="" method="post">
            <div class="row">
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
                <div class="logReg__checkbox">
                  <label class="logReg__checkbox-label">
                    <input class="d-none" type="checkbox" name="showPassword">
                    <i></i>
                    <span>Show Password</span>
                  </label>
                  <a href="#!">Forgot Password ?</a>
                </div>
              </div>
              <div class="col-12">
                <ul id="error-list" class="logReg__input text-danger text-start ps-4" style="list-style: disc;">
                </ul>
              </div>
              <div class="col-12">
                <button id="loginBtn" class="btn w-100" type="submit" name="login">Login</button>
              </div>
            </div>
          </form>

          <p">Don't have an account ? <a href="/register">Register here</a></p>
        </div>
      </div>
    </div>
  </div>
</section>