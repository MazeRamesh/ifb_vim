@extends('layout.app')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @include('layout.partials.messages')

            <div class="card">
                <div class="header">
                    <h4 class="title">
                        Items
                        <div class="pull-right">
                            <!--a href="{{ route('invoices.create') }}" class="btn btn-info btn-fill"><i class="glyphicon glyphicon-open"></i> Upload</a-->
                            <form  action="{{ URL::to('downloadmanual') }}"   method="GET"  >
                                
                                <label>Gross Weight:</label>
                <input type="text" name="grossweight" required> 
                                
                <label style="padding-left:10px;">Equipment:</label>
                <input type="text" name="equipment" required>
                                
                <label style="padding-left:10px;">Invoice Time:</label>
                <input type="text" name="invoicetime" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" required>
                                
                           <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i>  Download CSV</button>
                            </form>
                           <!-- <a href="{{ URL::to('post') }}"><button class="btn btn-danger"><i class="glyphicon glyphicon-envelope"></i> POST</button></a>-->
                        </div>
                        
                        
                    </h4>
                    <p class="category">All of your current and past Upload File are shown below in the list</p>
                </div>
                
                <!--<br>
                <div style="padding-left:600px;">
                <label>Gross Weight:</label>
                <input type="text" name="grossweight"> 
                
                <label style="padding-left:10px;">Equipment:</label>
                <input type="text" name="equipment">
                    
                    </div> <br>-->
                        
              



<div class="content table-reposive table-full-width">
                    
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th class="text-center">
                                    PRODUCT CODE
                                </th>
                                <th class="text-center">
                                    CUSTOMER CODE
                                </th>
                                <th class="text-center">
                                    PRODUCT NAME
                                </th>
                                <th class="text-center">
                                    PACKING NO
                                </th>
                                <th class="text-center">
                                    QTY
                                </th>
                                <th class="text-center">
                                    DOCUMENT NUMBER
                                </th> 
                                <th class="text-center">
                                    VENDOR CODE
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                          
                            @foreach($result as $result)
                           
                                <tr>
                                    
                                    <td>
                                        {{ $result[0] }}
                                    </td >
                                    <td class="text-center">
                                        {{ $result[1] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[2] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[3] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[5] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[15] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[38] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $result[51] }}
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                            
                    
                        </tbody>
                        
                    </table>
                    

            
                </div>
            </div>

        </div>
    </div>

@endsection


