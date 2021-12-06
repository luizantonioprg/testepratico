@include('header')
<body>
  <h1>EDITAR</h1>
  <form class="container" method="post" action="{{ route('container.update', $container->id) }}">
            @method('PATCH') 
  
            @csrf
            @if(session('success'))
              <h4 class='alert alert-success'>{{session('success')}}</h4>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <div class="form-group">
                <label for="titulo">Cliente:</label>
                <input type="text" class="form-control" name="cliente" value="{{$container->cliente}}"/>
            </div>

            <div class="form-group">
                <label for="titulo">Numero:</label>
                <input type="text" class="form-control" name="numero" value="{{$container->numero}}"/>
            </div>

            <div class="form-group">
                <label for="titulo">Tipo:</label>
                <select name="tipo">
                  <option {{ $container->tipo == 20 ? 'selected' : '' }} value="20">20</option>
                  <option {{ $container->tipo == 40 ? 'selected' : '' }} value="40">40</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Status:</label>
                <select name="status">
                  <option {{ $container->tipo == 'CHEIO' ? 'selected' : '' }} value="CHEIO">CHEIO</option>
                  <option {{ $container->tipo == 'VAZIO' ? 'selected' : '' }} value="VAZIO">VAZIO</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Categoria:</label>
                <select name="categoria">
                  @foreach($categorias as $c)
                    <option {{ $container->id_categoria == $c->id ? 'selected' : '' }} value="{{$c->id}}">{{$c->titulo}}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">CRIAR</button>
        </form>
</body>