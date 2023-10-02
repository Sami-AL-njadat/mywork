<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img"
    style="background-image: url({{ asset('front_end/img/bg-img/backgroundfooter.jpg') }})">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">
                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="#"><img
                                    src="{{ asset('front_end/img/core-img/NEWLOGO-removebg-preview.png') }}"
                                    alt="" /></a>
                        </div>

                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>QUICK LINK</h5>
                        </div>
                        <nav class="widget-nav">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>OUR POLICES</h5>
                        </div>
                        <p>If encountering an issue, kindly reach out to customer service within 24 hours of phone
                            service purchase.</p>



                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

                        <div class="contact-information">
                            <p><span>Address:</span> st.Ajloun Castle, Ajloun City</p>
                            <p><span>Phone:</span> +962 777 415 591</p>
                            <p><span>Email:</span> Mashtal.online@gmail.com</p>
                            <p><span>Open hours:</span> Sun - Thu: 8 AM to 9 PM</p>
                            <p><span>Happy days:</span> Wen: 2 PM to 4 PM 4th/Oct </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset('front_end/js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('front_end/js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('front_end/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('front_end/js/plugins/plugins.js') }}"></script>
<!-- Active js -->
<script src="{{ asset('front_end/js/active.js') }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>







</body>

</html>
