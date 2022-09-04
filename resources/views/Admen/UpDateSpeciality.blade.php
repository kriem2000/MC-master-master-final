<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/index.css">
    <title>MC</title>
</head>
<body id="kt_body" class="bg-body app-blank">
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_page">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/metronic8/demo22/assets/media/illustrations/sketchy-1/14.png">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="#" class="mb-5">
                    <img alt="Logo" src="/img/Light Green Kit Medical Logo.png" class="h-100px">
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form action="{{ route('UpDateSpeciality_btn',$speciality->id ) }}" method="POST" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_up_form" enctype='multipart/form-data'>
                        @csrf
                        <!--begin::Heading-->
                        <a href="{{ route('SpecialityList') }}" class="btn btn-sm mx-3  btn-secondary" type="submit" data-kt-element="send">back</a>
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3"> UPDate Speciality</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="form-label fw-bolder text-dark fs-6">
                                <label class="form-label fw-bolder text-dark fs-6">Name Speciality</label>
                                <input class="form-control form-control-lg form-control-solid" type="text"   value="{{$speciality->name}}"  placeholder="" name="name" autocomplete="off">
            
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="form-label fw-bolder text-dark fs-6">Speciality_img</label>
                            <input class="form-control form-control-lg form-control-solid" type="file"  value="{{$speciality->Speciality_img}}" placeholder="" name="Speciality_img" autocomplete="off">
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="form-label fw-bolder text-dark fs-6">Descreption</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" value="{{$speciality->description}}" placeholder="" name="description" autocomplete="off">
                            
                                    <!--end::Col-->
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"  data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->
                                
                                @if (session()->has('success_message'))
                                <p class="text-success">{{ session()->get('success_message') }}</p>
                                @endif
                        </div>
                        <!--end::Input group-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">UpDate</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    <div></div></form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->

<!--end::Body-->
</html>
