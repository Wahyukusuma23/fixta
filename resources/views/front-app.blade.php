<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>IMP - Online</title>
    <style>
        .alert{
            position: absolute !important;
            top: 5rem;
            z-index: 5;
        }
    </style>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="/css/owl-carousel.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** style ***** -->
    <style>
        .btn-reg{
            background: #2fe32f;
            padding: 0 15px;
            border-radius: 98px;
        }
    </style>
    <!-- ***** style ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{route('home')}}" class="logo"><img src="/images/sai.png" width="130px"></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @if (Auth::guard('kary')->check())
                            <li><a href="{{route('karyawan.index')}}" class="btn-reg">Dashboard</a></li>
                            <li><a href="{{route('user.logout')}}">Logout</a></li>
                            @else
                            <li><a href="#" class="btn-reg"  data-toggle="modal" data-target="#login">Login</a></li>
                            @endif
                            {{-- <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Features</a></li>
                                    <li><a href="">FAQ's</a></li>
                                    <li><a href="">Blog</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check-square-o"></i> Oops!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check-square-o"></i> Done!</h4>
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check-square-o"></i> oops!</h4>
        <ul>
            <li>{{ Session::get('error') }}</li>
        </ul>
    </div>
    @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: left" id="myModalLabel">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('login.post')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chln" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: left" id="myModalLabel">Ubah Line</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('change_line')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Pilih Line</label>
                            <select class="form-control" name="new_line" autocomplete="off" required>
                                <option value="">----</option>
                                <?php
                                $modlines = \App\Models\TbLine::get();
                                ?>
                                @foreach ($modlines as $modline)
                                    <option value="{{$modline->id}}">{{$modline->nama.' - '.$modline->car_line}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="line_password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chpwd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: left" id="myModalLabel">Ubah Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('change_pwd')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="password">Password Sekarang</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control" placeholder="Password" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="view_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="text-align: left" id="myModalLabel">Detail </h4>
                    <button type="button" class="close" data-content="" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">No. IMP :</div>
                        <div class="col-lg-8"><b id="md-noimp"></b></div>
                        <div class="col-lg-4">NIK :</div>
                        <div class="col-lg-8"><b id="md-nik"></b></div>
                        <div class="col-lg-4">Nama :</div>
                        <div class="col-lg-8"><b id="md-nm"></b></div>
                        <div class="col-lg-4">Tanggal Ijin :</div>
                        <div class="col-lg-8"><b id="md-tgl-ijn"></b></div>
                        <div class="col-lg-4">Lama Ijin :</div>
                        <div class="col-lg-8"><b id="md-lm-ijn"></b></div>
                        <div class="col-lg-4">Jenis Ijin :</div>
                        <div class="col-lg-8"><b id="md-jns-ijn"></b></div>
                        <div class="col-lg-4">Alasan :</div>
                        <div class="col-lg-8"><b id="md-als"></b></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="accept" data-impid="">Saya Setuju</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2020 Art Factory Company

                . Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/js/owl-carousel.js"></script>
    <script src="/js/scrollreveal.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script>
        var pathname = window.location.href;
        if (pathname.includes("#login")) {
            $('#login').modal('show');
        }

    </script>
    @yield('script')
    <script src="/js/custom.js"></script>
  </body>
</html>
