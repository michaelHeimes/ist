jQuery(function($) {

// -----------------------------------------------------------------------------
//! Mobile Nav
// -----------------------------------------------------------------------------

	var mobileNav = {

		init: function() {
			this.nav = $( ".mobile-nav" );

			var haveChildren = this.nav.find( ".menu-item-has-children" );
			var count = 1;

			haveChildren.each( function() {
				$( this ).attr( "data-parent-id", count );
				$sub = $( this ).find( "ul" );
				$sub.removeClass( "sub-menu" )
					.addClass( "mobile-sub-menu" )
					.attr( "data-child-id", count )
					.detach();
				$( ".depth-2" ).append( $sub );

				count ++;
			});

			this.children = $( ".mobile-sub-menu" );
			this.childTitle = $( ".child-menu-title" );
		},

		open: function() {
			var heightToSet = $( ".depth-1" ).height();
			this.nav.css( "max-height", heightToSet + "px" );
		},

		resize: function( height ) {
			this.nav.css( "max-height", height + "px" );
		},

		dive: function( id ) {
			var $child = $( "[data-child-id=" + id + "]" );
			var title = $( "[data-parent-id=" + id + "] a " ).text();

			this.childTitle.html( title );
			$child.show();
			var newHeight = $( ".depth-2" ).height();

			this.nav.addClass( "depth-2" );
			this.resize( newHeight );
		},

		surface: function() {
			var height = $( ".depth-1" ).height();
			this.nav.removeClass( "depth-2" );
			this.resize( height );
			this.children.hide();
		},

		close: function() {
			this.resize( 0 );
			var self = this;
			setTimeout( function() {
				console.log(this);
				self.nav.removeClass( "depth-2" );
				self.children.hide();
			}, 250)
		}
	};


	mobileNav.init();

	// Toggle visibility
	$( ".toggle-nav" ).toggle( function(){
		$( this ).addClass( "open" );
		mobileNav.open();
	}, function() {
		mobileNav.close();
		$( this ).removeClass( "open" );
	});

	// Open child nav
	$( "[data-parent-id]" ).on( "click", function(e) {
		e.preventDefault();
		var id = $( this ).attr( "data-parent-id" );
		mobileNav.dive( id );
	});

	// Go back
	$( ".mobile-nav-back" ).on( "click", function() {
		mobileNav.surface();
	});


// -----------------------------------------------------------------------------
//! Open Outside Links in New Tab
// -----------------------------------------------------------------------------

	$( "body" ).on( "click", "a", function() {
		var a = new RegExp('/' + window.location.host + '/');
		var isLocal = a.test(this.href);
   	   	var isPdf = this.href.match( ".pdf" );
   	   	var isMailTo = this.href.match( "mailto" );

		if( (!isLocal || isPdf) && !isMailTo ) {
			event.preventDefault();
			event.stopPropagation();
			window.open(this.href, '_blank');
		}
	});


// -----------------------------------------------------------------------------
//! Home Slider
// -----------------------------------------------------------------------------

	if( $( ".home-slider" ).length ) {

		$( ".home-slider" ).slick({
			dots: true,
			prevArrow: '<div class="slick-arrow prev"><i class="fa fa-angle-left"></i></div>',
			nextArrow: '<div class="slick-arrow next"><i class="fa fa-angle-right"></i></div>',
			touchMove: false,
			autoplay: true,
			autoplaySpeed: 5000,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						touchMove: true
					}
				}
			]
		});

		$( ".home-slider" ).hoverIntent(
			function() {
				$( ".home-slider" ).addClass( "show-arrows" );
			},
			function() {
				$( ".home-slider" ).removeClass( "show-arrows" );
			}
		);
	}


// -----------------------------------------------------------------------------
//! Fancybox
// -----------------------------------------------------------------------------

	$( ".module" ).fancybox({
		width: 565,
		height: 580
	});


// -----------------------------------------------------------------------------
//! Email Subscription Form
// -----------------------------------------------------------------------------

	function isValidEmail(emailAddress) {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailAddress)) {
			return true;
		}
	}

	function submitEmailForm( email ) {
		$( ".subscribe-submit" ).prop( "disabled", true ).attr( "value", "Sending..." );

		$.post(
			myVars.ajax_url,
			{
				action: 'ist_subscribe_form_submit',
				email: email
			},
			function( response ) {
				$( ".subscribe-input" ).val("").blur();
				$( ".subscribe-submit" ).hide();
				$( ".subscribe-success" ).show();
			}
		);
	}

	$( ".subscribe-form" ).on( "submit", function(e) {
		var val = $( ".subscribe-input" ).val();
		var honeypot = $( ".subscribe-name" ).val();

		if( isValidEmail( val ) && honeypot == '' ) {
			submitEmailForm( val );
		} else {
			$( this ).addClass( "error" );
		}

		e.preventDefault();
		return false;
	});

	$( ".subscribe-input" ).on( "focus", function() {
		$( ".subscribe-form" ).removeClass( "error" );
	});


// -----------------------------------------------------------------------------
//! Gravity Forms
// -----------------------------------------------------------------------------

	$("#gform_wrapper_3 .gfield input, #gform_wrapper_5 .gfield input" ).on( "focus", function() {
		$( this ).parent().parent().addClass( "is-focused-label" );
	}).on( "blur", function() {
		$( this ).parent().parent().removeClass( "is-focused-label" );
	});

	$( ".phone_input input" ).focus(function(){
		$( this ).parent().parent().addClass( "is-focused" );

		$( ".phone_input input" ).keyup( function() {
			var phone_value = $( this ).val();

			if( phone_value != '') {
				$( this ).parent().parent().addClass( "is-focused" );
			} else {
				$( this ).parent().parent().removeClass( "is-focused" );
			}
		});
	});


	$( "#gform_wrapper_3 .gfield input, #gform_wrapper_5 .gfield input" ).on( "input", function() {
		var text_value = $( this ).val();

		if( text_value != '' ) {
			$( this ).parent().parent().addClass( "is-focused" );
		} else {
			$( this ).parent().parent().removeClass( "is-focused" );
		}
	});

});



// Google map

function initMap() {
	var zoom = 5;
	var center = { lat: 38.89532, lng: -78.497904 };
	var locations = [
		{
			address: "Integrated Security Technologies<br>520 Herndon Parkway Suite C<br>Herndon, VA 20170",
			link: "https://www.google.com/maps/place/Integrated+Security+Technologies,+Inc./@38.9557957,-77.3817143,17z/data=!3m1!4b1!4m5!3m4!1s0x89b647fd4175e8a9:0xfadad378529ead9!8m2!3d38.9557957!4d-77.3795256",
			pos: { lat: 38.955722, lng: -77.379545 }
		},
		{
			address: "Integrated Security Technologies<br>2513 Performance Court, Suite 100<br>Virginia Beach, VA 23454",
			link: "https://www.google.com/maps/place/Integrated+Security+Technologies,+Inc./@38.9557957,-77.3817143,17z/data=!3m1!4b1!4m5!3m4!1s0x89b647fd4175e8a9:0xfadad378529ead9!8m2!3d38.9557957!4d-77.3795256",
			pos: { lat: 36.788980, lng: -76.058378 }
		},
		{
			address: "Integrated Security Technologies<br>1314 Plantation Road<br>Roanoke, VA 24012",
			link: "https://www.google.com/maps/place/Integrated+Security+Technologies,+Inc./@37.2831686,-79.9323752,17z/data=!3m1!4b1!4m5!3m4!1s0x884d0ddfe88723d7:0xb507033f60fd11ac!8m2!3d37.2831686!4d-79.9301865",
			pos: { lat: 37.283169, lng: -79.930186 }
		}
	];

	var map = new google.maps.Map(document.getElementById( "map" ), {
		zoom: zoom,
		center: center,
		scrollwheel: false,
		streetViewControl: false,
		mapTypeControl: false,
		disableDefaultUI: true,
		zoomControl: true,
		zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          }
	});

	function addInfoWindow( marker, content ) {
		google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(content);
            infowindow.open(map, this);
          });
	}

	for (var i = 0; i < locations.length; i++) {
		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			position: locations[i].pos,
			map: map
		});
		var content = locations[i].address + '<br><a href="' + locations[i].link + '" target="_blank">For Directions & a detailed Google Map click here';

		addInfoWindow( marker, content );
	}


	    // map.addListener('click', function() {
        // console.log(map.getZoom());
        //   alert(map.getCenter());
        // });
}
