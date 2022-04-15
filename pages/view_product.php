<?php
include '../db/connection.php';
$product_id = $_GET['id'];

$sql = "SELECT * FROM product WHERE productID = '$product_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$product_image = $row['product_image'];
$product_name = $row['name'];
$product_price = $row['sale_price'];
$product_description = $row['description'];
$product_stock = $row['stock'];
$product_category = $row['category'];

//get data of comments
$sql_comment = "SELECT * FROM comment WHERE product_id = '$product_id'";
$result_comment = mysqli_query($con, $sql_comment);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Product Deatils</title>
    <link rel="icon" href="../res/img/logo.svg" type="image/png"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
            integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
            crossorigin="anonymous"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../style/select_text.css"/>
</head>
<style>

    @font-face {
        font-family: 'Cairo';
        src: url('../res/fonts/Cairo.ttf');
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgb(129, 182, 255) 0%, rgb(31, 125, 255) 90.1%);
        font-family: Cairo;
        display: grid;
        place-items: center;
        min-height: 100vh;
        overflow-x: hidden;
    }

    .container {
        background-color: #fff;
        position: relative;
        display: grid;
        margin-top: 100px;
        grid-template-columns: 300px 600px;
        border-radius: 5px;
        box-shadow: 0 15px 20px rgba(0, 0, 0, 0.356);
    }

    .container img {
        width: 300px;
        height: 300px;
        padding: 12px;
        object-fit: contain;
        border-radius: 5px 0 0 5px;
    }

    .container .btn {
        position: absolute;
        bottom: -20px;
        right: -20px;
        border: none;
        outline: none;
        display: flex;
        align-items: center;
        background-color: #fc9400;
        color: #fff;
        padding: 22px 45px;
        font-size: 1rem;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.294);
    }

    .container .btn i {
        margin-right: 20px;
        font-size: 1.5rem;
    }

    .container__text {
        padding: 40px 40px 0;
    }

    .container__text h1 {
        color: #351897;
        font-weight: 400;
    }

    .container__text .container__text__star span {
        font-size: 0.8rem;
        color: #ffa800;
        margin: -5px 0 20px;
    }

    .container__text p {
        font-size: 0.9rem;
    }

    .container__text .container__text__timing {
        display: flex;
        margin: 20px 0 10px;
    }

    .container__text .container__text__timing .container__text__timing_time {
        margin-right: 40px;
    }

    .container__text .container__text__timing h2 {
        margin-bottom: 5px;
        font-size: 1rem;
        font-weight: 400;
        color: #818189;
    }

    .container__text .container__text__timing p {
        color: #351897;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* COMMENT SECTION */

    section {
        margin-top: 50px;
        width: 100%;
        background-color: #3f3f3f;
        padding: 0;
    }

    section h1{
        color: #fff;
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        margin-top: 50px;
    }

    @media (min-width: 0) {
        .g-mr-15 {
            margin-right: 1.07143rem !important;
        }
    }

    @media (min-width: 0) {
        .g-mt-3 {
            margin-top: 0.21429rem !important;
        }
    }

    .active {
        color: #f52c2c;
    }

    a:hover {
        text-decoration: none;
    }

    .row {
        display: flex;
        justify-content: start;
        margin-top: 54px;
        width: 100%;
        margin-left: 160px;
    }

    .g-height-50 {
        height: 50px;
    }

    .g-width-50 {
        width: 50px !important;
    }

    @media (min-width: 0) {
        .g-pa-30 {
            padding: 2.14286rem !important;
        }
    }

    .g-bg-secondary {
        background-color: #fafafa !important;
    }

    .u-shadow-v18 {
        box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
    }

    .g-color-gray-dark-v4 {
        color: #777 !important;
    }

    .g-font-size-12 {
        font-size: 0.85714rem !important;
    }

    .media-comment {
        margin-top: 20px
    }

    .comment-section {
        margin-top: 20px;
        margin-left: 242px;
        display: flex;
        justify-content: start;
        flex-direction: column;
        width: 100%;
    }

    .comment-section h2 {
        color: #fff;
        padding: 12px 0;
        width: 300px;
    }

    .comment-section hr{
        width: 800px;
        border: 1px solid #fff;
    }

    #comment {
        width: 700px;
        height: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 1rem;
        outline: none;
    }

    .comment-btn {
        margin-bottom: 30px;
    }

</style>
<body>
<div class="container">
    <img <?php echo 'src="../uploads/' . $product_image . '"' ?> class="product-image" alt="product image"/>
    <div class="container__text">
        <h1><?php echo $product_name ?></h1>
        <div class="container__text__star">
            <!-- you can add this class="fa fa-star-o checked" to span -->
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
        </div>
        <p>
            <?php echo $product_description ?>
        </p>
        <div class="container__text__timing">
            <div class="container__text__timing_time">
                <h2>Price</h2>
                <p>
                    $<?php echo $product_price ?>
                </p>
            </div>
            <div class="container__text__timing_time">
                <h2>Category</h2>
                <p>
                    <?php echo $product_category ?>
                </p>
            </div>
            <div class="container__text__timing_time">
                <h2>Stock</h2>
                <p>
                    <?php echo $product_stock ?>
                </p>
            </div>
        </div>
        <button class="btn" onclick="window.location.href = 'index.php';"><i class="fa fa-arrow-left"></i>Back Home
        </button>
    </div>
</div>

<section>
    <h1>Customers Reviews</h1>
    <div class="row">
        <?php
        //loop through the comments
        while ($row = mysqli_fetch_array($result_comment)) {
            $comment_id = $row['comment_id'];
            $comment_body = $row['comment_body'];
            $comment_date = $row['comment_date'];
            $comment_likes = $row['comment_likes'];
            $customer_id = $row['customer_id'];

            //get customer name from customer id
            $sql_customer = "SELECT full_name FROM customer WHERE customerID = '$customer_id'";
            $result_customer = mysqli_query($con, $sql_customer);
            $row_customer = mysqli_fetch_array($result_customer);
            $customer_name = $row_customer['full_name'];
            echo '
                <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                 src="../res/img/customer.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">' . $customer_name . '</h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12">' . $comment_date . '</span>
                </div>

                <p>' . $comment_body . '</p>
                <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item g-mr-20">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover like-btn" href="#!" isLiked="false">
                            <ion-icon class="like-icon" name="heart-outline"></ion-icon>
                             <span class="like-counter">' . $comment_likes . '</span>
                             <span class="hidden-comment-id" hidden>' . $comment_id . '</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
            ';
        }
        ?>
    </div>

    <div class="comment-section">
        <hr>
        <h2>Leave a comment :)</h2>
        <form action="comments.php" method="get">
            <div class="form-group">
                <input name="productID" value="<?php echo $product_id; ?>" hidden>
                <textarea class="form-control" rows="5" name="comment_body" id="comment"
                          placeholder="Write your comment here..."></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-warning comment-btn">Submit</button>
        </form>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../node_modules/zooming/build/zooming.min.js"></script>
<script>
    //zoom the image
    const img = document.querySelector('.product-image');
    const zoom = new Zooming();
    zoom.listen(img);

    function goBack() {
        window.location.href = "index.php";
    }
</script>

<script>
    //like buttons
    const likeBtns = document.querySelectorAll('.like-btn');

    likeBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            //get like icon and counter
            const likeIcon = e.target.querySelector('.like-icon');
            const likeCounter = e.target.querySelector('.like-counter');
            if (btn.getAttribute('isLiked') === 'false') {
                likeIcon.classList.toggle('active');
                likeCounter.innerText = parseInt(likeCounter.innerText) + 1;
                btn.setAttribute('isLiked', 'true');

                //save likes counter to local storage
                const commentID = e.target.querySelector('.hidden-comment-id').innerText;
                const commentLikes = parseInt(likeCounter.innerText);

                const likes = [];
                const like = {
                    commentID: commentID,
                    commentLikes: commentLikes
                };

                // if (localStorage.getItem('likes') === null) {
                //     likes.push(like);
                //     localStorage.setItem('likes', JSON.stringify(likes));
                // } else {
                //     const localLikes = JSON.parse(localStorage.getItem('likes'));
                //     localLikes.push(like);
                //     localStorage.setItem('likes', JSON.stringify(localLikes));
                // }
            } else if (btn.getAttribute('isLiked') === 'true') {
                //remove like
                e.preventDefault();
                likeIcon.classList.toggle('active');
                likeCounter.innerText = parseInt(likeCounter.innerText) - 1;
                btn.setAttribute('isLiked', 'false');
            } else {
                alert('Something went wrong');
            }
        });
    });
</script>
</body>
</html>