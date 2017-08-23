var projectInfo1 = "<u>JobClick</u> is the first full stack web application I have ever made. The website served as job seeking forum where usings can apply for a job and request workers at the click of a button. The website was built using html and css for front end, and the back end was done using PHP and MySql database."

var projectInfo2 = "<u>Orchestroids</u> is a 2d shooter that help players practice musical tone recognition. The more you play the better you can identify a musical note.that was programmed using the Unity engine and a series of C# scripts. "

var projectInfo3 = "<u>StudyBuddy</u> is a full stack web application that  serves as a social network to help users look for other students to study with, depending on what classes a user was taking. The website allows users to customize personal information, search for tutors, and connect with other students taking the same classes. StudyBuddy's frontend architecture makes use of html, css, and the BootStrap framework. The back end consists of PHP and MySql database."

var projectInfo4 = "Project info 4"

//var clickMeArrow = "<p id='hoverarrow' class='animated fadeInDown'>Click<br><i class='fa fa-angle-double-down' aria-hidden='true'></i></p>"


// Project info 1 handler /////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $("#box1box").hover(
        function(){
            $("#projectinfo").stop().animate({ opacity: '1' });
            $("#projectinfo").html(projectInfo1)
        },
        function(){
            $("#projectinfo").stop().animate({ opacity: '0' });

        }
    );
});


// Project info 2 handler /////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $("#box2box").hover(
        function(){
            $("#projectinfo").stop().animate({ opacity: '1' });
            $("#projectinfo").html(projectInfo2);
        },
        function(){
            $("#projectinfo").stop().animate({ opacity: '0' });
        }
    );
});

// Project info 3 handler /////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $("#box3box").hover(
        function(){
            $("#projectinfo").stop().animate({ opacity: '1' });
            $("#projectinfo").html(projectInfo3);
        },
        function(){
            $("#projectinfo").stop().animate({ opacity: '0' });
        }
    );
});

// Project info 4 handler /////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $("#box4box").hover(
        function(){
            $("#projectinfo").stop().animate({ opacity: '1' });
            $("#projectinfo").html(projectInfo4);
        },
        function(){
            $("#projectinfo").stop().animate({ opacity: '0' });
        }
    );
});


$(document).ready(function() {
  $('#mailbutton').click(function(event) {
    window.location = "mailto:alfonsorayo222@gmail.com";
  });
});


$(document).on('click', 'a', function(event){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
});

 $(document).ready(function(){
      $('.your-class').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
      });
    });



 $(document).ready(function(){
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        infinite: false,
        initialSlide: 1,
        asNavFor: '.slider-nav',
        adaptiveHeight: true
    });
    $('.slider-nav').slick({
        initialSlide: 1,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        touchThreshold: 100,
        infinite: false,
        centerMode: true,
        arrows: false,
        asNavFor: '.slider-for'


    });
 });
