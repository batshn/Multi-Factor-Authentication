<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Assginment 1 - Secure Electronic Commerce</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead bg-attack text-white text-center">
            <div class="container d-flex align-items-center flex-column"></div>
                <h2 class="page-section-heading text-center text-uppercase  mb-0">Parameter Tampering Attack</h2>
            </div>
        </header>
        <!--  Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                
                <!--  Grid Items-->
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                    </div>
                    <!-- Item 1-->
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="title">Business</h3>
                            </div>
                            <ul class="content-list">
                                <li>50GB Disk Space</li>
                                <li>50 Email Accounts</li>
                                <li>Maintenance</li>
                                <li>15 Subdomains</li>
                            </ul>
                            <div class="pricingTable-signup">
                                <form action="checkout.php" method="post">                                
                                    <input type="hidden" name="reg_id" value="1234">
                                    <input type="hidden" name="amount" value="100">
                                    <input type="submit" value="Sign Up" class="btn btn-warning btnSign">
                                </form>

                            </div>
                            <div class="price-value">
                                <span class="amount">$100.00</span>
                                <span class="duration">per month</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </body>
</html>
