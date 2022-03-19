<!-- USER LOGIN -->

<div class="pop-up">
    <div id="log-in-pop" class="log-in-pop hidden">
        <div class="overlay">
            <div class="pop-content">
                <form>
                    <legend>
                        <span class="text-white">Login</span>
                        <button onclick="showLogin()">
                            <img src="../res/img/close.png">
                        </button>
                    </legend>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" placeholder="E-mail">
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
                        <span class="text-white">Register</span>
                        <button onclick="showRegistration()">
                            <img src="../res/img/close.png">
                        </button>
                    </legend>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" placeholder="E-mail">
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <input type="tel" placeholder="Phone">
                    </div>
                    <div class="field">
                        <label>Address</label>
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
                    <button class="closebtn" onclick="showCart()">
                        <img src="../res/img/close.png">
                    </button>
                </legend>
                <div id="total-price">

                </div>
                <table>

                </table>
                <div class="actionbtn">
                    <button type="button" id="close" onclick="showCart()">Close</button>
                    <button type="button" id="buy-now">Buy now</button>
                </div>
            </div>
        </div>
    </div>
</div>