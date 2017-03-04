        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Contact Us</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="light-background">
            <div class="container-fluid">
                <div class="row grid-space-0">
                    <div class="col-sm-12">
                        <div class="map" id="map"></div>
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title lines">Contact Us</h2>
                        </div>
                    </div><!-- end col -->    
                </div><!-- end row -->
                
                <div class="row column-3">
                    <div class="col-sm-6 col-md-4">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-commenting-o text-warning"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="thin">Need Help?</h6>
                                <h5 class="text-warning">Use our chat!</h5>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->   
                    <div class="col-sm-6 col-md-4">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-phone text-info"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="thin">Quick question?</h6>
                                <h5 class="text-info">Call - 123 456 789!</h5>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->   
                    <div class="col-sm-6 col-md-4">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-envelope-o text-success"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="thin">or send us e-mail</h6>
                                <h5 class="text-success">Info@domain.net</h5>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col --> 
                </div><!-- end row -->
                
                <hr class="spacer-40 no-border">
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control input-lg" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" class="form-control input-lg" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="message">Message</label>
                                <textarea id="message" rows="6" class="form-control input-lg" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-default round btn-lg" value="Submit">
                            </div>
                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
                
            </div><!-- end container -->
        </section>
        <!-- end section -->

        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.downCount.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/pace.min.js"></script>
        <script type="text/javascript" src="js/star-rating.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                // Contact Map
                if ($("#map").length > 0)
                {
                    var map;

                    map = new GMaps({
                        el: "#map",
                        lat: 45.494447,
                        lng: -73.5697587,
                        scrollwheel: false,
                        zoom: 14,
                        zoomControl: true,
                        panControl: false,
                        streetViewControl: false,
                        mapTypeControl: false,
                        overviewMapControl: false,
                        clickable: false
                    });

                    var image = "";
                    map.addMarker({
                        lat: 45.494447,
                        lng: -73.5697587,
                        icon: "img/marker.png",
                        animation: google.maps.Animation.DROP,
                        verticalAlign: "bottom",
                        horizontalAlign: "center",
                        backgroundColor: "#d3cfcf"
                    });

                    var styles = [
                        {
                            "featureType": "road",
                            "stylers": [
                                {"color": "#ffffff"}
                            ]
                        }, {
                            "featureType": "water",
                            "stylers": [
                                {"color": "#f2f2f2"}
                            ]
                        }, {
                            "featureType": "landscape",
                            "stylers": [
                                {"color": "#f2f2f2"}
                            ]
                        }, {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {"color": "#2d2d2d"}
                            ]
                        }, {
                            "featureType": "poi",
                            "stylers": [
                                {"color": "#f2f2f2"}
                            ]
                        }, {
                            "elementType": "labels.text",
                            "stylers": [
                                {"saturation": 1},
                                {"weight": 0.1},
                                {"color": "#b1b1b1"}
                            ]
                        }

                    ];

                    map.addStyle({
                        styledMapName: "Styled Map",
                        styles: styles,
                        mapTypeId: "map_style"
                    });

                    map.setStyle("map_style");
                }
            });
        </script>