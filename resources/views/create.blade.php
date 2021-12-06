@include('header')
<body>
  <h1>CRIAR</h1>
<form class="container" method="post" action="{{ route('container.store') }}">
            
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
                <input type="text" class="form-control" name="cliente"/>
            </div>

            <div class="form-group">
                <label for="titulo">Numero:</label>
                <input type="text" class="form-control" name="numero"/>
            </div>

            <div class="form-group">
                <label for="titulo">Tipo:</label>
                <select name="tipo">
                  <option value="20">20</option>
                  <option value="40">40</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Status:</label>
                <select name="status">
                  <option value="CHEIO">CHEIO</option>
                  <option value="VAZIO">VAZIO</option>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Categoria:</label>
                <select name="categoria">
                  @foreach($categorias as $c)
                    <option value="{{$c->id}}">{{$c->titulo}}</option>
                  @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">CRIAR</button>
        </form>
</body>