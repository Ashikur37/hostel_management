@extends('layouts.admin')

@section('content')
<div class="card card-prirary cardutline direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Warden</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                 
                 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                        @foreach ($messages as $message)
                        @if ($message->sid !=$a )
                        <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                  <span class="direct-chat-name float-left">{{$message->sender}}</span>
                                  <span class="direct-chat-timestamp float-right">{{$message->created_at}}</span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                        {{$message->message}}
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                @else
                <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">Warden</span>
                          <span class="direct-chat-timestamp float-left">{{$message->created_at}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text" style="width:80%;display: inline-block;">
                                {{$message->message}}
                        </div>
                        <div style="width:10%;display: inline-block;">
          <a href="/delete-admin-message?id={{$message->id}}&sid={{$student}}" class="btn btn-danger btn-sm" style="float:right">
            <span class="fa fa-trash">

            </span>
          </a>
          <a onclick="edit({{$message->id}},'{{$message->message}}')" href="#" class="btn btn-info btn-sm" style="float:right">
            <span class="fa fa-pen">

            </span>
          </a>
        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                @endif

                        @endforeach
                  
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  
                  <!-- /.direct-chat-msg -->
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="/admin-message" method="post">
                    @csrf
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <input type="hidden" value="{{$student}}" name="student">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <script>
edit=(id,msg)=>{
  upd=window.prompt('Enter Update Message',msg)
  if(upd){
    window.location.href="/update-admin-message?id="+id+"&sid={{$student}}&msg="+upd;
  }
}
</script>
@endsection