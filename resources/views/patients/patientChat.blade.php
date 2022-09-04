<x-scaffold>
    <div class="app-toolbar align-items-center justify-content-between">
        <!--begin::Toolbar wrapper-->
            <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                                <!--begin::Page title-->
                                <div class="d-flex flex-column align-items-start me-3 gap-2">
                                    <!--begin::Title-->
                                    <h1 class="d-flex text-dark fw-bolder m-0 fs-3">chat</h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar wrapper-->
                            </div>
    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
        <!--begin::Messenger-->
        <div class="card" id="kt_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header" id="kt_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $doctor_name }}</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-bold text-muted">Active</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <div class="me-n3">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="bi bi-three-dots fs-2"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add Contact</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a contact email to send an invitation" aria-label="Specify a contact email to send an invitation"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Create Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Invite Members</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

        <!--begin::Card body-->
            <div class="card-body" id="kt_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 163px;">
                    @foreach ($messages as $message)
                        @if ($message->user_id == auth()->user()->id)
                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">{{ $message->created_at }}</span>
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">{{auth()->user()->full_name }}</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="{{ 'http://localhost:8000/profile_img/'.auth()->user()->profile_img }}">
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                    {{ $message->content }}
                                    @if ($message->attachment )
                                        <a class="btn btn-sm btn-icon btn-active-light-primary me-1" href="{{ route('download', $message->attachment) }}" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $message->attachment }}">
                                            <i class="bi bi-paperclip fs-3"></i>
                                        </a>
                                    @endif
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->
                        @else
                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src=" {{'http://localhost:8000/profile_img/'.$message->user->profile_img }}">
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">{{ $message->user->full_name }}</a>
                                        <span class="text-muted fs-7 mb-1">{{ $message->created_at }}</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">
                                    {{ $message->content }}
                                    @if ($message->attachment )
                                        <a class="btn btn-sm btn-icon btn-active-light-info me-1" href="{{ route('download', $message->attachment) }}" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="{{ $message->attachment }}">
                                            <i class="bi bi-paperclip fs-3"></i>
                                        </a>
                                    @endif
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->
                        @endif
                    @endforeach
                </div>
                <!--end::Messages-->
            </div>
            <!--end::Card body-->


            @if (!$consultation->close)
                <!--begin::Card footer-->
            <div class="card-footer pt-4" id="kt_chat_messenger_footer">

                <form action="{{ route('SendMessage', $consultation->id ) }}" method="POST"  enctype="multipart/form-data"  novalidate="novalidate" id="kt_MessageController_form" >
                   @csrf
               <!--begin::Input-->
                  <textarea class="form-control form-control-flush mb-3" rows="1"  name="textarea"  placeholder="Type a message"></textarea>

                  @if ($errors->has("textarea"))
                  <span class="text-danger">{{ $errors->first("textarea")}}</span>
                  @endif

                   <!--end::Input-->
                   <!--begin:Toolbar-->
                <div class="d-flex flex-stack">
                   <!--begin::Actions-->
                  <div class="d-flex align-items-center me-2">
                <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button" onclick="document.getElementById('messageButton').click()"  data-bs-toggle="tooltip" title="" data-bs-original-title="Coming soon">
                <i class="bi bi-paperclip fs-3"></i>
              </button>
                <input type="file"  name="file"   class="d-none"  id="messageButton" >
                   </div>
                <!--end::Actions-->
                  <!--begin::Send-->
                  <button class="btn btn-primary" type="submit" data-kt-element="send">Send</button>
                  <!--end::Send-->
                </form>
                 </div>
                 <!--end::Toolbar-->
             </div>
             <!--end::Card footer-->
             @endif
                </div>
            <!--end::Messenger-->
            @if ($consultation->close)
            {{-- rating --}}
                <div class="row">
                    <div class="col">
                <h3 class="mt-3">Rate the doctor</h3>
                @foreach ([1,2,3,4,5] as $rate_num)
                        <a class="d-inline" href="{{ route('rate', ['const_id' => $consultation->id,
                                                                    'dr_id' => $consultation->doctor_id,
                                                                    'pt_id' => auth()->user()->id,
                                                                    'rate_num' => $rate_num]) }}"><i class="fa fa-star hover-icon"></i></a>
                @endforeach
                @if (session()->has('error_message'))
                        <p class="text-danger">{{ session()->get('error_message') }}</p>
                        @endif
                        @if (session()->has('success_message'))
                        <p class="text-success">{{ session()->get('success_message') }}</p>
                        @endif
            </div>
        </div>
            {{-- end rating --}}
             @endif
            </div>

</x-scaffold>
