@section('javascript')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
toastr.info("{{ Session::get('info') }}")
    @endif

    @if(Session::has('error'))
toastr.error("{{ Session::get('error') }}")
    @endif

</script>
@endsection
