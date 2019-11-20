<?php include "includes/top.php";
session_start();

if (isset($_SESSION['logged_in']) && !isset($_SESSION['is_admin'])){
    header('Location: index.php');
    exit;
}else if (isset($_SESSION['is_admin']) && isset($_SESSION['logged_in'])){
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
    <html>
      <head>
        <style>
          :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('https://images.unsplash.com/photo-1563455915098-ea411b44da3c?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
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
  color: #5a9c78;
  cursor: text;
  /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}
#sticky-footer {
  flex-shrink: none;
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

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}

        </style>
      </head>
    <body class="d-flex flex-column">

<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welkom terug</h3>
              <form action="includes/login.inc.php" method="post">
                <div class="form-label-group">
                  <input type="email/text" id="inputEmail" class="form-control" placeholder="Email address" name="username" required autofocus>
                  <label for="inputEmail">Email adress</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" name="pass" required>
                  <label for="inputPassword">Wachtwoord</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Wachtwoord opslaan</label>
                </div>
                <button class="btn btn-lg btn btn-success btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login">Inloggen</button>
                <div class="text-center">
                  <a class="small text-success" href="register.php">Registreren?</a></div>
                  <div class="text-center">
                    <a class="small text-success" href="mail.php">Wachtwoord vergeten?</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        </form>
  <footer id="sticky-footer" class="py-4 bg-light text-white-50">
    <div class="container text-center">
      <small>Copyright &copy; PVDI</small>
  </footer>




    </body>
    </html>
