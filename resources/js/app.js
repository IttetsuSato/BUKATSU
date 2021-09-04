require('./bootstrap');

require('alpinejs');

// 地域の選択によって市町村のセレクトボックスが変わる(register.blade.php)
const areaSelect = document.getElementById('area');
areaSelect.addEventListener('change', (e) => {
  const area_id = e.target.value;
  const displayCityOptions = document.getElementById('citiesGroup' + area_id);
  displayCityOptions.className = 'block';
})
