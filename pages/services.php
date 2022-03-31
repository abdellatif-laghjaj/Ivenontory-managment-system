<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins|Ubuntu&display=swap');

    .services {
        background-color: #fff;
        margin: 16px 0;
    }

    h1 {
        font-family: Cairo;
        font-size: 40px;
        padding: 8px;
    }

    hr {
        color: red;
        width: 200px;
    }

    .box {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px
    }

    .our-services {
        margin-top: 75px;
        padding: 0 60px;
        min-height: 198px;
        text-align: center;
        border-radius: 10px;
        background-color: #fff;
        transition: all .4s ease-in-out;
        box-shadow: 0 0 25px 0 rgba(20, 27, 202, .17)
    }

    .our-services .icon {
        margin-bottom: -21px;
        transform: translateY(-50%);
        text-align: center
    }

    .our-services:hover h4,
    .our-services:hover p {
        color: #fff
    }

    .speedup:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #fb0054 0%, #f55b2a 100%)
    }

    .settings:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #d048ff 0%, #de87ff 100%)
    }

    .privacy:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #3615e7 0%, #44a2f6 100%)
    }

    .backups:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #fc6a0e 0%, #fdb642 100%)
    }

    .ssl:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #8d40fb 0%, #5a57fb 100%)
    }

    .database:hover {
        box-shadow: 0 0 25px 0 rgba(20, 27, 201, .05);
        cursor: pointer;
        background-image: linear-gradient(-45deg, #27b88d 0%, #22dd73 100%)
    }

    .database {
        margin-bottom: 24px;
    }
</style>
<body>
<div class="container-fluid mb-5 services" id="services">
    <div class="text-center mt-5">
        <h1>Our Services</h1>
        <center>
            <hr size="6">
        </center>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="our-services settings">
                    <div class="icon"><img src="../res/img/ui_ux.png" style="width: 93px;"></div>
                    <h4>UI/UX</h4>
                    <p>Enjoy our clean user interface that makes you comfortable surfing our website 😉</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services speedup">
                    <div class="icon"><img src="../res/img/speed.png" style="width: 93px;"></div>
                    <h4>Speedup</h4>
                    <p>Fast user experience, and fast surfing for your favorites products 😍</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services privacy">
                    <div class="icon"><img src="../res/img/security.png" style="width: 93px;"></div>
                    <h4>Security</h4>
                    <p>Be comfortable because your data and information is safe ✅</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="our-services backups">
                    <div class="icon"><img src="../res/img/multiple.png" style="width: 93px;"></div>
                    <h4>Diversity</h4>
                    <p>We offer multiple categories of products, that make it easy to find what you need 😁</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services ssl">
                    <div class="icon"><img src="../res/img/payment.png" style="width: 93px;"></div>
                    <h4>Safe payment</h4>
                    <p>We offer a safe payment methods, so that our customers don't lose trust in our services 👍</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="our-services database">
                    <div class="icon"><img src="../res/img/clock.png" style="width: 93px;"></div>
                    <h4>24h/24</h4>
                    <p>Our service is open 24h on 24h, so that our customers have access to our products all the time
                        🤓</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>