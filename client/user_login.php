<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
      <div class="modal" id="userLogin">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              
                <!-- MODAL HEADER -->
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Login</h5>
                    <button class="btn btn-close bg-white" data-bs-dismiss="modal"></button>
                </div>
              
                <!-- MODAL BODY -->

                <form class="p-4" action="user_login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label required">Username</label>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" placeholder="E-mail" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="button" class="btn btn-danger w-100">Login</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</body>
</html>