const selectRank = document.getElementById('select-rank');
const rank = document.getElementById('rank');

selectRank.onfocus = function () {
    rank.style.display = 'block';
};

for (let option of rank.options) {
    option.onclick = function () {
        selectRank.value = option.value;
        rank.style.display = 'none';
    }
}

selectRank.oninput = function () {
    let currentFocus = -1;
    const text = selectRank.value.toUpperCase();
    for (let option of rank.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectRank && e.target != rank) {
        rank.style.display = "none";
    }
});

// --------------------------------------------------------------

const selectPStation = document.getElementById('select-pStation');
const pStation = document.getElementById('pStation');

selectPStation.onfocus = function () {
    pStation.style.display = 'block';
};

for (let option of pStation.options) {
    option.onclick = function () {
        selectPStation.value = option.value;
        pStation.style.display = 'none';
    }
}

selectPStation.oninput = function () {
    let currentFocus = -1;
    const text = selectPStation.value.toUpperCase();
    for (let option of pStation.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectPStation && e.target != pStation) {
        pStation.style.display = "none";
    }
});
