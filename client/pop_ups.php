<style>
    .toast {
        font-family: Cairo;
        visibility: hidden;
        max-width: 50px;
        height: 50px;
        /*margin-left: -125px;*/
        margin: auto;
        background-color: #ff1616;
        color: #fff;
        text-align: center;
        border-radius: 2px;

        position: fixed;
        z-index: 1;
        left: 0;
        right: 0;
        bottom: 30px;
        font-size: 17px;
        white-space: nowrap;
    }

    .toast #img {
        width: 50px;
        height: 50px;

        float: left;

        padding-top: 16px;
        padding-bottom: 16px;

        box-sizing: border-box;


        background-color: #ff6d6d;
        color: #fff;
    }

    .toast #desc {


        color: #fff;

        padding: 16px;

        overflow: hidden;
        white-space: nowrap;
    }

    .toast.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, expand 0.5s 0.5s, stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
        z-index: 200;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }
        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes expand {
        from {
            min-width: 50px
        }
        to {
            min-width: 350px
        }
    }

    @keyframes expand {
        from {
            min-width: 50px
        }
        to {
            min-width: 350px
        }
    }

    @-webkit-keyframes stay {
        from {
            min-width: 350px
        }
        to {
            min-width: 350px
        }
    }

    @keyframes stay {
        from {
            min-width: 350px
        }
        to {
            min-width: 350px
        }
    }

    @-webkit-keyframes shrink {
        from {
            min-width: 350px;
        }
        to {
            min-width: 50px;
        }
    }

    @keyframes shrink {
        from {
            min-width: 350px;
        }
        to {
            min-width: 50px;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 60px;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }
        to {
            bottom: 60px;
            opacity: 0;
        }
    }
</style>

<div id="toast" class="toast">
    <div id="img"><i class="fa fa-warning"></i></div>
    <div id="desc">Please fill all the fields!</div>
</div>

<div id="toast2" class="toast">
    <div id="img"><i class="fa fa-warning"></i></div>
    <div id="desc">Password too short!</div>
</div>

<div id="toast3" class="toast">
    <div id="img"><i class="fa fa-warning"></i></div>
    <div id="desc">Password don't match!</div>
</div>
<div id="toast4" class="toast">
    <div id="img"><i class="fa fa-warning"></i></div>
    <div id="desc">Username already taken!</div>
</div>

<!-- USER LOGIN -->

<div class="pop-up">
    <div id="log-in-pop" class="log-in-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form name="login" onsubmit="return checkLoginForm()" action="../client/validation.php" method="post">
                    <legend>
                        <span>Login</span>
                        <a onclick="showLogin()">
                            <img src="../res/img/close.png">
                        </a>
                    </legend>
                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username" name="username">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- USER LOG OUT -->
    <div id="log-out-pop" class="log-in-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form name="logout" action="../client/logOut.php" method="post">
                    <legend>
                        <span>LogOut</span>
                        <a onclick="showLogOut()">
                            <img src="../res/img/close.png" style="cursor: pointer;">
                        </a>
                    </legend>
                    <label>Are you sure you want log out?</label>
                    <div class="field">
                        <input type="submit" onclick="logOutFunc()" value="LOG OUT" class="button">
                        <input type="reset" onclick="showLogOut()" value="CANCEL" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- USER REGISTER -->
    <div id="register-pop" class="register-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form name="register" onsubmit="return checkRegistrationForm()" action="../client/registration.php"
                      method="post">
                    <legend>
                        <span>Register</span>
                        <a onclick="showRegistration()">
                            <img src="../res/img/close.png">
                        </a>
                    </legend>
                    <div class="fbody">
                        <style>
                            .pop-up .register-pop .pop-content form .field .input {
                                display: block;
                                width: 100%;
                                padding: 0.375rem 0.75rem;
                                font-size: 1rem;
                                line-height: 1.5;
                                color: #495057;
                                background-color: #fff;
                                background-clip: padding-box;
                                border: 1px solid #ced4da;
                                border-radius: 0.25rem;
                                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                            }

                            .pop-up .register-pop .pop-content form .field .error {
                                display: block;
                                width: 100%;
                                padding: 0.375rem 0.75rem;
                                font-size: 1rem;
                                line-height: 1.5;
                                color: #495057;
                                background-color: #fff;
                                background-clip: padding-box;
                                border: 1px solid #ced4da;
                                border-radius: 0.25rem;
                                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                                animation: shake 0.2s ease-in-out 0s 2;
                                box-shadow: 0 0 0.5rem red;
                            }

                            @keyframes shake {
                                0% { margin-left: 0rem; }
                                25% { margin-left: 0.5rem; }
                                75% { margin-left: -0.5rem; }
                                100% { margin-left: 0rem; }
                            }

                            .pop-up .register-pop .pop-content form .field .input:focus {
                                outline: none;
                                border: 1px solid #007bff;
                            }
                        </style>
                        <div class="field">
                            <label>Full name</label>
                            <input type="text" class="input" placeholder="Full name" name="full_name" id="full_name" onchange="removeError('full_name');">
                        </div>
                        <div class="field">
                            <label>Username</label>
                            <input type="text" class="input" placeholder="username" name="username" id="username" onchange="removeError('username');">
                        </div>
                        <div class="field">
                            <label>Phone</label>
                            <input type="tel" class="input" placeholder="Phone" name="phone" id="phone" onchange="removeError('phone');">
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="Email" class="input" placeholder="Email" name="email" id="email" onchange="removeError('email');">
                        </div>
                        <div class="field">
                            <label>Adresse</label>
                            <input type="text" class="input" placeholder="Adresse" name="adresse" id="adresse" onchange="removeError('adresse');">
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" class="input" placeholder="Password" name="password" id="password" onchange="removeError('password');">
                        </div>
                        <div class="field">
                            <label>Confirm password</label>
                            <input type="password" class="input" placeholder="Confirm password" name="confirm_password" id="confirm_password" onchange="removeError('confirm_password');">
                        </div>
                    </div>
                    <div class="field">
                        <input type="submit" value="REGISTER" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SHOPPING CART -->
    <div id="cart-pop" class="cart-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <legend>
                    <h5 class="fw-bold" id="">
                        Your Shopping Cart
                    </h5>
                    <a class="closebtn" onclick="showCart()">
                        <img src="../res/img/close.png">
                    </a>
                </legend>
                <form action="../pages/payment.php" onsubmit="return checkCartItems()">
                    <div id="total-price">
                        <span>total :</span>
                        <input class="total-input-cart" type="text" name="total" value="0" disabled>
                        <span>$</span>
                    </div>
                    <table>

                    </table>
                    <div class="actionbtn">
                        <button type="button" id="close" onclick="showCart()">Close</button>
                        <input type="submit" id="buy-now" value="Buy now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    function checkRegistrationForm() {
        var full_name = document.register.full_name.value;
        var username = document.register.username.value;
        var password = document.register.password.value;
        var confirm_password = document.register.confirm_password.value;
        var adresse = document.register.adresse.value;
        var email = document.register.email.value;
        var phone = document.register.phone.value;

        var full_name_ex = /^[a-zA-Z ]{2,30}$/;
        var username_password_ex = /^[a-zA-Z0-9.@*&$#_ ]{6,}$/;
        var adresse_ex = /^[a-zA-Z.,;:_ ]+$/;
        var email_ex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})/;
        var phone_ex = /^[+]?[(]?[0-9]{1,4}[)]?[+]?[0-9]{6,10}$/;

        console.log("check start");

        if (!full_name.match(full_name_ex)) {
            console.log("check full_name");
            document.getElementById("full_name").classList.replace("input", "error");
            return false;
        }else if (!username.match(username_password_ex)) {
            console.log("check username");
            document.getElementById("username").classList.replace("input", "error");
            return false;
        }else if (!password.match(username_password_ex)) {
            console.log("check password");
            document.getElementById("password").classList.replace("input", "error");
            return false;
        }else if (!confirm_password.match(username_password_ex)) {
            console.log("check confirm_password");
            document.getElementById("confirm_password").classList.replace("input", "error");
            return false;
        }else if (!adresse.match(adresse_ex)) {
            console.log("check adresse");
            document.getElementById("adresse").classList.replace("input", "error");
            return false;
        }else if (!email.match(email_ex)) {
            console.log("check email");
            document.getElementById("email").classList.replace("input", "error");
            return false;
        }else if (!phone.match(phone_ex)) {
            console.log("check phone");
            document.getElementById("phone").classList.replace("input", "error");
            return false;
        }else {
            console.log("check end");
            return true;
        }
    }

    function checkLoginForm() {
        var username = document.login.username.value;
        var password = document.login.password.value;
        if ((username === "") || (password === "")) {
            launch_toast();
            return false;
        } else {
            return true;
        }
    }

    function launch_toast() {
        swal({
            title: "Error",
            text: "Please fill all the fields",
            icon: "error",
            button: "OK",
        });
    }

    function usernameAlreadyTaken() {
        swal({
            title: "Error",
            text: "Username already taken",
            icon: "error",
            button: "OK",
        });
    }

    function passwordLessThan6() {
        swal({
            title: "Error",
            text: "Password must be at least 6 characters",
            icon: "error",
            button: "OK",
        });
    }

    function passwordDontMatch() {
        swal({
            title: "Error",
            text: "Passwords don't match",
            icon: "error",
            button: "OK",
        });
    }

    function logOutFunc() {
        sessionStorage.clear();
    }

    function checkCartItems() {
        var ItemsInCart = JSON.parse(sessionStorage.getItem('Items'));
        if (isLogin != true) {
            swal({
                title: "Error",
                text: "You must be logged in to buy",
                icon: "error",
                button: "OK",
            });
            return false;
        } else if (ItemsInCart == null) {
            return false;
        } else
            return true;
    }

    function removeError(inputId) {
        document.getElementById(inputId).classList.replace("error", "input");
    }
</script>