require('./bootstrap');
require('alpinejs');

// 数字がたくさんあるoptionタグを作る関数
function makeIntOption(id, min, max)
{
  for(let i = min; i <= max; i++){
    $('#'+ id).append(`<option value="${i}"> ${i} </option>`)
  }
}
// 数字がたくさんあるoptionタグを作る関数
function makeIntOption2(id, min, max)
{
  for(let i = min; i <= max; i++){
    if(i === 1985){
      $('#'+ id).append(`<option value="${i}" selected> ${i} </option>`)
    }else{
      $('#'+ id).append(`<option value="${i}"> ${i} </option>`)
    }
  }
}

$(function(){
  makeIntOption("career",0,40);
  makeIntOption2("birth_year",1950,2021);
  makeIntOption("birth_month",1,12);
  makeIntOption("birth_day",1,31);

  // マイページで画像選択時に更新
  $("#myPageImageInput").on('change', function(){
    console.log('detected change');
    document.myPageImageForm.submit();
  });


// 地域の選択によって市町村のセレクトボックスが変わる(register.blade.php)
const areaSelect = document.getElementById('area');
if(areaSelect){
  areaSelect.addEventListener('change', (e) => {
    const area_id = e.target.value;
    const displayCityOptions = document.getElementById('citiesGroup' + area_id);
    displayCityOptions.className = 'block';
  })
}

// エリア選択のドロップダウン(area.blade.php)
const areaTitles = document.querySelectorAll('.bukatsu-area');
if(areaTitles){
  areaTitles.forEach(function(element) {
    var button = element.querySelector('.bukatsu-area-title');
    var dropdown = element.querySelector('.bukatsu-cities');

    button.addEventListener('click', function() {
      dropdown.classList.toggle('hidden');
    });
  });
}

});