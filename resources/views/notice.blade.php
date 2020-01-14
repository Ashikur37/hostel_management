@extends('layouts.page')
@section('content')
<style>
    li{
        margin: 5px;
        font-weight: 500;
        padding-top: 10px;
    }
</style>
<div class="jumbotron">
    
    <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            

<div class="card card-prirary cardutline direct-chat direct-chat-primary">
        <div class="card-header">
          <h3 class="card-title">Notice Board</h3>
        </div>
        <div class="card-body">
                <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Student can be closed.</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>All students can attend in competitions.</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Student can use sports elements.</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Students  can’t  be taken  any guest without permission.</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Students can’t  be enter hostel  at  7 pm.(for girls).</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Students can’t  be enter hostel  at  7 pm.(for boys).</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>All students must  be under  in disciplined.</td>
                            </tr>
                               
                                
                        </tbody>
                    </table>
        </div>
</div>


            </div>
    </div>
    
        
       

    
</div>
<<script>
window.setTimeout(function(){
        document.getElementById("footer").style.position="relative";
    },100)
</script>
@endsection