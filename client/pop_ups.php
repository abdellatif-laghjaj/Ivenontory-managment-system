<!-- USER LOGIN -->

<div class="pop-up">
    <div id="log-in-pop" class="log-in-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form>
                    <legend>
                        <span>Login</span>
                        <a onclick="showLogin()">
                            <img src="../res/img/close.png"  style="cursor: pointer;">
                        </a>
                    </legend>
                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password">
                    </div>
                    <div class="field">
                        <input type="submit" value="LOGIN" class="button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- USER REGISTER -->
    <div id="register-pop" class="register-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form>
                    <legend>
                        <span>Register</span>
                        <a onclick="showRegistration()">
                            <img src="../res/img/close.png" style="cursor: pointer;">
                        </a>
                    </legend>
                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="username">
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <input type="tel" placeholder="Phone">
                    </div>
                    <div class="field">
                        <label>Adresse</label>
                        <input type="text" placeholder="Adresse">
                    </div>
                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Password">
                    </div>
                    <div class="field">
                        <label>Confirm password</label>
                        <input type="password" placeholder="Confirm password">
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
                        <img src="../res/img/close.png" style="cursor: pointer;">
                    </a>
                </legend>
                <form action="../pages/payment.php">
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