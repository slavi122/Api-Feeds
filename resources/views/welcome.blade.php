 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Slaviša Dragičević</title>

 
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <link href="{{asset('css/scrolling-nav.css')}}" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Slaviša Dragičević</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#facebook">Facebook</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#instagram">Instagram</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#twitter">Twitter</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  

    <!-- About Section -->


            <section id="facebook" class="about-section">
             <div class="container">
               @foreach($facebookFeed as $feed)
               
            <div class="well">
            @if(isset($feed['message'])) {{$feed['message']}} @endif
            <p>@if(isset($feed['created_time'])) {{$feed['created_time']->format('d.m.Y H:i')}} @endif<p>
            </div>
     
                @endforeach
                 </div>
                </section>  




 
   <!-- Services Section -->
     <section id="instagram" class="services-section">
        <div class="container">
   @foreach($instagramFeed['data'] as $instagram)

  
           
            
                <div class="well"><div class="media-left">
                   <a href="#">
                      <img class="media-object" src="{{$instagram['images']['low_resolution']['url']}}">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{$instagram['user']['username']}}</h4>
                    <p>{{date('d.m.Y.H:i',$instagram['caption']['created_time'] )}}</p>
                    <p>{{$instagram['caption']['text']}}</p>
                  </div>
                  </div>
    
                

            

           @endforeach 
            </div>
            </section>
    <!-- Contact Section -->
  
            <section id="twitter" class="contact-section">
        <div class="container">    
            

               @foreach($twitterFeed as $twitter)
          
                   
            <div class="well"><div class="media-left">
                   <a href="#">
                      <img class="media-object" src="{{$twitter->user->profile_image_url}}" alt="...">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{$twitter->user->screen_name}}</h4>
                    <p>{{ \Carbon\Carbon::parse($twitter->created_at)->format('d.m.Y H:i') }}</p>
                    <p>{{$twitter->text}}</p>
                  </div>
                  </div>
    
    


                @endforeach
  </div>
    </section>
      





  

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js'}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset(js/bootstrap.min.js)}}"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="{{asset(js/jquery.easing.min.js)}}"></script>
    <script src="{{asset(js/scrolling-nav.js)}}"></script>

</body>

</html>
