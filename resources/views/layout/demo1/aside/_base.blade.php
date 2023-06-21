@php
    $logoFileName = 'logo-1.svg';

    if (theme()->getOption('layout', 'aside/theme') === 'light') {
        $logoFileName = 'logo-1-dark.svg';
    }
@endphp

{{--begin:: Chat Left Panel--}}
{{-- <div id="kt_aside"
class="aside {{ theme()->printHtmlClasses('aside', false) }}"
data-kt-drawer="true"
data-kt-drawer-name="aside"
data-kt-drawer-activate="{default: true, lg: false}"
data-kt-drawer-overlay="true"
data-kt-drawer-width="{default:'200px', '300px': '250px'}"
data-kt-drawer-direction="start"
data-kt-drawer-toggle="#kt_aside_mobile_toggle" class="kt_aside"> --}}
    {{--begin::Brand--}}
    {{-- <div class="aside-logo flex-column-auto" id="kt_aside_logo"> --}}
        {{--begin::Logo--}}
        {{-- <a href="{{ theme()->getPageUrl('index') }}"> --}}
            {{-- <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/' . $logoFileName) }}" class="h-15px logo"/> --}}
            {{-- <img src="{{ asset('demo1/media/logos/lauronLogo.png') }}" class="h-70px logo"> --}}
            {{-- <hr style="color:white;"> --}}
        {{-- </a> --}}
        {{--end::Logo--}}
       
       {{-- @if (theme()->getOption('layout', 'aside/minimize') === true) --}}
            {{--begin::Aside toggler--}}
            {{-- <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                 data-kt-toggle="true"
                 data-kt-toggle-state="active"
                 data-kt-toggle-target="body"
                 data-kt-toggle-name="aside-minimize"
            >

                {!! theme()->getSvgIcon("icons/duotone/Navigation/Angle-double-left.svg", "svg-icon-1 rotate-180") !!}
            </div> --}}
            {{-- end::Aside toggler --}}
        {{-- @endif  --}}
    {{-- </div> --}}
    {{--end::Brand--}}

    {{--begin::Aside menu--}}
    {{-- <div class="aside-menu flex-column-fluid">
        {{ theme()->getView('layout/aside/_menu') }}
    </div> --}}
    {{-- <div class="mx-5"> --}}
    {{--    <!--begin::Header-->
        <!-- If Chat is vissible : Comment-->
        <h1 class="text-primary p-3 align-middle">Chat</h1>
        <!-- If Chat is vissible : Comment-->
        <!--end::Header-->
        <input type="hidden" id="sender_id" value="{{ auth()->user()->id }}">
        <input type="hidden" id="crm_chat_is_agent" value="{{ auth()->user()->user_level_id == 2 || auth()->user()->user_level_id == 3 ? 1 : 0 }}">
    
        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" style="display: none;">
            <li class="nav-item">
                <a id="opChatListBtn" class="nav-link active fw-bolder text-primary" data-bs-toggle="tab" href="#chat_list_tab">List</a>
            </li>
            <li class="nav-item">
                <a id="opChatMsgBtn" class="nav-link fw-bolder text-primary" data-bs-toggle="tab" href="#chat_message_tab">Chat</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="chat_list_tab" role="tabpanel">
              <!--begin::Body-->
              <div class="mb-12" id="chat_list_body">
    
    
                <div class="input-group input-group-solid mb-6">
                    <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="chatListSearch" class="form-control form-control-lg form-control-solid" placeholder="Search">
                    <button class="input-group-text" id="clearChatSearch">
                        <i class="fas fa-times fs-4"></i>
                    </button>
                </div>
                <ul class="list-group" id="chat_list_ul">
    
                </ul>
    
    
                <!-- If Chat is vissible : Comment-->
                <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
                    id="kt_aside_menu"
                    data-kt-menu="true">
    
                    <div id="kt_aside_menu_wrapper" class="menu-fit">
                      <div class="menu-item menu-accordion hover show" data-kt-menu-trigger="click">
                          <a href="#" class="menu-link py-3">
                              <span class="menu-title">Test</span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="menu-sub menu-sub-accordion pt-3 active show">
                            <div class="menu-item">
                                <a class="menu-link" href="#">
                                  <span class="menu-title">Test</span>
                                </a>
                            </div>
                          </div>
                      </div>
                    </div>
    
                </div>
                <!-- If Chat is vissible : Comment-->
    
              </div>
              <!--end::Body-->
            </div>
            <div class="tab-pane fade" id="chat_message_tab" role="tabpanel">
              <!--begin::Body-->
              <div class="mb-12" id="chat_message_body">
                <!--begin::Wrapper-->
                <div class=" chatInfo d-flex flex-stack mb-5">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                      <button id="returnToListBtn" type="button" class="btn p-2 fs-6 fw-normal me-3" title="Go back">
                          <span class="svg-icon svg-icon-2 me-0"><i class="bi bi-arrow-left fs-2"></i></span>
                      </button>
                      <div>
                        <p class="fw-bold fs-4 mt-5 mb-1" id="chat_recipient_name"></p>
                        <p class=" text-muted fw-bold fs-5 mb-1" id="chat_recipient_role"></p>
                      </div>
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Wrapper-->
                <!-- If Chat is vissible : Comment-->
                <div class="message-wrap h-500px overflow-auto" id="crm_chat_message_body">
                  <div class="message left" style=" padding-left: 10px !important;">
                    <div class="msg-detail">
                        <div class="msg-info">
                            <p>
                                <span class="pinkredColor"></span> &nbsp;&nbsp; Timestamp
                            </p>
                        </div>
                        <div class="msg-content">
                            <span class="triangle"></span>
                            <p class="line-breaker">Message</p>
                        </div>
                    </div>
                  </div>
                   <div class="message right chatright" style="text-align: right !important; padding-right: 10px !important;">
                    <div class="msg-detail">
                        <div class="msg-info">
                            <p>
                                <span class="pinkredColor"></span> &nbsp;&nbsp; Timestamp
                            </p>
                        </div>
                        <div class="msg-content">
                            <span class="triangle"></span>
                            <p class="line-breaker">Message </p>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- If Chat is vissible : Comment-->
    
                <div class="row mb-6">
                  <div class="col-lg-9 ps-0 pe-2">
                      <textarea type="text" id="crmChatMessageInp" name="message" class="form-control form-control-lg form-control-solid" style="resize: none; " placeholder="Enter message"></textarea>
                  </div>
                  <div class="col-lg-3 px-0 text-center">
                    <button  id="crmChatSendBtn" type="button" class="btn btn-primary p-3 align-middle" title="Send">
                        <span class="svg-icon svg-icon-2 me-0"><i class="fas fa-paper-plane fs-2"></i> Send</span>
                    </button>
                  </div>
                </div>
              </div>
              <!--end::Body-->
            </div>
        </div>
        --}}
    {{-- </div> --}}
    {{--end::Aside menu--}}

    {{--begin::Footer--}}
    <!-- If Chat is vissible : Comment-->
    {{-- <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <a href="{{ theme()->getPageUrl('documentation/getting-started/overview') }}" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-delay-show="8000" title="Check out the complete documentation with over 100 components">
        <span class="btn-label">
            {{ __('Documentation') }}
        </span>
            {!! theme()->getSvgIcon("icons/duotone/General/Clipboard.svg", "btn-icon svg-icon-2") !!}
        </a>
    </div> 
    {{--end::Footer--}}
    <!-- If Chat is vissible : Comment--> 
 

    
   

    {{-- <style>
    /** START OF CRM CHAT STYLES **/
    .chat{
      /* background: linear-gradient(0deg, rgba(9,9,121,1) 0%, rgba(28,82,166,1) 40%, rgba(41,98,176,1) 51%, rgba(60,121,190,1) 65%, rgba(75,139,202,1) 80%, rgba(121,194,236,1) 100%); */
      /* background: linear-gradient(0deg, rgba(9,9,121,0.9) 0%, rgba(19,49,146,0.9) 16%, rgba(28,82,166,0.9) 36%, rgba(41,98,176,0.9) 50%, rgba(60,121,190,0.9) 65%, rgba(75,139,202,0.9) 80%, rgba(121,194,236,0.9) 100%); */
      background: linear-gradient(0deg, rgba(28,82,166,0.9) 36%, rgba(41,98,176,0.9) 50%, rgba(60,121,190,0.9) 65%, rgba(75,139,202,0.9) 80%, rgba(121,194,236,0.9) 100%);
      /* background:rgba(60,121,190,0.9) ; */
      height: 100%;
      overflow: hidden;
    }
    .chatInfo{
      color: rgba(255, 255, 255, 1)
    }
    .msg-seen-info p {
      font-size: .8em;
      color: rgb(255, 255, 255);
      margin-top: 0px;
    }

    .msg-seen-info {
      text-align: right;
      padding-right: 7px !important;
    }

    .opChatPrTag:hover{
      background-color: #EFF2F5;
    }

    .opChatPrTag{
      border-bottom: 5px solid #e8e8e8;
      border-top: none;
      border-left: none;
      border-right: none;
    }

    .line-breaker{
      white-space: pre-wrap;
    }

    .chatright{
      text-align: right !important;
      padding-right: 10px !important;
    }
    .message-wrap {
      padding: 0 10px;
    }

    .message-wrap .message {
      position: relative;
      padding: 7px 0;
    }

    .message-wrap .message .user-img {
      position: absolute;
      border-radius: 45px;
      width: 45px;
      height: 45px;
      box-shadow: 0 0 2px rgba(0, 0, 0, 0.36);
    }

    .message-wrap .message .msg-detail {
      width: 100%;
      display: inline-block;
    }

    .message-wrap .message .msg-detail p {
      margin: 0;
    }

    .message-wrap .message .msg-detail .msg-info p {
      font-size: .8em;
      color: rgb(255, 255, 255);
      margin-top: 0px;
    }

    .message-wrap .message .msg-detail .msg-content {
      position: relative;
      margin-top: 5px;
      border-radius: 5px;
      padding: 8px;
      border: 1px solid #ddd;
      color: #fff;
      width: auto;
    }

    .message-wrap .message .msg-detail .msg-content span.triangle {
      background-color: #fff;
      border-radius: 2px;
      height: 8px;
      width: 8px;
      top: 12px;
      display: block;
      border-style: solid;
      border-color: #ddd;
      border-width: 1px;
      -webkit-transform: rotate(45deg);
      transform: rotate(45deg);
      position: absolute;
    }

    .message-wrap .message.left .msg-content {
      background-color: #fff;
      float: left;
    }

    .message-wrap .message.left .msg-detail {
      padding-left: 5px;
    }

    .message-wrap .message.left .user-img {
      left: 0;
    }

    .message-wrap .message.left .msg-content {
      color: #000;
    }

    .message-wrap .message.left .msg-content span.triangle {
      border-top-width: 0;
      border-right-width: 0;
      left: -5px;
    }

    .message-wrap .message.right .msg-detail {
      padding-right: 5px;
    }

    .message-wrap .message.right .msg-detail .msg-info {
      text-align: right;
    }

    .message-wrap .message.right .user-img {
      right: 0;
    }

    .message-wrap .message.right ion-spinner {
      position: absolute;
      right: 10px;
      top: 50px;
    }

    .message-wrap .message.right .msg-content {
      background-color: #ffffff;
      float: right;
      color: #000000;
    }

    .message-wrap .message.right .msg-content span.triangle {
      background-color: #ffffff;
      border-bottom-width: 0;
      border-left-width: 0;
      right: -5px;
    }
    
    /** END OF CRM CHAT STYLES **/

</style> --}}
</div>

