//モーダルの表示非表示
class Modal {
    constructor(buttonId, modalId, backgroundModal) {
        this.button = document.getElementById(buttonId); //ボタン
        this.modal = document.getElementById(modalId); //出てくるモーダル 
        this.modalBack = document.getElementById(backgroundModal); //バックグラウンド
    };

        //モーダルコンテンツの表示
        getModal() {this.button.addEventListener('click', ()=>{
            this.modal.classList.add("active");
            this.modalBack.style.display = "block";
        });
    };
    
    //モーダルコンテンツ以外がクリックされた時
    outModal() {this.modalBack.addEventListener('click', ()=>{
        this.modal.classList.remove("active");
        this.modalBack.style.display = "none";
    });
};
};

const search = new Modal('js-search', 'js-search-modal', 'js-modal-background');

search.getModal();
search.outModal();

