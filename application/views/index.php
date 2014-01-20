<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>Devnila</title>   

    <meta name="description" content="Devnila" /> 

    <!-- Mobile Specifics -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>   

    <!-- Mobile Internet Explorer ClearType Technology -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>base/new/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="<?php echo base_url();?>base/new/css/main.css" rel="stylesheet">

    <!-- Supersized -->
    <link href="<?php echo base_url();?>base/new/css/supersized.css" rel="stylesheet">
    <link href="<?php echo base_url();?>base/new/css/supersized.shutter.css" rel="stylesheet">

    <!-- FancyBox -->
    <link href="<?php echo base_url();?>base/new/css/fancybox/jquery.fancybox.css" rel="stylesheet">

    <!-- Font Icons -->
    <link href="<?php echo base_url();?>base/new/css/fonts.css" rel="stylesheet">

    <!-- Shortcodes -->
    <link href="<?php echo base_url();?>base/new/css/shortcodes.css" rel="stylesheet">

    <!-- Responsive -->
    <link href="<?php echo base_url();?>base/new/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>base/new/css/responsive.css" rel="stylesheet">

    <!-- Supersized -->
    <link href="<?php echo base_url();?>base/new/css/supersized.css" rel="stylesheet">
    <link href="<?php echo base_url();?>base/new/css/supersized.shutter.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="#">

    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="144x144" href="#">

    <script src="<?php echo base_url();?>base/new/js/jquery.min.js"></script> <!-- jQuery Core -->

    <!-- Modernizr -->
    <script src="<?php echo base_url();?>base/new/js/modernizr.js"></script>

    <!-- Analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46996283-1', 'devnila.com');
        ga('send', 'pageview');

    </script>
    <!-- End Analytics -->
    <!-- Contact us ajax process-->
    <script type="text/javascript">
        function emptyForm(){
            $("#email").val("");
            $("#content").val("");
            $("#name").val("");
            $("#company").val("");
            $("#website").val("");
        }
        $(document).ready(function(){
            console.log("i am ready");
       

            $("#contact-submit").click(function(e){
                e.preventDefault();
                if($("#email").val()==""){
                    $("#email").focus();
                }else if($("#content").val()==""){
                    $("#content").focus();
                }else{
                    console.log("terpenuhi");
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var company = $("#company").val();
                    var website = $("#website").val();
                    var content = $("#content").val();

                    /*$.post("<?php echo base_url()?>contact/simpan",{
                        name:name,
                        email:email,
                        company:company,
                        website:website,
                        content:content
                    }, function(data){
                        emptyForm();
                        //set alert
                        console.log(data)
                    }, "json");*/
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url();?>contact/simpan",
                        data: {name:name,email:email,company:company,website:website,content:content},
                        dataType: "json",
                        success: function(response){
                            console.log(response);
                            emptyForm();
                            /*if(response.status){
                                $('#contact-form input').val('');
                                $('#contact-form textarea').val('');
                            }*/
                        }
                    });
                }
            });
        });
    </script>

</head>


<body>

    <!-- This section is for Splash Screen -->
    <div class="ole">
        <section id="jSplash">
           <div id="circle"></div>
       </section>
   </div>
   <!-- End of Splash Screen -->

   <!-- Homepage Slider -->
   <div id="home-slider">	
    <div class="overlay"></div>

    <div class="slider-text">
    	<div id="slidecaption">Devnila</div>
    </div>   

    <div class="control-nav">

        <ul id="slide-list"></ul>
        
        <a id="nextsection" href="#work"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header>
    <div class="sticky-nav">
    	<a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>

        <div id="logo">
        	<a id="goUp" href="#home-slider" title="Devnila">Devnila</a>
        </div>
        
        <nav id="menu">
        	<ul id="menu-nav">
               <li class="current"><a href="#home-slider">Home</a></li>
               <li><a href="#work">Our Services & Work</a></li>
               <li><a href="#about">About Us</a></li>
               <li><a href="#contact">Contact</a></li>
           </ul>
       </nav>

   </div>
</header>
<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page">
	<div class="container">
       <!-- Title Page -->
       <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">Our Services</h2>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    <div class="row">

        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">CTO/Founder</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/mobile.png">
            </div>
            <h3 class="profile-name">Mobile Application</h3>
            <p class="profile-description">Every mobile application has its own identity and specific function so that the customers will always keep that application in their mind. We'll help you developing your application effectively, good design without leaving the main purpose of your application.</p>

        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">Creative Director</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/web.png">
            </div>
            <h3 class="profile-name">Web Application</h3>
            <p class="profile-description">Nowadays, website is a information source, promotion media that everybody know. We are here to make an innovation with interactive design. We are good at Company profile website, social networking, e-commerce, e-learning, and Social Media Engagement.</p>
            
        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">Lead Designer</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/desktop.png">
            </div>
            <h3 class="profile-name">Desktop Application</h3>
            <p class="profile-description">Desktop application can be a bulls-eye solution for you to manage your company. We can help you build your company Information System and another thematic application to give your company an easy-management so everything will be under your control.</p>
            
        </div>
        <!-- End Profile -->
        
    </div>

    <div class="row">

        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">CTO/Founder</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/multimedia.png">
            </div>
            <h3 class="profile-name">Media Interactive</h3>
            <p class="profile-description">Media interactive has an important role in Industries and Education wether its for promotion, simulation and training purpose. We can provide you a very best Media Interactive for your need. </p>

        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">Creative Director</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/network.png">
            </div>
            <h3 class="profile-name">Network Service</h3>
            <p class="profile-description">To complete dissemination of informationin an organization, that's why we have computer networking. We'll help you to fulfill your networking needs with our professional team. We have a good skill in network installation, mail server and server configuration.</p>
            
        </div>
        <!-- End Profile -->
        
        <!-- Start Profile -->
        <div class="span4 profile">
            <div class="image-wrap">
                <div class="hover-wrap">
                    <span class="overlay-img"></span>
                    <!-- <span class="overlay-text-thumb">Lead Designer</span> -->
                </div>
                <img src="<?php echo base_url();?>base/new/img/service/consult.png">
            </div>
            <h3 class="profile-name">IT Consultant</h3>
            <p class="profile-description">We can help you to find the best suites for your IT needs. We'll design the best solution for all of your IT needs. Whatever you want, We'll fulfill it.</p>
            
        </div>
        <!-- End Profile -->
        
    </div>
    <!-- End People -->

</div>
</div>
<!-- End Our Work Section -->

<!-- About Section -->
<div id="about" class="page-alternate">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">About Us</h2>
                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <!-- People -->
        <div class="row">
            <div class="span9">
                <blockquote>
                    <h3>We work to make life easier with innovation of technology.
                        We develop amazing application and combine beautiful design
                        so that application can be user-friendly.</h3>

                    </blockquote>
                </div>
                <!-- End Blockquote -->
            </div>
            <div class="row">
                <div class="span6">
                    <h4>
                        We are Devnila, Indonesia-based IT developer that has very big passionate in Mobile Application, Web Application and Networking.
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                </div>
                <div class="span6">
                    <h4>Online and Mobile application has an important role in developing your business. Nowadays everybody needs a connection, everybody will find information through the internet. </h4>
                </div>
            </div>
            <div class="row">
                <div class="span6">
                    <h4>We're coming to this world to help. We give you technology, make you as our partners to help your brand, and connect with your customers.</h4>
                </div>

            </div>      
        </div>
    </div>
    <!-- End About Section -->


    <!-- Contact Section -->
    <div id="contact" class="page">
        <div class="container">
            <!-- Title Page -->
            <div class="row">
                <div class="span12">
                    <div class="title-page">
                        <h2 class="title">Contact Us</h2>
                        <h3 class="title-description">We’re currently accepting new client projects. We look forward to serving you.</h3>
                    </div>
                </div>
            </div>
            <!-- End Title Page -->

            <!-- Contact Form -->
            <div class="row">
               <div class="span9">

                   <div id="contact-form" class="contact-form">
                       <p class="contact-name">
                          <input id="name" type="text" placeholder="Full Name" value="" name="name" />
                      </p>
                      <p class="contact-email">
                       <input id="email" type="text" placeholder="Email Address" value="" name="email" />
                   </p>
                        <p class="contact-name">
                          <input id="company" type="text" placeholder="Company" value="" name="company" />
                        </p>
                        <p class="contact-name">
                          <input id="website" type="text" placeholder="Website" value="" name="website" />
                      </p>
                   <p class="contact-message">
                       <textarea id="content" placeholder="Your Message" name="message" rows="8" cols="40"></textarea>
                   </p>
                   <p class="contact-submit">
                       <input id="contact-submit" type="submit" class="submit">
                   </p>

                   <div id="response">

                   </div>
               </div>

           </div>

           <div class="span3">
               <div class="contact-details">
                  <h3>Contact Details</h3>
                  <ul>
                    <li><a href="mailto:support@devnila.com">support@devnila.com</a></li>
                    <li>+6282126707069</li>
                    <li>
                        Devnila
                        <br>
                        Jalan Gagak, 144, Bandung
                        <br>
                        Indonesia
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->
</div>
</div>
<!-- End Contact Section -->
<!--Map-->

<div id="map" class="column">
    <div id="mapHolder">
    </div>
</div>  

<!--End map-->


<!-- Socialize -->
<!-- <div id="social-area" class="page">
	<div class="container">
    	<div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com/Bluxart" title="Follow Me on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>
                        <li><a href="http://dribbble.com/Bluxart" title="Follow Me on Dribbble" target="_blank"><span class="font-icon-social-dribbble"></span></a></li>
                        <li><a href="http://forrst.com/people/Bluxart" title="Follow Me on Forrst" target="_blank"><span class="font-icon-social-forrst"></span></a></li>
                        <li><a href="http://www.behance.net/alessioatzeni" title="Follow Me on Behance" target="_blank"><span class="font-icon-social-behance"></span></a></li>
                        <li><a href="https://www.facebook.com/Bluxart" title="Follow Me on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://plus.google.com/105500420878314068694" title="Follow Me on Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a></li>
                        <li><a href="http://www.linkedin.com/in/alessioatzeni" title="Follow Me on LinkedIn" target="_blank"><span class="font-icon-social-linkedin"></span></a></li>
                        <li><a href="http://themeforest.net/user/Bluxart" title="Follow Me on ThemeForest" target="_blank"><span class="font-icon-social-envato"></span></a></li>
                        <li><a href="http://zerply.com/Bluxart/public" title="Follow Me on Zerply" target="_blank"><span class="font-icon-social-zerply"></span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div> -->
<!-- End Socialize -->

<!-- Footer -->
<footer>
	<p class="credits">&copy;2013 Brushed. <a href="http://themes.alessioatzeni.com/html/brushed/" title="Brushed | Responsive One Page Template">Brushed Template</a> by <a href="http://www.alessioatzeni.com/" title="Alessio Atzeni | Web Designer &amp; Front-end Developer">Alessio Atzeni</a></p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->


<!-- Js -->
<script src="<?php echo base_url();?>base/new/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url();?>base/new/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="<?php echo base_url();?>base/new/js/waypoints.js"></script> <!-- WayPoints -->
<script src="<?php echo base_url();?>base/new/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="<?php echo base_url();?>base/new/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="<?php echo base_url();?>base/new/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="<?php echo base_url();?>base/new/js/jquery.fancybox-media.js"></script> <!-- Fancybox for Media -->
<script src="<?php echo base_url();?>base/new/js/jquery.tweet.js"></script> <!-- Tweet -->
<script src="<?php echo base_url();?>base/new/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="<?php echo base_url();?>base/new/js/main.js"></script> <!-- Default JS -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url();?>base/new/js/gmaps.js" type="text/javascript"></script>
<script>

//---------------------------------- Gmap setup -----------------------------------------//
var map;
$(document).ready(function(){


  map = new GMaps({
    div: '#map',
    lat: -6.894681860424366,
    lng: 107.62804627418518,
    zoom: 13,
    zoomControl : true, 
    zoomControlOpt: { style : 'SMALL', position: 'TOP_RIGHT' },
    panControl : false,
    scrollwheel: false
});


  map.addMarker({
    lat: -6.894681860424366,
    lng: 107.62804627418518,
    title: 'Devnila',
    infoWindow: {
        content: '<p>Jalan Gagak no. 144, Bandung, Indonesia</p>'
    }
});
});
//---------------------------------- End gmap setup -----------------------------------------//
</script>

</body>
</html>
