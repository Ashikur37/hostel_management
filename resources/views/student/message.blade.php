@extends('layouts.student')

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
                        @if ($message->receiver_id === $student->id)
                        <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                  <span class="direct-chat-name float-left">Admin</span>
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
                          <span class="direct-chat-name float-right">{{$student->name}}</span>
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
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="/student-message" method="post">
                    @csrf
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
@endsection