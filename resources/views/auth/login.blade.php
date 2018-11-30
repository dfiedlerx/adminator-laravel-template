
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Entrar</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
  </head>
  <body class="app">
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
      <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("/img/first_bg.jpg")'>
      </div>
      <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;     font-weight: bold; text-align: center;'>
          <img class="" style="width: 100px; margin: 0 auto;" src="img/logo.jpg" alt="">

        <h2  style="font-weight: bold;">
          Clínica Veterinária
        </h2>
        <br>
        <br>
        <br>
        <form role="form" method="POST" action="{{ url('login') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label class="text-normal text-dark">E-mail de acesso</label>
            <input type="email" name='email' class="form-control" placeholder="teste@teste.com">
            @if ($errors->has('email'))
              <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
            @endif
          </div>
          <div class="form-group">
            <label class="text-normal text-dark">Senha de acesso</label>
            <input type="password" name='password' class="form-control" placeholder="Senha">
            @if ($errors->has('password'))
              <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
            @endif
          </div>
          <div class="form-group">
            <div class="peers ai-c jc-sb fxw-nw">
              <div class="peer">
                <!-- <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                  <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                  <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                    <span class="peer peer-greed">Remember Me</span>
                  </label>
                </div> -->
              </div>
              <div class="peer">
                <input type='submit' class="btn btn-primary" value='Entrar no sistema'/>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
