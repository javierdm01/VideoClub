<?php

class loginView {

    function mostrarLogin() {
        echo '<section class="vh-75 gradient-custom">
                <div class="container h-75">
                  <div class="row d-flex justify-content-center  h-75">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                      <div class="card bg-dark text-white mt-4" style="border-radius: 1rem;">
                        <div class="card-body px-5 text-center">

                          <div class="mt-md-4 pb-2">

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Bienvenido a nuestro VideoClub!</p>
                            <form action="'.$_SERVER["PHP_SELF"] .'" method="POST">
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="usr" name="usr" class="form-control form-control-lg" />
                              <label class="form-label" for="usr">Username</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                              <label class="form-label" for="pass">Password</label>
                            </div>

                            <p class="small mb-4"><a class="text-white-50" href="#">Forgot password?</a></p>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                              </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>';
    }
}
