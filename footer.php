
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="footer-heading mb-4">About</h2>
                        <p>Hi, We're Grand Business Online Business Directoy,We help people discover your business.</p>
                    </div>

                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Navigations</h2>
                        <ul class="list-unstyled">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Business Listings</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-5  text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        All rights reserved |&copy; 2015 GRAND BUSINESS ONLINE BUSINESS DIRECTORY.
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>
<script src="js/main.js"></script>
<script src="js/main1.js"></script>


<script type="text/javascript">
    $(function ( ) {
        $("[data-toggle=popover]")
            .popover({ html: true})
            .on("focus", function () {
                $(this).popover("show");
            }).on("focusout", function () {
            var _this = this;
            if (!$(".popover:hover").length) {
                $(this).popover("hide");
            }
            else {
                $('.popover').mouseleave(function() {
                    $(_this).popover("hide");
                    $(this).off('mouseleave');
                });
            }
        });
    });
</script>
</body>
</html>
