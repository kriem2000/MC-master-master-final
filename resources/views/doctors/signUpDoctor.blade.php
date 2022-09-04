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
                    <form action="{{ route('createDoctor') }}" method="POST" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" enctype='multipart/form-data'>
                        @csrf
                        <!--begin::Heading-->
                        <a href="{{ route('welcome') }}" class="btn btn-sm mx-3 btn-primary" type="submit" data-kt-element="send">back</a>
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Create an Account as a Doctor</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Already have an account?
                            <a href="{{ route('signIn') }}" class="link-primary fw-bolder">Sign in here</a></div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="required form-label fw-bolder text-dark fs-6">First Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="first-name" autocomplete="off">
                                @if ($errors->has("first-name"))
                                    <span class="text-danger">{{ $errors->first("first-name") }}</span>
                                @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="required form-label fw-bolder text-dark fs-6">Last Name</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last-name" autocomplete="off">
                                @if ($errors->has("last-name"))
                                    <span class="text-danger">{{ $errors->first("last-name") }}</span>
                                @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Col-->
                        </div>
                        <div class="col-xl-12 mb-5">
                            <label class="required fs-6 fw-bolder mb-2">select a speciality</label>
                            <select class="select2-selection select2-selection--single form-select form-select-solid " aria-label="Select example" name="speciality">
                                <option disabled selected>Open this select menu</option>
                                @foreach ($specialities as $speciality)
                                    <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has("speciality"))
                                <span class="text-danger">{{ $errors->first("speciality") }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">Image </label>
                            <input class="form-control form-control-lg form-control-solid" type="file" placeholder="" name="profile_img" autocomplete="off">
                            @if ($errors->has("profile_img"))
                                    <span class="text-danger">{{ $errors->first("profile_img") }}</span>
                            @endif
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->

                         <!--begin::Col-->
                         <div class="fv-row mb-5 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">profile_description</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="profile_description" autocomplete="off">
                            @if ($errors->has("profile_description"))
                                    <span class="text-danger">{{ $errors->first("profile_description") }}</span>
                            @endif
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off">
                            @if ($errors->has("email"))
                                    <span class="text-danger">{{ $errors->first("email") }}</span>
                            @endif
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">Your CV</label>
                            <input class="form-control form-control-lg form-control-solid" type="file" placeholder="" name="CV" autocomplete="off">
                            @if ($errors->has("CV"))
                                    <span class="text-danger">{{ $errors->first("CV") }}</span>
                            @endif
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">Phone number</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="phone-number" autocomplete="off">
                            @if ($errors->has("phone-number"))
                                    <span class="text-danger">{{ $errors->first("phone-number") }}</span>
                            @endif
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="required form-label fw-bolder text-dark fs-6">Password</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off">
                                    @if ($errors->has("password"))
                                    <span class="text-danger">{{ $errors->first("password") }}</span>
                                    @endif
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Hint-->
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                            <!--end::Hint-->
                        <div class="fv-plugins-message-container invalid-feedback"></div></div>
                        <!--end::Input group=-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5 fv-plugins-icon-container">
                            <label class="required form-label fw-bolder text-dark fs-6">Confirm Password</label>
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="off">
                            @if ($errors->has("password_confirmation"))
                                    <span class="text-danger">{{ $errors->first("password_confirmation") }}</span>
                            @endif
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    <div></div></form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="#" class="text-muted text-hover-primary px-2">About</a>
                    <a href="#" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->

<!--end::Body-->
</html>
