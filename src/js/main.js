$(document).ready(function () {
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
      // const EmployeeID = $(that)
      //   .parent()
      //   .parent()
      //   .children()
      //   .find(".EmployeeID")
      //   .val();
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
      // alert($(that).data("id"));
      // $(that).parent().parent().remove();
    };
  });
});
