<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="./assets/css/About.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php if (!isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/navbar.css">
    <?php  } ?>
    <?php if (isset($_SESSION['username'])) { ?>
        <link rel="stylesheet" href="./assets/css/loginnav.css">
    <?php  } ?>
    <title>About</title>
</head>

<body>

    <header>
        <?php include('./navbar.php'); ?>
        <img src="./assets/Image/hero-banner-img.png" class="img-fluid about-banner" alt="Responsive image">

    </header>
    <section>
        <div class="pricewrapper">
            <p class="abtext text-center">A Few words about us</p>
            <div class="container">
                <div class="sepimg">
                    <img src="./assets/Image/separator.png" class="sepretor">

                </div>


            </div>
            <div class="aboutText text-center">
                <div class="aboutInnerText">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus
                    condimentum dictum. <span class="abttxt">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis enim
                        orci. Fusce risus lacus,</span> sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec
                    tristique est arcu, sed dignissim velit vulputate ultricies.
                </div>
                <div class="aboutInnerText">
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl
                    euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt hendrerit.

                    Aenean ut rhoncus orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac
                    habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at porta tellus. Sed dolor augue, posuere sed
                    neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
                </div>
            </div>
    </section>

    <section class="aboutstory">
        <p class="abtext text-center">Our Story</p>
        <div class="container">
            <div class="sepimg">
                <img src="./assets/Image/separator.png" class="sepretor">

            </div>


        </div>
        <div class="aboutText text-center">
            <div class="aboutInnerText">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus
                condimentum dictum. <span class="abttxt">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis enim
                    orci. Fusce risus lacus,</span> sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec
                tristique est arcu, sed dignissim velit vulputate ultricies.
            </div>
            <div class="aboutInnerText">
                Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl
                euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt hendrerit.
            </div>
            <div class="aboutInnerText">
                Aenean ut rhoncus orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac
                habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at porta tellus. Sed dolor augue, posuere sed
                neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
            </div>
        </div>
    </section>
    <section class="newsletter text-center ">
        <div class="container">
            <h3 class="ournews ">GET OUR NEWSLETTER</h3>
            <form action="#" method="Post">
                <input type="text" name="text" placeholder="YOUR EMAIL">
                <button type="button" class="btn btn5">
                    <p>Submit</p>
                </button>
            </form>
        </div>
    </section>
    </div>
    <?php
    include('./footer.php');
    ?>
</body>

</html>