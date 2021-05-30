/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
// $.ajaxSetup({
//     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
// });
$(document).ready(function () {
  var company_id = localStorage.getItem("company_id");
  $('[name="company_id"]').val(company_id);
  $('#company_id').val(company_id);
  console.log("comp " + company_id);
  console.log("aaaa"); //// combo anidado pais provincia

  if ($("#search_id").length) {
    console.log("existe");
  } else console.log("no existe");

  $('#search_id').on('click', function (e) {
    console.log('bb');
    var country_id = e.target.value;
    console.log(country_id);
    $.ajax({
      url: "/admin/state",
      type: "POST",
      data: {
        country_id: country_id
      },
      success: function success(data) {
        console.log('data ' + data);
        $('#state').empty().append('<option selected>Seleccionar Provincia</option>');
        $('#city').empty().append('<option selected="selected">Seleccionar Ciudad</option>');
        $('#company').empty().append('<option selected="selected">Seleccionar Empresa</option>');
        $.each(data.states[0].states, function (country, state) {
          $('#state').append('<option value="' + state.id + '">' + state.state + '</option>');
        });
      }
    });
  });
  $('#state').on('change', function (e) {
    var state_id = e.target.value;
    $.ajax({
      url: "/admin/city",
      type: "POST",
      data: {
        state_id: state_id
      },
      success: function success(data) {
        $('#city').empty().append('<option selected="selected">Seleccionar Ciudad</option>');
        $('#company').empty().append('<option selected="selected">Seleccionar Empresa</option>');
        $.each(data.cities[0].cities, function (state, city) {
          $('#city').append('<option value="' + city.id + '">' + city.city + '</option>');
        });
      }
    });
  });
  $('#city').on('change', function (e) {
    var city_id = e.target.value;
    $.ajax({
      url: "/admin/company",
      type: "POST",
      data: {
        city_id: city_id
      },
      success: function success(data) {
        $('#company').empty().append('<option selected="selected">Seleccionar Empresa</option>');
        $.each(data.companies, function (city, company) {
          $('#company').append('<option value="' + company.id + '">' + company.company + '</option>');
        });
      }
    });
  }); // $('#email').on('change',function(e) {
  //     var email = e.target.value;
  // });
  // editor_init('editor');
}); // function editor_init(field){
//     CKEDITOR.replace(field,{
//         toolbar: [
//             { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo']},
//             { name: 'basicstyles', items: [ 'Bold'  , 'Italic', 'BulletedList', 'Strike', 'Image', 'Link', 'Unlink', 'Blockquote'] },
//             { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'Preview', 'Source']}
//         ]
//     });
// }
/******/ })()
;
