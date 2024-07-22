<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Free bootstrap documentation template">
      <title>Camilasboutique</title>
      <!-- using online links -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link rel="stylesheet" href="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
      <!-- using local links -->
      <link rel="stylesheet" href="{{ asset('postman-collection-viewer-assets/css/main.min.css') }}">
      <link rel="stylesheet" href="{{ asset('postman-collection-viewer-assets/css/sidebar-themes.min.css') }}">
      <link rel="stylesheet" href="{{ asset('postman-collection-viewer-assets/css/bootstrap-treeview.min.css') }}">
      <link rel="stylesheet" href="{{ asset('postman-collection-viewer-assets/css/postman.min.css') }}">
      <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
   </head>
   <body>
      <div class="page-wrapper toggled light-theme">
         <div class="modal dark-background" id="snippetModal" tabindex="-1" role="dialog" aria-labelledby="documentation-response-modal" style="display: none;">
            <div class="modal-dialog" role="document">
               <div class="modal-header">
                  <div class="title">Example Response</div>
                  <button type="button" class="close btn-circle" data-dismiss="modal" aria-label="Close">
                     <div>
                        <span id="closeModal" aria-hidden="true">X</span>
                     </div>
                  </button>
               </div>
               <div class="modal-content">
                  <div class="modal-body" style="width: 540.5px;">
                     <pre class="  language-javascript">
                  <code class=" language-javascript"></code>
              </pre>
                  </div>
               </div>
            </div>
         </div>
         <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
               <!-- sidebar-brand  -->
               <div class="sidebar-item sidebar-brand text-white font-weight-bold">API Documentation</div>
               <!-- sidebar-header  -->
               <!-- sidebar-menu  -->
               <div class=" sidebar-item sidebar-menu">
                  <div id="tree"></div>
               </div>
               <!-- sidebar-menu  -->
            </div>
         </nav>
         <!-- page-content  -->
         <main class="page-content">
            <div id="overlay" class="overlay"></div>
            <div class="container-fluid">
               <div class="row d-flex align-items-center p-3 border-bottom">
                  <div class="col-md-1">
                     <a id="toggle-sidebar" class="btn rounded-0 p-3" href="#"> <i class="fas fa-bars"></i> </a>
                  </div>
                  <div class="col-md-9"></div>
                  <div class="col-md-2 text-left">
                  </div>
               </div>
               <div class="row p-lg-4">
                  <article class="main-content col-md-12 pr-lg-9" id="doc-body">
                     <div class="row row-no-padding row-eq-height">
                        <div class="col-md-6 col-xs-12">
                           <div class="api-information">
                              <div class="collection-name">
                                 <p>{{$collection['info']['name'] ?? null}}</p>
                              </div>
                              <div class="collection-description">
                                 <p></p>
                              </div>
                           </div>
                        </div>
                     </div>


                    @foreach($collection['item'] as $item)
                        @foreach($item['item'] as $key => $service)
                     <div class="row row-no-padding row-eq-height">
                        <div class="col-md-6 col-xs-12 section">
                           <div class="api-information" id="{{ ($key + 1) }}">
                              <div class="heading">
                                 <div class="name">
                                    <span class="{{$service['request']['method']}} method" >{{$service['request']['method']}}</span>
                                    {{$service['name']}} <span class="lock-icon"></span>
                                 </div>
                              </div>
                              <div class="url">{{$service['request']['url']['raw']}}</div>
                              <div class="request-body">
                                 @if(isset($service['request']['header']) && count($service['request']['header']) > 0)
                                    <div class="body-heading">HEADERS</div>
                                    <hr>
                                    @foreach($service['request']['header'] as $header)
                                       <div class="param row">
                                          <div class="name col-md-3 col-xs-12">{{$header['key']}}</div>
                                          <div class="value col-md-9 col-xs-12">{{$header['value']}}</div>
                                          <div class="description col-md-9 col-xs-12">
                                          <p>{{$header['description'] ?? "None"}}</p>
                                          </div>
                                       </div>
                                    @endforeach
                                 @endif
                              </div>
                              <div class="request-body">
                                 @if(isset($service['request']['body']['formdata']) && count($service['request']['body']['formdata']) > 0)
                                    <div class="body-heading">BODY 
                                       <span class="body-type">{{$service['request']['body']['mode'] ?? null}}</span>
                                    </div>
                                    <hr>
                                    @foreach($service['request']['body']['formdata'] as $formdata)
                                       <div class="param row">
                                          <div class="name col-md-3 col-xs-12">{{ $formdata['key'] ?? null }}</div>
                                          <div class="value col-md-9 col-xs-12">{{ $formdata['value'] ?? null }}</div>
                                          <div class="description col-md-9 col-xs-12">
                                             <p>{{ $formdata['description'] ?? null }}</p>
                                          </div>
                                       </div>
                                    @endforeach
                                 @endif

                                 @if(isset($service['request']['url']['query']) && count($service['request']['url']['query']) > 0)
                                    <div class="body-heading">PARAMETROS 
                                       <span class="body-type">{{$service['request']['body']['mode'] ?? null}}</span>
                                    </div>
                                    <hr>
                                    @foreach($service['request']['url']['query'] as $formdata)
                                       <div class="param row">
                                          <div class="name col-md-3 col-xs-12">{{ $formdata['key'] ?? null }}</div>
                                          <div class="value col-md-9 col-xs-12">{{ $formdata['value'] ?? null }}</div>
                                          <div class="description col-md-9 col-xs-12">
                                             <p>{{ $formdata['description'] ?? null }}</p>
                                          </div>
                                       </div>
                                    @endforeach
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-xs-12 examples">
                           <div class="sample-request">
                              <div class="heading">
                                 <span>Example Request</span>
                              </div>
                              <div class="responses-index">
                                 <div class="dropdown response-name">
                                    <button class="btn dropdown-toggle  responses-dropdown truncate" type="button" id="f678f251-1750-4e3a-b5d8-05b4c6b0fb37_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span id="selected" class="response-name-label">{{ $service['response'][0]['name'] ?? null }}</span>
                                    <span class="caret"></span>
                                    </button>
                                    
                                    <ul class="dropdown-menu" aria-labelledby="f678f251-1750-4e3a-b5d8-05b4c6b0fb37_dropdown">
                                       @foreach($service['response'] as $key => $response)
                                          <li class="truncate" data-request-info="{{ ($key + 1) }}" data-response-info="response_{{ ($key + 1) }}">{{ $response['name'] }}</li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>

                           @foreach($service['response'] as $key => $response)
                           <div class="formatted-requests {{ $key > 0 ? 'hide' : '' }}" data-request-id="1"  data-id="response_{{ ($key + 1) }}">
                              <div class="request code-snippet">
                                 <div>
                                    <pre class="click-to-expand-wrapper is-snippet-wrapper " data-title="Login">
                                                <code class="is-highlighted">
POST http://127.0.0.1:8000/{{$response['originalRequest']['url']['path'][0] ?? null}}
</code>
                                            </pre>
                                 </div>
                              </div>
                              <div class="sample-response">
                                 <div class="heading">
                                    <span>Example Response</span>
                                 </div>
                                 <div class="responses-index">
                                    <div class="response-status">
                                       <span>{{ $response['code'] }} - {{ $response['status'] }}</span>
                                    </div>
                                 </div>
                                 <div class="responses code-snippet">
                                    <div>
                                       <pre class="click-to-expand-wrapper is-snippet-wrapper is-expandable" data-title="Login">
                                                    <code class="is-highlighted">
{{ $response['body'] }}</code>
                                                </pre>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @endforeach



                        </div>
                     </div>
                        @endforeach
                    @endforeach
         </main>
         <!-- page-content" -->
      </div>
      <!-- page-wrapper -->
      <!-- using online scripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script src="https://malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{ asset('postman-collection-viewer-assets/js/bootstrap-treeview.min.js') }} "></script>
      <script src="{{ asset('postman-collection-viewer-assets/js/main.min.js') }} "></script>
      <script type="application/javascript">
         var data = @json($sidebarElements);
         $('#tree').treeview({
             data: data,
             levels: 10,
             expandIcon: 'fas fa-caret-right',
             collapseIcon: 'fas fa-caret-down',
             enableLinks: true,
             showIcon: true,
             showMethod: true
         });
      </script>
   </body>
</html>