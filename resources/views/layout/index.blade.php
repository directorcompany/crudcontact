@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel latest Version Contact</h2>
            </div> 
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('crud.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
            <form action="/search" method="get" class="form-inline col-lg-6 col-12 col-md-12">
  <input type="text" class="form-control" id="search" name="search" placeholder="Поиск">
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
         </form>
           
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Telephone</th>
            <th>E-mail</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->telephone }}</td>
                <td>{{ $project->email }}</td>
                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('crud.destroy', $project->id) }}" method="POST">

                        <a href="{{ route('crud.show', $project->id) }}" class="btn btn-primary" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('crud.edit', $project->id) }}" class="btn btn-info">
                            <i class="fa fa-book fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-primary" title="delete">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script type="text/javascript">

    </script>

    {{$projects->links() }}

@endsection
