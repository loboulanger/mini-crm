@extends ('layouts.master')

@section ('content')
<div class="container-fluid">
    <div class="row">

      @include('layouts.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h2>Liste des entreprises</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Url</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($firms as $firm)
                <tr>
                  <td>{{ $firm->id }}</td>
                  <td>{{ $firm->name }}</td>
                  <td>{{ $firm->email }}</td>
                  <td>{{ $firm->logo }}</td>
                  <td>{{ $firm->url }}</td>
                  <td><button type="button" class="btn btn-dark btn-sm">Supprimer</button></td>
                </tr>

              @endforeach

            </tbody>
          </table>
        </div>

        {{ $firms->links() }}
      </main>
    </div>
  </div>
  @endsection

  @section ('scripts')
  <script src=""></script>
  @endsection
