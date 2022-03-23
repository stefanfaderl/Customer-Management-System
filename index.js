for (let i = 0; i < document.links.length; i++) {
  let current = 0;
  if (
    document.links[i].href === document.URL &&
    document.links[i].id != "padding"
  ) {
    current = i;
    document.links[current].id = "current";
  }
  if (
    document.links[i].href === document.URL &&
    document.links[i].id == "padding"
  ) {
    current = i;
    document.links[current].id = "paddingActive";
  }
}

function sendToHomescreen() {
  location.href = "index.php"; // extend
}

function toggleCheckbox(e) {
  let checkboxes = document.getElementsByClassName("inputCheckbox");
  console.log(e);
  if (e.checked == true) {
    for (let i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = true;
    }
  } else {
    for (let i = 0; i < checkboxes.length; i++) {
      checkboxes[i].checked = false;
    }
  }
}

function deleteContact() {
  let selectedEntry = $('[name="checkbox"]:checked').data("id");
  console.log(selectedEntry); //'input:checkbox'
  // if ($('[name="checkbox"]:checked').length > 0) {
  $("#deleteForm").html(
    '<input type="hidden" name="customerID" value="' + selectedEntry + '">'
  );
  // let result = confirm("Are you sure to delete selected customers?");
  // if (result) {
  //     console.log(this);
  //     return true;

  // } else {
  //     return false;
  // }
  // } else {

  //     alert('Select at least 1 record to delete!');
  //     return false;
  // }
}

function deleteContact() {
  $("input.inputCheckbox:checked").each(function () {
    let selectedEntry = $(this).data("id");
    $("#deleteForm").append(
      '<input type="hidden" name="customerID' +
        selectedEntry +
        '" value="' +
        selectedEntry +
        '">'
    );
  });
}

function editContact() {
  let selectedEntry = $("input.inputCheckbox:checked").data("id");
  $("#editForm").html(
    '<input type="hidden" name="customerID" value="' + selectedEntry + '">'
  );
}

function hideForm() {
  $(".inputDashboard").hide();
}

/*
deleteContact:
    //'input:checkbox'
    // if ($('[name="checkbox"]:checked').length > 0) {
    // $('#deleteForm').html('<input type="hidden" name="customerID" value="' + selectedEntry + '">');
    // let result = confirm("Are you sure to delete selected customers?");
    // if (result) {
    //     console.log(this);
    //     return true;

    // } else {
    //     return false;
    // }
    // } else {

    //     alert('Select at least 1 record to delete!');
    //     return false;
    // }

    // console.log(selectedEntry);  //'input:checkbox'

editContact:
    // if ($('[name="checkbox"]:checked').length > 0) {
    // let result = confirm("Are you sure to delete selected customers?");
    // if (result) {
    //     console.log(this);
    //     return true;

    // } else {
    //     return false;
    // }
    // } else {

    //     alert('Select at least 1 record to delete!');
    //     return false;
    // }
    // console.log(selectedEntry);  //'input:checkbox'
*/
