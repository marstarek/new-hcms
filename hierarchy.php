<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HCMS</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link rel="stylesheet" href="src/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script  src="src/js/jquery-3.6.0.js"></script>
  <script  src="src/js/hierarchy.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script >
$(function () {
  let treeview = {
    resetBtnToggle: function () {
      $(".js-treeview")
        .find(".level-add")
        .find("span")
        .removeClass()
        .addClass("fa fa-plus");
      $(".js-treeview").find(".level-add").siblings().removeClass("in");
    },
    addSameLevel: function (target) {
      let ulElm = target.closest("ul");
      let sameLevelCodeASCII = target
        .closest("[data-level]")
        .attr("data-level")
        .charCodeAt(0);
      ulElm.append($("#levelMarkup").html());
      ulElm
        .children("li:last-child")
        .find("[data-level]")
        .attr("data-level", String.fromCharCode(sameLevelCodeASCII));
    },
    addSubLevel: function (target) {
      let liElm = target.closest("li");
      let nextLevelCodeASCII =
        liElm.find("[data-level]").attr("data-level").charCodeAt(0) + 1;
      liElm.children("ul").append($("#levelMarkup").html());
      liElm
        .children("ul")
        .find("[data-level]")
        .attr("data-level", String.fromCharCode(nextLevelCodeASCII));
    },
    removeLevel: function (target) {
      target.closest("li").remove();
    }
  };

  // Treeview Functions
  $(".js-treeview").on("click", ".level-add", function () {
    $(this)
      .find("span")
      .toggleClass("fa-plus")
      .toggleClass("fa-times text-danger");
    $(this).siblings().toggleClass("in");
  });

  // Add same level
  $(".js-treeview").on("click", ".level-same", function () {
    treeview.addSameLevel($(this));
    treeview.resetBtnToggle();
  });

  // Add sub level
  $(".js-treeview").on("click", ".level-sub", function () {
    treeview.addSubLevel($(this));
    treeview.resetBtnToggle();
  });
  // Remove Level
  $(".js-treeview").on("click", ".level-remove", function () {
    treeview.removeLevel($(this));
  });

  // Selected Level
  $(".js-treeview").on("click", ".level-title", function () {
    let isSelected = $(this).closest("[data-level]").hasClass("selected");
    !isSelected &&
      $(this)
        .closest(".js-treeview")
        .find("[data-level]")
        .removeClass("selected");
    $(this).closest("[data-level]").toggleClass("selected");
  });
});




  </script>

</head>

<body>

  



   


<?php include_once 'includes/header.php'; ?>
<div class="treeview js-treeview">
  <ul>
    <li>
      <div class="treeview__level" data-level="A">
        <span class="level-title">eng/bassma</span>
        <div class="treeview__level-btns">
          <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
          <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
          <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
          <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
        </div>
      </div>
      <ul>

        <li>
          <div class="treeview__level" data-level="B">
            <span class="level-title">Level A</span>
            <div class="treeview__level-btns">
              <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
              <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
              <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
              <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
            </div>
          </div>
          <ul>

            <li>
              <div class="treeview__level" data-level="C">
                <span class="level-title">Level A</span>
                <div class="treeview__level-btns">
                  <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                  <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
                  <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                  <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                </div>
              </div>
              <ul>

                <li>
                  <div class="treeview__level" data-level="D">
                    <span class="level-title">Level A</span>
                    <div class="treeview__level-btns">
                      <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                      <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
                      <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                      <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                    </div>
                  </div>
                  <ul>
                  </ul>
                </li>
              </ul>
            </li>

            <li>
              <div class="treeview__level" data-level="C">
                <span class="level-title">Level A</span>
                <div class="treeview__level-btns">
                  <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                  <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
                  <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                  <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                </div>
              </div>
              <ul>
              </ul>
            </li>

            <li>
              <div class="treeview__level" data-level="C">
                <span class="level-title">Level A</span>
                <div class="treeview__level-btns">
                  <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                  <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
                  <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
                  <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
                </div>
              </div>
              <ul>
              </ul>
            </li>
          </ul>
        </li>

        <li>
          <div class="treeview__level" data-level="B">
            <span class="level-title">Level A</span>
            <div class="treeview__level-btns">
              <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
              <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
              <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
              <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
            </div>
          </div>
          <ul>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</div>
</div>

<template id="levelMarkup">
  <li>
    <div class="treeview__level" data-level="A">
      <span class="level-title">Level A</span>
      <div class="treeview__level-btns">
        <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
        <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
        <div class="btn btn-default btn-sm level-same"><span>Add Same Level</span></div>
        <div class="btn btn-default btn-sm level-sub"><span>Add Sub Level</span></div>
      </div>
    </div>
    <ul>
    </ul>
  </li>
</template>




</body>
<script  src="src/js/req.js"></script>
<script  src="src/js/html2canvas.js"></script>
<script src="src/js/bootstrap.min.js"></script>
<script src="src/js/bootstrap.bundle.min.js"></script>

</html>