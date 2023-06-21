
  var vlExtensionStatus = false;
  var vlCallTrackAjax;
  var vlCallCheckAjax;

  var vlCallCommandSent = false;

  function initvlCallCommandGP() {
    setTimeout(function () {
      vlCallCommandSent = false;
    }, 30 * 1000);
  }

  function vlCheckInCallStatus() {
    var formDatax = new FormData();
    formDatax.append('action', 'trackCall');
    formDatax.append('data', JSON.stringify({
      stopOnUp: true,
      getOutput: true,
    }));
    vlCallCheckAjax = $.ajax({
      url: "/vl-control",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){

        if(data['answered'] == true){
          vlTrackCallStatus();
          vlCallCommandSent = false;
        }
        else {
          if (!vlCallCommandSent) {
            updateCallButton('Can Call');
          }
          var duration = 1000 * 15;
          setTimeout(function () {
            vlCheckInCallStatus();
          }, duration);
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown){
        setTimeout(function () {
          vlCheckInCallStatus();
        }, 1000);
      }
    });
  }

  function vlTrackCallStatus() {
    updateCallButton('In Call');
    var formDatax = new FormData();
    formDatax.append('action', 'trackCall');
    formDatax.append('data', JSON.stringify({
      getOutput: true,
    }));
    vlCallTrackAjax = $.ajax({
      url: "/vl-control",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){

        updateCallButton('Can Call');

        var duration = 1000 * 15;
        setTimeout(function () {
          vlCheckInCallStatus();
        }, duration);
      },
      error: function (XMLHttpRequest, textStatus, errorThrown){
        setTimeout(function () {
          vlTrackCallStatus();
        }, 1000);
      }
    });
  }

  function vlGetExtensionStatus() {
    var formDatax = new FormData();
    formDatax.append('action', 'getExtensionStatus');
    formDatax.append('data', JSON.stringify({

    }));
    $.ajax({
      url: "/vl-control",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){

        vlExtensionStatus = data;
      },
      error: function (XMLHttpRequest, textStatus, errorThrown){
        setTimeout(function () {
          vlGetExtensionStatus();
        }, 1000);
      }
    });
  }

  function vlStartCall(number) {
    var formDatax = new FormData();
    formDatax.append('action', 'startCall');
    formDatax.append('data', JSON.stringify({
      number: number
    }));
    updateCallButton('Start Call');
    vlCallCommandSent = true;
    $.ajax({
      url: "/vl-control",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){
        if (data['success'] == true) {
          initvlCallCommandGP();
        }
        else {
          vlCallCommandSent = false;
          updateCallButton('Can Call');
          Swal.fire({
             text: data['message'],
             icon: "error",
             buttonsStyling: false,
             confirmButtonText: "Ok, got it!",
             customClass: {
                 confirmButton: "btn btn-primary"
             }
         });
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown){
        if (XMLHttpRequest && XMLHttpRequest.responseJSON) {
          Swal.fire({
             text: XMLHttpRequest.responseJSON.message,
             icon: "error",
             buttonsStyling: false,
             confirmButtonText: "Ok, got it!",
             customClass: {
                 confirmButton: "btn btn-primary"
             }
         });
        }
        updateCallButton('Can Call');
      }
    });
  }

  function updateCallButton(status) {
    if (status == 'Start Call') {
      $('#startCallBtn').removeClass('btn-success').removeClass('btn-danger').addClass('btn-danger');
      // $('#startCallBtn').removeClass('w-200px').removeClass('w-300px').addClass('w-200px');
      $('#startCallBtn').prop('disabled', true);
      $('#callBtnDesc').text('Calling');
    }
    if (status == 'In Call') {
      $('#startCallBtn').removeClass('btn-success').removeClass('btn-danger').addClass('btn-danger');
      // $('#startCallBtn').removeClass('w-200px').removeClass('w-300px').addClass('w-300px');
      $('#startCallBtn').prop('disabled', true);
      $('#callBtnDesc').text('Ongoing Call');
    }
    if (status == 'Can Call') {
      $('#startCallBtn').removeClass('btn-success').removeClass('btn-danger').addClass('btn-success');
      // $('#startCallBtn').removeClass('w-200px').removeClass('w-300px').addClass('w-200px');
      $('#startCallBtn').prop('disabled', false);
      $('#callBtnDesc').text('Start Call');
    }
  }

  $(document).ready(function() {
    vlCheckInCallStatus();
    jQuery(document).off('click', '#startCallBtn');
    jQuery(document).on('click', '#startCallBtn', function(e) {
      vlStartCall($(this).data('callnumber'));
    });
  });
