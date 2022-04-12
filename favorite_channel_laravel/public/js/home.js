
function test(){
    //ここでローディング画像を表示していたDIVを非表示にする
    document.getElementById('loading').style.display = 'none';
    
    //ここで本体を表示にさせる
    document.getElementById('wrapper').style.display = 'block';	
}

window.onload = function() {
    const spinner = document.getElementById('loading');
    spinner.classList.add('loaded');
}

window.onload = function () {
    //切り替えがわかるように2秒後にtestを実行するようにする
    setTimeout('test()', 1500);
}

//モーダルの表示非表示
class Modal {
    constructor(buttonId, modalId, backgroundModal) {
        this.button = document.getElementById(buttonId); //ボタン
        this.modal = document.getElementById(modalId); //出てくるモーダル 
        this.modalBack = document.getElementById(backgroundModal); //バックグラウンド
    };
    
    //モーダルコンテンツの表示
    getModal() {this.button.addEventListener('click', ()=>{
        this.modal.style.display = "block";
        this.modalBack.style.display = "block";
        });
    };

    //モーダルコンテンツ以外がクリックされた時
    outModal() {this.modalBack.addEventListener('click',()=>{
        this.modal.style.display = "none";
        this.modalBack.style.display = "none";
        });
    };
};

const search = new Modal('js-search', 'js-search-modal', 'js-modal-background');
const up = new Modal('js-up', 'js-up-modal', 'js-modal-background');
const introduction = new Modal('js-introduction', 'js-introduction-modal', 'js-modal-background');

search.getModal();
search.outModal();
up.getModal();
up.outModal();
introduction.getModal();
introduction.outModal();
