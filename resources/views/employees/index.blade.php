@extends ('layouts.master')

@section ('content')
<div class="container-fluid">
    <div class="row">

      @include('layouts.sidebar')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        <h2>Liste des employés</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Société</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                  <tr>
                   <td>{{ $employee->id }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->firstname }}</td>
                    {{-- <td>{{ $employee->firm_id }}</td> --}}
                    <td>{{ $employee->firm->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td><button type="button" class="btn btn-dark btn-sm">Supprimer</button></td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>

        {{ $employees->links() }}
      </main>
    </div>
  </div>
  @endsection
