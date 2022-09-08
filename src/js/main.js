$(document).ready(function () {
  // $('#timerwork').preventDefault()
  $(function () {
    deleteRow = function (that) {
      const userID = $(that)
        .parent()
        .parent()
        .children()
        .find(".empCode")
        .val();
      if ($(that).hasClass("editeing")) {
        return false;
      }
      $.ajax({
        type: "POST",
        url: "src/ajax/deleteUser.php",
        data: {
          deleteUser: true,
          userID: userID,
        },
        success: function (response) {
          console.log(response);
        },
      });
      $(that).parent().parent().remove();
    };
  });

  $(function () {
    editRow = function (that) {
      const empCode = $(that)
        .parent()
        .parent()
        .children()
        .find(".empCode")
        .val();
      const isActive = $(that)
        .parent()
        .parent()
        .children()
        .find(".isActive")
        .val();
      const isAdmin = $(that)
        .parent()
        .parent()
        .children()
        .find(".isAdmin")
        .val();
      const mac = $(that).parent().parent().children().find(".mac").val();
      const password = $(that)
        .parent()
        .parent()
        .children()
        .find(".password")
        .val();
      const email = $(that).parent().parent().children().find(".Email").val();
      const DisplayName = $(that)
        .parent()
        .parent()
        .children()
        .find(".DisplayName")
        .val();
      const Username = $(that)
        .parent()
        .parent()
        .children()
        .find(".Username")
        .val();
      $.ajax({
        type: "POST",
        url: "src/ajax/deleteUser.php",
        data: {
          editRow: true,
          // 'isAdmin' : isAdmin,
          // 'isActive' : isActive,
          mac: mac,
          password: password,
          email: email,
          DisplayName: DisplayName,
          Username: Username,
          empCode: empCode,
          userID: $(that).data("id"),
        },
        success: function (response) {
          console.log(response);
        },
      });
   
    };
  });

 
  $('.checkout').on('click', function (event) {
    (event).preventDefault()
    let  userID=$(".user_code").text()

    $.ajax({
      type: 'POST',
      url: 'src/ajax/timer.php',
      data: {
        check: true,
        userID: userID

      },
      success: function (data) {
        // data =data[];
        //  console.log("jkkhkjhkjhkjh");
          console.log(data);



      },
      error: function (data) {
          console.log(data);

      }
    })
  })



  $('.take_Break').on('click', function (event) {
    console.log(event);
    (event).preventDefault()
    let  userID=$(".transId").text()
console.log(event);
    $.ajax({
      type: 'POST',
      url: 'src/ajax/timer.php',
      data: {
        break: true,
        userID: userID

      },
      success: function (data) {
          console.log(data);
      },
      error: function (data) {
          console.log(data);

      }
    })
    $(this).css("display","none")
    $(".stop_Break").css("display","block")
  })
  $('.stop_Break').on('click', function (event) {
    console.log(event);
    (event).preventDefault()
    let  userID=$(".user_code").text()
console.log(event);
    $.ajax({
      type: 'POST',
      url: 'src/ajax/timer.php',
      data: {
        stop: true,
        userID: userID

      },
      success: function (data) {
          console.log(data);
      },
      error: function (data) {
          console.log(data);

      }
    })
    $(this).css("display","none")
    $(".take_Break").css("display","block")
  })
  



});
