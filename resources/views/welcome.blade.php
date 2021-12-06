@include('header')
    <body>
    @if(session('success'))
              <h4 class='alert alert-success'>{{session('success')}}</h4>
    @endif
    <div class="container table-responsive py-5"> 
    <button class="btn btn-success "><a class="text-white" href="{{route('container.create')}}">CRIAR</a></button>
                  <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>CLIENTE</th>
                            <th>NUMERO</th>
                            <th>TIPO</th>
                            <th>STATUS</th>
                            <th>CATEGORIA</th>
                            <th>ACOES</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($containers as $c)
                        <tr>
                            <td>{{$c->cliente}}</td>
                            <td>{{$c->numero}}</td>
                            <td>{{$c->tipo}}</td>
                            <td>{{$c->status}}</td>
                            <td>{{$c->categoria->titulo}}</td>
                            <td style="display:flex;justify-content:space-around">
                              <a href="{{ route('container.edit',$c->id)}}" class="btn btn-primary">EDITAR</a>
                              <form action="{{ route('container.destroy',$c->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">EXCLUIR</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class='m-5'>
              <form method="post" action="{{ route('container.export')}}">
                  @csrf
           
                    <label>Exportar ordenando por:</label>
                    <select name="coluna">
                        <option value="cliente">CLIENTE</option>
                        <option value="status">STATUS</option>
                        <option value="tipo">TIPO</option>
                        <option value="id_categoria">CATEGORIA</option>
                    </select>
                    <button class="btn btn-alert" type="submit">OK</button>
              </form>
          </div>
          <script type="text/javascript">
                $(document).ready( function () {
                    $('#table_id').DataTable({
                        "language":{
                            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
                        }
                    });
                });
          </script>
    </body>
</html>
