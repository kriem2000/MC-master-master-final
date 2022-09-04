<x-scaffold>
    <div class="app-toolbar align-items-center justify-content-between">
                    <!--begin::Toolbar wrapper-->
                    <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                        <!--begin::Page title-->
                        <div class="d-flex flex-column align-items-start me-3 gap-2">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bolder m-0 fs-3">all the {{ $speciality_name }} doctors</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Toolbar wrapper-->
    </div>
    <div class="text-end">
        <form action="{{ route('SelectDoctor', ['speciality_id' => $speciality_id] ) }}" method="POST"  enctype="multipart/form-data"  novalidate="novalidate" id="kt_MessageController_form" class="float-end d-flex flex-row my-5 w-25">
            @csrf
               <input type="text" class="form-control form-control-flush mb-3 bg-white" rows="1"  name="doctor_name"  placeholder=" Search for a Doctor Name "></textarea>
               <button class="btn btn-sm mx-3 btn-primary" type="submit" data-kt-element="send">search</button>
        </form>
    </div>
    <div class="tab-content">
        <!--begin::Tab pane-->
        <div id="kt_project_users_card_pane" class="tab-pane fade active show">
            <!--begin::Row-->
            @if ($doctors->count() > 0)

            <div class="row g-6 g-xl-9">
                @foreach ($doctors as $key => $doctor)
                @if($doctor->is_approved==true)
                <!--begin::Col-->
                <div class="col-md-6 col-xxl-4">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-65px symbol-circle mb-5">
                                <img src="{{ 'http://localhost:8000/profile_img/'.$doctor->profile_img }}" alt="image">
                                <div class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3"></div>
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{ $doctor->full_name }}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="fw-bold text-gray-400 mb-6">{{ $doctor->profile_description }}</div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <div class="d-flex flex-center flex-wrap">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                    <div class="fs-6 fw-bolder text-gray-700">{{ $doctor->consultations->count() }}</div>
                                    <div class="fw-bold text-gray-400">Consultations</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                    <div class="fs-6 fw-bolder text-gray-700">{{ $doctor->rates->count() !=0 ?  ($doctor->rates->map->sum('rate_namber')->first()/$doctor->rates->count() ): 0}}/5</div>
                                    <div class="fw-bold text-gray-400">Rating</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Action-->
                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                <a href="{{ route('patientChat', [$speciality_id,$doctor->id]) }}" class="btn btn-sm btn-flex btn-light-primary fw-bolder">chat now</a>
                            </div>
                            <!--end::Action-->
                        </div>
                        @if (session()->has('error_message'))
                        <p class="text-danger">{{ session()->get('error_message') }}</p>
                        @endif
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
                @endif
                @endforeach
            </div>
            @else
                <p>no results found.</p>
            @endif
            <!--end::Row-->
        </div>
        <!--end::Tab pane-->
    </div>
</x-scaffold>
