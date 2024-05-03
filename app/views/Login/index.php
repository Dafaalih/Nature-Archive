<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nature Archive</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/loginstyle.css" />
  </head>
  <body>
    <div class="box">
      <div class="container">
        <div class="header">
          <img src="asset/Nature Archive.png" alt="Nature Archive" />
        </div>
        <h1>Nature Archive</h1>
        <form action="<?= BASEURL; ?>/Login/loginUser" method="POST">
          <div class="input-field">
            <input type="text" name="username" class="input" placeholder="Username" required />
          </div>
          <div class="input-field">
            <input
              type="password"
              name="password"
              class="input"
              placeholder="Password"
              required
            />
          </div>
          <div class="input-field">
            <input type="submit" class="submit" value="Login" />
          </div>
        </form>
        <div class="bottom">
          <div class="left">
            <input type="checkbox" id="check" />
            <label for="check"> Save login info?</label>
          </div>
          <div class="right">
            <label><a href="registrasi.php">Don't have account?</a></label>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
