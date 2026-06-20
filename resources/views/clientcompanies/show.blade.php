@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Clientcompany' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clientcompanies.clientcompany.destroy', $clientcompany->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clientcompanies.clientcompany.index') }}" class="btn btn-primary" title="Show All Clientcompany">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clientcompanies.clientcompany.create') }}" class="btn btn-success" title="Create New Clientcompany">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clientcompanies.clientcompany.edit', $clientcompany->id ) }}" class="btn btn-primary" title="Edit Clientcompany">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Clientcompany" onclick="return confirm(&quot;Click Ok to delete Clientcompany.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Cmpcode</dt>
            <dd>{{ $clientcompany->cmpcode }}</dd>
            <dt>Cmpname</dt>
            <dd>{{ $clientcompany->cmpname }}</dd>
            <dt>Cmpmailingname</dt>
            <dd>{{ $clientcompany->cmpmailingname }}</dd>
            <dt>Cmpaddress</dt>
            <dd>{{ $clientcompany->cmpaddress }}</dd>
            <dt>Cmpgstino</dt>
            <dd>{{ $clientcompany->cmpgstino }}</dd>
            <dt>Cmpcountry</dt>
            <dd>{{ $clientcompany->cmpcountry }}</dd>
            <dt>Cmpstate</dt>
            <dd>{{ $clientcompany->cmpstate }}</dd>
            <dt>Cmpcity</dt>
            <dd>{{ $clientcompany->cmpcity }}</dd>
            <dt>Cmpemail</dt>
            <dd>{{ $clientcompany->cmpemail }}</dd>
            <dt>Cmpphoneno</dt>
            <dd>{{ $clientcompany->cmpphoneno }}</dd>
            <dt>Cmpmobileno</dt>
            <dd>{{ $clientcompany->cmpmobileno }}</dd>
            <dt>Cmpwebsite</dt>
            <dd>{{ $clientcompany->cmpwebsite }}</dd>
            <dt>Cmplogo</dt>
            <dd>{{ $clientcompany->cmplogo }}</dd>

        </dl>

    </div>
</div>

@endsection