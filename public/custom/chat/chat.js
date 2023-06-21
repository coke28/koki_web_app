
var CRMChatSenderTable = 'user';
var CRMChatSenderID = null;
var CRMChatRecipientID = null;
var CRMChatRecipientTable = null;
var CRMChatChatList = [];
var CRMChatChatMessages = [];
var CRMChatIsAgent = null;

function getChatList() {
  var formDatax = new FormData();
  formDatax.append('sender_id', CRMChatSenderID);
  formDatax.append('sender_table', CRMChatSenderTable);
  formDatax.append('isagent', CRMChatIsAgent);
  $.ajax({
    url: "/chat/get-chatlist",
    type: "POST",
    data: formDatax,
    contentType: false,
    cache: false,
    processData:false,
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    success: function (data){
      CRMChatSenderID = data.sender_id;
      CRMChatChatList = data.chatlist;
      $('#chatListSearch').trigger('change');
      if (data.all_unseen_count > 0) {
        $('#crm_allunseenchat_badge').html(data.all_unseen_count);
        $('#crm_allunseenchat_badge').show();
      }
      else {
        $('#crm_allunseenchat_badge').hide();
      }

    }
  });
}

function getChatMessages() {
  if (CRMChatRecipientID != null && CRMChatRecipientTable != null && CRMChatSenderID != null && CRMChatSenderTable != null) {
    var formDatax = new FormData();
    formDatax.append('recipient_id', CRMChatRecipientID);
    formDatax.append('recipient_table', CRMChatRecipientTable);
    formDatax.append('sender_id', CRMChatSenderID);
    formDatax.append('sender_table', CRMChatSenderTable);
    formDatax.append('page', 1);
    $.ajax({
      url: "/chat/get-chatmessage",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){
        getChatList();
        drawChatMessages(data.messages);
        var objDiv = document.getElementById("crm_chat_message_body");
        objDiv.scrollTop = objDiv.scrollHeight;
      }
    });
  }
}

function sendChatMessage(message) {
  if (message.length > 0) {
    var formDatax = new FormData();
    formDatax.append('recipient_id', CRMChatRecipientID);
    formDatax.append('recipient_table', CRMChatRecipientTable);
    formDatax.append('sender_id', CRMChatSenderID);
    formDatax.append('sender_table', CRMChatSenderTable);
    formDatax.append('page', 1);
    formDatax.append('message', message);
    $.ajax({
      url: "/chat/send-chatmessage",
      type: "POST",
      data: formDatax,
      contentType: false,
      cache: false,
      processData:false,
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function (data){
        $('#crmChatMessageInp').val('');
        drawChatMessages(data.messages);
        var objDiv = document.getElementById("crm_chat_message_body");
        objDiv.scrollTop = objDiv.scrollHeight;
      }
    });
  }
}

function drawChatList(list) {
  var listbody = ``;
  var chatname = '';
  for (var i = 0; i < list.length; i++) {
    listbody += `<li class="list-group-item mb-2 opChatPrTag">`;
    listbody += `<a href="#" class="opchatBtn" data-recipientid="`+list[i].id+`" data-recipienttable="`+list[i].recipienttable+`" data-chatname="`+list[i].chatname+`" data-chatrole="`+list[i].level+`">`;
    listbody += `<p class="mb-1 fw-bold fs-5 text-primary">`+list[i].chatname+``;
    if (list[i].badgeCount > 0) {
      listbody += `  <span class="badge badge-light-danger badge-circle fw-bolder">`+list[i].badgeCount+`</span>`;
    }
    listbody += `</p>`;
    if(list[i].level == 0){
      listbody += `<p class="mb-1 fw-bold fs-6 text-muted">`+"Agent"+`</p>`;
    }
    if(list[i].level == 1){
      listbody += `<p class="mb-1 fw-bold fs-6 text-muted">`+"Supervisor"+`</p>`;
    }
    if(list[i].level == 2){
      listbody += `<p class="mb-1 fw-bold fs-6 text-muted">`+"Administrator"+`</p>`;
    }
    // listbody += `<p class="mb-1 fw-bold fs-6 text-muted">`+list[i].level+`</p>`;
    listbody += `</a>`;
    listbody += `</li>`;
  }
  $('#chat_list_ul').html(listbody);
}

function drawChatMessages(list) {
  var bMessagesHTML = ``;
  console.log(list);
  for (var i = 0; i < list.length; i++) {
    if (list[i].recipient_id != CRMChatRecipientID) {
      bMessagesHTML += `<div class="message left" style=" padding-left: 10px !important;">`;
    }
    else {
      bMessagesHTML += `<div class="message right chatright" style="text-align: right !important; padding-right: 10px !important;">`;
    }

    bMessagesHTML += `<div class="msg-detail">`;
    bMessagesHTML += `<div class="msg-info"><p><span class="pinkredColor"></span> &nbsp;&nbsp; `+list[i].created_date+`</p></div>`;
    bMessagesHTML += `<div class="msg-content"><span class="triangle"></span><p class="line-breaker">`+list[i].message+`</p></div>`;
    bMessagesHTML += `</div>`;
    if (list[i].recipient_id == CRMChatRecipientID && list[i].seen_date.length > 0) {
      bMessagesHTML += `<div class="msg-seen-info"><p><span class="pinkredColor"></span> &nbsp;&nbsp; Seen `+list[i].seen_date+`</p></div>`;
    }
    bMessagesHTML += `</div>`;
  }
  $('#crm_chat_message_body').html(bMessagesHTML);
}

function startChatListSearch(searchKey) {
  if (searchKey.length > 0) {
    var filteredChatList = CRMChatChatList.filter(item => {
      return item.chatname.toLowerCase().includes(searchKey.toLowerCase());
    });
    drawChatList(filteredChatList);
  }
  else {
    drawChatList(CRMChatChatList);
  }
}

$(document).ready(function() {
  console.log("inchat");
  CRMChatSenderID = $('#sender_id').val();
  $('#sender_id').remove();
  CRMChatIsAgent = $('#crm_chat_is_agent').val();
  $('#crm_chat_is_agent').remove();
  getChatList();

  setInterval(function () {
    getChatList();
    getChatMessages();
  }, 1000 * 10);

  jQuery(document).off('click', '.opchatBtn');
  jQuery(document).on('click', '.opchatBtn', function(e) {
    e.preventDefault();
    CRMChatRecipientID = $(this).data('recipientid');
    CRMChatRecipientTable = $(this).data('recipienttable');
    $('#chat_recipient_name').html($(this).data('chatname'));
    $('#chat_recipient_role').html($(this).data('chatrole'));
    getChatMessages();
    new bootstrap.Tab($('#opChatMsgBtn')).show();
  });

  jQuery(document).off('click', '#returnToListBtn');
  jQuery(document).on('click', '#returnToListBtn', function(e) {
    e.preventDefault();
    CRMChatRecipientID = null;
    CRMChatRecipientTable = null;
    new bootstrap.Tab($('#opChatListBtn')).show();
  });

  jQuery(document).off('click', '#crmChatSendBtn');
  jQuery(document).on('click', '#crmChatSendBtn', function(e) {
    e.preventDefault();
    var cMessage = $('#crmChatMessageInp').val();
    cMessage = cMessage.trim();
    $('#crmChatMessageInp').val(cMessage);
    sendChatMessage(cMessage);
  });

  jQuery(document).off('click', '#clearChatSearch');
  jQuery(document).on('click', '#clearChatSearch', function(e) {
    e.preventDefault();
    $('#chatListSearch').val('').trigger('change');
  });

  jQuery(document).off('keyup', '#chatListSearch');
  jQuery(document).on('keyup', '#chatListSearch', function(e) {
    e.preventDefault();
    var searchKey = $(this).val();
    startChatListSearch(searchKey);
  });

  jQuery(document).off('change', '#chatListSearch');
  jQuery(document).on('change', '#chatListSearch', function(e) {
    e.preventDefault();
    var searchKey = $(this).val();
    startChatListSearch(searchKey);
  });

});
