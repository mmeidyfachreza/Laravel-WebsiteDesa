(function ($) {
  $(document).ready(function() {

      $('#notifications').on('click', function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
      });
      $.ajax({
          url: '/getmsg',
          type: 'POST',
          data: { 
            _token: '{{ csrf_token() }}',
            'value': $('#notifications').val(), },
          // success:function(){alert('success!');}
          success:function(data){
                  $("#msg").html(data.msg);
               },
          error: function (){alert('error');}, 
      });

      });

  });

  
  }(jQuery));