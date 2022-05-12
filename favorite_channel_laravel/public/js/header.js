// サイドメニュバー
const btn = document.querySelector('.btn-menu');
const nav = document.querySelector('.menu-list');
const bar1 = document.querySelector('#js-bar1');
const bar3 = document.querySelector('#js-bar3');
 
btn.addEventListener('click', () => {
    nav.classList.toggle('open-menu');
    bar1.classList.toggle('bar-active');
    bar3.classList.toggle('bar-active');
});