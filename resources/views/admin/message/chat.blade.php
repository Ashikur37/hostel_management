@extends('layouts.admin')

@section('content')
<div class="card card-prirary cardutline direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Admin</h3>

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
                          <span class="direct-chat-name float-right">{{$message->sender}}</span>
                          <span class="direct-chat-timestamp float-left">{{$message->created_at}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                                {{$message->message}}
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
@endsection