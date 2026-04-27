const accordions=document.querySelectorAll(".accordion"),openAccordion=c=>{const o=c.querySelector(".accordion__content"),i=c.querySelector(".accordion__intro");c.classList.add("accordion__active"),o.style.maxHeight=o.scrollHeight+"px",i.setAttribute("aria-expanded","true")},closeAccordion=c=>{const o=c.querySelector(".accordion__content"),i=c.querySelector(".accordion__intro");c.classList.remove("accordion__active"),o.style.maxHeight=null,i.setAttribute("aria-expanded","false")};accordions.forEach((c=>{const o=c.querySelector(".accordion__intro"),e=c.querySelector(".accordion__content");o.onclick=()=>{e.style.maxHeight?closeAccordion(c):(accordions.forEach((c=>closeAccordion(c))),openAccordion(c))}}));

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.bogo-language-switcher a').forEach(a => {
    a.setAttribute('tabindex', '-1');
  });
});