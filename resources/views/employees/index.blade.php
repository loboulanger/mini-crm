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
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">
                            Supprimer
                        </button>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>

        {{ $employees->links() }}

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Supprimer un employé</h5>
              </div>
              <div class="modal-body">
                Êtes-vous certain de vouloir supprimer '{{ $employee->firstname . ' ' .  $employee->lastname}}' ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Retour</button>
                <button type="button" id="deleteEmployee" class="btn btn-danger btn-sm" data-id="{{ $employee->id }}" data-token="{{ csrf_token() }}" data-dismiss="modal">Supprimer</button>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>
  @endsection
