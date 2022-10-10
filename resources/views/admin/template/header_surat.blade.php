  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <title>Laporan</title>
    </head>
    <body>
      <div class="section">
        <div class="container">
          <div class="row">
          <div class="d m-3 text-center">

            @foreach ($profile_sekolah as $profiles)
      
            <img class=" " src="/image/{{ $profiles->image }}" width="90px">
            <div><b class="fs-1  ">{{ $profiles->nama }}</b></div>
            <div class=" fs-5  "><div>
            {{ $profiles->alamat }} <br>
            {{ $profiles->telpon }} | 
            {{ $profiles->website }}<br>
            <b>-----------------------------------------------------------------------------------------------</b>
            <h1>gambar ga kliatan pas jadi pdf</h1>
        </div>  </div>
           
        
        @endforeach
          </div>
            
            
            
        
          
          
            <div class="container">
              @yield('content')
            </div>
            
            
          </div>
      </div>
    </div>

  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
  </html>