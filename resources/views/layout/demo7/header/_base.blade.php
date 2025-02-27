<!--begin::Header-->
<div
  id="kt_header"
  class="header  {{ theme()->printHtmlClasses('header', false) }}"  {{ theme()->printHtmlAttributes('header') }}

  @if (theme()->getOption('layout', 'header/fixed/desktop') === true &&  theme()->getOption('layout', 'header/fixed/tablet-and-mobile') === true)
    data-kt-sticky="true"
    data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}"
  @endif

  @if (theme()->getOption('layout', 'header/fixed/desktop') === true && theme()->getOption('layout', 'header/fixed/tablet-and-mobile') === false)
    data-kt-sticky="true"
    data-kt-sticky-name="header"
    data-kt-sticky-offset="{lg: '300px'}"
  @endif

  @if (theme()->getOption('layout', 'header/fixed/tablet-and-mobile') === true && theme()->getOption('layout', 'header/fixed/desktop') === false)
    data-kt-sticky="true"
    data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: false}"
  @endif
  >

  <!--begin::Container-->
  <div class="{{ theme()->printHtmlClasses('header-container', false) }} d-flex align-items-center justify-content-between" id="kt_header_container">
     {{ theme()->getView('layout/header/_page-title') }}

    <!--begin::Wrapper-->
    <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
      <!--begin::Aside mobile toggle-->
      <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
        {!! theme()->getSvgIcon("icons/duotone/Text/Menu.svg", "svg-icon-2x") !!}
      </div>
      <!--end::Aside mobile toggle-->

      <!--begin::Logo-->
      <a href=" {{ theme()->getPageUrl('index') }}" class="d-flex align-items-center">
        <img alt="Logo" src=" {{ asset(theme()->getMediaUrlPath() . 'logos/logo-demo-3.png') }}" class="h-30px"/>
        
      </a>
      <!--end::Logo-->
    </div>
    <!--end::Wrapper-->

     {{ theme()->getView('layout/topbar/_base') }}
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->
