<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ trans('common.head.trang_quan_tri') }}</title>

    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/crown/css/main.css') }} "/>
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/css.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/error.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/jquery-confirm.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/style.css') }}" />
   <!--  <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/crown/css/datatable.css') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/crown/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/admin/css/select2.css') }}" />
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/jquery-confirm.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/spinner/jquery.mousewheel.js') }}"></script>

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/forms/uniform.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/forms/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/forms/autogrowtextarea.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/forms/jquery.maskedinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/forms/jquery.inputlimiter.min.js') }}"></script>

   <!--  <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/tables/datatable.js') }}"></script> -->

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/tables/tablesort.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/tables/resizable.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.tipsy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.collapsible.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.progress.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.timeentry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.colorpicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.jgrowl.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.breadcrumbs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/plugins/ui/jquery.sourcerer.js') }}"></script>

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/admin/crown/js/custom.js') }}"></script>


   <!--  <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/ckeditor/ckeditor.js') }}"></script> -->
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/scrollTo/jquery.scrollTo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/number/jquery.number.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/formatCurrency/jquery.formatCurrency-1.4.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/zclip/jquery.zclip.js') }}"></script>

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/jquery/colorbox/jquery.colorbox.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('source/bower_components/library/backend/js/jquery/colorbox/colorbox.css') }}" media="screen" />

    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/custom_admin.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('source/bower_components/library/backend/js/xuly.js') }}" type="text/javascript"></script>
    @yield('script')
</head>
