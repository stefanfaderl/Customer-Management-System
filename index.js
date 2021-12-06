let current = 0;
for (let i = 0; i < document.links.length; i++) {
    if (document.links[i].href === document.URL && document.links[i].id != 'padding') {
        current = i;
        document.links[current].id = 'current';
    }
    if (document.links[i].href === document.URL && document.links[i].id == 'padding') {
        current = i;
        document.links[current].id = 'paddingActive';
    }
}

function sendToHomescreen() {
    location.href = "index.php";
}

let checkboxes = document.getElementsByClassName('inputCheckbox');
function toggleCheckbox(e) {
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
