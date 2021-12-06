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

let test = document.getElementsByClassName('selectAllCheckboxes');
function selectAll() {
    if (test.checked = true) {
        let checkboxes = document.getElementsByClassName('inputCheckbox');
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = true;
        }
    }

    if (test.checked = false) {
        deselectAll();
    }
}

function deselectAll() {
    let checkboxes = document.getElementsByClassName('inputCheckbox');
    console.log(checkboxes);
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
}