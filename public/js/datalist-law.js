const selectAct = document.getElementById('select-act');
const act = document.getElementById('act');

selectAct.onfocus = function () {
    act.style.display = 'block';
};

for (let option of act.options) {
    option.onclick = function () {
        selectAct.value = option.value;
        act.style.display = 'none';
    }
}

selectAct.oninput = function () {
    let currentFocus = -1;
    const text = selectAct.value.toUpperCase();
    for (let option of act.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectAct && e.target != act) {
        act.style.display = "none";
    }
});