<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../res/img/logo.svg" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/contact.css">
    <link rel="stylesheet" href="../style/animate.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        @font-face {
            font-family: "Cairo";
            src: url("../res/fonts/Cairo.ttf");
        }

        * {
            padding: 0;
            margin: 0;
            font-family: Cairo;
        }

        body {
            height: 100vh;
            background: #0093E9 linear-gradient(160deg, #0093E9 0%, #80D0C7 100%) fixed no-repeat;
        }

        .form-control {
            border: 1px solid rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .form-control:hover {
            border: 1px solid rgba(0, 147, 233, 1);
        }

        .form-control:focus {
            border: 1px solid rgba(0, 147, 233, 1);
        }

        .btn {
            width: 100%;
            font-size: 16px;
        }

        .btn .fa-send {
            margin-right: 10px;
        }
    </style>
    <title>Contact</title>
</head>
<body>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Get in touch</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>
                                <form method="POST" id="contactForm" name="contactForm" action="contact.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder="Full name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="subject"
                                                       placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30"
                                                          rows="7" placeholder="Type your message here..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-send"></i> Send message
                                                </button>
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-lg-5 p-4">
                                <h3 class="mb-4 mt-md-4">Contact us</h3>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Address:</span>Derb Fokara, n°55 rue 37, Grand Casablanca</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Phone:</span> <a href="https://wa.me/212657735082">+2126-6700-0000</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Email:</span> <a href="mailto:abdelatiflaghjaj@gmail.com"
                                                                  target="_blank">contactus@TexGear.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Website</span>
                                            <a href="index.php"
                                               target="_blank">TexGear.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SB Forms JS -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://smtpjs.com/v3/smtp.js"></script>

<script>

    var form = document.querySelector('#contactForm');

    function sendEmail(e) {
        e.preventDefault();
        var fullname = document.querySelector('#name');
        var email = document.querySelector('#email');
        var message = document.querySelector('#message');
        var subject = document.querySelector('#subject');

        //check if inputs are empty
        if (fullname.value === '' || email.value === '' || message.value === '' || subject.value === '') {
            swal("Oops!", "Please fill all the fields", "error");
        } else if (email.value === "laghjajabdelatif@gmail.com") {
            swal("Oops!", "Please enter another email!", "error");
        } else {
            Email.send({
                SecureToken: "256820d4-e320-44aa-8809-5781e8144381",
                To: 'laghjajabdelatif@gmail.com',
                From: email.value,
                Subject: subject.value,
                Body: message.value
            }).then(
                message => swal("Success!", "Your message has been sent successfully!", "success")
            );
        }
    };

    form.addEventListener('submit', sendEmail);

</script>
</body>
</html>