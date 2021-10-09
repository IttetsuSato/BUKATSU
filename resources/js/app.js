require('./bootstrap');
// require('./mycrop');

require('alpinejs');

// 数字がたくさんあるoptionタグを作る関数
function makeIntOption($id, $min, $max)
{
  console.log('makeIntOption!');
  for(let i = $min; i <= $max; i++){
    $('#'+ $id).append('<option value="'+i+'">' + i + '</option>')
  }
}

$(function(){
  makeIntOption("career",0,50);
  makeIntOption("birth_year",1930,2022);
  makeIntOption("birth_month",1,12);
  makeIntOption("birth_day",1,31);


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