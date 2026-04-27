function setModePreference(mode){document.cookie=`mode=${mode}; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`}
function getModePreference(){const cookies=document.cookie.split(';');for(const cookie of cookies){const[name,value]=cookie.trim().split('=');if(name==='mode'){return value}}
return null}
const savedMode=getModePreference();if(savedMode==='dark'){document.body.classList.remove('light-mode')}else{document.body.classList.add('light-mode')}
document.addEventListener('DOMContentLoaded',function(){var c_body=document.querySelector('body');var switch_light=document.querySelector('#light-mode');var switch_dark=document.querySelector('#dark-mode');var is_error_page=document.querySelector('.error404');var matrix_light=document.querySelector('#matrix-light');var matrix_dark=document.querySelector('#matrix-dark');var prism_css=document.querySelector('#prism-css-css');switch_light.onclick=function(){switch_dark.classList.remove('current');this.classList.add('current');c_body.classList.add('light-mode');if(typeof(prism_css)!='undefined'&&prism_css!=null){prism_css.href="https://w3wg.com/wp-content/themes/wgv3/assets/prism/prism-light.css"}
if(typeof(is_error_page)!='undefined'&&is_error_page!=null){matrix_light.classList.remove('matrix-hidden');matrix_dark.classList.add('matrix-hidden')}}
switch_dark.onclick=function(){switch_light.classList.remove('current');this.classList.add('current');c_body.classList.remove('light-mode');if(typeof(prism_css)!='undefined'&&prism_css!=null){prism_css.href="https://w3wg.com/wp-content/themes/wgv3/assets/prism/prism.css"}
if(typeof(is_error_page)!='undefined'&&is_error_page!=null){matrix_dark.classList.remove('matrix-hidden');matrix_light.classList.add('matrix-hidden')}}
switch_light.addEventListener('click',function(){setModePreference('light')});switch_dark.addEventListener('click',function(){setModePreference('dark')});if(savedMode==='dark'){switch_light.classList.remove('current');switch_dark.classList.add('current');c_body.classList.remove('light-mode');if(typeof(prism_css)!='undefined'&&prism_css!=null){prism_css.href="https://w3wg.com/wp-content/themes/wgv3/assets/prism/prism.css"}
if(typeof(is_error_page)!='undefined'&&is_error_page!=null){matrix_dark.classList.remove('matrix-hidden');matrix_light.classList.add('matrix-hidden')}}else{switch_dark.classList.remove('current');switch_light.classList.add('current');c_body.classList.add('light-mode');if(typeof(prism_css)!='undefined'&&prism_css!=null){prism_css.href="https://w3wg.com/wp-content/themes/wgv3/assets/prism/prism-light.css"}
if(typeof(is_error_page)!='undefined'&&is_error_page!=null){matrix_light.classList.remove('matrix-hidden');matrix_dark.classList.add('matrix-hidden')}}},!1)

document.addEventListener('DOMContentLoaded', function() {
   var fontcheck = document.querySelector('.font-bigger');

   if (fontcheck) {

    document.querySelector('.font-bigger').addEventListener('click', function () {
    const body = document.body;
    let clickCount = parseInt(this.dataset.clickCount || 0) + 1;

    if (clickCount === 1) {
        body.classList.add('wcag-font-half');
    } else if (clickCount === 2) {
        body.classList.remove('wcag-font-half');
        body.classList.add('wcag-font-full');
    } else {
        body.classList.remove('wcag-font-full');
        clickCount = 0;
    }

    this.dataset.clickCount = clickCount;
    });

}
}, false);