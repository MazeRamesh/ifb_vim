@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Clientcompanies</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clientcompanies.clientcompany.create') }}" class="btn btn-success" title="Create New Clientcompany">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clientcompanies) == 0)
            <div class="panel-body text-center">
                <h4>No Clientcompanies Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Cmpcode</th>
                            <th>Cmpname</th>
                            <th>Cmpmailingname</th>
                            <th>Cmpaddress</th>
                            <th>Cmpgstino</th>
                            <th>Cmpcountry</th>
                            <th>Cmpstate</th>
                            <th>Cmpcity</th>
                            <th>Cmpemail</th>
                            <th>Cmpphoneno</th>
                            <th>Cmpmobileno</th>
                            <th>Cmpwebsite</th>
                            <th>Cmplogo</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientcompanies as $clientcompany)
                        <tr>
                            <td>{{ $clientcompany->cmpcode }}</td>
                            <td>{{ $clientcompany->cmpname }}</td>
                            <td>{{ $clientcompany->cmpmailingname }}</td>
                            <td>{{ $clientcompany->cmpaddress }}</td>
                            <td>{{ $clientcompany->cmpgstino }}</td>
                            <td>{{ $clientcompany->cmpcountry }}</td>
                            <td>{{ $clientcompany->cmpstate }}</td>
                            <td>{{ $clientcompany->cmpcity }}</td>
                            <td>{{ $clientcompany->cmpemail }}</td>
                            <td>{{ $clientcompany->cmpphoneno }}</td>
                            <td>{{ $clientcompany->cmpmobileno }}</td>
                            <td>{{ $clientcompany->cmpwebsite }}</td>
                            <td>{{ $clientcompany->cmplogo }}</td>

                            <td>

                                <form method="POST" action="{!! route('clientcompanies.clientcompany.destroy', $clientcompany->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clientcompanies.clientcompany.show', $clientcompany->id ) }}" class="btn btn-info" title="Show Clientcompany">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clientcompanies.clientcompany.edit', $clientcompany->id ) }}" class="btn btn-primary" title="Edit Clientcompany">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Clientcompany" onclick="return confirm(&quot;Click Ok to delete Clientcompany.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $clientcompanies->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection