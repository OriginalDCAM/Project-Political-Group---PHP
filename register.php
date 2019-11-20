<?php include "includes/top.php";
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <style>
                :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #5a9c78;
  background: linear-gradient(to right, #5a9c78, #98FB98);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('https://images.unsplash.com/photo-1563455915098-ea411b44da3c?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80s');
  background-size: cover;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
            </style>
        </head>
        <body>
          <div class="container">
            <div class="row">
              <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                  <div class="card-img-left d-none d-md-flex">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title text-center">Registeren</h5>
                    <form class="form-signin" action="includes/register.inc.php" method="post">
                      <div class="form-label-group">
                        <input type="text" id="inputUserame" class="form-control" placeholder="Gebruikersnaam" name="usernameReg" required autofocus>
                        <label for="inputUserame">Gebruikersnaam</label>
                      </div>
        
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="E-mailadres" name="emailReg" required>
                        <label for="inputEmail">E-mailadres</label>
                      </div>
                      
                      <hr>
        
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" name="passwordReg" required>
                        <label for="inputPassword">Wachtwoord</label>
                      </div>
                      
                      <div class="form-label-group">
                        <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Wachtwoord" name="passwordRegRep" required>
                        <label for="inputConfirmPassword">Herhaal wachtwoord</label>
                      </div>
        
                      <button class="btn btn-lg btn btn-success btn-block text-uppercase" type="submit" name="register">Registeren</button>
                      <a class="d-block text-center mt-2 small text-success" href="login.php">Inloggen</a>
                      <hr class="my-4">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </body>
    </html>