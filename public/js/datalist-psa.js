const selectProvince = document.getElementById('select-province');
const province = document.getElementById('province');

selectProvince.onfocus = function () {
    province.style.display = 'block';
};

for (let option of province.options) {
    option.onclick = function () {
        selectProvince.value = option.value;
        province.style.display = 'none';
    }
}

selectProvince.oninput = function () {
    let currentFocus = -1;
    const text = selectProvince.value.toUpperCase();
    for (let option of province.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectProvince && e.target != province) {
        province.style.display = "none";
    }
});

// --------------------------------------------------------------

const selectDistrict = document.getElementById('select-district');
const district = document.getElementById('district');

selectDistrict.onfocus = function () {
    district.style.display = 'block';
};

for (let option of district.options) {
    option.onclick = function () {
        selectDistrict.value = option.value;
        district.style.display = 'none';
    }
}

selectDistrict.oninput = function () {
    let currentFocus = -1;
    const text = selectDistrict.value.toUpperCase();
    for (let option of district.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectDistrict && e.target != district) {
        district.style.display = "none";
    }
});

// --------------------------------------------------------------

const selectCourt = document.getElementById('select-court');
const court = document.getElementById('court');

selectCourt.onfocus = function () {
    court.style.display = 'block';
};

for (let option of court.options) {
    option.onclick = function () {
        selectCourt.value = option.value;
        court.style.display = 'none';
    }
}

selectCourt.oninput = function () {
    let currentFocus = -1;
    const text = selectCourt.value.toUpperCase();
    for (let option of court.options) {
        if (option.value.toUpperCase().indexOf(text) > -1) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    }
};

document.addEventListener("click", function (e) {
    if (e.target != selectCourt && e.target != court) {
        court.style.display = "none";
    }
});