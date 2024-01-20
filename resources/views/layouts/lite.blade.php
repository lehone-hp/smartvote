<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" sizes="16x16" href="{{asset('lite')}}/plugins/images/favicon.png">
      <title>{{ config('app.name') }}</title>
      <!-- Bootstrap Core CSS -->
      <link href="{{asset('lite')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="{{asset('lite')}}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
      <!-- toast CSS -->
      <link href="{{asset('lite')}}/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
      <!-- morris CSS -->
      <link href="{{asset('lite')}}/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
      <!-- animation CSS -->
      <link href="{{asset('lite')}}/css/animate.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="{{asset('lite')}}/css/style.css" rel="stylesheet">
      <!-- color CSS -->
      <link href="{{asset('lite')}}/css/colors/blue-dark.css" id="theme" rel="stylesheet">
      <!-- Fonta awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <div id="wrapper">
         <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
               <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
               <div class="top-left-part">
                  <a class="logo" href="{{url('admin/welcome')}}">
                     <span>

                     </span>
                  </a>
               </div>
               <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                  <li>
                     <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="{{ config('app.name') }}" class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                     </form>
                  </li>
               </ul>
               <ul class="nav navbar-top-links navbar-right pull-right">

                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu">
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
                  <li>
                    &nbsp;
                  </li>
               </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
         </nav>
         <!-- Left navbar-header -->
         <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
               <ul class="nav" id="side-menu">
                  <li style="padding: 10px 0 0;">
                     <a href="{{url('admin/welcome')}}" class="waves-effect"><i class="fa fa-dashboard" aria-hidden="true"></i><span class="hide-menu"> Dashboard</span></a>
                  </li>
                  <li>
                     <a href="{{url('admin/pages')}}" >
                        <i class="fa fa-book fa-fw" aria-hidden="true"></i><span class="hide-menu">Pages</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/posts')}}" >
                        <i class="fa fa-list fa-fw" aria-hidden="true"></i><span class="hide-menu">Posts</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{url('admin/categories')}}" >
                        <i class="fa fa-list fa-fw" aria-hidden="true"></i><span class="hide-menu">Posts Category</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/services')}}" >
                        <i class="fa fa-gears fa-fw" aria-hidden="true"></i><span class="hide-menu">Services</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/types')}}" >
                        <i class="fa fa-gears fa-fw" aria-hidden="true"></i><span class="hide-menu">Service Types</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/testimonials')}}" >
                        <i class="fa fa-comments fa-fw" aria-hidden="true"></i><span class="hide-menu">Testimonials</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/clients')}}" >
                        <i class="fa fa-institution fa-fw" aria-hidden="true"></i><span class="hide-menu">Clients</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/partners')}}" >
                        <i class="fa fa-info fa-fw" aria-hidden="true"></i><span class="hide-menu">Partners</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/teams')}}" >
                        <i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Team</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{url('admin/socials')}}" >
                        <i class="fa fa-refresh fa-fw" aria-hidden="true"></i><span class="hide-menu">Socials</span>
                     </a>
                  </li>

                  {{--<li>--}}
                     {{--<a href="{{url('admin/users')}}" >--}}
                        {{--<i class="fa fa-users fa-fw" aria-hidden="true"></i><span class="hide-menu">Users</span>--}}
                     {{--</a>--}}
                  {{--</li>--}}

               </ul>

            </div>
         </div>
         <!-- Left navbar-header end -->
         <!-- Page Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     <h4 class="page-title">{{$title}}</h4>
                  </div>
                  <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                  </div>
                  <!-- /.col-lg-12 -->
               </div>
               <!-- row -->
               <div class="row">
                 <div class="col-md-12">

                  @if(Session::has('s'))
                  <div class="alert alert-success fade in">
                    <strong>Success!</strong> {{Session::get('s')}}
                  </div>
                  @endif

                  @if(Session::has('e'))
                  <div class="alert alert-danger fade in">
                    <strong>Error!</strong> {{Session::get('e')}}
                  </div>
                  @endif

                  @if(Session::has('errors'))
                  <div class="alert alert-danger fade in">
                    <strong>Error!</strong>

                  @endif

                 </div>
               </div>
               @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> {{date('Y')}} &copy; {{ config('app.name') }}. </footer>
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="{{asset('lite')}}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="{{asset('lite')}}/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Menu Plugin JavaScript -->
      <script src="{{asset('lite')}}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!--slimscroll JavaScript -->
      <script src="{{asset('lite')}}/js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="{{asset('lite')}}/js/waves.js"></script>
      <!--Counter js -->
      <script src="{{asset('lite')}}/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
      <script src="{{asset('lite')}}/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
      <!--Morris JavaScript -->
      <script src="{{asset('lite')}}/plugins/bower_components/raphael/raphael-min.js"></script>
      <script src="{{asset('lite')}}/plugins/bower_components/morrisjs/morris.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="{{asset('lite')}}/js/custom.min.js"></script>
      <script src="{{asset('lite')}}/js/dashboard1.js"></script>
      <script src="{{asset('lite')}}/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
      
         <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>


      <script>
        var editor_config = {
          path_absolute : "/",
          selector: "textarea.my-editor",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
          relative_urls: false,
          file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
              cmsURL = cmsURL + "&type=Images";
            } else {
              cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
              file : cmsURL,
              title : 'Filemanager',
              width : x * 0.8,
              height : y * 0.8,
              resizable : "yes",
              close_previous : "no"
            });
          }
        };

        tinymce.init(editor_config);
      </script>
   </body>
</html>
