<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/shared/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/shared/misc.js')}}"></script>
<script src="{{asset('assets/js/shared/settings.js')}}"></script>
<script src="{{asset('assets/js/shared/todolist.js')}}"></script>
<script>
$(document).ready(function() {
		
  var current = location.href;
  console.log(current);
     $('#sidebar .nav-item .nav-link , #sidebar .nav-item ').removeClass('active');
     $('#sidebar .nav .collapse').removeClass('show');
    $('#sidebar  .nav-item .nav-link').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href') == current){
            $this.addClass('active');
            if( $this.closest('.collapse').length == 0) {
            	$this.closest('.nav-item').addClass('active');
            }
            $this.closest('.collapse').addClass('show');
        }
    })

	});
</script>
@stack('js')
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->