function changeInputType() {
    const select = document.getElementById("column");
    const inputContainer = document.getElementById("search-input-container");
    const selectedOption = select.options[select.selectedIndex].value;

    if (selectedOption === "province") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="Western Province">Western Province</option>' +
            '<option value="Central Province">Central Province</option>' +
            '<option value="North Central Province">North Central Province</option>' +
            '<option value="Northern Province">Northern Province</option>' +
            '<option value="Eastern Province">Eastern Province</option>' +
            '<option value="North Western Province">North Western Province</option>' +
            '<option value="Southern Province">Southern Province</option>' +
            '<option value="Uva Province">Uva Province</option>' +
            '<option value="Sabaragamuwa Province">Sabaragamuwa Province</option>' +
            '</select>';
    } else if (selectedOption === "district") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="Colombo">Colombo</option>' +
            '<option value="Gampaha">Gampaha</option>' +
            '<option value="Kalutara">Kalutara</option>' +
            '<option value="Kandy">Kandy</option>' +
            '<option value="Matale">Matale</option>' +
            '<option value="Nuwara Eliya">Nuwara Eliya</option>' +
            '<option value="Galle">Galle</option>' +
            '<option value="Matara">Matara</option>' +
            '<option value="Hambantota">Hambantota</option>' +
            '<option value=" Jaffna"> Jaffna</option>' +
            '<option value="Kilinochchi">Kilinochchi</option>' +
            '<option value="Mannar">Mannar</option>' +
            '<option value="Vavuniya">Vavuniya</option>' +
            '<option value="Mullaitivu">Mullaitivu</option>' +
            '<option value="Batticaloa">Batticaloa</option>' +
            '<option value="Ampara">Ampara</option>' +
            '<option value="Trincomalee">Trincomalee</option>' +
            '<option value="Kurunegala">Kurunegala</option>' +
            '<option value="Puttalam">Puttalam</option>' +
            '<option value="Anuradhapura">Anuradhapura</option>' +
            '<option value="Polonnaruwa">Polonnaruwa</option>' +
            '<option value="Badulla">Badulla</option>' +
            '<option value="Moneragala">Moneragala</option>' +
            '<option value="Ratnapura">Ratnapura</option>' +
            '<option value="Kegalle">Kegalle</option>' +
            '</select>';
    } else if (selectedOption === "court_name") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="High Court Ambilipitiya">High Court Ambilipitiya</option>' +
            '<option value="High Court Ampara">High Court Ampara</option>' +
            '<option value="High Court Anuradhapura">High Court Anuradhapura</option>' +
            '<option value="High Court Avissawella">High Court Avissawella</option>' +
            '<option value="High Court Badulla">High Court Badulla</option>' +
            '<option value="High Court Balapitiya">High Court Balapitiya</option>' +
            '<option value="High Court Batticaloa">High Court Batticaloa</option>' +
            '<option value="High Court Chilaw">High Court Chilaw</option>' +
            '<option value="High Court Colombo">High Court Colombo</option>' +
            '<option value="High Court Galle">High Court Galle</option>' +
            '<option value="High Court Gampaha">High Court Gampaha</option>' +
            '<option value="High Court Hambantota">High Court Hambantota</option>' +
            '<option value="High Court Jaffna">High Court Jaffna</option>' +
            '<option value="High Court Kalmunai">High Court Kalmunai</option>' +
            '<option value="High Court Kandy">High Court Kandy</option>' +
            '<option value="High Court Kegalle">High Court Kegalle</option>' +
            '<option value="High Court Kurunegala">High Court Kurunegala</option>' +
            '<option value="High Court Matara">High Court Matara</option>' +
            '<option value="High Court Negombo">High Court Negombo</option>' +
            '<option value="High Court Panadura">High Court Panadura</option>' +
            '<option value="High Court Polonnaruwa">High Court Polonnaruwa</option>' +
            '<option value="High Court Puttalam">High Court Puttalam</option>' +
            '<option value="High Court Ratnapura">High Court Ratnapura</option>' +
            '<option value="High Court Trincomalee">High Court Trincomalee</option>' +
            '<option value="High Court Vavuniya">High Court Vavuniya</option>' +
            '<option value="High Court Welikada">High Court Welikada</option>' +
            '<option value="District Court Akkaraipattu">District Court Akkaraipattu</option>' +
            '<option value="District Court Ampara">District Court Ampara</option>' +
            '<option value="District Court Anuradhapura">District Court Anuradhapura</option>' +
            '<option value="District Court Attanagalla">District Court Attanagalla</option>' +
            '<option value="District Court Avissawella">District Court Avissawella</option>' +
            '<option value="District Court Badulla">District Court Badulla</option>' +
            '<option value="District Court Balapitiya">District Court Balapitiya</option>' +
            '<option value="District Court Bandarawela">District Court Bandarawela</option>' +
            '<option value="District Court Batticaloa">District Court Batticaloa</option>' +
            '<option value="District Court Chavakachcheri">District Court Chavakachcheri</option>' +
            '<option value="District Court Chilaw">District Court Chilaw</option>' +
            '<option value="District Court Colombo">District Court Colombo</option>' +
            '<option value="District Court Elpitiya">District Court Elpitiya</option>' +
            '<option value="District Court Embilipitiya">District Court Embilipitiya</option>' +
            '<option value="District Court Galle">District Court Galle</option>' +
            '<option value="District Court Gampaha">District Court Gampaha</option>' +
            '<option value="District Court Gampola">District Court Gampola</option>' +
            '<option value="District Court Hambantota">District Court Hambantota</option>' +
            '<option value="District Court Hatton">District Court Hatton</option>' +
            '<option value="District Court Homagama">District Court Homagama</option>' +
            '<option value="District Court Horana">District Court Horana</option>' +
            '<option value="District Court Jaffna">District Court Jaffna</option>' +
            '<option value="District Court Kalmunai">District Court Kalmunai</option>' +
            '<option value="District Court Kalutara">District Court Kalutara</option>' +
            '<option value="District Court Kandy">District Court Kandy</option>' +
            '<option value="District Court Kayts">District Court Kayts</option>' +
            '<option value="District Court Kegalle">District Court Kegalle</option>' +
            '<option value="District Court Kuliyapitiya">District Court Kuliyapitiya</option>' +
            '<option value="District Court Kurunegala">District Court Kurunegala</option>' +
            '<option value="District Court Maho">District Court Maho</option>' +
            '<option value="District Court Mallakam">District Court Mallakam</option>' +
            '<option value="District Court Mannar">District Court Mannar</option>' +
            '<option value="District Court Marawila">District Court Marawila</option>' +
            '<option value="District Court Matale">District Court Matale</option>' +
            '<option value="District Court Matara">District Court Matara</option>' +
            '<option value="District Court Matugama">District Court Matugama</option>' +
            '<option value="District Court Moneragala">District Court Moneragala</option>' +
            '<option value="District Court Moratuwa">District Court Moratuwa</option>' +
            '<option value="District Court Mount Lavinia">District Court Mount Lavinia</option>' +
            '<option value="District Court Mullativu">District Court Mullativu</option>' +
            '<option value="District Court Negombo">District Court Negombo</option>' +
            '<option value="District Court Nuwara Eliya">District Court Nuwara Eliya</option>' +
            '<option value="District Court Panadura">District Court Panadura</option>' +
            '<option value="District Court Point Pedro">District Court Point Pedro</option>' +
            '<option value="District Court Polonnaruwa">District Court Polonnaruwa</option>' +
            '</select>';
    } else if (selectedOption === "created_at" || selectedOption === "latest_update_at") {
        inputContainer.innerHTML = '<input type="date" name="search" id="search">';
    } else if (selectedOption === "id" || selectedOption === "added_by" || selectedOption === "latest_update_by") {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    } else if (selectedOption === "police_station" || selectedOption === "email") {
        inputContainer.innerHTML = '<input type="text" name="search" id="search">';
    } else {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    }
}